<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$portfolio_all = $this->berita_model->portfolio_all();
		$data = array(
			'title' => $site->namaweb,
			'title_sub' => 'PORTFOLIO',
			'isi' 	=> 'home/portfolio',
			'portfolio_all' => $portfolio_all
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function portfolio_read($id_berita)
	{
		$site = $this->konfigurasi_model->listing();
		$portfolio_read = $this->berita_model->portfolio_read($id_berita);
		$data = array(
			'title' => $site->namaweb,
			'title_sub' => 'PORTFOLIO',
			'isi'	=> 'home/beritaread',
			'portfolio_read' => $portfolio_read
		);
		$this->load->view('layout/wrapper', $data);
	}

	// yang masih pake id_berita untuk get detail
	// public function portfolio_read($id_berita)
	// {
	// 	$site = $this->konfigurasi_model->listing();
	// 	$portfolio_read = $this->berita_model->portfolio_read($id_berita);
	// 	$data = array(
	// 		'title' => $site->namaweb,
	// 		'title_sub' => 'PORTFOLIO',
	// 		'isi'	=> 'home/beritaread',
	// 		'portfolio_read' => $portfolio_read
	// 	);
	// 	$this->load->view('layout/wrapper', $data);
	// }
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
