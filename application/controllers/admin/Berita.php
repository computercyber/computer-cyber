<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
	}

	public function index()
	{
		$berita = $this->berita_model->admin_listing("berita");
		$data = array(
			'title' => 'Halaman Berita',
			'isi'   => 'admin_v2/berita/list',
			'berita' => $berita
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

			$config['upload_path'] 		= './assets/upload/image/';  //lokasi folder upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg|tiff'; //format file yang di-upload
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'title' 	=> 'Halaman Tambah Berita',
					'isi' 		=> 'admin/berita/tambah',
					'error' 	=>  $this->upload->display_errors()
				);
				$this->load->view('admin/layout/wrapper', $data);

				// Masuk database 
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 360; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$data = array(
					'judul'			=> $i->post('judul'),
					'isi'			=> $i->post('isi'),
					'gambar'		=> $upload_data['uploads']['file_name'],
					'tanggal'		=> $i->post('tanggal'),
					'status_berita'	=> $i->post('status_berita'),
					'jenis_berita'	=> $i->post('jenis_berita'),
					'id_user'		=> $this->session->userdata('id'),
				);

				$this->berita_model->add($data);
				$this->session->set_flashdata('sukses', 'Berita telah ditambah');
				redirect(base_url('admin/berita'));
			}
		}
		// End masuk database

		$data = array('title' => 'Halaman Tambah Berita', 'isi' => 'admin/berita/tambah');
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function update($id_berita)
	{
		$berita = $this->berita_model->admin_berita_detail($id_berita, "berita");

		//validasi
		$v = $this->form_validation;
		$v->set_rules('judul', 'Judul', 'required', array('required' => 'Judul Harus diisi'));
		$v->set_rules('isi', 'isi', 'required', array('required' => 'Isi Harus diisi'));

		if ($v->run()) {
			//kalau ada gambar
			if (!empty($_FILES['gambar']['name'])) {

				$config['upload_path'] 		= './assets/upload/image/';  //lokasi folder upload
				$config['allowed_types'] 	= 'gif|jpg|png|svg|tiff'; //format file yang di-upload
				$config['max_size']			= '12000'; // KB	
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$data = array(
						'title' 	=> 'Halaman Edit Berita',
						'isi' 		=> 'admin_v2/berita/edit',
						'berita'	=> $berita,
						'error' 	=>  $this->upload->display_errors()
					);
					$this->load->view('admin_v2/layout/wrapper', $data);

					// Masuk database 
				} else {
					$upload_data				= array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
					$config['new_image'] 		= './assets/upload/image/thumbs/';
					$config['create_thumb'] 	= TRUE;
					$config['quality'] 			= "100%";
					$config['maintain_ratio'] 	= TRUE;
					$config['width'] 			= 360; // Pixel
					$config['height'] 			= 360; // Pixel
					$config['x_axis'] 			= 0;
					$config['y_axis'] 			= 0;
					$config['thumb_marker'] 	= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					//hapus gambar lama

					if ($berita->gambar != "") {
						unlink('./assets/upload/image/' . $berita->gambar);
						unlink('./assets/upload/image/thumbs/' . $berita->gambar);
					}

					//end hapus gambar lama

					$i = $this->input;
					$data = array(
						'id_berita'		=> $id_berita,
						'judul'			=> $i->post('judul'),
						'isi'			=> $i->post('isi'),
						'gambar'		=> $upload_data['uploads']['file_name'],
						'tanggal'		=> $i->post('tanggal'),
						'status_berita'	=> $i->post('status_berita'),
						'jenis_berita'	=> $i->post('jenis_berita'),
						'id_user'		=> $this->session->userdata('id'),
					);

					$this->berita_model->update($data);
					$this->session->set_flashdata('sukses', 'Berita telah diedit');
					redirect(base_url('admin/berita'));
				}
			} else {
				//update tanpa ganti gambar
				$i = $this->input;
				$data = array(
					'id_berita'		=> $id_berita,
					'judul'			=> $i->post('judul'),
					'isi'			=> $i->post('isi'),
					'tanggal'		=> $i->post('tanggal'),
					'status_berita'	=> $i->post('status_berita'),
					'jenis_berita'	=> $i->post('jenis_berita'),
					'id_user'		=> $this->session->userdata('id'),
				);

				$this->berita_model->update($data);
				$this->session->set_flashdata('sukses', 'Berita telah diedit');
				redirect(base_url('admin/berita'));
			}
		}
		// End masuk database

		$data = array('title' => 'Halaman Edit Berita', 'isi' => 'admin_v2/berita/edit', 'berita' => $berita);
		$this->load->view('admin_v2/layout/wrapper', $data);
	}

	public function delete($id_berita)
	{
		$berita = $this->berita_model->detail($id_berita);

		//hapus gambar
		if ($berita->gambar != "") {
			unlink('./assets/upload/image/' . $berita->gambar);
			unlink('./assets/upload/image/thumbs/' . $berita->gambar);
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
			$config['upload_path'] = './assets/upload/image/original/berita/';
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
				$config['source_image'] = './assets/upload/image/original/berita/' . $data['file_name'];
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '100%';
				$config['width'] = 1360;
				$config['height'] = 720;
				$config['create_thumb']     = FALSE;
				$config['new_image'] = './assets/upload/image/thumbs/berita/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'assets/upload/image/original/berita/' . $data['file_name'];
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
