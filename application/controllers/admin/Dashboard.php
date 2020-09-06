<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
        $this->load->model('berita_model');
        $this->load->model('gallery_model');
        $this->load->model('Agenda_model');
    }

    public function index()
    {
        if ($this->user_model->detail($this->session->userdata('id'))->akses_level == '99') {
            redirect('login', 'refresh');
        } elseif ($this->user_model->detail($this->session->userdata('id'))->akses_level == '2') {
            redirect('admin/pendaftaran');
        } else {

            $berita = $this->berita_model->listing_limit();
            $gallery = $this->gallery_model->listing_home();
            $agenda = $this->Agenda_model->listing_home();

            $data = array(
                'title' => 'Halaman Administrator',
                'isi' => 'admin_v2/dashboard/list',
                'berita' => $berita,
                'jumlah_anggota' => $this->db->get('anggota'),
                'jumlah_informasi' => count($this->berita_model->informasi_all()),
                'jumlah_portofolio' => count($this->berita_model->portfolio_all()),
                'jumlah_gallery' => $this->db->get('gallery'),
                'daftar_event'    => $agenda,
                'gallery' => $gallery
            );

            $this->load->view('admin_v2/layout/wrapper', $data);
        }
    }

    public function konfigurasi()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('namaweb', 'namaweb', 'required', array(
            'required' => 'Nama Organisasi harus diisi'
        ));

        if ($valid->run() === FALSE) {
            $data = array(
                'title' => 'Halaman Konfigurasi',
                'isi'    => 'admin/dasbor/umum',
                'konfigurasi' => $konfigurasi
            );
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $i = $this->input;
            $data = array(
                'id_konfigurasi'        => $konfigurasi->id_konfigurasi,
                'namaweb'                => $i->post('namaweb'),
                'tagline'                => $i->post('tagline'),
                'website'                => $i->post('website'),
                'email'                    => $i->post('email'),
                'alamat'                => $i->post('alamat'),
                'telepon'                => $i->post('telepon'),
                'keywords'                => $i->post('keywords'),
                'description'            => $i->post('description'),
                'google_map'            => $i->post('google_map'),
                'metatext'                => $i->post('metatext'),
                'facebook'                => $i->post('facebook'),
                'twitter'                => $i->post('twitter'),
                'instagram'                => $i->post('instagram'),
            );

            $this->konfigurasi_model->update($data);
            $this->session->set_flashdata('sukses', 'Konfigurasi berhasil disimpan');
            redirect(base_url('admin/dasbor/konfigurasi'));
        }
    }

    public function logo()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        //validasi
        $v = $this->form_validation;
        $v->set_rules('id_konfigurasi', 'id_konfigurasi', 'required', array('required' => 'ID Konfigurasi harus diisi'));

        if ($v->run()) {

            $config['upload_path']         = './assets/upload/image/';  //lokasi folder upload
            $config['allowed_types']     = 'gif|jpg|png|svg|tiff'; //format file yang di-upload
            $config['max_size']            = '12000'; // KB	
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('logo')) {
                $data = array(
                    'title'     => 'Halaman Upload Logo',
                    'konfigurasi' => $konfigurasi,
                    'isi'         => 'admin/dasbor/logo',
                    'error'     =>  $this->upload->display_errors()
                );
                $this->load->view('admin/layout/wrapper', $data);

                // Masuk database 
            } else {
                $upload_data                = array('uploads' => $this->upload->data());
                // Image Editor
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/' . $upload_data['uploads']['file_name'];
                $config['new_image']         = './assets/upload/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['quality']             = "100%";
                $config['maintain_ratio']     = TRUE;
                $config['width']             = 360; // Pixel
                $config['height']             = 360; // Pixel
                $config['x_axis']             = 0;
                $config['y_axis']             = 0;
                $config['thumb_marker']     = '';
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $i = $this->input;
                $data = array(
                    'id_konfigurasi'        => $konfigurasi->id_konfigurasi,
                    'logo'                => $upload_data['uploads']['file_name']
                );

                $this->konfigurasi_model->update($data);
                $this->session->set_flashdata('sukses', 'Logo berhasil disimpan');
                redirect(base_url('admin/dasbor/logo'));
            }
        }
        // End masuk database


        $data = array(
            'title' => 'Halaman Upload Logo',
            'konfigurasi' => $konfigurasi,
            'isi'    => 'admin/dasbor/logo'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function about()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        //validasi
        $v = $this->form_validation;
        $v->set_rules('id_konfigurasi', 'id_konfigurasi', 'required', array('required' => 'ID Konfigurasi harus diisi'));

        if ($v->run()) {

            $config['upload_path']         = './assets/upload/image/';  //lokasi folder upload
            $config['allowed_types']     = 'gif|jpg|png|svg|tiff'; //format file yang di-upload
            $config['max_size']            = '12000'; // KB	
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar_about')) {
                $data = array(
                    'title'     => 'Halaman Tetang Organisasi',
                    'konfigurasi' => $konfigurasi,
                    'isi'         => 'admin/dasbor/about',
                    'error'     =>  $this->upload->display_errors()
                );
                $this->load->view('admin/layout/wrapper', $data);

                // Masuk database 
            } else {
                $upload_data                = array('uploads' => $this->upload->data());
                // Image Editor
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/' . $upload_data['uploads']['file_name'];
                $config['new_image']         = './assets/upload/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['quality']             = "100%";
                $config['maintain_ratio']     = TRUE;
                $config['width']             = 360; // Pixel
                $config['height']             = 360; // Pixel
                $config['x_axis']             = 0;
                $config['y_axis']             = 0;
                $config['thumb_marker']     = '';
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $i = $this->input;
                $data = array(
                    'id_konfigurasi'        => $konfigurasi->id_konfigurasi,
                    'gambar_about'            => $upload_data['uploads']['file_name'],
                    'about'                    => $i->post('about')
                );

                $this->konfigurasi_model->update($data);
                $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
                redirect(base_url('admin/dasbor/about'));
            }
        }
        // End masuk database


        $data = array(
            'title' => 'Halaman Tetang Organisasi',
            'konfigurasi' => $konfigurasi,
            'isi'    => 'admin/dasbor/about'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
