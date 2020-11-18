<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_m extends CI_Model {
	public function get($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function get_join($table1, $table2)
	{
		$this->db->join("$table2", "$table2.id_kategori = $table1.id_kategori");
		return $this->db->get($table1);
	}

	public function get_join_where($table1, $table2, $where)
	{
		$this->db->join("$table2", "$table2.id_kategori = $table1.id_kategori");
		$this->db->where($where);
		return $this->db->get($table1);
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function insert_where($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->insert($table, $data);
	}

	public function update($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function getAllGambarBarang()
	{
		$this->db->select('barang.*, count(gambar.id_barang) as totalGambar');
		$this->db->from('barang');
		$this->db->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
		$this->db->group_by('barang.id_barang');
		$this->db->order_by('barang.id_barang');
		return $this->db->get();
	}

	public function getByIdBarang($id_barang)
	{
		// $this->db->select("SELECT * FROM barang INNER JOIN gambar ON barang.id_barang = gambar.id_barang WHERE barang.id_barang = '$id_barang'");
		// $this->db->from('barang');
		$this->db->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
		// $this->db->where('barang.id_barang', $id_barang);
		return $this->db->get_where('barang', $id_barang);
	}

	public function update_where($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
