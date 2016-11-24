<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	public function index() {
		$data['title'] = 'Dashboard';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('user/header', $data);
		$this->load->view('user/dashboard');
		$this->load->view('user/footer');
	}

	public function address() {
		$this->load->model('address_model');
		$userData = $this->session->userdata();

		$data['userdata'] = $userData;
		$data['addresses'] = $this->address_model->getAllFromUser($userData['id']);
		
		$data['title'] = 'Meus Endereços';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('user/header', $data);
		$this->load->view('user/address');
		$this->load->view('user/footer');
	}

	public function orders() {
		$userData = $this->session->userdata();

		$data['userdata'] = $userData;
		
		$data['title'] = 'Meus Pedidos';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$user = $this->session->userdata();

		$this->load->model('orders_model');
		$data['orders'] = $this->orders_model->getAllFromUser($user['id']);

		$this->load->view('user/header', $data);
		$this->load->view('user/orders');
		$this->load->view('user/footer');	
	}

	public function changestatus() {
		$this->load->model('user_model');

		$idUser = $this->input->post('id');
		$statusUser = $this->input->post('status');

		if($statusUser) {
			$this->user_model->changestatus($idUser, 0);
			$this->session->set_flashdata('messages', 'Usuário ' . $this->input->post('name') . ' foi desabilitado para comprar.');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/users', 'refresh');
		} else {
			$this->user_model->changestatus($idUser, 1);

			$this->session->set_flashdata('messages', 'Usuário ' . $this->input->post('name') . ' foi habilitado para comprar.');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/users', 'refresh');
		}
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}

