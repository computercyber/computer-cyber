<?php

use phpDocumentor\Reflection\Types\Array_;

defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('artikel.*, users.nama');
        $this->db->from('artikel');
        $this->db->join('users', 'users.id_user = artikel.id_user', 'left');
        $this->db->order_by('id_artikel', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function listing_limit()
    {
        $this->db->select('artikel.*, users.nama');
        $this->db->from('artikel');
        $this->db->join('users', 'users.id_user = artikel.id_user', 'left');
        $this->db->order_by('id_artikel', 'desc');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    public function artikel_home()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where(array('status_artikel' => 'Publish'));
        $this->db->order_by('id_artikel', 'desc');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    // halaman artikel

    public function artikel_all()
    {
        $this->db->select('artikel.*, users.nama');
        $this->db->from('artikel');
        $this->db->join('users', 'users.id_user = artikel.id_user', 'left');
        $this->db->where(array('status_artikel' => 'Publish', 'jenis_artikel' => 'artikel'));
        $this->db->order_by('id_artikel', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function listing_paging($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('isi', $keyword);
        }
        $this->db->select('artikel.*, users.nama');
        $this->db->from('artikel');
        $this->db->limit($limit);
        $this->db->offset($start);
        $this->db->join('users', 'users.id_user = artikel.id_user', 'left');
        $this->db->where(array('status_artikel' => 'Publish'));
        $this->db->where('jenis_artikel !=', 'informasi');
        $this->db->order_by('id_artikel', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function tag_search()
    {
        $this->db->select('*');
        $this->db->join('artikel', 'tag.artikel = artikel.id_artikel', 'right');
        $this->db->from('tag');
        $this->db->where(array('status_artikel' => 'Publish'));
        $this->db->where('jenis_artikel !=', 'informasi');
        $this->db->order_by('id_artikel', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function artikel_detail($url)
    {
        $this->db->join('users', 'users.id_user = artikel.id_user');
        $query = $this->db->get_where('artikel', array(
            'url' => $url,
            'status_artikel' => 'Publish',
        ));
        return $query->row();
    }

    public function artikel_lainnya($url)
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->order_by('tanggal', 'RANDOM');
        $this->db->where(array(
            'url !=' => $url,
            'status_artikel' => 'Publish',
            'jenis_artikel !=' => 'Informasi'
        ));
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function artikel_terkait($url)
    {
        $this->db->select('*');
        $this->db->from('artikel');
        // $this->db->order_by('tanggal', 'DESC');
        $this->db->where(array(
            // 'url' != $url,
            'status_artikel' => 'Publish',
            'jenis_artikel' => 'artikel'
        ));
        // $this->db->limit(4);
        $query = $this->db->get();
        return $query;
    }

    // tag artikel
    public function tag_artikel($id_artikel)
    {
        $this->db->select('*');
        $this->db->from('tag');
        $this->db->where('id_artikel', $id_artikel);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function portfolio_all()
    {
        $this->db->select('artikel.*, users.nama');
        $this->db->from('artikel');
        $this->db->join('users', 'users.id_user = artikel.id_user', 'left');
        $this->db->where(array('status_artikel' => 'Publish', 'jenis_artikel' => 'artikel'));
        $this->db->order_by('id_artikel', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function informasi_all()
    {
        $this->db->select('artikel.*, users.nama');
        $this->db->from('artikel');
        $this->db->join('users', 'users.id_user = artikel.id_user', 'left');
        $this->db->where(array('status_artikel' => 'Publish', 'jenis_artikel' => 'Informasi'));
        $this->db->order_by('id_artikel', 'desc');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result();
    }

    // public function similar_news()
    // {
    // 	$threshold = 40;

    // 	$maxNews = 5;

    // 	$listNews = Array();

    // 	$this->db->select('artikel.*, users.nama');
    // 	$this->db->from('artikel');
    // 	$this->db->join('users', 'users.id_user = artikel.id_user', 'left');
    // 	$this->db->order_by('id_artikel', 'desc');
    // 	$query = $this->db->get();

    // 	similar_text($query, $threshold);
    // }

    // public function detail($id_artikel)
    // {
    // 	$query = $this->db->get_where('artikel', array('id_artikel' => $id_artikel));
    // 	return $query->row();
    // }

    public function portfolio_read($id_artikel)
    {
        $query = $this->db->get_where('artikel', array(
            'id_artikel' => $id_artikel,
            'status_artikel' => 'Publish',
            'jenis_artikel' => 'Portofolio'
        ));
        return $query->row();
    }

    public function artikel_read($id_artikel)
    {
        $query = $this->db->get_where('artikel', array(
            'id_artikel' => $id_artikel,
            'status_artikel' => 'Publish'
        ));
        return $query->row();
    }

    public function add($data)
    {
        $this->db->insert('artikel', $data);
    }

    public function update($data)
    {
        $this->db->where('id_artikel', $data['id_artikel']);
        $this->db->update('artikel', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_artikel', $data['id_artikel']);
        $this->db->delete('artikel', $data);
    }
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */