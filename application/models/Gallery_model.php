<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('gallery.*, users.nama');
		$this->db->from('gallery');
		$this->db->join('users', 'users.id_user = gallery.id_user', 'left');
		$this->db->order_by('id_gallery', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_about()
	{
		$this->db->select('gallery.*, users.nama');
		$this->db->from('gallery');
		$this->db->join('users', 'users.id_user = gallery.id_user', 'left');
		$this->db->where('status_gallery', 'Publish');
		$this->db->order_by('id_gallery', 'desc');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_home()
	{
		$this->db->select('gallery.*, users.nama');
		$this->db->from('gallery');
		$this->db->join('users', 'users.id_user = gallery.id_user', 'left');
		$this->db->where('status_gallery', 'Publish');
		$this->db->order_by('id_gallery', 'desc');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_all()
	{
		$this->db->select('gallery.*, users.nama');
		$this->db->from('gallery');
		$this->db->join('users', 'users.id_user = gallery.id_user', 'left');
		$this->db->where('status_gallery', 'Publish');
		$this->db->order_by('id_gallery', 'desc');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_gallery)
	{
		$query = $this->db->get_where('gallery', array('id_gallery' => $id_gallery));
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('gallery', $data);
	}

	public function update($data)
	{
		$this->db->where('id_gallery', $data['id_gallery']);
		$this->db->update('gallery', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_gallery', $data['id_gallery']);
		$this->db->delete('gallery', $data);
	}


	// admin

	public function admin_listing()
	{
		$this->db->select('gallery.*, users.nama, divisi.*');
		$this->db->from('gallery');
		$this->db->join('divisi', 'divisi.id_divisi = gallery.gallery_divisi', 'left');
		$this->db->join('users', 'users.id_user = gallery.id_user', 'left');
		$this->db->order_by('id_gallery', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
