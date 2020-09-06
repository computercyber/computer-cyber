<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('berita_model');
        $this->load->model('tag_model');
    }

    public function index()
    {
        $artikel = $this->berita_model->admin_listing("artikel");
        $data = array(
            'title' => 'Halaman Artikel',
            'isi'   => 'admin_v2/artikel/list',
            'artikel' => $artikel
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function add()
    {
        //validasi
        $v = $this->form_validation;
        $v->set_rules('judul', 'Judul', 'required', array('required' => 'Judul Harus diisi'));
        $v->set_rules('isi', 'isi', 'required', array('required' => 'Isi Harus diisi'));

        if ($v->run()) {

            $config['upload_path']         = './assets/upload/image/original/artikel/';  //lokasi folder upload
            $config['allowed_types']     = 'gif|jpg|jpeg|png|svg|tiff'; //format file yang di-upload
            $config['max_size']            = '12000'; // KB	
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title'     => 'Halaman Tambah Artikel',
                    'isi'         => 'admin_v2/artikel/tambah',
                    'error'     =>  $this->upload->display_errors()
                );
                $this->load->view('admin_v2/layout/wrapper', $data);

                // Masuk database 
            } else {
                $upload_data                = array('uploads' => $this->upload->data());
                // Image Editor
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/original/artikel/' . $upload_data['uploads']['file_name'];
                $config['new_image']         = './assets/upload/image/thumbs/artikel/';
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

                // check url null or not 

                if ($i->post('url') == null) {
                    $url = str_replace(' ', '-', $i->post('judul', TRUE));
                } else {
                    $url = $i->post('url', TRUE);
                }

                // end check


                $data = array(
                    'judul'                 => $i->post('judul', TRUE),
                    'isi'                   => $i->post('isi'),
                    'url'                   => $url,
                    'gambar_berita'         => $upload_data['uploads']['file_name'],
                    'tanggal'               => time(),
                    'update_berita'         => null,
                    'user_update_berita'    => null,
                    'id_user'               => $this->session->userdata('id'),
                    'status_berita'         => $i->post('status_berita'),
                    'jenis_berita'          => 'Artikel',
                );

                $this->berita_model->add($data);


                // ambil tag 

                /* check judul */

                $check_latest_article = $this->db->get_where('berita', array(
                    'judul' => $i->post('judul', TRUE),
                    'jenis_berita' => 'Artikel'
                ))->row();

                $explode = explode(',', $this->input->post('tag'));
                $no = 0;

                var_dump($this->input->post('tag'));

                foreach ($explode as $e) {

                    // var_dump($explode);
                    // die;
                    // $no++;
                    $this->tag_model->add($e, $check_latest_article->id_berita);
                }

                // end tag


                $this->session->set_flashdata('sukses', 'Berita telah ditambah');
                redirect(base_url('admin/artikel'));
            }
        }
        // End masuk database

        $data = array(
            'title' => 'Halaman Tambah Berita',
            'isi' => 'admin_v2/artikel/tambah'
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function update($id_berita)
    {
        $artikel = $this->berita_model->admin_berita_detail($id_berita, "artikel");
        $url_old = $this->db->get_where('berita', array('id_berita' => $id_berita))->row()->url;

        if ($this->input->post('url') != $url_old) {
            $url = $this->input->post('url');
        } else {
            $url_old;
        }

        //validasi
        $v = $this->form_validation;
        $v->set_rules('judul', 'Judul', 'required', array('required' => 'Judul Harus diisi'));
        $v->set_rules('url', 'url', 'required', array('required' => 'Url Harus diisi'));
        $v->set_rules('isi', 'isi', 'required', array('required' => 'Isi Harus diisi'));

        if ($v->run()) {
            //kalau ada gambar
            if (!empty($_FILES['gambar']['name'])) {

                $config['upload_path']         = './assets/upload/image/original/artikel/';  //lokasi folder upload
                $config['allowed_types']     = 'gif|jpg|png|svg|tiff'; //format file yang di-upload
                $config['max_size']            = '12000'; // KB	
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $data = array(
                        'title'     => 'Halaman Edit Artikel',
                        'isi'         => 'admin_v2/artikel/edit',
                        'artikel'    => $artikel,
                        'error'     =>  $this->upload->display_errors()
                    );
                    $this->load->view('admin_v2/layout/footer', $data);

                    // Masuk database 
                } else {
                    $upload_data                = array('uploads' => $this->upload->data());
                    // Image Editor
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/original/artikel/' . $upload_data['uploads']['file_name'];
                    $config['new_image']         = './assets/upload/image/thumbs/artikel/';
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

                    //hapus gambar lama

                    if ($artikel->gambar != "") {
                        unlink('./assets/upload/image/original/artikel/' . $artikel->gambar);
                        unlink('./assets/upload/image/thumbs/artikel/' . $artikel->gambar);
                    }

                    //end hapus gambar lama

                    $i = $this->input;
                    $data = array(
                        'id_berita'        => $id_berita,
                        'judul'            => $i->post('judul', TRUE),
                        'url'            => $i->post('url', TRUE),
                        'isi'            => $i->post('isi'),
                        'gambar_berita'        => $upload_data['uploads']['file_name'],
                        'update_berita'        => time(),
                        'status_berita'    => $i->post('status_berita'),
                        'jenis_berita'    => $i->post('jenis_berita'),
                        'user_update_berita'        => $this->session->userdata('id'),
                    );

                    $this->berita_model->update($data);
                    $this->session->set_flashdata('sukses', 'Berita telah diedit');
                    redirect(base_url('admin/artikel'));
                }
            } else {
                //update tanpa ganti gambar
                $i = $this->input;
                $data = array(
                    'id_berita'        => $id_berita,
                    'judul'            => $i->post('judul', TRUE),
                    'url'            => $i->post('url', TRUE),
                    'isi'            => $i->post('isi'),
                    'gambar_berita'        => $upload_data['uploads']['file_name'],
                    'update_berita'        => time(),
                    'status_berita'    => $i->post('status_berita'),
                    'jenis_berita'    => $i->post('jenis_berita'),
                    'user_update_berita'        => $this->session->userdata('id'),
                );

                $this->berita_model->update($data);
                $this->session->set_flashdata('sukses', 'Berita telah diedit');
                redirect(base_url('admin/artikel'));
            }
        }
        // End masuk database

        $data = array(
            'title' => 'Halaman Edit Artikel',
            'isi' => 'admin_v2/artikel/edit',
            'artikel' => $artikel
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function archive($id_berita)
    {

        $this->db->set('status_berita', 'Draft');
        $this->db->where('id_berita', $id_berita);
        $this->db->update('berita');

        redirect('admin/artikel');


        // AJAX REQUEST non complete

        // $id_artikel = $this->input->post('id');

        // $this->db->set('status_berita', 'Draft');
        // $this->db->where('id_berita', $id_artikel);
        // $this->db->update('berita');

        // $archived = $this->db->get_where('berita', array(
        //     'status_berita' => 'Draft'
        // ));

        // echo json_encode(array(
        //     'status' => 'archived'
        // ));
    }

    public function unarchive($id_berita)
    {
        $this->db->set('status_berita', 'Publish');
        $this->db->where('id_berita', $id_berita);
        $this->db->update('berita');

        redirect('admin/artikel');
    }

    public function delete($id_berita)
    {
        $artikel = $this->berita_model->detail($id_berita);

        //hapus gambar
        if ($artikel->gambar != "") {
            unlink('./assets/upload/image/original/artikel/' . $artikel->gambar);
            unlink('./assets/upload/image/thumbs/artikel/' . $artikel->gambar);
        }
        //end hapus gambar

        $data = array('id_berita' => $id_berita);
        $this->berita_model->delete($data);

        $this->session->set_flashdata('sukses', 'Berita telah dihapus');
        redirect('admin/berita', 'refresh');
    }


    // AJAX REQUEST
    //Upload image summernote
    public function upload_image()
    {
        if (isset($_FILES["image"]["name"])) {
            $config['upload_path'] = './assets/upload/image/original/artikel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/image/original/artikel/' . $data['file_name'];
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 1360;
                $config['height'] = 720;
                $config['create_thumb']     = FALSE;
                $config['new_image'] = './assets/upload/image/thumbs/artikel/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'assets/upload/image/original/artikel/' . $data['file_name'];
            }
        }
    }

    //Delete image summernote
    public function delete_image()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
