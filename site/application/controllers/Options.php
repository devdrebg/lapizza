<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Options extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	function select($id) {
		$this->load->model('options_model');

		$options = $this->options_model->get($id);

		$data = array(
			'id' => $options->id,
			'tax_vat' => number_format($options->tax_vat, 2, ',', '.'),
			'store_status' => $options->store_status
		);

		print_r(json_encode($data));
	}

	function update() {
		$this->load->model('options_model');

		$tax_vat = str_replace(',', '.', str_replace('.', '', $this->input->post('optionsupdate[tax_vat]')));

		$data = array(
			'id' => $this->input->post('optionsupdate[id]'),
			'tax_vat' => $tax_vat,
			'store_status' => $this->input->post('optionsupdate[store_status]')
		);

		if($this->options_model->update($data)) {
			$this->session->set_flashdata('messages', 'Opções de loja alterada com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/options', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao alterar as opções de loja');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/options', 'refresh');
		}
	}
	
	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}
