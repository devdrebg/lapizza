<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function insert() {
		$this->load->model('products_model');

		$config['upload_path']          = 'img/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {			
			$price = str_replace(',', '.', str_replace('.', '', $this->input->post('productsinsert[price]')));

			$data = array(
				'id_categorie' => $this->input->post('productsinsert[idcategorie]'),
				'name' => $this->input->post('productsinsert[name]'),
				'description' => $this->input->post('productsinsert[description]'),
				'price' => $price,
				'image' => '' . $config['upload_path'] . $_FILES['image']['name'],
				'quantity' => $this->input->post('productsinsert[quantity]'),
				'status' => 1
			);

			if($this->products_model->insert($data)) {
				$this->session->set_flashdata('messages', 'Produto ' . $this->input->post('productsinsert[name]') . ' cadastrado com sucesso.');
			    $this->session->set_flashdata('typemessage', 'ok');

				redirect('admin/products', 'refresh');
			} else {
				$this->session->set_flashdata('messages', 'Erro ao cadastrar o produto ' . $this->input->post('productsinsert[name]'));
			    $this->session->set_flashdata('typemessage', 'error');

				$this->load->view('admin/header');
				$this->load->view('admin/products');
				$this->load->view('admin/footer');
			}
        }

	 //   	$this->form_validation->set_rules('productsinsert[name]', 'Nome', 'trim|required');

	 //   	if ($this->form_validation->run() == FALSE) {
		// 	$this->load->view('admin/header');
		// 	$this->load->view('admin/products');
		// 	$this->load->view('admin/footer');
		// } else {
		// 	$data = array(
		// 		'name' => $this->input->post('productsinsert[name]')
		// 	);

			// if($this->products_model->insert($data)) {
			// 	$this->session->set_flashdata('messages', 'Categoria ' . $this->input->post('productsinsert[name]') . ' cadastrada com sucesso.');
			//     $this->session->set_flashdata('typemessage', 'ok');

			// 	redirect('admin/products', 'refresh');
			// } else {
			// 	$this->session->set_flashdata('messages', 'Erro ao cadastrar a categoria ' . $this->input->post('productsinsert[name]'));
			//     $this->session->set_flashdata('typemessage', 'error');

			// 	$this->load->view('admin/header');
			// 	$this->load->view('admin/products');
			// 	$this->load->view('admin/footer');
			// }
		// }
	}

	function select($id) {
		$this->load->model('products_model');

		$product = $this->products_model->get($id);

		$data = array(
			'id' => $product->id,
			'id_categorie' => $product->id_categorie,
			'name' => $product->name,
			'description' => $product->description,
			'price' => number_format($product->price, 2, ',', '.'),
			'image' => $product->image,
			'quantity' => $product->quantity
		);

		print_r(json_encode($data));
	}

	function update() {
		$this->load->model('products_model');

		$data = array(
			'id' => $this->input->post('productsupdate[id]'),
			'name' => $this->input->post('productsupdate[name]')
		);

		if($this->products_model->update($data)) {
			$this->session->set_flashdata('messages', 'Categoria alterada com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/products', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao alterar a categoria ' . $this->input->post('productsupdate[name]'));
		    $this->session->set_flashdata('typemessage', 'error');

			$this->load->view('admin/header');
			$this->load->view('admin/products');
			$this->load->view('admin/footer');
		}
	}

	function delete($id) {
		$this->load->model('products_model');

		if($this->products_model->delete($id)) { 
			$this->session->set_flashdata('messages', 'Categoria excluída com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/products', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao excluir a categoria');
		    $this->session->set_flashdata('typemessage', 'error');

			$this->load->view('admin/header');
			$this->load->view('admin/products');
			$this->load->view('admin/footer');
		}
	}

}
