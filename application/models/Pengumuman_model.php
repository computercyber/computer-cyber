<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $query = $this->db->get('anggota_diterima');
        return $query->result();
    }

    public function admin_listing()
    {
        $this->db->select('*');
        $this->db->from('anggota_diterima');
        //relasi database
        $this->db->join('anggota', 'anggota_diterima.id_anggota_diterima = anggota.id_anggota');
        $this->db->join('divisi', 'divisi.id_divisi = anggota.id_divisi', 'left');
        //end relasi database
        $this->db->order_by('id_anggota_diterima', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function update($data)
    {
        $this->db->where('id_berita', $data['id_berita']);
        $this->db->update('berita_anggota_diterima', $data);
    }

    public function updatePengumuman($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function getNews()
    {
        $query = $this->db->get('berita_anggota_diterima');
        return $query->result();
    }

    function importExcel($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('anggota_diterima', $data);
        }
    }

    public function addAnggota($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function deleteAnggota($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function resetData()
    {
        $this->db->truncate('anggota_diterima');
    }

    // public function updateAnggota($data)
    // {
    //     $this->db->where('id_anggota', $data['id_anggota']);
    //     $this->db->update('anggota_diterima', $data);
    // }

    public function editItem($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function updateAnggota($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
