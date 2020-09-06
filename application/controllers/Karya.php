<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Karya_model');
    }

    public function index()
    {
        $site = $this->konfigurasi_model->listing();
        $list_karya = $this->Karya_model->listing();

        $divisi_filter = $this->input->get('divisi');
        $divisi_for_badges = $this->db->get('divisi')->result();

        if ($divisi_filter == 'all' || $divisi_filter == null) {
            $data = array(
                'site'    => $site,
                'title' => $site->namaweb,
                'title_sub' => 'Karya',
                'list_karya' => $list_karya,
                'divisi_for_badges' => $divisi_for_badges,
                'isi'     => 'home/karya'
            );

            $this->load->view('layout/wrapper', $data);
        } else {

            // cek apakah parameter sesuai database divisi?
            $check_parameter_on_db = $this->db->get_where('divisi', array(
                'url' => $divisi_filter
            ))->row();

            if (!empty($check_parameter_on_db)) {
                $filter_with_parameter = $this->Karya_model->listing_filter($check_parameter_on_db->id_divisi);

                $data = array(
                    'site'    => $site,
                    'title' => $site->namaweb,
                    'title_sub' => 'Karya',
                    'list_karya' => $filter_with_parameter,
                    'divisi_for_badges' => $divisi_for_badges,
                    'isi'     => 'home/karya'
                );

                $this->load->view('layout/wrapper', $data);
            } else {
                redirect('oops');
            }
        }
    }

    public function detail($url)
    {
        $site = $this->konfigurasi_model->listing();
        $list_karya = $this->Karya_model->listing();
        $detail_karya = $this->Karya_model->detail($url);
        $anggota_karya = $this->Karya_model->get_anggota_karya($detail_karya['id_karya']);
        $divisi_for_badges = $this->Karya_model->get_data_divisi($detail_karya['id_karya']);


        $data = array(
            'site'    => $site,
            'title' => $site->namaweb,
            'title_sub' => 'Karya',
            'list_karya' => $list_karya,
            'detail_karya' => $detail_karya,
            'isi'     => 'home/detail_karya',
            'anggota_karya' => $anggota_karya,
            'divisi_for_badges' => $divisi_for_badges
        );
        $this->load->view('layout/wrapper', $data);
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */