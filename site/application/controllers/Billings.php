<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billings extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	function insert() {
		$this->load->model('billings_model');

	   	$this->form_validation->set_rules('billingsinsert[name]', 'Nome', 'trim|required');

	   	if ($this->form_validation->run() == FALSE) {
			redirect('admin/billings', 'refresh');
		} else {
			$data = array(
				'name' => $this->input->post('billingsinsert[name]')
			);

			if($this->billings_model->insert($data)) {
				$this->session->set_flashdata('messages', 'Forma de pagamento ' . $this->input->post('billingsinsert[name]') . ' cadastrada com sucesso.');
			    $this->session->set_flashdata('typemessage', 'ok');

				redirect('admin/billings', 'refresh');
			} else {
				$this->session->set_flashdata('messages', 'Erro ao cadastrar a forma de pagamento ' . $this->input->post('billingsinsert[name]'));
			    $this->session->set_flashdata('typemessage', 'error');

				redirect('admin/billings', 'refresh');
			}
		}
	}

	function select($id) {
		$this->load->model('billings_model');

		$billing = $this->billings_model->get($id);

		$data = array(
			'id' => $billing->id,
			'name' => $billing->name
		);

		print_r(json_encode($data));
	}

	function update() {
		$this->load->model('billings_model');

		$data = array(
			'id' => $this->input->post('billingsupdate[id]'),
			'name' => $this->input->post('billingsupdate[name]')
		);

		if($this->billings_model->update($data)) {
			$this->session->set_flashdata('messages', 'Forma de pagamento alterada com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/billings', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao alterar a forma de pagamento ' . $this->input->post('billingsupdate[name]'));
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/billings', 'refresh');
		}
	}

	function delete($id) {
		$this->load->model('billings_model');

		if($this->billings_model->delete($id)) { 
			$this->session->set_flashdata('messages', 'Forma de pagamento excluída com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/billings', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao excluir a forma de pagamento');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/billings', 'refresh');
		}
	}
	
	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}
