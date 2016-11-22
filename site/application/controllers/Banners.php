<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	function insert() {
		$this->load->model('banners_model');

		$dir = 'img/banners/' . date('d_m_y_H_i_s') . '/';
			mkdir($dir, 0777);
		$config['upload_path']		= $dir;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
        	$this->session->set_flashdata('messages', 'Erro no upload da imagem do banner ' . $this->input->post('bannersinsert[name]'));
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/banners', 'refresh');
        } else {

			$data = array(
				'title' => $this->input->post('bannersinsert[title]'),
				'url' => '' . $config['upload_path'] . $_FILES['image']['name'],
				'link' => $this->input->post('bannersinsert[link]'),
				'blank' => $this->input->post('bannersinsert[blank]'),
				'status' => 1
			);

			if($this->banners_model->insert($data)) {
				$this->session->set_flashdata('messages', 'Banner ' . $this->input->post('bannersinsert[title]') . ' cadastrado com sucesso.');
			    $this->session->set_flashdata('typemessage', 'ok');

				redirect('admin/banners', 'refresh');
			} else {
				$this->session->set_flashdata('messages', 'Erro ao cadastrar o banner ' . $this->input->post('bannersinsert[title]'));
			    $this->session->set_flashdata('typemessage', 'error');

				redirect('admin/banners', 'refresh');
			}
        }
	}

	function select($id) {
		$this->load->model('banners_model');

		$banner = $this->banners_model->get($id);

		if($banner) {

			$data = array(
				'id' => $banner->id,
				'title' => $banner->title,
				'url' => $banner->url,
				'link' => $banner->link,
				'blank' => $banner->blank,
				'status' => $banner->status
			);

			print_r(json_encode($data));
		}
	}

	function update() {
		$this->load->model('banners_model');

		if($_FILES['bannersupdateimage']['size'] > 0 && $_FILES['bannersupdateimage']['tmp_name'] != '') {
			$dir = 'img/banners/' . date('d_m_y_H_i_s') . '/';
			mkdir($dir, 0777);
			$config['upload_path']		= $dir;
        	$config['allowed_types']    = 'gif|jpg|jpeg|png';

	        $this->load->library('upload', $config);

	        if (!$this->upload->do_upload('bannersupdateimage')) {
	        	$this->session->set_flashdata('messages', 'Erro no upload da imagem do banner ' . $this->input->post('bannersupdate[title]'));
			    $this->session->set_flashdata('typemessage', 'error');

				redirect('admin/banners', 'refresh');
	        } else {
	        	$imagem = $config['upload_path'] . $_FILES['bannersupdateimage']['name'];
	        }
		} else {
			$imagem = $this->input->post('bannersupdate[imagesrc]');
		}

		$data = array(
			'id' => $this->input->post('bannersupdate[id]'),
			'title' => $this->input->post('bannersupdate[title]'),
			'url' => $imagem,
			'link' => $this->input->post('bannersupdate[link]'),
			'blank' => $this->input->post('bannersupdate[blank]'),
			'status' => $this->input->post('bannersupdate[status]')
		);

		if($this->banners_model->update($data)) {
			$this->session->set_flashdata('messages', 'Banner alterado com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/banners', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao alterar o banner ' . $this->input->post('bannersupdate[title]'));
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/banners', 'refresh');
		}

	}

	function delete($id) {
		$this->load->model('banners_model');

		if($this->banners_model->delete($id)) {
			$this->session->set_flashdata('messages', 'Banner excluído com sucesso.');
		    $this->session->set_flashdata('typemessage', 'ok');

			redirect('admin/banners', 'refresh');
		} else {
			$this->session->set_flashdata('messages', 'Erro ao excluir o banner');
		    $this->session->set_flashdata('typemessage', 'error');

			redirect('admin/banners', 'refresh');
		}
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}
