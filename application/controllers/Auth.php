<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$this->user_login->cek_login();
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$data = [
			'title' => 'Login'
		];
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login', $data);
		} else {
			$username = html_escape($this->input->post('username', true));
			$password = html_escape(sha1($this->input->post('password', true)));
			$this->user_login->login($username, $password);
		}
	}

	public function logout()
	{
		$this->user_login->logout_akun();
	}
}
