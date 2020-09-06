<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model');
		$this->load->model('konfigurasi_model');

		//relasi dengan...
		$this->load->model('divisi_model');
		$this->load->model('jabatan_model');
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

		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		}

		return true;
	}


	public function index()
	{
		// user login
		$id_user = $this->session->userdata('id');
		$user_login = $this->user_model->detail($id_user);


		// get filetr
		$status_filter = $this->input->get('status');
		$tahun_filter = $this->input->get('tahun');
		$jurusan_filter = $this->input->get('jurusan');
		$divisi_filter = $this->input->get('divisi');


		$site_config = $this->konfigurasi_model->listing();
		$anggota = $this->anggota_model->listing($status_filter, $tahun_filter, $jurusan_filter, $divisi_filter);
		$divisi = $this->divisi_model->listing();
		$jabatan = $this->jabatan_model->listing();
		$jurusan = $this->jurusan_model->listing()->result();

		//validasi
		$v = $this->form_validation;
		$v->set_rules('nama_anggota', 'Nama Anggota', 'required', array('required' => 'Nama Harus diisi'));
		$v->set_rules('nim', 'NIM', 'required|is_unique[anggota.nim]', array('required' => 'Nim Harus di Isi', 'is_unique' => 'NIM <strong>' . $this->input->post('nim') . '</strong> sudah digunakan'));
		$v->set_rules('tahun_masuk_anggota', 'Tahun Masuk Anggota', 'required|numeric', array('required' => 'Tahun Masuk Anggota Harus di Isi'));
		// $v->set_rules('jenis_kelamin_anggota', 'Jenis Kelamin', 'required', array('required' => 'Jenis Kelamin harus diisi'));
		$v->set_rules('email_anggota', 'Email Anggota', 'required|valid_email|is_unique[anggota.email_anggota]', array('required' => 'Email Harus di Isi', 'valid_email' => 'Email tidak valid', 'is_unique' => 'Email <strong>' . $this->input->post('email_anggota') . '</strong> sudah digunakan'));
		$v->set_rules('jurusan', 'Jurusan', 'required', array('required' => 'Jurusan Harus di Isi'));
		// $v->set_rules('no_hp', 'no_hp', 'required|numeric', array('required' => 'No Hp harus diisi'));
		// $v->set_rules('status_anggota', 'Status Anggota', 'required', array('required' => 'Status Anggota Harus di Isi'));
		$v->set_rules('id_divisi', 'Divisi', 'required', array('required' => 'Divisi Harus di Isi'));
		// $v->set_rules('id_jabatan', 'Jabatan', 'required', array('required' => 'Jabatan Harus di Isi'));
		// $v->set_rules('alamat_anggota', 'Alamat Anggota', 'required', array('required' => 'Alamat Harus di Isi'));

		if ($v->run()) {

			if (!empty($_FILES["gambar"]["name"])) {
				$gambarAnggota = 'anggota_' . time() . '.' . str_replace('image/', '', $_FILES["gambar"]['type']);
			} else {
				$gambarAnggota = "profile_placeholder.png";
			};

			$this->_uploadImage($gambarAnggota);



			$i = $this->input;
			$data = array(
				'nama_anggota'			=> $i->post('nama_anggota'),
				'nim'					=> $i->post('nim'),
				'tahun_masuk_anggota' => $i->post('tahun_masuk_anggota'),
				'tanggal_lahir'			=> $i->post('tanggal_lahir'),
				'jenis_kelamin_anggota' => $i->post('jenis_kelamin_anggota'),
				'email_anggota'			=> $i->post('email_anggota'),
				'jurusan'				=> $i->post('jurusan'),
				'no_hp'					=> $i->post('no_hp'),
				'gambar'				=> $gambarAnggota,
				'status_anggota'		=> $i->post('status_anggota'),
				'is_approved'			=> 1,
				'id_divisi'             => $i->post('id_divisi'),
				'id_jabatan'			=> $i->post('id_jabatan'),
				'alamat_anggota'		=> $i->post('alamat_anggota')
			);

			$this->anggota_model->tambah($data);
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
						title: 'Anggota berhasil ditambah',
						type: 'success',
					});
            	});
            	</script>");
			redirect(base_url('admin/anggota'));
		}
		// End masuk database

		$data = array(
			'title' => 'Halaman Anggota',
			'isi' => 'admin_v2/anggota/list',
			'anggota' => $anggota,
			'divisi'  => $divisi,
			'jabatan' => $jabatan,
			'jurusan' => $jurusan,
			'site_config' => $site_config,
			'user_login' => $user_login
		);
		// $this->load->view('admin_v2/layout/wrapper', $data);

		$this->load->view('admin_v2/layout/head', $data);
		$this->load->view('admin_v2/layout/header', $data);
		$this->load->view('admin_v2/layout/nav', $data);
		$this->load->view('admin_v2/anggota/list', $data);
		$this->load->view('admin_v2/layout/footer', $data);
	}

	public function detail($id_anggota)
	{
		$anggota = $this->anggota_model->detail($id_anggota);
		$data = array(
			'title' => 'Halaman Profil',
			'isi'	=> 'admin_v2/anggota/detail',
			'anggota'	=> $anggota
		);
		$this->load->view('admin_v2/layout/wrapper', $data);
	}

	public function update($id_anggota)
	{
		// user logina
		$id_user = $this->session->userdata('id');
		$user_login = $this->user_model->detail($id_user);

		$site_config = $this->konfigurasi_model->listing();
		$divisi = $this->divisi_model->listing();
		$anggota = $this->anggota_model->detail($id_anggota);
		$jabatan = $this->jabatan_model->listing();

		//validasi


		if ($this->input->post('nama_anggota')) {
			//kalau ada gambar
			if (!empty($_FILES['gambar']['name'])) {

				$gambarAnggota = 'anggota_' . time() . '.' . str_replace('image/', '', $_FILES['gambar']['type']);

				if ($anggota->gambar != 'profile_placeholder.png') {
					if (file_exists($file = FCPATH . '/assets/upload/image/' . $anggota->gambar)) {
						unlink($file);
					}
				}

				$this->_uploadImage($gambarAnggota);

				//end hapus gambar lama

				$i = $this->input;
				$data = array(
					'id_anggota'			=> $id_anggota,
					'nama_anggota'			=> $i->post('nama_anggota'),
					'nim'					=> $i->post('nim'),
					'gambar'				=> $gambarAnggota,
					'tahun_masuk_anggota' 	=> $i->post('tahun_masuk_anggota'),
					'tanggal_lahir'			=> $i->post('tanggal_lahir'),
					'alamat_anggota'		=> $i->post('alamat_anggota'),
					'no_hp'					=> $i->post('no_hp'),
					'jurusan'				=> $i->post('jurusan'),
					'id_jabatan'			=> $i->post('id_jabatan'),
					'status_anggota'		=> $i->post('status_anggota'),
					'email_anggota'			=> $i->post('email_anggota'),
					'jenis_kelamin_anggota' => $i->post('jenis_kelamin_anggota'),
					'id_divisi'             => $i->post('id_divisi')
				);
			} else {


				//tanpa update gambar
				$i = $this->input;
				$data = array(
					'id_anggota'			=> $id_anggota,
					'nama_anggota'			=> $i->post('nama_anggota'),
					'nim'					=> $i->post('nim'),
					'tanggal_lahir'			=> $i->post('tanggal_lahir'),
					'tahun_masuk_anggota'   => $i->post('tahun_masuk_anggota'),
					'alamat_anggota'		=> $i->post('alamat_anggota'),
					'no_hp'					=> $i->post('no_hp'),
					'jurusan'				=> $i->post('jurusan'),
					'id_jabatan'			=> $i->post('id_jabatan'),
					'status_anggota'		=> $i->post('status_anggota'),
					'email_anggota'			=> $i->post('email_anggota'),
					'jenis_kelamin_anggota' => $i->post('jenis_kelamin_anggota'),
					'id_divisi'             => $i->post('id_divisi')
				);
			}

			$this->anggota_model->update($data);
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
						title: 'Anggota berhasil diubah',
						type: 'success',
					});
				});
				</script>");
			redirect('admin/anggota');
		}
		// End masuk database

		$data = array(
			'title'   => 'Halaman Edit Anggota',
			'isi'     => 'admin_v2/anggota/update',
			'divisi'  => $divisi,
			'jabatan' => $jabatan,
			'site_config' => $site_config,
			'user_login' => $user_login,
			'anggota' => $anggota
		);

		// $this->load->view('admin_v2/layout/wrapper', $data);
		$this->load->view('admin_v2/layout/head', $data);
		$this->load->view('admin_v2/layout/header', $data);
		$this->load->view('admin_v2/layout/nav', $data);
		$this->load->view('admin_v2/anggota/update', $data);
		$this->load->view('admin_v2/layout/footer', $data);
	}

	public function delete($id_anggota)
	{
		$anggota = $this->anggota_model->detail($id_anggota);

		//hapus gambar

		if (file_exists($file = FCPATH . '/assets/upload/image/' . $anggota->gambar)) {
			unlink($file);
		}

		//end hapus gambar

		$data = array('id_anggota' => $id_anggota);
		$this->anggota_model->delete($data);
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
				title: 'Anggota telah dihapus',
				type: 'success',
			});
		});
		</script>");
		redirect('admin/anggota');
	}

	public function setujui_anggota()
	{
		$this->db->update('anggota', ['is_approved' => 1, 'status_anggota' => 'aktif'], ['is_approved' => 0]);

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
				title: 'Anggota baru telah disahkan status keanggotaannya',
				type: 'success',
			});
		});
		</script>");
		redirect('admin/anggota');
	}

	// AJAX REQUEST
	public function check_nim()
	{
		$check_nim_from_input = $this->db->get_where('anggota', array(
			'nim' => $this->input->post('nim')
		))->row();

		if ($check_nim_from_input) {
			echo json_encode(array(
				'status' 	=> 0,
				'nim'		=> $this->input->post('nim'),
				'message' 	=> 'sudah dipakai'
			));
		} else {
			echo json_encode(array(
				'status' 	=> 1,
				'nim'		=> $this->input->post('nim'),
				'message' 	=> 'belum dipakai'
			));
		}
	}



	public function update_profile()
	{
		$id_anggota = $this->input->post('id_anggota');
		$dataAnggota = $this->db->get_where('anggota', [
			'id_anggota' => $id_anggota
		])->row();

		if (!empty($_FILES["gambar"]["name"])) {
			$gambarAnggota = 'anggota_' . time() . '.' . str_replace('image/', '', $_FILES["gambar"]['type']);
		} else {
			$gambarAnggota = "profile_placeholder.png";
		};

		$this->_uploadImage($gambarAnggota);

		// hapus gambar
		if ($dataAnggota->gambar != 'profile_placeholder.png') {
			if (file_exists($file = FCPATH . '/assets/upload/image/' . $dataAnggota->gambar)) {
				unlink($file);
			}

			$this->db->set('gambar', 'profile_placeholder.png');
			$this->db->where('id_anggota', $id_anggota);
			$this->db->update('anggota');
		}
	}
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */