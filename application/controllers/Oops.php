<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oops extends CI_Controller
{

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$data = array(
			'title' => $site->namaweb,
			'title_sub' => '404',
			'isi' => 'home/oops'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */