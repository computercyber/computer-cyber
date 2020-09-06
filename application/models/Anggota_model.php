<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing($status = null, $tahun = null, $jurusan = null, $divisi = null)
	{
		$this->db->select('anggota.*, divisi.nama_divisi, jabatan.*');
		$this->db->from('anggota');
		//relasi database
		$this->db->join('divisi', 'divisi.id_divisi = anggota.id_divisi', 'left');
		$this->db->join('jabatan', 'jabatan.id_jabatan = anggota.id_jabatan', 'left');
		$this->db->join('jurusan_in_umrah', 'jurusan_in_umrah.id_jurusan = anggota.jurusan', 'left');
		//end relasi database
		$this->db->order_by('id_anggota', 'desc');

		if ($status != null) {
			$this->db->where('anggota.status_anggota', $status);
		} else if ($tahun != null) {
			$this->db->where('anggota.tahun_masuk_anggota', $tahun);
		} else if ($jurusan != null) {
			$this->db->where('jurusan_in_umrah.judul_jurusan', $jurusan);
		} else if ($divisi != null) {
			$this->db->where('divisi.nama_divisi', $divisi);
		}

		$query = $this->db->get();
		return $query->result();
	}


	public function detail($id_anggota)
	{
		$this->db->select('*');
		$this->db->from('anggota');
		//relasi database
		$this->db->join('divisi', 'divisi.id_divisi = anggota.id_divisi', 'left');
		$this->db->join('jabatan', 'jabatan.id_jabatan = anggota.id_jabatan', 'left');
		//end relasi database
		$this->db->where('id_anggota', $id_anggota);
		$this->db->order_by('id_anggota', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('anggota', $data);
	}

	public function update($data)
	{
		$this->db->where('id_anggota', $data['id_anggota']);
		$this->db->update('anggota', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_anggota', $data['id_anggota']);
		$this->db->delete('anggota', $data);
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */