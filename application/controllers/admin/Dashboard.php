<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_m');
		$this->load->model('Kategori_m');
		//Load Dependencies

	}

	public function index()
	{
		$barang = $this->Barang_m->get('barang')->num_rows();
		$kategori = $this->Kategori_m->get('kategori')->num_rows();
		$user = $this->Barang_m->get('users')->num_rows();
		$data = [
			'title' => 'Dashboard',
			'layout' => 'admin/dashboard',
			'barang' => $barang,
			'kategori' => $kategori,
			'user' => $user
		];
		$this->load->view('layout/back/wrapper', $data);
	}
}
