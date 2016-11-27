<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	public function index() {
		$this->load->model('address_model');
		$userData = $this->session->userdata();

		$data['userdata'] = $userData;
		$data['addresses'] = $this->address_model->getAllFromUser($userData['id']);
		
		$data['title'] = 'Minha Conta';

		$user = $this->session->userdata();

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->model('orders_model');
		$data['orders'] = $this->orders_model->getAllFromUser($user['id']);

		$this->load->view('user/header', $data);
		$this->load->view('user/account');
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

	public function account() {
		redirect('user');
	}

	public function editaccount() {
		$user = $this->session->userdata();

		$iduser = $user['id'];
		$name = $this->input->post('editaccount[name]');
		$email = $this->input->post('editaccount[email]');
		$phone = $this->input->post('editaccount[phone]');
		$password = trim($this->input->post('editaccount[password]'));
		$newpassword = trim($this->input->post('editaccount[newpassword]'));
		$confirmnewpassword = trim($this->input->post('editaccount[confirmnewpassword]'));

		if($password) {
			$this->load->model('user_model');
			$currentPassword = $this->user_model->getPassword($iduser);

			if(MD5($password) == $currentPassword->password) {
				if($newpassword) {
					if($newpassword == $confirmnewpassword) {
						$password = $newpassword;
					} else {
						$this->session->set_flashdata('messages', 'Para alterar a senha, o campo de senha deve ser exatamente igual ao campo confirmar senha.');
					    $this->session->set_flashdata('typemessage', 'error');

						redirect('user/account', 'refresh');
					}
				}

				if($_FILES['editaccoutprofilepicture']['size'] > 0 && $_FILES['editaccoutprofilepicture']['tmp_name'] != '') {
					$dir = 'img/users/' . date('d_m_y_H_i_s') . '/';
					mkdir($dir, 0777);
					$config['upload_path']		= $dir;
		        	$config['allowed_types']    = 'gif|jpg|jpeg|png';

			        $this->load->library('upload', $config);
			        if (!$this->upload->do_upload('editaccoutprofilepicture')) {
			        	$this->session->set_flashdata('messages', 'Erro no upload da imagem de perfil');
					    $this->session->set_flashdata('typemessage', 'error');

						redirect('user/account', 'refresh');
			        } else {
			        	$imagem = $config['upload_path'] . $_FILES['editaccoutprofilepicture']['name'];
			        }
				} else {
					$imagem = $this->input->post('editaccount[imagesrc]');
				}

				$data = array(
					'name' => $name,	
					'phone' => $phone,
					'password' => MD5($password),
					'picture' => $imagem
				);


				if($this->user_model->editaccount($iduser, $data)) {
					$user = $this->user_model->redirect($email, MD5($password));

					$dadosUser = array(
						'id' => $user["id"],
					    'name' => $user["name"],
					    'user' => $user["user"],
					    'email' => $user["email"],
					    'picture' => $user["picture"],
					    'phone' => $user["phone"],
					    'validated' => true
				    );

				    $this->session->set_userdata($dadosUser);
					$this->session->set_flashdata('messages', 'Suas informações foram atualizadas.');
				    $this->session->set_flashdata('typemessage', 'ok');
				} else {
					$this->session->set_flashdata('messages', 'Erro ao alterar suas informações.');
				    $this->session->set_flashdata('typemessage', 'error');
				}
				redirect('user/index', 'refresh');
			} else {
				$this->session->set_flashdata('messages', 'A senha atual está incorreta, é necessário informar a senha para realizar a alteração de suas informações pessoais.');
			    $this->session->set_flashdata('typemessage', 'error');

				redirect('user/index', 'refresh');
			}
		} else {
			$this->session->set_flashdata('messages', 'É necessário informar a senha para realizar a alteração de suas informações pessoais.');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('user/index', 'refresh');
		}
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

