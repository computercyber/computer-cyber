<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Agenda_model');
        $this->load->model('Konfigurasi_model');
    }

    // function private
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

        if ($this->upload->do_upload('sampul_agenda')) {
            return $this->upload->data("file_name");
        }

        return true;
    }

    public function index()
    {
        $agenda = $this->Agenda_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();

        $this->form_validation->set_rules('nama_agenda', 'Nama agenda', 'required', array('required' => 'Nama agenda harus diisi'));
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required', array('required' => 'Tanggal mulai harus diisi'));
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required', array('required' => 'Tanggal selesai harus diisi'));
        $this->form_validation->set_rules('undangan', 'Undangan', 'required', array('required' => 'Undangan yang ditujukan harus diisi'));
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array('required' => 'Lokasi kegiatan harus diisi'));

        if ($this->form_validation->run()) {
            $nama_agenda = $this->input->post('nama_agenda', true);
            $tanggal_mulai = strtotime($this->input->post('tanggal_mulai'));
            $tanggal_selesai = strtotime($this->input->post('tanggal_selesai'));
            $undangan = $this->input->post('undangan', true);
            $lokasi = $this->input->post('lokasi', true);
            $keterangan = $this->input->post('keterangan');

            if (!empty($_FILES["sampul_agenda"]["name"])) {
                $sampulName = 'agenda_' . time() . '.' . str_replace('image/', '', $_FILES["sampul_agenda"]['type']);
            } else {
                $sampulName = "img_placeholder.png";
            };

            // data masuk ke array
            $data = array(
                'nama_agenda'    => $nama_agenda,
                'tanggal_mulai'        => $tanggal_mulai,
                'tanggal_selesai'   => $tanggal_selesai,
                'keterangan'    => $keterangan,
                'undangan'      => $undangan,
                'lokasi'        => $lokasi,
                'sampul_agenda' => $sampulName,
                'date_created'  => time()
            );

            $this->_uploadImage($sampulName);

            // masuk ke tabel agenda
            $this->Agenda_model->add($data);

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
                    title: 'Agenda berhasil ditambah',
                    type: 'success',
                });
            });
            </script>");
            redirect('admin/agenda');
        }

        $data = array(
            'title' => 'Halaman Agenda',
            'isi' => 'admin_v2/agenda/list',
            'agenda' => $agenda,
            'konfigurasi' => $konfigurasi
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function update()
    {
        $id_agenda = $this->input->post('id_agenda', true);
        $nama_agenda = $this->input->post('nama_agenda', true);
        $tanggal_mulai = strtotime($this->input->post('tanggal_mulai', true));
        $tanggal_selesai = strtotime($this->input->post('tanggal_selesai', true));
        $undangan = $this->input->post('undangan', true);
        $lokasi = $this->input->post('lokasi', true);
        $keterangan = $this->input->post('keterangan');


        if (!empty($_FILES['sampul_agenda']['name'])) {
            $sampulName = 'agenda_' . time() . '.' . str_replace('image/', '', $_FILES["sampul_agenda"]['type']);

            // data masuk ke array
            $data = array(
                'nama_agenda'    => $nama_agenda,
                'tanggal_mulai'        => $tanggal_mulai,
                'tanggal_selesai'   => $tanggal_selesai,
                'keterangan'    => $keterangan,
                'undangan'      => $undangan,
                'lokasi'        => $lokasi,
                'sampul_agenda' => $sampulName,
                'date_updated'  => time()
            );
        } else {

            // data masuk ke array
            $data = array(
                'nama_agenda'    => $nama_agenda,
                'tanggal_mulai'        => $tanggal_mulai,
                'tanggal_selesai'   => $tanggal_selesai,
                'keterangan'    => $keterangan,
                'undangan'      => $undangan,
                'lokasi'        => $lokasi,
                'date_updated'  => time()
            );
        }

        $where = $id_agenda;



        $this->_uploadImage($sampulName);

        // masuk ke tabel agenda
        $this->Agenda_model->update($data, $where);

        $this->session->set_flashdata('status', "<script>$(window).on('load', function() {
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
                title: 'Berhasil mengubah agenda',
                type: 'success',
            });
        })</script>");
        redirect('admin/agenda');
    }

    public function konfigurasi_auto_emailer()
    {
        $this->db->set('auto_emailer_agenda', 1);
        $this->db->where('id_konfigurasi', 1);
        $this->db->update('konfigurasi');

        $this->session->set_flashdata('status', "<script>
        $(window).on('load', function() {
            $('#toast-auto-emailer').toast('show');
        });
        </script>");
        redirect('admin/agenda');
    }

    public function delete($id_agenda)
    {
        // hapus anggota berdasarkan id
        $data_agenda = $this->db->get_where('agenda', ['id_agenda' => $id_agenda])->row();
        $where = $id_agenda;

        $this->Agenda_model->deleteAgenda($where, 'agenda');

        if (file_exists($file = FCPATH . '/assets/upload/image/' . $data_agenda->sampul_agenda)) {
            unlink($file);
        }

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
                title: 'Agenda telah dihapus',
                type: 'success',
            });
        });
        </script>");
        redirect('admin/agenda');
    }

    public function changestatus($type, $id_agenda)
    {
        $get_type = urldecode(decrypt_url($type));
        $get_id_agenda = urldecode(decrypt_url($id_agenda));

        $this->db->where('id_agenda', $get_id_agenda);
        $this->db->set('status', $get_type);
        $this->db->update('agenda');

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
                icon: 'info',
                title: 'Agenda ditunda',
                type: 'info',
            });
        });
        </script>");
        redirect('admin/agenda');
    }



    // AJAX REQUEST 
    public function get_data_agenda()
    {
        $id_agenda = $this->input->post('id_agenda');
        $dataAgenda = $this->db->get_where('agenda', [
            'id_agenda' => $id_agenda
        ])->row();

        echo json_encode($dataAgenda);
    }

    public function delete_image()
    {
        $id_agenda = $this->input->post('id_agenda');
        $dataAgenda = $this->db->get_where('agenda', [
            'id_agenda' => $id_agenda
        ])->row();

        if ($dataAgenda->sampul_agenda != 'img_placeholder.png') {
            if (file_exists($file = FCPATH . '/assets/upload/image/' . $dataAgenda->sampul_agenda)) {
                unlink($file);

                $this->db->set('sampul_agenda', 'img_placeholder.png');
                $this->db->where('id_agenda', $id_agenda);
                $this->db->update('agenda');
            }
        }
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */