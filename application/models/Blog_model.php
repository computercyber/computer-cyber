<?php

use phpDocumentor\Reflection\Types\Array_;

defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('blog.*, users.nama');
        $this->db->from('blog');
        $this->db->join('users', 'users.id_user = blog.id_user', 'left');
        $this->db->order_by('id_blog', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function listing_limit()
    {
        $this->db->select('blog.*, users.nama');
        $this->db->from('blog');
        $this->db->join('users', 'users.id_user = blog.id_user', 'left');
        $this->db->order_by('id_blog', 'desc');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    public function blog_home()
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where(array('status_blog' => 'Publish'));
        $this->db->order_by('id_blog', 'desc');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    // halaman blog

    public function blog_all()
    {
        $this->db->select('blog.*, users.nama');
        $this->db->from('blog');
        $this->db->join('users', 'users.id_user = blog.id_user', 'left');
        $this->db->where(array('status_blog' => 'Publish', 'jenis_blog' => 'blog'));
        $this->db->order_by('id_blog', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function listing_paging($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('isi', $keyword);
        }
        $this->db->select('blog.*, users.nama');
        $this->db->from('blog', $limit, $start);
        $this->db->join('users', 'users.id_user = blog.id_user', 'left');
        $this->db->where(array('status_blog' => 'Publish', 'jenis_blog' => 'blog'));
        $this->db->order_by('id_blog', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function blog_detail($url)
    {
        // $this->db->select('*');
        // $this->db->from('blog');
        // $this->db->join('users', 'users.id_user = blog.id_user', 'left');
        // $this->db->where(array('url' => $url, 'status_blog' => 'Publish', 'jenis_blog' => 'Portfolio'));
        // $query = $this->db->get();
        $this->db->join('users', 'users.id_user = blog.id_user');
        $query = $this->db->get_where('blog', array(
            'url' => $url,
            'status_blog' => 'Publish',
            'jenis_blog' => 'blog'
        ));
        return $query->row();
    }

    public function blog_terbaru($url)
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->where(array(
            'url' != $url,
            'status_blog' => 'Publish',
            'jenis_blog' => 'blog'
        ));
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function blog_terkait($url)
    {
        $this->db->select('*');
        $this->db->from('blog');
        // $this->db->order_by('tanggal', 'DESC');
        $this->db->where(array(
            // 'url' != $url,
            'status_blog' => 'Publish',
            'jenis_blog' => 'blog'
        ));
        // $this->db->limit(4);
        $query = $this->db->get();
        return $query;
    }

    // tag blog
    public function tag_blog($id_blog)
    {
        $this->db->select('*');
        $this->db->from('tag');
        $this->db->where('id_blog', $id_blog);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function portfolio_all()
    {
        $this->db->select('blog.*, users.nama');
        $this->db->from('blog');
        $this->db->join('users', 'users.id_user = blog.id_user', 'left');
        $this->db->where(array('status_blog' => 'Publish', 'jenis_blog' => 'blog'));
        $this->db->order_by('id_blog', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function informasi_all()
    {
        $this->db->select('blog.*, users.nama');
        $this->db->from('blog');
        $this->db->join('users', 'users.id_user = blog.id_user', 'left');
        $this->db->where(array('status_blog' => 'Publish', 'jenis_blog' => 'Informasi'));
        $this->db->order_by('id_blog', 'desc');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result();
    }

    // public function similar_news()
    // {
    // 	$threshold = 40;

    // 	$maxNews = 5;

    // 	$listNews = Array();

    // 	$this->db->select('blog.*, users.nama');
    // 	$this->db->from('blog');
    // 	$this->db->join('users', 'users.id_user = blog.id_user', 'left');
    // 	$this->db->order_by('id_blog', 'desc');
    // 	$query = $this->db->get();

    // 	similar_text($query, $threshold);
    // }

    // public function detail($id_blog)
    // {
    // 	$query = $this->db->get_where('blog', array('id_blog' => $id_blog));
    // 	return $query->row();
    // }

    public function portfolio_read($id_blog)
    {
        $query = $this->db->get_where('blog', array(
            'id_blog' => $id_blog,
            'status_blog' => 'Publish',
            'jenis_blog' => 'Portofolio'
        ));
        return $query->row();
    }

    public function blog_read($id_blog)
    {
        $query = $this->db->get_where('blog', array(
            'id_blog' => $id_blog,
            'status_blog' => 'Publish'
        ));
        return $query->row();
    }

    public function add($data)
    {
        $this->db->insert('blog', $data);
    }

    public function update($data)
    {
        $this->db->where('id_blog', $data['id_blog']);
        $this->db->update('blog', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_blog', $data['id_blog']);
        $this->db->delete('blog', $data);
    }
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */