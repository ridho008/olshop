<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_m');
		$this->load->model('Kategori_m');
		//Load Dependencies
	}
	
	public function index()
	{
		// $this->db->order_by('id_barang', 'desc');
		// $barang = $this->Barang_m->get_join('barang', 'kategori')->result();
		$navKategori = $this->Kategori_m->get('kategori')->result();
		$data = [
			'title' => 'Keranjang Belanja',
			'layout' => 'home/keranjang_belanja',
			'navKategori' => $navKategori
		];
		$this->load->view('layout/front/wrapper', $data);
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
