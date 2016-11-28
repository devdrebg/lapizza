<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function insert() {
		$this->userLogged();
		$this->load->model('products_model');

		$dir = 'img/products/' . date('d_m_y_H_i_s') . '/';
			mkdir($dir, 0777);
		$config['upload_path']		= $dir;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
        	$this->session->set_flashdata('messages', 'Erro no upload da imagem do produto ' . $this->input->post('productsinsert[name]'));
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/products', 'refresh');
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

				redirect('admin/products', 'refresh');
			}
        }
	}

	function select($id) {
		$this->load->model('products_model');

		$product = $this->products_model->get($id);

		if($product) {
			$categorie = $this->products_model->getCategory($product->id_categorie);

			$data = array(
				'id' => $product->id,
				'id_categorie' => $product->id_categorie,
				'categorie' => $categorie->name,
				'name' => $product->name,
				'description' => $product->description,
				'price' => number_format($product->price, 2, ',', '.'),
				'image' => $product->image,
				'quantity' => $product->quantity
			);

			print_r(json_encode($data));
		}
	}

	function update() {
		$this->userLogged();
		$this->load->model('products_model');

		if($_FILES['productsupdateimage']['size'] > 0 && $_FILES['productsupdateimage']['tmp_name'] != '') {
			$dir = 'img/products/' . date('d_m_y_H_i_s') . '/';
			mkdir($dir, 0777);
			$config['upload_path']		= $dir;
        	$config['allowed_types']    = 'gif|jpg|jpeg|png';

	        $this->load->library('upload', $config);

	        if (!$this->upload->do_upload('productsupdateimage')) {
	        	$this->session->set_flashdata('messages', 'Erro no upload da imagem do produto ' . $this->input->post('productsinsert[name]'));
			    $this->session->set_flashdata('typemessage', 'error');

				redirect('admin/products', 'refresh');
	        } else {
	        	$imagem = $config['upload_path'] . $_FILES['productsupdateimage']['name'];
	        }
		} else {
			$imagem = $this->input->post('productsupdate[imagesrc]');
		}

		$price = str_replace(',', '.', str_replace('.', '', $this->input->post('productsupdate[price]')));

		$data = array(
			'id' => $this->input->post('productsupdate[id]'),
			'id_categorie' => $this->input->post('productsupdate[idcategorie]'),
			'name' => $this->input->post('productsupdate[name]'),
			'description' => $this->input->post('productsupdate[description]'),
			'price' => $price,
			'image' => $imagem,
			'quantity' => $this->input->post('productsupdate[quantity]'),
			'status' => 1
		);


		if($this->products_model->update($data)) {
			$this->session->set_flashdata('messages', 'Produto alterado com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/products', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao alterar o produto ' . $this->input->post('categoriesupdate[name]'));
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/products', 'refresh');
		}

	}

	function delete($id) {
		$this->userLogged();
		$this->load->model('products_model');

		if($this->products_model->delete($id)) {
			$this->session->set_flashdata('messages', 'Categoria excluída com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/products', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao excluir a categoria');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/products', 'refresh');
		}
	}

	function view($id) {
		$this->load->model('categories_model');
		$this->load->model('products_model');


		$categorie = $this->categories_model->get($id);
		$data['categories'] = $this->categories_model->getAll();

		$product = $this->products_model->get($id);
		$data['productsrelated'] = $this->products_model->getAllRelated($product->id, $product->id_categorie);
		$data['product'] = array(
			'id' => $product->id,
			'id_categorie' => $product->id_categorie,
			'name' => $product->name,
			'description' => $product->description,
			'price' => $product->price,
			'image' => $product->image,
			'quantitystock' => $product->quantity
		);

		$data['title'] = $product->name;

		$this->load->view('public/header', $data);
		$this->load->view('public/product', $data);
		$this->load->view('public/footer');
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}
