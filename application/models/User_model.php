<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//show data
	public function listing()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

	//show data detail
	public function detail($id_user)
	{
		$query = $this->db->get_where('users', array('id_user' => $id_user));
		return $query->row();
	}

	//show data detail
	public function detail21($username)
	{
		$query = $this->db->get_where('users', array('username' => $username));
		return $query->row();
	}

	//tambah data
	public function tambah($data)
	{
		$this->db->insert('users', $data);
	}

	//edit data
	public function update($data)
	{
		$this->db->where('username', $data['username']);
		$this->db->update('users', $data);
	}

	//hapus data
	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('users', $data);
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */