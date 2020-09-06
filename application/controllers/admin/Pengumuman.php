<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model');
    }

    public function index()
    {
        // $update = $this->Pengumuman_model->update($id_berita);
        $pengumuman = $this->Pengumuman_model->admin_listing();
        $berita = $this->Pengumuman_model->getNews();
        $data = array(
            'title' => 'Halaman Pengumuman Pendaftaran',
            'isi' => 'admin_v2/pengumuman/list',
            'pengumuman' => $pengumuman,
            'berita' => $berita,
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function add()
    {
        // ambil data dari list.php
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $divisi = $this->input->post('divisi');
        $status = $this->input->post('status');

        // data masuk ke array
        $data = array(
            'nama'    => $nama,
            'nim'        => $nim,
            'divisi'        => $divisi,
            'status'    => $status
        );

        // masuk ke tabel anggota_diterima
        $this->Pengumuman_model->addAnggota($data, 'anggota_diterima');

        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">Anggota baru berhasil ditambah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>'); /* flashdata untuk data berhasil */
        redirect('admin/pengumuman');
    }

    public function addNews()
    {
        // $where = array('id_barang' => $id);
        // $data['barang'] = $this->M_item->editItem($where, 'tb_barang')->result();

        $news = $this->Pengumuman_model->getNews();

        $valid = $this->form_validation;
        $valid->set_rules('judul', 'Judul', 'required', array(
            'required' => 'Judul harus diisi'
        ));

        if ($valid->run() == FALSE) {
            $data = array(
                'title' => 'Halaman Tambah Pengumuman Pendaftaran',
                'isi' => 'admin_v2/pengumuman/add',
                'news' => $news
            );

            $this->load->view('admin_v2/layout/wrapper', $data);
        } else {
            $data = array(
                'id_berita'        => '1',
                'judul'            => $this->input->post('judul'),
                'pra_konten'       => $this->input->post('pra_konten'),
                'post_konten'      => $this->input->post('post_konten')
            );

            $this->Pengumuman_model->update($data);
            $this->session->set_flashdata('sukses', 'Konten berhasil disimpan');
            redirect('admin/pengumuman/');
            $this->load->view('admin/layout/wrapper', $data);
        }
    }

    public function delete($id)
    {
        // hapus anggota berdasarkan id
        $where = array('id_anggota' => $id);

        $this->Pengumuman_model->deleteAnggota($where, 'anggota_diterima');
        $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anggota berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        </div>'); /* flashdata untuk data berhasil */
        redirect('admin/pengumuman');
    }

    public function resetData()
    {
        $pengumuman = $this->Pengumuman_model->resetData();
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Anggota berhasil di reset
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/pengumuman');
    }

    public function editAnggota($id)
    {
        $where = array('id_anggota' => $id);
        $data['anggota_diterima'] = $this->M_item->editItem($where, 'tb_barang')->result();

        $this->load->view('admin/partials/v_admin_header');
        $this->load->view('admin/partials/v_admin_topbar');
        $this->load->view('admin/partials/v_admin_sidebar');
        $this->load->view('admin/v_edit_item', $data);
        $this->load->view('admin/partials/v_admin_footer');
    }

    public function updateAnggota()
    {
        $id    = $this->input->post('id_anggota');
        $nama = $this->input->post('nama');
        $nim =  $this->input->post('nim');
        $divisi =  $this->input->post('divisi');

        $data = array(
            'id_anggota' => $id_anggota,
            'nama' => $nama,
            'nim' => $nim,
            'divisi' => $divisi
        );

        $where = array(
            'id_anggota' => $id_anggota
        );

        $this->Pengumuman_model->updateAnggota($where, $data, 'anggota_diterima');
        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">Item successfully changed
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</button>
			</div>'); /* flashdata untuk data berhasil */
        redirect('admin/pengumuman');

        // $pengumuman = $this->Pengumuman_model->updateAnggota($id_anggota);

        // $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama Lengkap Harus diisi'));
        // $this->form_validation->set_rules('nim', 'Nim', 'required', array('required' => 'Nim Harus diisi'));
        // $this->form_validation->set_rules('divisi', 'Divisi', 'required', array('required' => 'Divisi Harus diisi'));

        // if ($this->form_validation->run() === FALSE) {

        //     $data = array(
        //         'nama' => 'admin/pengumuman/update',
        //         'title' => 'Edit Anggota Diterima',
        //         'pengumuman' => $pengumuman
        //     );

        //     $this->load->view('admin/layout/wrapper', $data, FALSE);
        // } else {

        //     $data = array(
        //         'id_anggota' => $id_anggota,
        //         'nama' => $this->input->post('nama'),
        //         'nim' => $this->input->post('nim'),
        //         'divisi' => $this->input->post('divisi')
        //     );

        //     $this->Pengumuman_model->updateAnggota($data);
        //     $this->session->set_flashdata('sukses', 'Anggota telah diedit');
        //     redirect('admin/pengumuman');
        // }
    }

    // public function import_excel()
    // {
    //     $config['upload_path'] = './assets/upload/data';
    //     $config['allowed_types'] = 'xls';
    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('file')) {
    //         $error = array(
    //             'error' => $this->upload->display_errors()
    //         );
    //         print_r($error);
    //         echo "gagal upload file!";
    //     } else {
    //         $data = array(
    //             'upload_data' => $this->upload->data()
    //         );

    //         $data = $this->upload->data();
    //         @chmod($data['full_path'],0777);

    //         echo "success!";
    //     }
    // }


}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */