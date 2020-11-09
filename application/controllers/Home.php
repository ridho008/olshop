<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data = [
			'title' => 'Home',
			'layout' => 'home/index'
		];
		$this->load->view('layout/front/wrapper', $data);
	}
}
