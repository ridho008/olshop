<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * proses login
 */
class Pelanggan_login
{
	protected $ci;

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('Auth_m');
	}

	public function login($email, $password)
	{
		$cek = $this->ci->Auth_m->login_pelanggan($email, $password);
		if($cek) {
			$data = [
				'email' => $cek->email,
				'nama_pelanggan' => $cek->nama_pelanggan
			];
			$this->ci->session->set_userdata($data);
			redirect('home');
		} else {
			$this->ci->session->set_flashdata('pesan', '<div class="alert alert-danger">Username / Password Salah!</div>');
			redirect('login');
		}
	}

	public function proteksi_halaman()
	{
		if($this->ci->session->userdata('email') == '') {
			$this->ci->session->set_flashdata('pesan', '<div class="alert alert-danger">Belum Login!</div>');
			redirect('login');
		}
	}

	public function cek_login()
	{
		if($this->ci->session->userdata('email') != null) {
			redirect('home');
		}
	}

	public function logout_akun()
	{
		$this->ci->session->unset_userdata('email');
		$this->ci->session->unset_userdata('nama_pelanggan');
		$this->ci->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Logout.</div>');
			redirect('login');
	}
}
