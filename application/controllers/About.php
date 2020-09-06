<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('gallery_model');
	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$gallery = $this->gallery_model->listing_about();
		$data = array(
			'title' => $site->namaweb,
			'site' => $site,
			'title_sub' => 'About Us',
			'gallery_about' => $gallery,
			'isi' => 'home/about'
		);
		$this->load->view('layout/wrapper', $data);
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */