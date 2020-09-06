<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembina extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembina_model');
    }

    public function index()
    {

        $i = $this->input;
        $v = $this->form_validation;
        $pembina = $this->Pembina_model->admin_listing();

        $v->set_rules('nama_pembina', 'Nama Pembina', 'required', array(
            'required' => 'Nama Pembina tidak boleh kosong'
        ));

        if ($v->run()) {

            $fileName = 'pembina_' . time() . '.' . str_replace('image/', '', $_FILES["gambar_pembina"]['type']);

            $config['upload_path']         = './assets/upload/image/';  //lokasi folder upload
            $config['allowed_types']     = 'gif|jpg|jpeg|png|svg|tiff'; //format file yang di-upload
            $config['max_size']            = '12000'; // KB	
            $config['file_name']            = $fileName;
            $config['max_width']            = 800;
            $config['max_height']           = 800;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar_pembina')) {
                $data = array(
                    'title' => 'Halaman Pembina',
                    'isi'   => 'admin_v2/pembina/list',
                    'pembina' => $pembina,
                    'error' => $this->upload->display_errors()
                );
                $this->load->view('admin_v2/layout/wrapper', $data);

                // Masuk database 
            } else {

                $data = array(
                    'nama_pembina' => $i->post('nama_pembina'),
                    'dosen'        => $i->post('dosen'),
                    'email_pembina' => $i->post('email_pembina'),
                    'jenis_pembina' => $i->post('jenis_pembina'),
                    'status_pembina' => $i->post('status_pembina'),
                    'gambar_pembina' => $fileName
                );

                $this->db->insert('pembina', $data);
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
                        title: 'Pembina berhasil ditambah',
                        type: 'success',
                    });
                });
                </script>");
                redirect(base_url('admin/pembina'));
            }
        } else {
            $data = array(
                'title' => 'Halaman Pembina',
                'isi'   => 'admin_v2/pembina/list',
                'pembina' => $pembina
            );
            $this->load->view('admin_v2/layout/wrapper', $data);
        }
    }

    public function update($id_pembina)
    {
        $i = $this->input;
        $pembina = $this->Pembina_model->admin_listing();

        $fileName = 'pembina_' . time() . '.' . str_replace('image/', '', $_FILES["gambar_pembina"]['type']);

        $config['upload_path']         = './assets/upload/image/';  //lokasi folder upload
        $config['allowed_types']     = 'gif|jpg|jpeg|png|svg|tiff'; //format file yang di-upload
        $config['max_size']            = '12000'; // KB	
        $config['file_name']            = $fileName;
        // $config['max_width']            = 800;
        // $config['max_height']           = 800;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar_pembina')) {
            $data = array(
                'title' => 'Halaman Pembina',
                'isi'   => 'admin_v2/pembina/list',
                'pembina' => $pembina,
                'error' => $this->upload->display_errors()
            );
            $this->session->set_flashdata('status', "<script>
            $(window).on('load', function() {
            $('#editPembinaModal').modal('show');
            });
            </script>");
            $this->session->set_flashdata('id_pembina', $id_pembina);
            $this->load->view('admin_v2/layout/wrapper', $data);

            // Masuk database 
        } else {

            $data = array(
                'nama_pembina' => $i->post('nama_pembina'),
                'dosen'        => $i->post('dosen'),
                'email_pembina' => $i->post('email_pembina'),
                'jenis_pembina' => $i->post('jenis_pembina'),
                'status_pembina' => $i->post('status_pembina'),
                'gambar_pembina' => $fileName
            );

            $this->db->where('id_pembina', $id_pembina);
            $this->db->update('pembina', $data);
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
                    title: 'Data pembina berhasil diubah',
                    type: 'success',
                });
            });
            </script>");
            redirect(base_url('admin/pembina'));
        }
    }

    // AJAX REQUEST
    public function get_data_pembina()
    {
        echo json_encode($this->db->get_where('pembina', array(
            'id_pembina' =>  $this->input->post('id')
        ))->row_array());
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */