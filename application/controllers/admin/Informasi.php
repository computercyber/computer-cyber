<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('berita_model');
    }

    public function index()
    {
        $informasi = $this->berita_model->admin_listing("informasi");

        $i = $this->input;
        $rules = $this->form_validation;

        $rules->set_rules('judul', 'Judul', 'required', array('required' => 'Judul tidak boleh kosong'));

        if ($rules->run() == FALSE) {
            $data = array(
                'title' => 'Halaman Informasi',
                'isi'   => 'admin_v2/informasi/list',
                'informasi' => $informasi
            );
            $this->load->view('admin_v2/layout/wrapper', $data);
        } else {
            if ($i->post('tanggal') == null) {
                $tanggal = time();
                $status_berita = $i->post('status_berita');
            } else {
                $tanggal = strtotime($i->post('tanggal'));
                $status_berita = 'Publish';
            }

            $data = array(
                'judul'                 => $i->post('judul', TRUE),
                'isi'                   => $i->post('isi'),
                'url'                   => null,
                'gambar_berita'         => null,
                'tanggal'               => $tanggal,
                'update_berita'         => null,
                'user_update_berita'    => null,
                'id_user'               => $this->session->userdata('id'),
                'status_berita'         => $status_berita,
                'jenis_berita'          => 'Informasi',
            );

            $this->db->insert('berita', $data);
            $this->session->set_flashdata('status', "<script>
            $(window).on('load', function() {
            $('#toast-add-information').toast('show');
            });
            </script>");
            redirect('admin/informasi');
        }
    }

    public function update()
    {
    }

    // AJAX REQUEST
    public function get_data_information()
    {
        echo json_encode($this->db->get_where('berita', array(
            'id_berita' =>  $this->input->post('id')
        ))->row_array());
    }

    public function archive($id_berita)
    {

        $this->db->set('status_berita', 'Draft');
        $this->db->where('id_berita', $id_berita);
        $this->db->update('berita');

        redirect('admin/informasi');
    }

    public function unarchive($id_berita)
    {
        $this->db->set('status_berita', 'Publish');
        $this->db->where('id_berita', $id_berita);
        $this->db->update('berita');

        redirect('admin/informasi');
    }

    public function delete($id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        $this->db->delete('berita');

        $this->session->set_flashdata('status', "<script>
        $(window).on('load', function() {
        $('#toast-delete-information').toast('show');
        });
        </script>");
        redirect('admin/informasi');
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */