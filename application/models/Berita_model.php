<?php

use phpDocumentor\Reflection\Types\Array_;

defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_limit()
	{
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

	public function berita_home()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array('status_berita' => 'Publish'));
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

	// halaman berita

	public function berita_all()
	{
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->where(array('status_berita' => 'Publish', 'jenis_berita' => 'Berita'));
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_paging($limit, $start, $keyword = null, $type)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('isi', $keyword);
		}
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita', $limit, $start);
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->where(array(
			'status_berita' => 'Publish',
			'jenis_berita' => $type
		));
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function berita_detail($url, $type)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->where(array(
			'url' => $url,
			'status_berita' => 'Publish',
			'jenis_berita' => $type
		));
		$query = $this->db->get();
		return $query->row();
	}

	public function berita_lainnya($url, $type)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('tanggal', 'RANDOM');
		$this->db->where(array(
			'url !=' => $url,
			'status_berita' => 'Publish',
			'jenis_berita' => $type
		));
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function berita_terkait($url)
	{
		$this->db->select('*');
		$this->db->from('berita');
		// $this->db->order_by('tanggal', 'DESC');
		$this->db->where(array(
			// 'url' != $url,
			'status_berita' => 'Publish',
			'jenis_berita' => 'Berita'
		));
		// $this->db->limit(4);
		$query = $this->db->get();
		return $query;
	}

	// tag berita
	public function tag_berita($id_berita)
	{
		$this->db->select('*');
		$this->db->from('tag');
		$this->db->where('id_berita', $id_berita);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function portfolio_all()
	{
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->where(array('status_berita' => 'Publish', 'jenis_berita' => 'Berita'));
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

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

	// public function similar_news()
	// {
	// 	$threshold = 40;

	// 	$maxNews = 5;

	// 	$listNews = Array();

	// 	$this->db->select('berita.*, users.nama');
	// 	$this->db->from('berita');
	// 	$this->db->join('users', 'users.id_user = berita.id_user', 'left');
	// 	$this->db->order_by('id_berita', 'desc');
	// 	$query = $this->db->get();

	// 	similar_text($query, $threshold);
	// }

	// public function detail($id_berita)
	// {
	// 	$query = $this->db->get_where('berita', array('id_berita' => $id_berita));
	// 	return $query->row();
	// }

	public function portfolio_read($id_berita)
	{
		$query = $this->db->get_where('berita', array(
			'id_berita' => $id_berita,
			'status_berita' => 'Publish',
			'jenis_berita' => 'Portofolio'
		));
		return $query->row();
	}

	public function berita_read($id_berita)
	{
		$query = $this->db->get_where('berita', array(
			'id_berita' => $id_berita,
			'status_berita' => 'Publish'
		));
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('berita', $data);
	}

	public function update($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->update('berita', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->delete('berita', $data);
	}



	// admin panel
	public function admin_listing($type)
	{
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->where('jenis_berita', $type);
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function admin_berita_detail($id_berita, $type)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->where(array(
			'id_berita' => $id_berita,
			'jenis_berita' => $type
		));
		$query = $this->db->get();
		return $query->row();
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */