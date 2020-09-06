<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	public function detail($id_konfigurasi)
	{
		$query = $this->db->get_where('konfigurasi', array('id_konfigurasi' => $id_konfigurasi));
		return $query->row();
	}

	public function update($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}

	public function kategori1()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */