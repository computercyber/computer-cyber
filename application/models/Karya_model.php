<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karya_model extends CI_Model
{

    // halaman home
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('karya');
        $this->db->join('anggota', 'anggota.id_anggota = karya.user_karya', 'left');
        $this->db->where(array('status_karya' => 'Publish',));
        $query = $this->db->get();
        return $query->result_array();
    }

    // halaman home
    public function admin_detail($id_karya)
    {
        $this->db->select('*');
        $this->db->from('karya');
        $this->db->join('anggota', 'anggota.id_anggota = karya.user_karya', 'left');
        $this->db->where(array('id_karya' => $id_karya));
        $query = $this->db->get();
        return $query;
    }

    public function admin_anggota_karya($id_karya)
    {
        $this->db->select('*');
        $this->db->from('anggota_karya');
        $this->db->join('anggota', 'anggota.id_anggota = anggota_karya.id_anggota');
        $this->db->where(array('anggota_karya.id_karya' => $id_karya));
        $query = $this->db->get();
        return $query;
    }

    // halaman home dengan filter
    public function listing_filter($id_divisi)
    {
        $this->db->select('*');
        $this->db->from('karya');
        $this->db->join('anggota', 'anggota.id_anggota = karya.user_karya', 'left');
        $this->db->where(array(
            'status_karya' => 'Publish',
            'karya_divisi' => $id_divisi
        ));
        $query = $this->db->get();
        return $query->result_array();
    }

    // detail karya
    public function detail($url)
    {
        $this->db->select('*');
        $this->db->from('karya');
        $this->db->where(array('status_karya' => 'publish', 'url' => $url));
        $this->db->join('anggota', 'anggota.id_anggota = karya.user_karya', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function admin_listing()
    {
        $this->db->select('*');
        $this->db->from('karya');
        $this->db->join('anggota', 'anggota.id_anggota = karya.user_karya', 'left');
        $this->db->join('divisi', 'divisi.id_divisi = karya.karya_divisi', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_anggota_karya($id_karya)
    {
        $this->db->select('*');
        $this->db->from('anggota_karya');
        $this->db->join('anggota', 'anggota.id_anggota = anggota_karya.id_anggota');
        $this->db->where(array(
            'id_karya' => $id_karya,
        ));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data_divisi($id_karya)
    {
        $this->db->select('*');
        $this->db->from('karya');
        $this->db->join('divisi', 'karya.karya_divisi = divisi.id_divisi');
        $this->db->where(array(
            'id_karya' => $id_karya,
        ));
        $query = $this->db->get();
        return $query->row_array();
    }

    // admin
    public function get_user_karya($user_karya)
    {
        $this->db->like('nama_anggota', $user_karya, 'BOTH');
        $this->db->order_by('id_anggota', 'asc');
        return $this->db->get('anggota');
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */