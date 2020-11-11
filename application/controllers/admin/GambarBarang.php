<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GambarBarang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_m');
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		$gambarBarang = $this->Barang_m->getAllGambarBarang()->result();
		$data = [
			'title' => 'Gambar Barang',
			'layout' => 'admin/gambar_barang/index',
			'gambarBarang' => $gambarBarang
		];
		
		$this->load->view('layout/back/wrapper', $data);
	}

	// Add a new item
	public function add($id_barang)
	{
		$gambarBarang = $this->Barang_m->getByIdBarang(['barang.id_barang' => $id_barang])->row();
		$previewBarang = $this->Barang_m->get_where('gambar', ['id_barang' => $id_barang])->result();
		$data = [
			'title' => 'Tambah Gambar Barang',
			'layout' => 'admin/gambar_barang/tambah_gambar_barang',
			'gambarBarang' => $gambarBarang,
			'previewBarang' => $previewBarang,
			'id_barang' => $id_barang
		];
		
		$this->form_validation->set_rules('ket', 'Keterangan Gambar', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/back/wrapper', $data);
		} else {
			$cover = $_FILES['cover']['name'];

			if($cover != null) {
				$config['upload_path']          = './assets/back/img/gambar_barang/';
	            $config['allowed_types']        = 'jpg|png|jpeg';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('cover'))
	            {
	            	$this->session->set_flashdata('pesan', '<div class="alert alert-danger">'. $this->upload->display_errors() .'</div>');
	                redirect('admin/gambarBarang/add/' . $id_barang);
	            }
	            else
	            {
	                $this->upload->data('file_name');
	            }
	        } else {
	        	$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gambar Wajib Diupload.</div>');
	            redirect('admin/gambarBarang/add/' . $id_barang);
	        }

			$data = [
				'id_barang' => $id_barang,
				'ket' => html_escape($this->input->post('ket', true)),
				'cover' => $cover
			];


			$this->Barang_m->insert_where('gambar', $data, ['id_barang' => $id_barang]);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Gambar Barang Berhasil Ditambahkan.</div>');
			redirect('admin/gambarBarang/add/' . $id_barang);
		}
	}

	//Update one item
	public function update($id)
	{
		$gambar = $_FILES['gambar']['name'];

		if($gambar != null) {
			$config['upload_path']          = './assets/back/img/barang/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar'))
            {
            	$this->session->set_flashdata('pesan', '<div class="alert alert-danger">'. $this->upload->display_errors() .'</div>');
                redirect('admin/barang');
            }
            else
            {
                $gambarLama = $this->input->post('gambarLama');
            	$result = $this->db->get_where('barang', ['id_barang' => $id])->row();
            	$gambar = $result->gambar;
            	if($gambarLama == $gambar) {
            		unlink(FCPATH . 'assets/back/img/barang/' . $gambar);
            	}
                $gambarBaru = $this->upload->data('file_name');
                $this->db->set('gambar', $gambarBaru);
            }
        }

		$nama = html_escape(ucwords($this->input->post('nama', true)));
		$kategori = html_escape($this->input->post('kategori', true));
		$harga = html_escape($this->input->post('harga', true));
		$deskripsi = html_escape($this->input->post('deskripsi', true));

		$data = [
			'nama_barang' => $nama,
			'id_kategori' => $kategori,
			'harga' => $harga,
			'deskripsi' => $deskripsi
		];

		$this->Barang_m->update('barang', $data, ['id_barang' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Barang Berhasil Diubah.</div>');
		redirect('admin/barang');
	}

	//Delete one item
	public function delete($id)
	{
		$result = $this->Barang_m->get_where('gambar', ['id_gambar' => $id])->row();
		$gambar = $result->cover;
		unlink('assets/back/img/gambar_barang/' . $gambar);
		$this->db->delete('gambar', ['id_gambar' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Barang Berhasil Dihapus.</div>');
		redirect('admin/gambarBarang');
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/admin/Barang.php */

