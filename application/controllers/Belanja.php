<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {
	public function index()
	{
		// $this->load->view('welcome_message');
	}

	public function add()
	{
		$redirect_page = $this->input->post('redirect_page');
		$data = array(
        'id'      => $this->input->post('id'),
        'qty'     => $this->input->post('qty'),
        'price'   => $this->input->post('price'),
        'name'    => $this->input->post('name')
    	);

		$this->cart->insert($data);
		redirect($redirect_page, 'refresh');
	}


}
