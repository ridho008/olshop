<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_m');
		$this->load->model('Kategori_m');
		$this->load->model('Transaksi_m');
		//Load Dependencies
	}

	public function index()
	{
		$this->db->order_by('id_barang', 'desc');
		$barang = $this->Barang_m->get_join('barang', 'kategori')->result();
		$navKategori = $this->Kategori_m->get('kategori')->result();
		$data = [
			'title' => 'Home',
			'layout' => 'home/index',
			'barang' => $barang,
			'navKategori' => $navKategori
		];
		$this->load->view('layout/front/wrapper', $data);
	}

	public function kategori($kat)
	{
		$navKategori = $this->Kategori_m->get('kategori')->result();
		$kategori = $this->Barang_m->get_join_where('barang', 'kategori', ['nama_kategori' => $kat])->result();
		$rowKat = $this->Barang_m->get_join_where('barang', 'kategori', ['nama_kategori' => $kat])->row();
		$data = [
			'title' => 'Kategori ' . ucwords($kat),
			'layout' => 'home/kategori',
			'kategori' => $kategori,
			'rowKat' => $rowKat,
			'navKategori' => $navKategori,
			'kat' => $kat
		];
		$this->load->view('layout/front/wrapper', $data);
	}

	public function detail($id_barang)
	{
		$navKategori = $this->Kategori_m->get('kategori')->result();
		$barang = $this->Barang_m->get_join_where('barang', 'kategori', ['id_barang' => $id_barang])->row();
		$gambarBarang = $this->Barang_m->get_where('gambar', ['id_barang' => $id_barang])->result();

		$data = [
			'title' =>  $barang->nama_barang,
			'layout' => 'home/detail_barang',
			'barang' => $barang,
			'navKategori' => $navKategori,
			'gambarBarang' => $gambarBarang
		];
		$this->load->view('layout/front/wrapper', $data);
	}

	public function pesanan_saya()
	{
		$navKategori = $this->Kategori_m->get('kategori')->result();
		$wherebb = [
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'status_order' => 0
		];
		$belum_bayar = $this->Transaksi_m->get_where('transaksi', $wherebb)->result();

		$whereProses = [
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'status_order' => 1
		];
		$diproses = $this->Transaksi_m->get_where('transaksi', $whereProses)->result();

		$whereDikirim = [
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'status_order' => 2
		];
		$dikirim = $this->Transaksi_m->get_where('transaksi', $whereDikirim)->result();

		$whereSelesai = [
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'status_order' => 3
		];
		$selesai = $this->Transaksi_m->get_where('transaksi', $whereSelesai)->result();
		$data = [
			'title' => 'Pesanan Saya',
			'layout' => 'home/pesanan_saya',
			'navKategori' => $navKategori,
			'belum_bayar' => $belum_bayar,
			'diproses' => $diproses,
			'dikirim' => $dikirim,
			'selesai' => $selesai
		];
		$this->load->view('layout/front/wrapper', $data);
	}

}
