<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postalcodes extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	function insert() {
		$this->load->model('postalcodes_model');

		$data = array(
			'cep' => $this->input->post('postalcodesinsert[cep]'),
			'location' => $this->input->post('postalcodesinsert[location]'),
			'district' => $this->input->post('postalcodesinsert[district]'),
			'city' => $this->input->post('postalcodesinsert[city]'),
			'state' => $this->input->post('postalcodesinsert[state]')
		);

		if($this->postalcodes_model->insert($data)) {
			$this->session->set_flashdata('messages', 'Endereço ' . $this->input->post('categoriesinsert[name]') . ' cadastrado com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/postalcodes', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao cadastrar o Endereço');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/postalcodes', 'refresh');
		}
	}

	function select($cep) {
		$this->load->model('categories_model');

		$cep = $this->postalcodes_model->get($cep);

		$data = array(
			'cep' => $cep->cep
		);

		print_r(json_encode($data));
	}

	function delete($id) {
		$this->load->model('postalcodes_model');

		if($this->postalcodes_model->delete($id)) { 
			$this->session->set_flashdata('messages', 'Endereço excluído com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/postalcodes', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao excluir o endereço');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/postalcodes', 'refresh');
		}
	}	

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}
