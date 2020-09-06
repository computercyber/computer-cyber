<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model');
	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$gallery_all = $this->gallery_model->listing_all();
		$data = array(
			'title' => $site->namaweb,
			'title_sub' => 'GALLERY',
			'isi' 	=> 'home/gallery',
			'gallery_all' => $gallery_all
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function get_data_gallery()
	{
		$id_gallery = $this->input->post('id');
		echo json_encode($this->db->get_where('gallery', array('id_gallery' => $id_gallery))->row());
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */