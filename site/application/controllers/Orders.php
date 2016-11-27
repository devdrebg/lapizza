<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function select($id) {
		$this->load->model('orders_model');
		$this->load->model('itens_model');

		$order = $this->orders_model->get($id);
		$itensPrepare = $this->itens_model->getAllFromOrderId($order->id);
		$itens = array();

		foreach ($itensPrepare as $itemPrepare) {
			$itens[$itemPrepare['id']]['id'] = $itemPrepare['id'];
			$itens[$itemPrepare['id']]['name'] = $itemPrepare['name'];
			$itens[$itemPrepare['id']]['description'] = $itemPrepare['description'];
			$itens[$itemPrepare['id']]['image'] = $itemPrepare['image'];
			$itens[$itemPrepare['id']]['price'] = 'R$ ' . number_format($itemPrepare['price'], 2, ',', '.');
			$itens[$itemPrepare['id']]['quantity'] = (int)$itemPrepare['quantity'];
			$itens[$itemPrepare['id']]['subtotal'] = 'R$ ' . number_format($itemPrepare['subtotal'], 2, ',', '.');
		}

		$data = array(
			'id' => $order->id,
			'id_user' => $order->id_user,
			'subtotal_price' => 'R$ ' . $order->subtotal_price,
			'tax_vat' => 'R$ ' . $order->tax_vat,
			'total_price' => 'R$ ' . $order->total_price,
			'date' => date_format(date_create($order->date),"d/m/Y"),
			'name_user' => $order->name_user,
			'address_user' => $order->address_user,
			'number_user' => $order->number_user,
			'postal_code_user' => $order->postal_code_user,
			'phone_user' => $order->phone_user,
			'name_billing' => $order->name_billing,
			'status' => $order->status,
			'message' => $order->message,
			'itens' => $itens
		);

		print_r(json_encode($data));
	}

	function updateorderstatus() {
		$this->load->model('orders_model');

		$idOrder = $this->input->post('id');		
		$newStatusOrder = $this->input->post('status');		

		if($this->orders_model->updateorderstatus($idOrder, $newStatusOrder)) {
			$this->load->model('user_model');

			$order = $this->orders_model->get($idOrder);
			$user = $this->user_model->get($order->id_user);

			$assunto = 'Atualização de Status do Pedido Nº  - Pizzaria LaPizza';
			$mensagemHTML = '
			<p>Prezado Sr.(a) ' . $order->name_user . '</p>
			<p>O status do seu pedido Nº ' . $order->id . ' foi atualizado para: ' . $order->status . '</p>
			<br>
			<p>Atenciosamente, Pizzaria LaPizza</p>
			';

			$this->load->library('email');
			// $config = array();  
			// $config['protocol'] = 'smtp';  
			// $config['smtp_host'] = 'ssl://smtp.gmail.com';  
			// $config['smtp_user'] = 'lapizzacontato@gmail.com';  
			// $config['smtp_pass'] = 'lapizza303312';  
			// $config['smtp_port'] = 465;  
			// $this->email->initialize($config);
			$this->email->from('lapizzacontato@gmail.com', 'LaPizza');
			$this->email->to($user->email);
			$this->email->subject($assunto);
			$this->email->set_mailtype("html");
			$this->email->message($mensagemHTML);

			$this->email->send();

			$this->session->set_flashdata('messages', 'Pedido Nº' . $idOrder . ' atualizado.');
		    $this->session->set_flashdata('typemessage', 'ok');
			redirect('admin/orders', 'refresh');
		}

		redirect('admin/orders', 'refresh');	
	}
}
