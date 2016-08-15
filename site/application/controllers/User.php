<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	public function index() {
		$this->template->load('layouts/public', 'user/dashboard');
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}

