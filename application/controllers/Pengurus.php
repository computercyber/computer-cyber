<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model');
		$this->load->model('jabatan_model');
	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$jabatan = $this->jabatan_model->jabatan_group();
		$data = array(
			'title' => $site->namaweb,
			'title_sub' => 'PENGURUS',
			'isi'	=> 'home/pengurus',
			'jabatan' => $jabatan
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function pengurus_anggota($tahun_jabatan)
	{
		$site = $this->konfigurasi_model->kategori1();
		$jabatan = $this->jabatan_model->jabatan_tahun($tahun_jabatan);
		$data = array(
			'title' => $site->namaweb,
			'title_sub' => 'PENGURUS',
			'isi'	=> 'home/anggota',
			'jabatan' => $jabatan
		);
		$this->load->view('layout/wrapper', $data);
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */