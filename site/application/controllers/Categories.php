<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	function insert() {
		$this->load->model('categories_model');

	   	$this->form_validation->set_rules('categoriesinsert[name]', 'Nome', 'trim|required');

	   	if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header');
			$this->load->view('admin/categories');
			$this->load->view('admin/footer');
		} else {
			$data = array(
				'name' => $this->input->post('categoriesinsert[name]')
			);

			if($this->categories_model->insert($data)) {
				$this->session->set_flashdata('messages', 'Categoria ' . $this->input->post('categoriesinsert[name]') . ' cadastrada com sucesso.');
			    $this->session->set_flashdata('typemessage', 'ok');

				redirect('admin/categories', 'refresh');
			} else {
				$this->session->set_flashdata('messages', 'Erro ao cadastrar a categoria ' . $this->input->post('categoriesinsert[name]'));
			    $this->session->set_flashdata('typemessage', 'error');

				redirect('admin/categories', 'refresh');
			}
		}
	}

	function select($id) {
		$this->load->model('categories_model');

		$categorie = $this->categories_model->get($id);

		$data = array(
			'id' => $categorie->id,
			'name' => $categorie->name
		);

		// return json_encode($categorie);
		print_r(json_encode($data));
	}

	function update() {
		$this->load->model('categories_model');

		$data = array(
			'id' => $this->input->post('categoriesupdate[id]'),
			'name' => $this->input->post('categoriesupdate[name]')
		);

		if($this->categories_model->update($data)) {
			$this->session->set_flashdata('messages', 'Categoria alterada com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/categories', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao alterar a categoria ' . $this->input->post('categoriesupdate[name]'));
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/categories', 'refresh');
		}
	}

	function delete($id) {
		$this->load->model('categories_model');

		if($this->categories_model->delete($id)) { 
			$this->session->set_flashdata('messages', 'Categoria excluída com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/categories', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao excluir a categoria');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/categories', 'refresh');
		}
	}
	
	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}
