<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pendaftaran_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getConfigRegister()
    {
        return $this->db->get_where('konfigurasi_pendaftaran', array('id_konfigurasi' => 1));
    }

    public function getConfigAnnouncement()
    {
        return $this->db->get_where('konfigurasi_pengumuman', array('id_konfigurasi' => 1));
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('calon_anggota');
        $this->db->join('jurusan_in_umrah', 'jurusan_in_umrah.id_jurusan = calon_anggota.jurusan');
        $this->db->join('divisi', 'divisi.id_divisi = calon_anggota.divisi');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataExport()
    {
        $this->db->select('*');
        $this->db->from('calon_anggota');
        $this->db->join('jurusan_in_umrah', 'jurusan_in_umrah.id_jurusan = calon_anggota.jurusan');
        $this->db->join('divisi', 'divisi.id_divisi = calon_anggota.divisi');
        $query = $this->db->get();
        return $query;
    }

    public function detail($id_peserta)
    {
        $this->db->select('*');
        $this->db->from('calon_anggota');
        $this->db->join('jurusan_in_umrah', 'jurusan_in_umrah.id_jurusan = calon_anggota.jurusan');
        $this->db->join('divisi', 'divisi.id_divisi = calon_anggota.divisi');
        $this->db->where('id_peserta', $id_peserta);
        $query = $this->db->get();
        return $query->row();
    }

    public function resetData()
    {
        $this->db->truncate('calon_anggota');
    }

    public function delete($data)
    {
        $this->db->where('id_peserta', $data['id_peserta']);
        $this->db->delete('calon_anggota', $data);
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */