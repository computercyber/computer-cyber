<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('divisi_model');
	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$divisi = $this->divisi_model->divisi_all();
		$data = array(
			'title' => $site->namaweb,
			'title_sub' => 'DIVISI',
			'isi'	=> 'home/divisi',
			'divisi' => $divisi
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function detail($url)
	{
		$site = $this->konfigurasi_model->listing();

		$divisi = $this->divisi_model->detail($url);

		$ketua_divisi = $this->divisi_model->get_ketua_divisi($divisi['id_divisi'], "Ketua Divisi");

		$anggota_aktif = $this->divisi_model->get_anggota_aktif($divisi['id_divisi']);

		$karya_divisi = $this->divisi_model->karya_divisi_listing($divisi['id_divisi']);

		$gallery_divisi = $this->divisi_model->gallery_divisi($divisi['id_divisi']);

		// $tahun_kepengurusan_aktif = $this->db->get_where('konfigurasi_kepengurusan', array(
		// 	'id_konfigurasi_kengurusan' => 1,
		// ));

		if (!$this->input->get('anggota')) {
			$data = array(
				'title' => $site->namaweb,
				'title_sub' => $this->uri->segment(2),
				'isi'	=> 'home/detail_divisi',
				'divisi' => $divisi,
				'ketua_divisi' => $ketua_divisi,
				'anggota_aktif' => $anggota_aktif,
				'karya_divisi' => $karya_divisi,
				'gallery_divisi' => $gallery_divisi,
				'url' => $url,
			);

			$this->load->view('layout/wrapper', $data);
		} else {

			$type_anggota = $this->input->get('anggota');

			if ($type_anggota == 'all') {
				$anggota_all = $this->divisi_model->get_anggota($divisi['id_divisi'], 'all');

				$data = array(
					'title' => $site->namaweb,
					'title_sub' => 'Daftar Anggota',
					'isi'	=> 'home/anggota_divisi',
					'divisi' => $divisi,
					'ketua_divisi' => $ketua_divisi,
					'anggota_all' => $anggota_all,
					'karya_divisi' => $karya_divisi,
					'gallery_divisi' => $gallery_divisi,
					'url' => $url
				);

				$this->load->view('layout/wrapper', $data);
			} elseif ($type_anggota == 'aktif') {
				$anggota_divisi_aktif = $this->divisi_model->get_anggota($divisi['id_divisi'], 'aktif');

				$data = array(
					'title' => $site->namaweb,
					'title_sub' => 'Daftar Anggota',
					'isi'	=> 'home/anggota_divisi',
					'divisi' => $divisi,
					'ketua_divisi' => $ketua_divisi,
					'anggota_all' => $anggota_divisi_aktif,
					'karya_divisi' => $karya_divisi,
					'gallery_divisi' => $gallery_divisi,
					'url' => $url
				);

				$this->load->view('layout/wrapper', $data);
			} elseif ($type_anggota == 'purna') {
				$anggota_purna = $this->divisi_model->get_anggota($divisi['id_divisi'], 'purna');

				$data = array(
					'title' => $site->namaweb,
					'title_sub' => 'Daftar Anggota',
					'isi'	=> 'home/anggota_divisi',
					'divisi' => $divisi,
					'ketua_divisi' => $ketua_divisi,
					'anggota_all' => $anggota_purna,
					'karya_divisi' => $karya_divisi,
					'gallery_divisi' => $gallery_divisi,
					'url' => $url
				);

				$this->load->view('layout/wrapper', $data);
			}
		}
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
