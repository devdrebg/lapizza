<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index() {
		$data['title'] = 'Pizzas, Esfihas e Lanches na Zona Leste';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->model('banners_model');
		$data['banners'] = $this->banners_model->getAllActive();

		$this->load->model('products_model');
		$data['products'] = $this->products_model->getAllActive();

		$this->load->view('public/header', $data);
		$this->load->view('public/home');
		$this->load->view('public/footer');
	}

	public function about() {
		$data['title'] = 'Sobre';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/about');
		$this->load->view('public/footer');
	}

	public function login() {
		$this->userLogged();
		$this->load->helper('form');
		$data['title'] = 'Acessar Conta';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/login');
		$this->load->view('public/footer');
	}

	public function howworks() {
		$data['title'] = 'Como Funciona';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/howworks');
		$this->load->view('public/footer');
	}

	public function contactus() {
		$this->load->helper('form');
		$data['title'] = 'Fale Conosco';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/contactus');
		$this->load->view('public/footer');
	}

	public function sendform() {
		$destinatario = 'andreromario@live.com';
		$assunto = 'Mensagem de Contato do Site - Pizzaria LaPizza';
		$mensagemHTML = '
			<p><strong>Nome:</strong> ' . $this->input->post('nome') . '</p>
			<p><strong>E-mail:</strong> ' . $this->input->post('email') . '</p>
			<p><strong>Telefone:</strong> ' . $this->input->post('tel') . '</p>
			<p><strong>Número do Pedido:</strong> ' . $this->input->post('pedido') . '</p>
			<p><strong>Mensagem:</strong> ' . $this->input->post('mensagem') . '</p>
		';

		$this->load->library('email');
		// $config = array();  
		// $config['protocol'] = 'smtp';  
		// $config['smtp_host'] = 'ssl://smtp.gmail.com';  
		// $config['smtp_user'] = 'lapizzacontato@gmail.com';  
		// $config['smtp_pass'] = 'lapizza303312';  
		// $config['smtp_port'] = 465;  
		// $this->email->initialize($config);
		$this->email->from('lapizzacontato@gmail.com', 'LaPizza');
		$this->email->to($destinatario);
		$this->email->subject($assunto);
		$this->email->set_mailtype("html");
		$this->email->message($mensagemHTML);

		if($this->email->send()) {
			$this->session->set_flashdata('messages', 'E-mail enviado com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');
			redirect('contactus', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Não foi possível enviar o e-mail de contato.');
		    $this->session->set_flashdata('typemessage', 'error');
			redirect('contactus', 'refresh');
		}
	}
	
	public function adminlogin() {		
		$this->userLogged();
		$this->userAdminLogged();
		$this->load->helper('form');
		$data['title'] = 'Fale Conosco';

		$this->load->view('admin/header', $data);
		$this->load->view('public/adminlogin');
		$this->load->view('admin/footer');		
	}

	private function userLogged() {
		if($this->session->userdata('validated') || $this->session->userdata('type') != 0){
			redirect('user/index');
		}
	}

	private function userAdminLogged() {
		if(!$this->session->userdata('validated') || $this->session->userdata('type') != 1){
			redirect('login');
		}
	}

}
