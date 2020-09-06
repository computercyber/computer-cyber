<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('agenda_model');
    }

    public function index()
    {
        $site = $this->konfigurasi_model->listing();

        // load library
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'agenda/index';

        // get data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            if ($this->uri->segment(2) == "agenda") {
                $this->session->set_userdata('keyword', $data['keyword']);
            } else {
                $this->session->unset_userdata('keyword');
            }
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config pagination
        $this->db->like('nama_agenda', $data['keyword']);
        $this->db->from('agenda');
        $config['total_rows'] = $this->db->count_all_results();
        // $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        $config['attributes'] = array(
            'class' => 'page-link'
        );

        // initialize
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $agenda = $this->agenda_model->listing_paging($config['per_page'], $data['start'], $data['keyword']);

        $data = array(
            'title' => $site->namaweb,
            'title_sub' => 'AGENDA',
            'isi'    => 'home/agenda',
            'agenda' => $agenda
        );
        $this->load->view('layout/wrapper', $data);
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */