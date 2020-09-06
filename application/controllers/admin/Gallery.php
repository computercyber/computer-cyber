<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model');
	}

	public function data_gallery()
	{
		$data = $this->gallery_model->listing();
		echo json_encode($data);
	}

	public function get_gallery()
	{
		$data = $this->gallery_model->listing();
		echo json_encode($data);
	}

	public function index()
	{
		$gallery = $this->gallery_model->admin_listing();

		$data = array(
			'title' => 'Halaman Gallery',
			'isi'	=> 'admin_v2/gallery/list',
			'gallery' => $gallery
		);
		$this->load->view('admin_v2/layout/wrapper', $data);
	}

	public function add()
	{
		//validasi
		$v = $this->form_validation;
		$v->set_rules('judul_gallery', 'Judul Gambar', 'required', array('required' => 'Judul gambar harus diisi'));
		$v->set_rules('keterangan_gallery', 'Keterangan Gambar', 'required', array('required' => 'Keterangan harus diisi'));
		$v->set_rules('tanggal_acara', 'Tanggal Kegiatan', 'required', array('required' => 'Tanggal Kegiatan harus diisi'));

		$listDivisi = $this->db->get('divisi')->result();

		if ($v->run()) {

			$fileName = 'gallery_' . time() . '.' . str_replace('image/', '', $_FILES["gambar"]['type']);

			$config['upload_path'] 		= './assets/upload/image/';  //lokasi folder upload
			$config['allowed_types'] 	= 'gif|jpg|jpeg|png|svg|tiff'; //format file yang di-upload
			$config['max_size']			= '12000'; // KB	
			$config['file_name']        = $fileName;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'title' 	=> 'Halaman Tambah Gambar',
					'isi' 		=> 'admin_v2/gallery/tambah',
					'divisi'	=> $listDivisi,
					'error' 	=>  $this->upload->display_errors()
				);
				$this->load->view('admin/layout/wrapper', $data);

				// Masuk database 
			} else {

				$i = $this->input;
				$data = array(
					'judul_gallery'			=> $i->post('judul_gallery'),
					'keterangan_gallery'	=> $i->post('keterangan_gallery'),
					'gambar'				=> $fileName,
					'tanggal_acara'			=>  strtotime($i->post('tanggal_acara')),
					'gallery_divisi'		=> $i->post('gallery_divisi'),
					'status_gallery'		=> $i->post('status_gallery'),
					'id_user'				=> $this->session->userdata('id'),
				);

				$this->gallery_model->add($data);
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
                    title: 'Gambar berhasil ditambah',
                    type: 'success',
                });
            });
            </script>");
				redirect(base_url('admin/gallery'));
			}
		}
		// End masuk database


		$data = array(
			'title' => 'Halaman Tambah Gambar',
			'isi'	=> 'admin_v2/gallery/tambah',
			'divisi'	=> $listDivisi
		);
		$this->load->view('admin_v2/layout/wrapper', $data);
	}

	public function update($id_gallery)
	{
		$gallery = $this->gallery_model->detail($id_gallery);
		$listDivisi = $this->db->get('divisi')->result();

		//validasi
		$v = $this->form_validation;
		$v->set_rules('judul_gallery', 'Judul Gambar', 'required', array('required' => 'Judul gambar harus diisi'));
		$v->set_rules('keterangan_gallery', 'Keterangan Gambar', 'required', array('required' => 'Keterangan harus diisi'));

		if ($v->run()) {

			//kalau ada gambar
			if (!empty($_FILES['gambar']['name'])) {

				$fileName = 'gallery_' . time() . '.' . str_replace('image/', '', $_FILES["gambar"]['type']);

				$config['upload_path'] 		= './assets/upload/image/';  //lokasi folder upload
				$config['allowed_types'] 	= 'gif|jpg|jpeg|png|svg|tiff'; //format file yang di-upload
				$config['max_size']			= '12000'; // KB	
				// $config['max_width']            = 1366;
				// $config['max_height']           = 768;
				$config['file_name']        = $fileName;
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$data = array(
						'title' 	=> 'Halaman Edit Gambar',
						'isi' 		=> 'admin_v2/gallery/edit',
						'gallery'	=> $gallery,
						'divisi'	=> $listDivisi,
						'error' 	=>  $this->upload->display_errors()
					);
					$this->load->view('admin_v2/layout/wrapper', $data);

					// Masuk database 
				} else {

					//hapus gambar
					if ($gallery->gambar != "") {
						unlink('./assets/upload/image/' . $gallery->gambar);
					}
					//end hapus gambar

					$i = $this->input;
					$data = array(
						'id_gallery'			=> $id_gallery,
						'judul_gallery'			=> $i->post('judul_gallery'),
						'keterangan_gallery'	=> $i->post('keterangan_gallery'),
						'gambar'				=> $fileName,
						'tanggal_acara'			=>  strtotime($i->post('tanggal_acara')),
						'gallery_divisi'		=> $i->post('gallery_divisi'),
						'status_gallery'		=> $i->post('status_gallery'),
						'id_user'				=> $this->session->userdata('id'),
					);

					$this->gallery_model->update($data);
					$this->session->set_flashdata('sukses', 'Gambar telah diedit');
					redirect(base_url('admin/gallery'));
				}
			} else {
				//tanpa ganti gambar
				$i = $this->input;
				$data = array(
					'id_gallery'			=> $id_gallery,
					'judul_gallery'			=> $i->post('judul_gallery'),
					'keterangan_gallery'	=> $i->post('keterangan_gallery'),
					'tanggal_acara'			=>  strtotime($i->post('tanggal_acara')),
					'gallery_divisi'		=> $i->post('gallery_divisi'),
					'status_gallery'		=> $i->post('status_gallery'),
					'id_user'				=> $this->session->userdata('id'),
				);

				$this->gallery_model->update($data);
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
                    title: 'Berhasil mengubah data gambar',
                    type: 'success',
                });
            });
            </script>");
				redirect(base_url('admin/gallery'));
			}
		}
		// End masuk database

		$data = array(
			'title'  => 'Halaman Edit Gambar',
			'isi'	 => 'admin_v2/gallery/edit',
			'divisi'	=> $listDivisi,
			'gallery' => $gallery
		);
		$this->load->view('admin_v2/layout/wrapper', $data);
	}

	public function delete($id_gallery)
	{
		$gallery = $this->gallery_model->detail($id_gallery);

		//hapus gambar
		if ($gallery->gambar != "") {
			unlink('./assets/upload/image/' . $gallery->gambar);
		}
		//end hapus gambar

		$data = array('id_gallery' => $id_gallery,);
		$this->gallery_model->delete($data);
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
                    title: 'Gambar telah dihapus',
                    type: 'success',
                });
            });
            </script>");
		redirect('admin/gallery');
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
