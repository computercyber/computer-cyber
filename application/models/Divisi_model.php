<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$query = $this->db->get('divisi');
		return $query->result();
	}

	public function divisi_all()
	{
		$query = $this->db->get('divisi');
		return $query->result();
	}

	// public function detail($id_divisi)
	// {
	// 	$query = $this->db->get_where('divisi', array('id_divisi' => $id_divisi));
	// 	return $query->row();
	// }

	public function detail($url)
	{
		$query = $this->db->get_where('divisi', array('url' => $url));
		return $query->row_array();
	}

	public function admin_detail($id_divisi)
	{
		$query = $this->db->get_where('divisi', array('id_divisi' => $id_divisi));
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('divisi', $data);
	}

	public function update($data)
	{
		$this->db->where('id_divisi', $data['id_divisi']);
		$this->db->update('divisi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_divisi', $data['id_divisi']);
		$this->db->delete('divisi', $data);
	}

	public function get_ketua_divisi($id_divisi, $type)
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->join('jabatan', 'anggota.id_jabatan = jabatan.id_jabatan', 'left');
		$this->db->where(array('id_divisi' => $id_divisi));
		$this->db->like('nama_jabatan ', $type);
		$this->db->order_by('jabatan.tahun_jabatan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function get_anggota_aktif($id_divisi)
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where(array('id_divisi' => $id_divisi));
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_anggota($id_divisi, $type)
	{
		$this->db->select('*');
		$this->db->from('anggota');
		if ($type != 'all') {
			$this->db->where(array(
				'id_divisi' => $id_divisi,
				'status_anggota' => $type
			));
		} else {
			$this->db->where(array(
				'id_divisi' => $id_divisi
			));
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function karya_divisi_listing($id_divisi)
	{
		$this->db->select('*');
		$this->db->from('karya');
		$this->db->where(array('karya_divisi' => $id_divisi));
		$query = $this->db->get();
		return $query->result();
	}

	public function gallery_divisi($id_divisi)
	{
		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->where(array(
			'gallery_divisi' => $id_divisi
		));
		$query = $this->db->get();
		return $query->result();
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */