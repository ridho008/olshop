<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_m');
		//Load Dependencies
	}

	// List all your items
	public function index()
	{
		$barang = $this->Barang_m->get_join('barang', 'kategori')->result();
		$kategori = $this->Barang_m->get('kategori')->result();
		$data = [
			'title' => 'Barang',
			'layout' => 'admin/barang/index',
			'barang' => $barang,
			'kategori' => $kategori
		];
		$this->form_validation->set_rules('nama', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Nama Kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga Barang', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('berat', 'Berat', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/back/wrapper', $data);
		} else {
			$this->add();
		}
	}

	// Add a new item
	public function add()
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
                $this->upload->data('file_name');
            }
        } else {
        	$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gambar Wajib Diupload.</div>');
            redirect('admin/barang');
        }

		$nama = html_escape(ucwords($this->input->post('nama', true)));
		$kategori = html_escape($this->input->post('kategori', true));
		$harga = html_escape($this->input->post('harga', true));
		$deskripsi = html_escape($this->input->post('deskripsi', true));
		$berat = html_escape($this->input->post('berat', true));

		$data = [
			'nama_barang' => $nama,
			'id_kategori' => $kategori,
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'gambar' => $gambar,
			'berat' => $berat
		];

		$this->Barang_m->insert('barang', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Barang Berhasil Ditambahkan.</div>');
		redirect('admin/barang');
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
		$berat = html_escape($this->input->post('berat', true));

		$data = [
			'nama_barang' => $nama,
			'id_kategori' => $kategori,
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'berat' => $berat
		];

		$this->Barang_m->update('barang', $data, ['id_barang' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Barang Berhasil Diubah.</div>');
		redirect('admin/barang');
	}

	//Delete one item
	public function delete($id)
	{
		$result = $this->Barang_m->get_where('barang', ['id_barang' => $id])->row;
		$gambar = $result->gambar;
		if($gambar != null) {
			unlink('assets/back/img/barang/' . $gambar);
		}
		$this->db->delete('barang', ['id_barang' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Barang Berhasil Dihapus.</div>');
		redirect('admin/barang');
	}


	public function pesanan_masuk()
	{
		$pesanan = $this->Barang_m->get_where('transaksi', ['status_order' => 0])->result();
		$pesananProses = $this->Barang_m->get_where('transaksi', ['status_order' => 1])->result();
		$pesananDikirim = $this->Barang_m->get_where('transaksi', ['status_order' => 2])->result();
		$pesananSelesai = $this->Barang_m->get_where('transaksi', ['status_order' => 3])->result();
		
		$data = [
			'title' => 'Pesanan Masuk',
			'layout' => 'admin/pesanan/pesanan_masuk',
			'pesanan' => $pesanan,
			'pesananProses' => $pesananProses,
			'pesananDikirim' => $pesananDikirim,
			'pesananSelesai' => $pesananSelesai
		];

		$this->load->view('layout/back/wrapper', $data);
	}

	public function proses($id_transaksi)
	{
		$data = [
			'status_order' => 1
		];

		$this->Barang_m->update_where('transaksi', $data, ['id_transaksi' => $id_transaksi]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Pesanan Berhasil Diproses.</div>');
		redirect('admin/pesanan');
	}

	public function kirim_barang($id_transaksi)
	{
		$dataKirim = [
			'status_order' => 2,
			'no_resi' => html_escape($this->input->post('resi', true))
		];
		$pesananProses = $this->Barang_m->update_where('transaksi', $dataKirim, ['id_transaksi' => $id_transaksi]);
	
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Barang Berhasil Dikirim.</div>');
		redirect('admin/pesanan');
	}

	public function diterima($id_transaksi)
	{
		$where = [
			'status_order' => 3
		];
		$pesananProses = $this->Barang_m->update_where('transaksi', $where, ['id_transaksi' => $id_transaksi]);
	
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Barang Berhasil Diterima Oleh Konsumen.</div>');
		redirect('pesanan');
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/admin/Barang.php */

