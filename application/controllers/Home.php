<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model');
		$this->load->model('berita_model');
	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$gallery_home = $this->gallery_model->listing_home();
		$berita = $this->berita_model->berita_home();
		$data = array(
			'site'	=> $site,
			'title' => $site->namaweb,
			'isi' 	=> 'home/list',
			'gallery_home' => $gallery_home,
			// 'berita' => $berita
		);
		$this->load->view('layout/wrapper', $data);
	}



	// public function berita_read($id_berita)
	// {
	// 	$site=$this->konfigurasi_model->listing();
	// 	$berita=$this->berita_model->berita_read($id_berita);
	// 	$data = array(
	// 		'title' => $site->namaweb,
	// 		'title_sub' => $berita->jenis_berita,
	// 		'isi'	=> 'home/beritaread',
	// 		'portfolio_read' => $berita 
	// 	);
	// 	$this->load->view('layout/wrapper', $data);
	// }
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
