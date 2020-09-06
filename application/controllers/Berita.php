<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('berita_model');
    }

    public function index()
    {
        // load library
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'berita/index';

        // get data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            if ($this->uri->segment(2) == "berita") {
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
        $config['per_page'] = 1;

        $config['attributes'] = array(
            'class' => 'page-link'
        );

        // initialize
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $berita_all = $this->berita_model->listing_paging($config['per_page'], $data['start'], $data['keyword'], "berita");

        // ini adalah list berita
        $site = $this->konfigurasi_model->listing();
        // $berita_all = $this->berita_model->berita_all();
        $data = array(
            'title' => $site->namaweb,
            'title_sub' => 'Berita',
            'isi'     => 'home/berita',
            'berita_all' => $berita_all,
            // 'berita'   => $berita,
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function detail($url)
    {
        $site = $this->konfigurasi_model->listing();
        $berita_lainnya = $this->berita_model->berita_lainnya($url, "berita");
        $berita_detail = $this->berita_model->berita_detail($url, "berita");

        $id_berita = $this->db->get_where('berita', array('url' => $url))->row()->id_berita;

        $tag = $this->berita_model->tag_berita($id_berita);

        $data = array(
            'title' => $site->namaweb,
            'title_sub' => 'Berita',
            'isi'    => 'home/detail_berita',
            'berita_detail' => $berita_detail,
            'berita_lainnya' => $berita_lainnya,
            'tag'   => $tag
        );
        $this->load->view('layout/wrapper', $data);
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
