<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model {
	public function get($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
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

	public function update_where($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	
}
