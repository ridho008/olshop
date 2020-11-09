<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		$users = $this->User_m->get('users')->result();
		$data = [
			'title' => 'Users',
			'layout' => 'admin/users/index',
			'users' => $users
		];
		$this->form_validation->set_rules('nama', 'Nama User', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
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
		$username = html_escape($this->input->post('username', true));
		$password = html_escape(sha1($this->input->post('password', true)));
		$level = html_escape($this->input->post('level', true));

		$data = [
			'username' => $username,
			'password' => $password,
			'nama_user' => $nama,
			'level' => $level
		];

		$this->User_m->insert('users', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data User Berhasil Ditambahkan.</div>');
		redirect('admin/user');
	}

	//Update one item
	public function update($id)
	{
		$nama = html_escape($this->input->post('nama', true));
		$username = html_escape($this->input->post('username', true));
		$password = html_escape(sha1($this->input->post('password', true)));
		$level = html_escape($this->input->post('level', true));

		$data = [
			'username' => $username,
			'password' => $password,
			'nama_user' => $nama,
			'level' => $level
		];

		$where = ['id_user' => $id];
		$this->User_m->update('users', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data User Berhasil Diubah.</div>');
		redirect('admin/user');
	}

	//Delete one item
	public function delete($id)
	{
		$this->db->delete('users', ['id_user' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data User Berhasil Dihapus.</div>');
		redirect('admin/user');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */

