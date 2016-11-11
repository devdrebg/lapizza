<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {

	}

	public function redirect() {
		$this->load->model('user_model');
	   	$this->form_validation->set_rules('login[email]', 'e-mail', 'trim|required');
   		$this->form_validation->set_rules('login[password]', 'senha', 'trim|required');

 		//SE OS DADOS PREENCHIDOS ESTIVEREM INVÁLIDOS
		if($this->form_validation->run() == FALSE) {
			$this->template->load('layouts/public', 'public/login');
   		} else {
			$user = $this->user_model->redirect($this->input->post('login[email]'), MD5($this->input->post('login[password]')));

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
			    $this->session->set_flashdata('messages', 'Seja bem vindo ' . $dadosUser['name']);
			    $this->session->set_flashdata('typemessage', 'ok');
				redirect('user', 'refresh');
			} else {
				$this->session->set_flashdata('messages', 'Erro no login, verifique seus dados de acesso');
			    $this->session->set_flashdata('typemessage', 'error');
				redirect('login', 'refresh');
			}
		}
	}

	public function redirectadmin() {
		$this->load->model('admin_model');
	   	$this->form_validation->set_rules('login[email]', 'e-mail', 'trim|required');
   		$this->form_validation->set_rules('login[password]', 'senha', 'trim|required');

 		//SE OS DADOS PREENCHIDOS ESTIVEREM INVÁLIDOS
		if($this->form_validation->run() == FALSE) {
			$this->template->load('layouts/public', 'public/login');
   		} else {
			$admin = $this->admin_model->redirectadmin($this->input->post('login[email]'), MD5($this->input->post('login[password]')));

			//SE O USUÁRIO EXISTIR 
			if($admin) {
				$dadosUser = array(
					'id' => $admin[0]["id"],
				    'name' => $admin[0]["name"],
				    'user' => $admin[0]["user"],
				    'email' => $admin[0]["email"],
				    'password' => $admin[0]["password"],
				    'picture' => $admin[0]["picture"],
				    'phone' => $admin[0]["phone"],
				    'validated' => true
			    );

			    $this->session->set_admindata($dadosUser);
			    $this->session->set_flashdata('messages', 'Seja bem vindo ' . $dadosUser['name']);
			    $this->session->set_flashdata('typemessage', 'ok');
				redirect('admin', 'refresh');
			} else {
				$this->session->set_flashdata('messages', 'Erro no login, verifique seus dados de acesso');
			    $this->session->set_flashdata('typemessage', 'error');
				redirect('administrator', 'refresh');
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		session_write_close();
		redirect('login');
	}

	public function signin() {
		$this->load->model('user_model');
		$data = array(
			'name' => $this->input->post('usercreate[name]'),
			'user' => $this->input->post('usercreate[user]'),
			'phone' => $this->input->post('usercreate[phone]'),
			'email' => $this->input->post('usercreate[email]'),
			'password' => MD5($this->input->post('usercreate[senha]')),
			'picture' => '',
			'type' => 0,
			'status' => 1
		);
		$user = $this->user_model->exists($this->input->post('usercreate[email]'));

		if(!$user) {
			$this->user->signin($data);
			$user = $this->user->exists($this->input->post('usercreate[email]'));

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
		    $this->session->set_flashdata('messages', 'Seja bem vindo ' . $dadosUser['name']);
		    $this->session->set_flashdata('typemessage', 'ok');
			redirect('user', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Este e-mail já está sendo utilizado por outro usuário, por favor, crie uma conta com um e-mail diferente');
			    $this->session->set_flashdata('typemessage', 'error');
			redirect('login', 'refresh');	
		}
	}

}

