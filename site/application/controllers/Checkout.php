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
		var_dump($_POST);
		exit();
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
