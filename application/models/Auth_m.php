<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {
	public function login_user($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(['username' => $username, 'password' => $password]);
		return $this->db->get()->row();
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}
}
