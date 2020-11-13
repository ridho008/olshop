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

	public function pengaturan()
	{
		$data = [
			'title' => 'Pengaturan',
			'layout' => 'admin/pengaturan',
			'pengaturan' => $this->Barang_m->get_where('pengaturan', ['id_pengaturan' => '1'])->row()
		];

		$this->form_validation->set_rules('nama_toko', 'Nama Toko', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/back/wrapper', $data);
		} else {
			$data = [
				'nama_toko' => html_escape($this->input->post('nama_toko', true)),
				'lokasi' => html_escape($this->input->post('kota', true)),
				'alamat_toko' => html_escape($this->input->post('alamat', true)),
				'telp' => html_escape($this->input->post('telp', true))
			];

			$this->Barang_m->update('pengaturan', $data, ['id_pengaturan' => '1']);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Pengaturan Berhasil Diperbarui.</div>');
			redirect('admin/pengaturan');
		}
	}
}
