<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {
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
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Keranjang Belanja Berhasil Di Perbarui.</div>');
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

		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('ekpedisi', 'Ekpedisi', 'trim|required');
		$this->form_validation->set_rules('paket', 'Paket', 'trim|required');
		$this->form_validation->set_rules('penerima', 'Nama Penerima', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'No Hp', 'trim|required');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/front/wrapper', $data);
		} else {
			$data = [
				'id_pelanggan' => html_escape($this->input->post('id_pelanggan', true)),
				'no_order' => html_escape($this->input->post('no_order', true)),
				'tgl_order' => date('Y-m-d'),
				'nama_penerima' => html_escape($this->input->post('penerima', true)),
				'no_hp' => html_escape($this->input->post('no_hp', true)),
				'provinsi' => html_escape($this->input->post('provinsi', true)),
				'kota' => html_escape($this->input->post('kota', true)),
				'alamat' => html_escape($this->input->post('alamat', true)),
				'kode_pos' => html_escape($this->input->post('kode_pos', true)),
				'ekpedisi' => html_escape($this->input->post('ekpedisi', true)),
				'paket' => html_escape($this->input->post('paket', true)),
				'estimasi' => html_escape($this->input->post('estimasi', true)),
				'ongkir' => html_escape($this->input->post('ongkir', true)),
				'berat' => html_escape($this->input->post('berat', true)),
				'grand_total' => html_escape($this->input->post('grand_total', true)),
				'total_bayar' => html_escape($this->input->post('total_bayar', true)),
				'status_bayar' => 0,
				'status_order' => 0
			];

			$this->Transaksi_m->insert('transaksi', $data);

			// penyimpanan data ke tb rincian_transaksi
			$i = 1;
			foreach($this->cart->contents() as $items) {
				$data_rinci = [
					'no_order' => html_escape($this->input->post('no_order', true)),
					'id_barang' => html_escape($items['id']),
					'qty' => html_escape($this->input->post('qty' . $i++, true))
				];
				$this->Transaksi_m->insert('rincian_transaksi', $data_rinci);
			}

			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Pesanan Berhasil Di Proses.</div>');
			$this->cart->destroy();
			redirect('pesanan_saya');
		}
	}

	public function bayar($id_transaksi)
	{
		$navKategori = $this->Kategori_m->get('kategori')->result();
		$detailBayar = $this->Transaksi_m->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row();
		$rekening = $this->Transaksi_m->get('rekening')->result();
		$data = [
			'title' => 'Pembayaran',
			'layout' => 'home/bayar',
			'navKategori' => $navKategori,
			'detailBayar' => $detailBayar,
			'rekening' => $rekening
		];

		$this->form_validation->set_rules('nama', 'Atas Nama', 'trim|required');
		$this->form_validation->set_rules('bank', 'Nama Bank', 'trim|required');
		$this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/front/wrapper', $data);
		} else {
			$bukti = $_FILES['bukti']['name'];

			if($bukti != null) {
				$config['upload_path']          = './assets/front/img/bukti_pembayaran/';
	            $config['allowed_types']        = 'jpg|png|jpeg';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('bukti'))
	            {
	            	$this->session->set_flashdata('pesan', '<div class="alert alert-danger">'. $this->upload->display_errors() .'</div>');
	                redirect('belanja/bayar/' . $id_transaksi);
	            }
	            else
	            {
	                $this->upload->data('file_name');
	            }
	        } else {
	        	$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Bukti Pembayaran Wajib Diupload.</div>');
	            redirect('belanja/bayar/' . $id_transaksi);
	        }

	        $data = [
				'bukti_bayar' => $bukti,
				'atas_nama' => html_escape($this->input->post('nama', true)),
				'nama_bank' => html_escape($this->input->post('bank', true)),
				'no_rek' => html_escape($this->input->post('no_rek', true)),
				'status_bayar' => 1
			];

			$this->Transaksi_m->update_where('transaksi', $data, ['id_transaksi' => $id_transaksi]);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Bukti Pembayaran Berhasil Dikirim.</div>');
			redirect('pesanan');
		}
	}


}
