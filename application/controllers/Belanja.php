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
		if (empty($this->cart->contents())) {
			redirect('home');
		}
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

	public function update()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid' => $items['rowid'],
				'qty'   => $this->input->post($i.'[qty]')
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('belanja');
	}

	public function delete($row_id)
	{	
		$this->cart->remove($row_id);
		redirect('belanja');
	}

	public function delall()
	{
		$this->cart->destroy();
		redirect('belanja');
	}

	public function checkout()
	{
		$this->pelanggan_login->proteksi_halaman();
		$navKategori = $this->Kategori_m->get('kategori')->result();
		$data = [
			'title' => 'Checkout Belanja',
			'layout' => 'home/checkout',
			'navKategori' => $navKategori
		];
		$this->load->view('layout/front/wrapper', $data);
	}


}
