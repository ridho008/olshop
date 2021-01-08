<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_m');
		$this->load->model('Kategori_m');
		$this->load->model('Laporan_m');
		//Load Dependencies

	}

	public function index()
	{
		$data = [
			'title' => 'Laporan',
			'layout' => 'admin/laporan/index'
		];
		$this->load->view('layout/back/wrapper', $data);
	}

	// Laporan Harian
	public function harian()
	{
		$tanggal = $this->input->post('tgl');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data = [
			'title' => 'Laporan Harian',
			'layout' => 'admin/laporan/harian/index',
			'tgl' => $tanggal,
			'bln' => $bulan,
			'thn' => $tahun,
			'laporan' => $this->Laporan_m->getLaporanHarian($tahun, $bulan, $tanggal)
		];
		$this->load->view('layout/back/wrapper', $data);
	}
}
