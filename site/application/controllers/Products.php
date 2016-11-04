<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function createSlug($string) {
    $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
    );
    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);
    return strtolower(strtr($string, $table));
}

	function insert() {
		$this->load->model('products_model');

		mkdir('img/products/' . self::createSlug($this->input->post('productsinsert[name]')) . '/', 0777);
		$config['upload_path']          = 'img/products/' . self::createSlug($this->input->post('productsinsert[name]')) . '/';
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

				$this->load->view('admin/header');
				$this->load->view('admin/products');
				$this->load->view('admin/footer');
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
		$this->load->model('products_model');

		if($_FILES['productsupdateimage']['size'] > 0 && $_FILES['productsupdateimage']['tmp_name'] != '') {
			unlink($this->input->post('productsupdate[imagesrc]'));
				$pasta = explode("/", $this->input->post('productsupdate[imagesrc]'));
				$config['upload_path']          = 'img/products/' . $pasta[2] . '/';
				$config['allowed_types']        = 'gif|jpg|png';

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
