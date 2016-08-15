<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {

	}

	public function redirect() {
		$this->load->model('user');
	   	$this->form_validation->set_rules('login[email]', 'e-mail', 'trim|required');
   		$this->form_validation->set_rules('login[password]', 'senha', 'trim|required');

 		//SE OS DADOS PREENCHIDOS ESTIVEREM INVÁLIDOS
		if($this->form_validation->run() == FALSE) {
			$this->template->load('layouts/public', 'public/login');
   		} else {
			$user = $this->user->redirect($this->input->post('login[email]'), MD5($this->input->post('login[password]')));

			//SE O USUÁRIO EXISTIR 
			if($user) {
				$dadosUser = array(
					'id' => $user[0]["id"],
				    'name' => $user[0]["name"],
				    'user' => $user[0]["user"],
				    'email' => $user[0]["email"],
				    'password' => $user[0]["password"],
				    'picture' => $user[0]["picture"],
				    'phone' => $user[0]["phone"],
				    'validated' => true
			    );

			    $this->session->set_userdata($dadosUser);
				redirect('user', 'refresh');
			} else {
				redirect('login', 'refresh');
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		session_write_close();
		redirect('login');
	}

}

