<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('jabatan');
		$this->db->order_by('tahun_jabatan', 'desc');
		return $this->db->get()->result();
	}

	public function jabatan_group()
	{
		$this->db->select('*');
		$this->db->from('jabatan');
		$this->db->group_by('tahun_jabatan');
		$this->db->order_by('tahun_jabatan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function jabatan_tahun($tahun_jabatan)
	{
		$this->db->select('anggota.*, jabatan.*');
		$this->db->from('anggota');
		$this->db->join('jabatan', 'jabatan.id_jabatan = anggota.id_jabatan', 'left');
		$this->db->where('tahun_jabatan', $tahun_jabatan);
		$this->db->order_by('id_anggota', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_jabatan)
	{
		$query = $this->db->get_where('jabatan', array('id_jabatan' => $id_jabatan));
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('jabatan', $data);
	}

	public function update($data)
	{
		$this->db->where('id_jabatan', $data['id_jabatan']);
		$this->db->update('jabatan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_jabatan', $data['id_jabatan']);
		$this->db->delete('jabatan', $data);
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */