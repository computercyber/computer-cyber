<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tag_model extends CI_Model
{

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('tag');
        $this->db->group_by('nama_tag');
        $query = $this->db->get();
        return $query;
    }

    public function count_same_tag()
    {
        $query = "SELECT nama_tag, COUNT(*) nama_tag FROM tag GROUP BY nama_tag HAVING nama_tag > 1";
        return $query;
    }

    public function add($nama_tag, $id_berita)
    {
        $query = "INSERT INTO tag (nama_tag, id_berita) VALUES ('$nama_tag', '$id_berita')";
        $this->db->query($query);
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */