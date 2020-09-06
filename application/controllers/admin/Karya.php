<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karya_model');
    }

    // private function
    private function _uploadImage($fileName)
    {
        $config['upload_path']          = './assets/upload/image/';
        $config['allowed_types']        = 'gif|jpg|jpeg|tiff|png';
        $config['file_name']            = $fileName;
        $config['overwrite']            = true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar_karya')) {
            return $this->upload->data("file_name");
        }

        return true;
    }

    public function index()
    {
        $karya = $this->Karya_model->admin_listing();

        $data = array(
            'title'         => 'Halaman Karya',
            'isi'           => 'admin_v2/karya/list',
            'karya'         => $karya
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function add()
    {

        $karya = $this->Karya_model->admin_listing();
        $divisi = $this->db->get('divisi')->result();

        $this->form_validation->set_rules('judul_karya', 'Judul Karya', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Halaman Karya',
                'isi'           => 'admin_v2/karya/add',
                'karya'         => $karya,
                'divisi'        => $divisi
            );
            $this->load->view('admin_v2/layout/wrapper', $data);
        } else {

            $url = str_replace(' ', '-', htmlspecialchars($this->input->post('judul_karya', TRUE)));
            $user_karya = $this->db->get_where('anggota', array(
                'nama_anggota' => htmlspecialchars($this->input->post('user_karya', TRUE))
            ))->row();

            if (!empty($_FILES["gambar_karya"]["name"])) {
                $fileName = 'karya_' . time() . '.' . str_replace('image/', '', $_FILES["gambar_karya"]['type']);

                $this->_uploadImage($fileName);
            } else {
                $fileName = 'img_placeholder.png';
            }

            $data = array(
                'judul_karya'       => htmlspecialchars($this->input->post('judul_karya', TRUE)),
                'url'               => $url,
                'user_karya'        => $user_karya->id_anggota,
                'jenis_karya'       => htmlspecialchars($this->input->post('jenis_karya', TRUE)),
                'karya_divisi'      => htmlspecialchars($this->input->post('karya_divisi', TRUE)),
                'gambar_karya'     => $fileName,
                'detail_karya'      => htmlspecialchars($this->input->post('detail_karya', TRUE)),
                'status_karya'      => htmlspecialchars($this->input->post('status_karya', TRUE)),
                'link_playstore'    => htmlspecialchars($this->input->post('link_playstore', TRUE)),
                'link_appstore'    => htmlspecialchars($this->input->post('link_appstore', TRUE)),
                'link_dribbble'    => htmlspecialchars($this->input->post('link_dribbble', TRUE)),
                'link_adobexd'    => htmlspecialchars($this->input->post('link_adobexd', TRUE)),
                'link_github'    => htmlspecialchars($this->input->post('link_github', TRUE)),
                'link_youtube'    => htmlspecialchars($this->input->post('link_youtube', TRUE)),
                'link_lain'    => htmlspecialchars($this->input->post('link_lain', TRUE)),
                'date_created'      => time()
            );

            $data_karya_insert_to_db = $this->db->insert('karya', $data);

            $anggota_karya = $this->input->post('anggota_karya', TRUE);
            $result = array();
            foreach ($anggota_karya as $key => $val) {

                $result[] = array(
                    'id_anggota' => $this->db->get_where('anggota', array('nama_anggota' => $_POST['anggota_karya'][$key]))->row_array()['id_anggota'],
                    'id_karya'      => $this->db->get_where('karya', array('judul_karya' => htmlspecialchars($this->input->post('judul_karya', TRUE))))->row()->id_karya,
                    'date_created'  => time()
                );
            }

            $anggota_karya_insert_to_db = $this->db->insert_batch('anggota_karya', $result);


            if ($data_karya_insert_to_db) {
                if ($anggota_karya_insert_to_db) {
                    $this->session->set_flashdata('status', "<script>
            $(window).on('load', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
    
                Toast.fire({
                    icon: 'success',
                    title: 'Karya berhasil ditambah',
                    type: 'success',
                });
            });
            </script>");
                    redirect('admin/karya');
                }
            }
        }

        $data = array(
            'title'         => 'Halaman Karya',
            'isi'           => 'admin_v2/karya/add',
            'karya'         => $karya,
            'divisi'        => $divisi
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function edit($id_karya)
    {
        $get_id_karya = urldecode(decrypt_url($id_karya));

        $karya = $this->Karya_model->admin_detail($get_id_karya)->row();
        $divisi = $this->db->get('divisi')->result();
        $anggota_karya = $this->Karya_model->admin_anggota_karya($get_id_karya)->result();

        $this->form_validation->set_rules('judul_karya', 'Judul Karya', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Halaman Karya',
                'isi'           => 'admin_v2/karya/edit',
                'karya'         => $karya,
                'divisi'        => $divisi,
                'anggota_karya' => $anggota_karya
            );
            $this->load->view('admin_v2/layout/wrapper', $data);
        } else {

            $url = str_replace(' ', '-', htmlspecialchars($this->input->post('judul_karya', TRUE)));
            $user_karya = $this->db->get_where('anggota', array(
                'nama_anggota' => htmlspecialchars($this->input->post('user_karya', TRUE))
            ))->row();

            if (!empty($_FILES["gambar_karya"]["name"])) {
                $fileName = 'karya_' . time() . '.' . str_replace('image/', '', $_FILES["gambar_karya"]['type']);

                if ($karya->gambar_karya != null) {
                    if (file_exists($file = FCPATH . 'assets/upload/image/' . $karya->gambar_karya)) {
                        unlink($file);
                    }
                }

                $this->_uploadImage($fileName);
            } else {
                $fileName = $karya->gambar_karya;
            }



            $data = array(
                'judul_karya'       => htmlspecialchars($this->input->post('judul_karya', TRUE)),
                'url'               => $url,
                'user_karya'        => $user_karya->id_anggota,
                'jenis_karya'       => htmlspecialchars($this->input->post('jenis_karya', TRUE)),
                'karya_divisi'      => htmlspecialchars($this->input->post('karya_divisi', TRUE)),
                'gambar_karya'     => $fileName,
                'detail_karya'      => htmlspecialchars($this->input->post('detail_karya', TRUE)),
                'status_karya'      => htmlspecialchars($this->input->post('status_karya', TRUE)),
                'link_playstore'    => htmlspecialchars($this->input->post('link_playstore', TRUE)),
                'link_appstore'    => htmlspecialchars($this->input->post('link_appstore', TRUE)),
                'link_dribbble'    => htmlspecialchars($this->input->post('link_dribbble', TRUE)),
                'link_adobexd'    => htmlspecialchars($this->input->post('link_adobexd', TRUE)),
                'link_github'    => htmlspecialchars($this->input->post('link_github', TRUE)),
                'link_youtube'    => htmlspecialchars($this->input->post('link_youtube', TRUE)),
                'link_lain'    => htmlspecialchars($this->input->post('link_lain', TRUE)),
                'date_created'      => time()
            );

            $data_karya_insert_to_db = $this->db->update('karya', $data, ['id_karya' => $get_id_karya]);

            $this->session->set_flashdata('status', "<script>
                    $(window).on('load', function() {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
            
                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil mengubah data karya',
                            type: 'success',
                        });
                    });
                    </script>");
            redirect('admin/karya');
        }

        $data = array(
            'title'         => 'Halaman Karya',
            'isi'           => 'admin_v2/karya/add',
            'karya'         => $karya,
            'divisi'        => $divisi,
            'anggota_karya' => $anggota_karya
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function add_anggota_karya($id_karya)
    {
        $get_id_karya = urldecode(decrypt_url($id_karya));
        $anggota_karya = $this->input->post('anggota_karya', TRUE);

        $dataInsert = array(
            'id_anggota' => $this->db->get_where('anggota', array('nama_anggota' => $anggota_karya))->row()->id_anggota,
            'id_karya'      => $get_id_karya,
            'date_created'  => time()
        );

        $this->db->insert('anggota_karya', $dataInsert);

        redirect('admin/karya/edit/' . $id_karya);
    }

    public function delete_anggota_karya($id_karya, $id_anggota_karya)
    {
        $get_id_karya = urldecode(decrypt_url($id_karya));
        $get_id_anggota_karya = urldecode(decrypt_url($id_anggota_karya));

        $this->db->where(array(
            'id_anggota_karya' => $get_id_anggota_karya
        ));
        $this->db->delete('anggota_karya');

        $this->session->set_flashdata('message', 'toast_success');
        redirect('admin/karya/edit/' . $id_karya);
    }

    public function get_name_user_karya_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->Karya_model->get_user_karya($_GET['term'])->result();
            if (count($result) > 0) {
                foreach ($result as $row)
                    $result_array[] = $row->nama_anggota;
                echo json_encode($result_array);
            }
        }
    }

    public function delete($id_karya)
    {
        $get_id_karya = urldecode(decrypt_url($id_karya));

        $karya = $this->Karya_model->admin_detail($get_id_karya)->row();

        if ($karya->gambar_karya != null) {
            if (file_exists($file = FCPATH . 'assets/upload/image/' . $karya->gambar_karya)) {
                unlink($file);
            }
        }

        $data = array(
            'id_karya' => $get_id_karya
        );

        $this->db->delete('karya', $data);
        $this->db->delete('anggota_karya', $data);
        $this->session->set_flashdata('status', "<script>
            $(window).on('load', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
    
                Toast.fire({
                    icon: 'success',
                    title: 'Karya telah dihapus',
                    type: 'success',
                });
            });
            </script>");
        redirect('admin/karya');
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */