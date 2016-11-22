<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	function insert() {
		$this->load->model('address_model');

		$data = array(
			'id_user' => $this->input->post('addressinsert[id_user]'),
			'address' => $this->input->post('addressinsert[address]'),
			'number' => $this->input->post('addressinsert[number]'),
			'adjunct' => $this->input->post('addressinsert[adjunct]'),
			'district' => $this->input->post('addressinsert[district]'),
			'city' => $this->input->post('addressinsert[city]'),
			'state' => $this->input->post('addressinsert[state]'),
			'postalcode' => $this->input->post('addressinsert[postalcode]'),
			'name' => $this->input->post('addressinsert[name]')
		);

		if($this->address_model->insert($data)) {
			$this->session->set_flashdata('messages', 'Endereço ' . $this->input->post('addressinsert[name]') . ' cadastrado com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('user/address', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao cadastrar o Endereço');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('user/address', 'refresh');
		}
	}

	function select($id) {
		$this->load->model('address_model');

		$address = $this->address_model->get($id);

		$data = array(
			'id_user' => $address->id_user,
			'address' => $address->address,
			'number' => $address->number,
			'adjunct' => $address->adjunct,
			'district' => $address->district,
			'city' => $address->city,
			'state' => $address->state,
			'postalcode' => $address->postalcode,
			'name' => $address->name,
		);

		print_r(json_encode($data));
	}

	public function update() {
		$this->load->model('address_model');

		$data = array(
			'id' => $this->input->post('addressupdate[id]'),
			'address' => $this->input->post('addressupdate[address]'),
			'number' => $this->input->post('addressupdate[number]'),
			'adjunct' => $this->input->post('addressupdate[adjunct]'),
			'district' => $this->input->post('addressupdate[district]'),
			'city' => $this->input->post('addressupdate[city]'),
			'state' => $this->input->post('addressupdate[state]'),
			'postalcode' => $this->input->post('addressupdate[postalcode]'),
			'name' => $this->input->post('addressupdate[name]')
		);

		if($this->address_model->update($data)) {
			$this->session->set_flashdata('messages', 'Endereço alterado com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('user/address', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao alterar o endereço ' . $this->input->post('addressupdate[name]'));
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('user/address', 'refresh');
		}
	}

	function delete($id) {
		$this->load->model('address_model');

		if($this->address_model->delete($id)) {
			$this->session->set_flashdata('messages', 'Endereço excluído com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('user/address', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao excluir o endereço');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('user/address', 'refresh');
		}
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}
