<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->userLogged();
		$this->haveItensCart();
		$this->storeOnline();
		$this->hasAddress();
		$this->havePaymentMethods();
	}

	public function index() {
		$this->load->model('address_model');
		$this->load->model('options_model');
		$this->load->model('billings_model');

		$data['user'] = $this->session->userdata();
		$data['addresses'] = $this->address_model->getAllFromUser($data['user']['id']);
		$data['billings'] = $this->billings_model->getAll();
		$data['cart_products'] = $this->session->userdata('cart_session');

		$data['subtotal'] = 0;

		foreach ($data['cart_products'] as $cart_product) {
			$data['subtotal'] += $cart_product['quantity'] * $cart_product['price'];
		}

		$options = $this->options_model->get(1);
		$data['tax_vat'] = $options->tax_vat;

		$data['total_price'] = $data['tax_vat'] + $data['subtotal'];

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$data['title'] = 'Finalizar Pedido';

		$this->load->view('checkout/header', $data);
		$this->load->view('public/checkout');
		$this->load->view('checkout/footer');
	}

	public function proccess() {
		$this->load->model('address_model');
		$this->load->model('itens_model');
		$this->load->model('orders_model');
		$this->load->model('products_model');
		$this->load->model('user_model');

		$idAddress = $this->input->post('addressid');
		$idUser = $this->input->post('id_user');

		$address = $this->address_model->get($idAddress);
		$user = $this->user_model->get($idUser);
		
		$thisdate = date('Y-m-d h:i:s');
		$order = array(
			'id_user' => $this->input->post('id_user'),
			'subtotal_price' => $this->input->post('subtotal_price'),
			'tax_vat' => $this->input->post('tax_vat'),
			'total_price' => $this->input->post('total_price'),
			'date' => $thisdate,
			'name_user' => $user->name,
			'address_user' => $address->address,
			'number_user' => $address->number . ' ' . $address->adjunct,
			'postal_code_user' => $address->postalcode,
			'phone_user' => $user->phone,
			'name_billing' => $this->input->post('name_billing'),
			'status' => 'Em Preparo'
		);

		$carrinho = $this->session->userdata('cart_session');

		$this->orders_model->insert($order);

		$theOrderInserted = $this->orders_model->getByTime($thisdate);

		foreach ($carrinho as $itemPrepare) {
			$itemPrice = (float)$itemPrepare['price'];
			$itemQuantity = (int)$itemPrepare['quantity'];
			$itemSubTotal = $itemPrice * $itemQuantity;
			$itemQuantityStock = (int)$itemPrepare['quantitystock'];
			$itemNewQuantity = $itemQuantityStock - $itemQuantity;

			$item = array(
				'id_order' => $theOrderInserted->id,
				'name' => $itemPrepare['name'],
				'description' => $itemPrepare['description'],
				'price' => $itemPrice,
				'image' => $itemPrepare['image'],
				'quantity' => $itemQuantity,
				'subtotal' => $itemSubTotal
			);

			$this->products_model->updateQuantity($itemPrepare['id'], $itemNewQuantity);
			$this->itens_model->insert($item);
		}

		redirect('checkout/success', 'refresh');
	}

	public function success() {
		exit('Pedido concluído com sucesso');
	}

	private function haveItensCart() {
		$cart = $this->session->userdata('cart_session');

		if(!$cart) {
			$this->session->set_flashdata('messages', 'Para realizar um pedido é necessário adicionar itens ao carrinho.');
		    $this->session->set_flashdata('typemessage', 'error');
			redirect('cart', 'refresh');
		}
	}

	private function hasAddress() {
		$this->load->model('address_model');

		$address = $this->address_model->getAllFromUser($this->session->userdata('id'));

		if(!$address) {
			$this->session->set_flashdata('messages', 'Para realizar um pedido em nossa loja será necessário que você tenha pelo menos 1 endereço cadastrado.');
		    $this->session->set_flashdata('typemessage', 'error');
			redirect('cart', 'refresh');
		}
	}

	private function havePaymentMethods() {
		$this->load->model('billings_model');

		$billings = $this->billings_model->getAll();

		if(!$billings) {
			$this->session->set_flashdata('messages', 'No momento não é possivel realizar pedidos em nossa loja, tente novamente mais tarde.');
		    $this->session->set_flashdata('typemessage', 'error');
			redirect('cart', 'refresh');
		}
	}

	private function storeOnline() {
		$this->load->model('options_model');

		$options = $this->options_model->get(1);

		$status = $options->store_status;

		if(!$status) {
			$this->session->set_flashdata('messages', 'No momento a pizzaria está offline, logo não se pode realizar pedidos na loja.');
		    $this->session->set_flashdata('typemessage', 'error');
			redirect('cart', 'refresh');
		}
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			$this->session->set_flashdata('messages', 'Para realizar um pedido é necessário estar logado em sua conta.');
		    $this->session->set_flashdata('typemessage', 'ok');
			redirect('cart', 'refresh');
		}
	}

}
