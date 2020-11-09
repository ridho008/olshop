<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * proses login
 */
class User_login
{
	protected $ci;

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('Auth_m');
	}

	public function login($username, $password)
	{
		$cek = $this->ci->Auth_m->login_user($username, $password);
		if($cek) {
			$data = [
				'username' => $cek->username,
				'nama_user' => $cek->nama_user,
				'level' => $cek->level
			];
			$this->ci->session->set_userdata($data);
			redirect('admin/dashboard');
		} else {
			$this->ci->session->set_flashdata('pesan', '<div class="alert alert-danger">Username / Password Salah!</div>');
			redirect('auth');
		}
	}

	public function proteksi_halaman()
	{
		if($this->ci->session->userdata('username') == '') {
			$this->ci->session->set_flashdata('pesan', '<div class="alert alert-danger">Belum Login!</div>');
			redirect('auth');
		}
	}

	public function cek_login()
	{
		if($this->ci->session->userdata('username') != null) {
			redirect('admin/dashboard');
		}
	}

	public function logout_akun()
	{
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('nama_user');
		$this->ci->session->unset_userdata('level');
		$this->ci->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Logout.</div>');
			redirect('auth');
	}
}
