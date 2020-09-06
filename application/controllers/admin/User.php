<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		//if($this->user_model->detail($this->session->userdata('id'))->akses_level=='21') { 
		$users = $this->user_model->listing();
		$data = array(
			'title' => 'Halaman Users',
			'isi'   => 'admin_v2/user/list',
			'users' => $users
		);
		$this->load->view('admin_v2/layout/wrapper', $data);
		// } else {
		// 	redirect('oops','refresh');
		// }
	}

	public function detail21($username)
	{
		if ($this->user_model->detail($this->session->userdata('id'))->akses_level == '99') {
			redirect('oops', 'refresh');
		} else {
			$users = $this->user_model->detail21($username);
			$data = array(
				'title' => 'Halaman Profil',
				'isi'	=> 'admin_v2/user/detail',
				'users'	=> $users,
				'username' => $username
			);
			$this->load->view('admin_v2/layout/wrapper', $data);
		}
	}

	public function add()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama User', 'required', array('required' => 'Nama user harus diisi'));
		$valid->set_rules('username', 'Username', 'required|is_unique[users.username]', array('required' => 'Nama user harus diisi', 'is_unique' => 'Username <strong>' . $this->input->post('username') . '</strong> sudah digunakan'));
		$valid->set_rules('email', 'Email', 'required', array('required' => 'Email harus diisi'));
		$valid->set_rules('password', 'Password', 'required|max_length[32]|min_length[6]', array('required' => 'Password harus diisi', 'max_lenght' => 'Password maksimal 32 karakter', 'min_length' => 'Password minimal 6 karakter'));

		if ($valid->run()) {

			$config['upload_path'] 		= './assets/upload/image/original/user/';  //lokasi folder upload
			$config['allowed_types'] 	= 'gif|jpg|jpeg|png|svg|tiff'; //format file yang di-upload
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'title'  => 'Halaman Tambah User',
					'isi  '  => 'admin/user/tambah',
					'error'  =>  $this->upload->display_errors()
				);
				$this->load->view('admin/layout/wrapper', $data);

				// Masuk database 
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/original/user' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/upload/image/thumbs/user/';
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

				$data = array(
					'gambar'		=> $upload_data['uploads']['file_name'],
					'nama' => $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => sha1($this->input->post('password')),
					'akses_level' => $this->input->post('akses_level'),
					'tanggal'		=> $this->input->post('tanggal')
				);

				$this->user_model->tambah($data);
				$this->session->set_flashdata('sukses', 'User telah ditambah');
				redirect(base_url('admin/user'));
			}
		}
		// End masuk database

		$data = array(
			'title'   => 'Halaman Tambah User',
			'isi'     => 'admin_v2/user/tambah'
		);
		$this->load->view('admin_v2/layout/wrapper', $data);
	}


	public function update($id_user)
	{
		$users = $this->user_model->detail($id_user);

		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama User', 'required', array('required' => 'Nama user harus diisi'));

		if ($valid->run()) {
			//kalau ada gambar
			if (!empty($_FILES['gambar']['name'])) {

				$config['upload_path'] 		= './assets/upload/image/original/user/';  //lokasi folder upload
				$config['allowed_types'] 	= 'gif|jpg|jpeg|png|svg|tiff'; //format file yang di-upload
				$config['max_size']			= '12000'; // KB	
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$data = array(
						'title'  => 'Halaman Edit User',
						'isi  '  => 'admin_v2/user/update',
						'users'	 => $users,
						'error'  =>  $this->upload->display_errors()
					);
					// $this->load->view('admin_v2/layout/wrapper', $data);
					echo $this->upload->display_errors();

					// Masuk database 
				} else {
					$upload_data				= array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/upload/image/original/user/' . $upload_data['uploads']['file_name'];
					$config['new_image'] 		= './assets/upload/image/thumbs/user/';
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

					if ($users->gambar != "") {
						unlink('./assets/upload/image/original/user/' . $users->gambar);
						unlink('./assets/upload/image/thumbs/user/' . $users->gambar);
					}

					//end hapus gambar lama

					$data = array(
						'id_user'			=> $id_user,
						'nama' => htmlspecialchars($this->input->post('nama', TRUE)),
						'email' => htmlspecialchars($this->input->post('email', TRUE)),
						'username' => htmlspecialchars($this->input->post('username', TRUE)),
						'akses_level' => htmlspecialchars($this->input->post('akses_level', TRUE)),
						'gambar'		=> $upload_data['uploads']['file_name'],
						'tanggal'		=> htmlspecialchars($this->input->post('tanggal', TRUE)),
						'update_password_at' => time()
					);

					if ($this->user_model->detail($this->session->userdata('id'))->akses_level == '21') {
						$this->user_model->update($data);
						$this->session->set_flashdata('sukses', 'User telah diedit');
						redirect(base_url('admin/user'));
					} else {
						$this->user_model->update($data);
						$this->session->set_flashdata('sukses', 'User telah diedit');
						redirect(base_url('admin/user/detail21/' . $users->username));
					}
				}
			} else {
				//tanpa update gambar
				$data = array(
					'id_user'			=> $id_user,
					'nama' => htmlspecialchars($this->input->post('nama', TRUE)),
					'email' => htmlspecialchars($this->input->post('email', TRUE)),
					'username' => htmlspecialchars($this->input->post('username', TRUE)),
					'akses_level' => htmlspecialchars($this->input->post('akses_level', TRUE)),
					'tanggal'		=> htmlspecialchars($this->input->post('tanggal', TRUE)),
					'update_password_at' => time()
				);

				if ($this->user_model->detail($this->session->userdata('id'))->akses_level == '21') {
					$this->user_model->update($data);
					$this->session->set_flashdata('sukses', 'User telah diedit');
					redirect(base_url('admin/user'));
				} else {
					$this->user_model->update($data);
					$this->session->set_flashdata('sukses', 'User telah diedit');
					redirect(base_url('admin/user/detail21/' . $users->username));
				}
			}
		} else {
			// End masuk database

			$data = array(
				'title'   => 'Halaman Edit User',
				'isi'     => 'admin_v2/user/update',
				'users'  => $users
			);
			$this->load->view('admin_v2/layout/wrapper', $data);
		}
	}

	public function delete($id_user)
	{
		if ($this->user_model->detail($this->session->userdata('id'))->akses_level == '21') {

			$users = $this->user_model->detail($id_user);

			//hapus gambar
			if ($users->gambar != "") {
				unlink('./assets/upload/image/original/user/' . $users->gambar);
				unlink('./assets/upload/image/thumbs/user/' . $users->gambar);
			}
			//end hapus gambar

			$data = array('id_user' => $id_user);
			$this->user_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data user telah dihapus');
			redirect('admin_v2/user', 'refresh');
		} else {
			redirect('oops', 'refresh');
		}
	}
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */