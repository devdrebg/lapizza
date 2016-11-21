<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	public function index() {
		$data['cart_products'] = $this->session->userdata('cart_session');

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$data['title'] = 'Finalizar Pedido';

		$this->load->view('checkout/header', $data);
		$this->load->view('public/checkout');
		$this->load->view('checkout/footer');
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			$this->session->set_flashdata('messages', 'Para realizar um pedido é necessário estar logado em sua conta.');
		    $this->session->set_flashdata('typemessage', 'ok');
			redirect('cart', 'refresh');
		}
	}

}
