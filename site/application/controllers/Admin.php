<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	public function index() {
		$data['title'] = 'Seja Bem Vindo!';

		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}

	public function categories() {
		$this->load->model('categories_model');
		$data['title'] = 'Gerenciar Categorias';
		$data['categories'] = $this->categories_model->getAll();		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/categories', $data);
		$this->load->view('admin/footer');
	}

	public function products() {
		$this->load->model('categories_model');
		$this->load->model('products_model');

		$data['title'] = 'Gerenciar Produtos';
		$data['products'] = $this->products_model->getAll();
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/products', $data);
		$this->load->view('admin/footer');
	}

	public function users() {
		$this->load->model('user_model');
		$data['title'] = 'Gerenciar Usuários';
		$data['users'] = $this->user_model->getAll();		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/users', $data);
		$this->load->view('admin/footer');
	}

	public function orders() {
		$this->load->model('orders_model');
		$data['title'] = 'Gerenciar Pedidos';
		$data['orders'] = $this->orders_model->getAll();		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/orders', $data);
		$this->load->view('admin/footer');
	}

	public function billings() {
		$this->load->model('billings_model');
		$data['title'] = 'Gerenciar Formas de Pagamento';
		$data['billings'] = $this->billings_model->getAll();		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/billings', $data);
		$this->load->view('admin/footer');
	}

	public function banners() {
		$this->load->model('banners_model');
		$data['title'] = 'Gerenciar Banners';
		$data['banners'] = $this->banners_model->getAll();		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/banners', $data);
		$this->load->view('admin/footer');
	}

	public function options() {
		$this->load->model('options_model');
		$data['title'] = 'Opções da Loja';
		$data['options'] = $this->options_model->getAll();		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/options', $data);
		$this->load->view('admin/footer');
	}

	public function postalcodes() {
		$this->load->model('postalcodes_model');
		$data['title'] = 'Gerenciar Endereços Permitidos para Entrega';
		$data['postalcodes'] = $this->postalcodes_model->getAll();		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/postalcodes', $data);
		$this->load->view('admin/footer');
	}

	private function userLogged() {
		if(!$this->session->userdata('validated') || $this->session->userdata('type') != 1){
			redirect('login');
		}
	}

}

