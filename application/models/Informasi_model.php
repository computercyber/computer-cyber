<?php

class Informasi_model extends CI_Model
{

    public function informasi_all()
    {
        $this->db->select('berita.*, users.nama');
        $this->db->from('berita');
        $this->db->join('users', 'users.id_user = berita.id_user', 'left');
        $this->db->where(array('status_berita' => 'Publish', 'jenis_berita' => 'Informasi'));
        $this->db->order_by('id_berita', 'desc');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result();
    }


    public function listing_paging($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('isi', $keyword);
        }
        $this->db->join('users', 'users.id_user = berita.id_user', 'left');
        $this->db->where(array('status_berita' => 'Publish', 'jenis_berita' => 'Informasi'));
        $this->db->order_by('id_berita', 'desc');
        $query = $this->db->get('berita', $limit, $start);
        return $query->result();
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */