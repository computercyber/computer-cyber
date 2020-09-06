<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tag extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tag_model');
    }

    public function index()
    {
        // ini adalah list berita
        $site = $this->konfigurasi_model->listing();
        $list_tag = $this->Tag_model->listing()->result_array();
        $count_same_tag = $this->Tag_model->count_same_tag()->result_array();

        $data = array(
            'title' => $site->namaweb,
            'title_sub' => 'Tag',
            'isi'     => 'home/tag',
            'list_tag'     => $list_tag,
            'count_same_tag' => $count_same_tag
        );
        $this->load->view('layout/wrapper', $data);
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */