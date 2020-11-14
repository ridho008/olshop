<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_m');
		//Load Dependencies
	}

	public function daftar()
	{
		$data = [
			'title' => 'Daftar Akun Pelanggan OlShop'
		];

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[pelanggan.email]');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password2]|min_length[3]');
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/daftar', $data);
		} else {
			$data = [
				'nama_pelanggan' => html_escape(ucwords($this->input->post('nama', true))),
				'email' => html_escape($this->input->post('email', true)),
				'password' => html_escape(sha1($this->input->post('password1', true)))
			];

			$this->Auth_m->insert('pelanggan', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Akun Berhasil Dibuat, Silahkan Login.</div>');
			redirect('daftar');
		}
	}

	public function login()
	{
		$this->pelanggan_login->cek_login();
		$data = [
			'title' => 'Halaman Login'
		];

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login_pelanggan', $data);
		} else {
			$email = html_escape($this->input->post('email', true));
			$password = html_escape(sha1($this->input->post('password', true)));
			$this->pelanggan_login->login($email, $password);
		}
	}

	public function logout()
	{
		$this->pelanggan_login->logout_akun();
	}

	public function profil()
	{
		$this->pelanggan_login->proteksi_halaman();
		$this->load->model('Kategori_m');
		$navKategori = $this->Kategori_m->get('kategori')->result();
		$data = [
			'title' => 'Akun Saya',
			'layout' => 'pelanggan/profil',
			'navKategori' => $navKategori
		];

		$this->load->view('layout/front/wrapper', $data);
	}

	
}
