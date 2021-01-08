<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m extends CI_Model {
	public function getLaporanHarian($tahun, $bulan, $tanggal)
	{
		$this->db->select('*');
		$this->db->from('rincian_transaksi');
		$this->db->join('transaksi', 'transaksi.no_order = rincian_transaksi.no_order', 'left');
		$this->db->join('barang', 'barang.id_barang = rincian_transaksi.id_barang', 'left');
		$this->db->where('YEAR(transaksi.tgl_order)', $tahun);
		$this->db->where('MONTH(transaksi.tgl_order)', $bulan);
		$this->db->where('DAY(transaksi.tgl_order)', $tanggal);
		return $this->db->get()->result();
	}

	public function getLaporanBulanan($tahun, $bulan)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('YEAR(tgl_order)', $tahun);
		$this->db->where('MONTH(tgl_order)', $bulan);
		$this->db->where('status_bayar', 1);
		return $this->db->get()->result();
	}

	public function getLaporanTahunan($tahun)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('YEAR(tgl_order)', $tahun);
		$this->db->where('status_bayar', 1);
		return $this->db->get()->result();
	}
}
