<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index() {
		$data['cart_products'] = $this->session->userdata('cart_session');

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$data['title'] = 'Carrinho';

		$this->load->view('public/header', $data);
		$this->load->view('public/cart');
		$this->load->view('public/footer');	
	}

	public function add() {
		$product[] = array();
	
		$product['id'] = $this->input->post('addproductcart[id]');
		$rowproduct = $product['id'];

		$product['name'] = $this->input->post('addproductcart[name]');
		$product['description'] = $this->input->post('addproductcart[description]');
		$product['image'] = $this->input->post('addproductcart[image]');
		$product['price'] = $this->input->post('addproductcart[price]');
		$product['quantitystock'] = $this->input->post('addproductcart[quantitystock]');
		if((int)$this->input->post('addproductcart[quantity]') > 1) {
			$product['quantity'] = $this->input->post('addproductcart[quantity]');
		} else if((int)$this->input->post('addproductcart[quantity]') > $product['quantitystock']) {
			$this->session->set_flashdata('messages', 'Essa quantidade excede a quantidade em estoque do produto.');
		    $this->session->set_flashdata('typemessage', 'error');
			$product['quantity'] = $product['quantitystock'];
		} else {
			$product['quantity'] = 1;
		}

		$cart_session = $this->session->userdata('cart_session');

		$exists = FALSE;
		if($cart_session) {
			if(array_key_exists($rowproduct, $cart_session)) {
				$quantityNow = $cart_session[$rowproduct]['quantity'];
				$exists = TRUE;
			} else {
				$exists = FALSE;
			}
		}
		
		if(!$exists) {
			$cart_session[$rowproduct] = $product;
			$this->session->set_userdata('cart_session', $cart_session);

			$this->session->set_flashdata('messages', 'Produto ' . $this->input->post('addproductcart[name]') . ' adicionado ao carrinho.');
		    $this->session->set_flashdata('typemessage', 'ok');
		} else {
			$cart_session[$rowproduct]['quantity'] = $quantityNow + $product['quantity'];

			$this->session->set_userdata('cart_session', $cart_session);

			$this->session->set_flashdata('messages', 'Produto ' . $this->input->post('addproductcart[name]') . ' atualizado no carrinho.');
		    $this->session->set_flashdata('typemessage', 'ok');
		}

		redirect('cart', 'refresh');
	}

	public function update() {
		$product[] = array();

		$product['id'] = $this->input->post('updateproductcart[id]');
		$product['quantitystock'] = $this->input->post('updateproductcart[quantitystock]');
		$rowproduct = $product['id'];

		if((int)$this->input->post('updateproductcart[quantity]') > $product['quantitystock']) {			
			$this->session->set_flashdata('messages', 'Essa quantidade excede a quantidade em estoque do produto.');
		    $this->session->set_flashdata('typemessage', 'error');
			$product['quantity'] = $product['quantitystock'];
		} else if($this->input->post('updateproductcart[quantity]') > 1) {
			$product['quantity'] = $this->input->post('updateproductcart[quantity]');
		} else {
			$product['quantity'] = 1;
		}

		$cart_session = $this->session->userdata('cart_session');
		$cart_session[$rowproduct]['quantity'] = $product['quantity'];
		$this->session->set_userdata('cart_session', $cart_session);

		$this->session->set_flashdata('messages', 'Produto ' . $this->input->post('addproductcart[name]') . ' atualizado no carrinho.');
	    $this->session->set_flashdata('typemessage', 'ok');

		redirect('cart', 'refresh');
	}

	public function delete($id) {
		$cart_session = $this->session->userdata('cart_session');
		$productName = $cart_session[$id]['name'];
		unset($cart_session[$id]);
		$this->session->set_userdata('cart_session', $cart_session);

		$this->session->set_flashdata('messages', 'Produto ' . $productName . ' removido do carrinho.');
	    $this->session->set_flashdata('typemessage', 'ok');

		redirect('cart', 'refresh');
	}

	public function emptycart() {
		$this->session->unset_userdata('cart_session');

		redirect('cart', 'refresh');
	}

}
