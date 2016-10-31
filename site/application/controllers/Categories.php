<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function insert() {
		$this->load->model('categories_model');

	   	$this->form_validation->set_rules('categoriesinsert[name]', 'Nome', 'trim|required');

	   	if ($this->form_validation->run() == FALSE) {
			$this->template->load('layouts/admin', 'admin/categories');
		} else {
			$data = array(
				'name' => $this->input->post('categoriesinsert[name]')
			);

			if($this->categories_model->insert($data)) {
				$this->session->set_flashdata('messages', 'Categoria ' . $this->input->post('categoriesinsert[name]') . ' cadastrada com sucesso.');
			    $this->session->set_flashdata('typemessage', 'ok');
				$this->template->load('layouts/admin', 'admin/categories');
			} else {
				$this->session->set_flashdata('messages', 'Erro ao cadastrar a categoria ' . $this->input->post('categoriesinsert[name]'));
			    $this->session->set_flashdata('typemessage', 'error');
				$this->template->load('layouts/admin', 'admin/categories');
			}
		}
	}

}
