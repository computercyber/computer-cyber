<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Informasi_model');
	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();

		// load library
		$this->load->library('pagination');

		$config['base_url'] = base_url() . 'informasi/index';

		// get data keyword
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			if ($this->uri->segment(2) == "informasi") {
				$this->session->set_userdata('keyword', $data['keyword']);
			} else {
				$this->session->unset_userdata('keyword');
			}
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		// config pagination
		$this->db->like('judul', $data['keyword']);
		$this->db->from('berita');
		$config['total_rows'] = $this->db->count_all_results();
		// $data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 10;

		$config['attributes'] = array(
			'class' => 'page-link'
		);

		// initialize
		$this->pagination->initialize($config);

		// $informasi = $this->Informasi_model->informasi_all();

		$data['start'] = $this->uri->segment(3);
		$informasi = $this->Informasi_model->listing_paging($config['per_page'], $data['start'], $data['keyword']);

		$data = array(
			'title' => $site->namaweb,
			'title_sub' => 'INFORMASI',
			'isi'	=> 'home/informasi',
			'informasi' => $informasi
		);
		$this->load->view('layout/wrapper', $data);
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
