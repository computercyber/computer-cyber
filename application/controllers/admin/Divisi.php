<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('divisi_model');
		$this->load->model('konfigurasi_model');
	}

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

		if ($this->upload->do_upload('gambar_divisi')) {
			return $this->upload->data("file_name");
		}

		return true;
	}

	public function index()
	{
		$divisi = $this->divisi_model->listing();

		// user login
		$id_user = $this->session->userdata('id');
		$user_login = $this->user_model->detail($id_user);
		$site_config = $this->konfigurasi_model->listing();

		$data = array(
			'title' => 'Halaman Divisi',
			'isi'	=> 'admin_v2/divisi/list',
			'site_config' => $site_config,
			'user_login' => $user_login,
			'divisi' => $divisi
		);
		// $this->load->view('admin_v2/layout/wrapper', $data);
		$this->load->view('admin_v2/layout/head', $data);
		$this->load->view('admin_v2/layout/header', $data);
		$this->load->view('admin_v2/layout/nav', $data);
		$this->load->view('admin_v2/divisi/list', $data);
		$this->load->view('admin_v2/layout/footer', $data);
	}

	public function add()
	{
		// user login
		$id_user = $this->session->userdata('id');
		$user_login = $this->user_model->detail($id_user);
		$site_config = $this->konfigurasi_model->listing();

		//validasi
		$v = $this->form_validation;
		$v->set_rules('nama_divisi', 'Nama Divisi', 'required|is_unique[divisi.nama_divisi]', array(
			'required' => 'Nama Divisi harus diisi',
			'is_unique' => 'Nama Divisi <strong>' . $this->input->post('nama_divisi') . '</strong> sudah digunakan'
		));
		$v->set_rules('keterangan_divisi', 'Keterangan Divisi', 'required', array('required' => 'Keterangan Divisi Harus diisi'));

		if ($v->run()) {

			$fileName = 'divisi_logo_' . time() . '.' . str_replace('image/', '', $_FILES["gambar_divisi"]['type']);

			$config['upload_path'] 		= './assets/upload/image/';  //lokasi folder upload
			$config['allowed_types'] 	= 'gif|jpg|jpeg|png|svg|tiff'; //format file yang di-upload
			$config['max_size']			= '12000'; // KB	
			$config['file_name']        = $fileName;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar_divisi')) {
				$data = array(
					'title' 	=> 'Halaman Tambah Divisi',
					'isi' 		=> 'admin_v2/divisi/tambah',
					'site_config' => $site_config,
					'user_login' => $user_login,
					'error' 	=>  $this->upload->display_errors()
				);
				// $this->load->view('admin_v2/layout/wrapper', $data);
				$this->load->view('admin_v2/layout/head', $data);
				$this->load->view('admin_v2/layout/header', $data);
				$this->load->view('admin_v2/layout/nav', $data);
				$this->load->view('admin_v2/divisi/tambah', $data);
				$this->load->view('admin_v2/layout/footer', $data);

				// Masuk database 
			} else {
				// $upload_data				= array('uploads' => $this->upload->data());
				// // Image Editor
				// $config['image_library']	= 'gd2';
				// $config['source_image'] 	= './assets/upload/image/' . 'divisi_logo_' . time();
				// $config['create_thumb'] 	= TRUE;
				// $config['quality'] 			= "100%";
				// $config['maintain_ratio'] 	= TRUE;
				// $config['width'] 			= 360; // Pixel
				// $config['height'] 			= 360; // Pixel
				// $config['x_axis'] 			= 0;
				// $config['y_axis'] 			= 0;
				// $config['thumb_marker'] 	= '';
				// $this->load->library('image_lib', $config);
				// $this->image_lib->resize();

				$i = $this->input;
				$data = array(
					'nama_divisi'			=> $i->post('nama_divisi'),
					'keterangan_divisi'		=> $i->post('keterangan_divisi'),
					'gambar_divisi'			=> $fileName,
				);

				$this->divisi_model->add($data);
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
						title: 'Divisi berhasil ditambah',
						type: 'success',
					});
				});
				</script>");
				redirect(base_url('admin/divisi'));
			}
		}
		// End masuk database

		$data = array(
			'title' => 'Halaman Tambah Divisi',
			'isi'   => 'admin_v2/divisi/tambah',
			'site_config' => $site_config,
			'user_login' => $user_login,
		);
		// $this->load->view('admin_v2/layout/wrapper', $data);
		$this->load->view('admin_v2/layout/head', $data);
		$this->load->view('admin_v2/layout/header', $data);
		$this->load->view('admin_v2/layout/nav', $data);
		$this->load->view('admin_v2/divisi/tambah', $data);
		$this->load->view('admin_v2/layout/footer', $data);
	}

	public function update($id_divisi)
	{
		$divisi = $this->divisi_model->admin_detail($id_divisi);
		// user login
		$id_user = $this->session->userdata('id');
		$user_login = $this->user_model->detail($id_user);
		$site_config = $this->konfigurasi_model->listing();

		$v = $this->form_validation;
		$v->set_rules('nama_divisi', 'Nama Divisi', 'required', array('required' => 'Nama Divisi harus diisi'));
		$v->set_rules('keterangan_divisi', 'Keterangan Divisi', 'required', array('required' => 'Keterangan Divisi Harus diisi'));

		if ($v->run()) {

			//kalau ada gambar
			if (!empty($_FILES['gambar_divisi']['name'])) {

				$fileName = 'divisi_logo_' . time() . '.' . str_replace('image/', '', $_FILES["gambar_divisi"]['type']);

				$config['upload_path'] 		= './assets/upload/image/';  //lokasi folder upload
				$config['allowed_types'] 	= 'gif|jpg|png|svg|tiff'; //format file yang di-upload
				$config['file_name']        = $fileName;
				$config['max_size']			= '12000'; // KB	
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar_divisi')) {
					$data = array(
						'title' 	=> 'Halaman Edit Divisi',
						'isi' 		=> 'admin_v2/divisi/edit',
						'divisi'	=> $divisi,
						'site_config' => $site_config,
						'user_login' => $user_login,
						'error' 	=>  $this->upload->display_errors()
					);
					// $this->load->view('admin_v2/layout/wrapper', $data);
					$this->load->view('admin_v2/layout/head', $data);
					$this->load->view('admin_v2/layout/header', $data);
					$this->load->view('admin_v2/layout/nav', $data);
					$this->load->view('admin_v2/divisi/edit', $data);
					$this->load->view('admin_v2/layout/footer', $data);

					// Masuk database 
				} else {
					// $upload_data				= array('uploads' => $this->upload->data());
					// // Image Editor
					// $config['image_library']	= 'gd2';
					// $config['source_image'] 	= './assets/upload/image/' . 'divisi_logo_' . time();
					// $config['create_thumb'] 	= TRUE;
					// $config['quality'] 			= "100%";
					// $config['maintain_ratio'] 	= TRUE;
					// $config['width'] 			= 360; // Pixel
					// $config['height'] 			= 360; // Pixel
					// $config['x_axis'] 			= 0;
					// $config['y_axis'] 			= 0;
					// $config['thumb_marker'] 	= '';
					// $this->load->library('image_lib', $config);
					// $this->image_lib->resize();

					//hapus gambar
					if (file_exists($file = FCPATH . '/assets/upload/image/' . $divisi->gambar_divisi)) {
						unlink($file);
					}
					// if ($divisi->gambar_divisi != "") {
					// 	unlink('./assets/upload/image/original/divisi/' . $divisi->gambar_divisi);
					// 	unlink('./assets/upload/image/thumbs/divisi/' . $divisi->gambar_divisi);
					// }
					//end hapus gambar

					$i = $this->input;
					$data = array(
						'id_divisi'				=> $id_divisi,
						'nama_divisi'			=> $i->post('nama_divisi'),
						'keterangan_divisi'		=> $i->post('keterangan_divisi'),
						'gambar_divisi'			=> $fileName,
					);

					$this->divisi_model->update($data);
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
						title: 'Data divisi telah diubah',
						type: 'success',
					});
				});
				</script>");
					redirect(base_url('admin/divisi'));
				}
			} else {
				$i = $this->input;
				$data = array(
					'id_divisi'				=> $id_divisi,
					'nama_divisi'			=> $i->post('nama_divisi'),
					'keterangan_divisi'		=> $i->post('keterangan_divisi')
				);

				$this->divisi_model->update($data);
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
						title: 'Data divisi telah diubah',
						type: 'success',
					});
				});
				</script>");
				redirect(base_url('admin/divisi'));
			}
		}
		// End masuk database

		$data = array(
			'title' => 'Halaman Edit Divisi',
			'isi'	=> 'admin_v2/divisi/edit',
			'divisi' => $divisi,
			'site_config' => $site_config,
			'user_login' => $user_login
		);
		// $this->load->view('admin_v2/layout/wrapper', $data);
		$this->load->view('admin_v2/layout/head', $data);
		$this->load->view('admin_v2/layout/header', $data);
		$this->load->view('admin_v2/layout/nav', $data);
		$this->load->view('admin_v2/divisi/edit', $data);
		$this->load->view('admin_v2/layout/footer', $data);
	}

	public function delete($id_divisi)
	{
		$divisi = $this->divisi_model->detail($id_divisi);

		//hapus gambar 
		if (file_exists($file = FCPATH . '/assets/upload/image/' . $divisi->gambar_divisi)) {
			unlink($file);
		}
		// if ($divisi->gambar_divisi != "") {
		// 	unlink('./assets/upload/image/' . $divisi->gambar_divisi);
		// }
		//end hapus gambar


		$data = array('id_divisi' => $id_divisi);
		$this->divisi_model->delete($data);

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
						title: 'Divisi telah dihapus',
						type: 'success',
					});
				});
				</script>");
		redirect('admin/divisi');
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */
