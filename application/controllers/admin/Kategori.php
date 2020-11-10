<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_m');
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		$kategori = $this->Kategori_m->get('kategori')->result();
		$data = [
			'title' => 'Kategori',
			'layout' => 'admin/kategori/index',
			'kategori' => $kategori
		];
		$this->form_validation->set_rules('nama', 'Nama Kategori', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/back/wrapper', $data);
		} else {
			$this->add();
		}
	}

	// Add a new item
	public function add()
	{
		$nama = html_escape($this->input->post('nama', true));

		$data = [
			'nama_kategori' => $nama
		];

		$this->Kategori_m->insert('kategori', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Kategori Berhasil Ditambahkan.</div>');
		redirect('admin/kategori');
	}

	//Update one item
	public function update($id)
	{
		$nama = html_escape($this->input->post('nama', true));

		$data = [
			'nama_kategori' => $nama
		];

		$where = ['id_kategori' => $id];
		$this->Kategori_m->update('kategori', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Kategori Berhasil Diubah.</div>');
		redirect('admin/kategori');
	}

	//Delete one item
	public function delete($id)
	{
		$this->db->delete('kategori', ['id_kategori' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Kategori Berhasil Dihapus.</div>');
		redirect('admin/kategori');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */

