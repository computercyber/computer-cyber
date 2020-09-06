<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jabatan_model');
	}

	public function index()
	{
		$jabatan = $this->jabatan_model->listing();
		$this->form_validation->set_rules('nama_jabatan', 'Jabatan', 'required', array('required' => 'Jabatan Harus diisi'));
		$this->form_validation->set_rules('tahun_jabatan', 'Tahun Jabatan', 'required', array('required' => 'Tahun Jabatan Harus diisi'));

		if ($this->form_validation->run() == FALSE) {

			$data = array(
				'title' => 'Halaman Jabatan',
				'isi'	=> 'admin_v2/jabatan/list',
				'jabatan' => $jabatan
			);
			$this->load->view('admin_v2/layout/wrapper', $data);
		} else {

			$data = array(
				'nama_jabatan' => $this->input->post('nama_jabatan'),
				'tahun_jabatan' => $this->input->post('tahun_jabatan')
			);

			$this->jabatan_model->add($data);
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
					title: 'Jabatan berhasil ditambah',
					type: 'success',
				});
            });
            </script>");
			redirect('admin/jabatan');
		}
	}

	public function delete($id_jabatan)
	{
		$jabatan = $this->jabatan_model->detail($id_jabatan);
		$data = array(
			'id_jabatan' => $jabatan->id_jabatan
		);

		$this->jabatan_model->delete($data);
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
                title: 'Jabatan dihapus',
                type: 'success',
            });
		});
		</script>");
		redirect('admin/jabatan');
	}

	// AJAX REQUEST 
	public function get_data_position()
	{
		echo json_encode($this->db->get_where('jabatan', array(
			'id_jabatan' => $this->input->post('id')
		))->row_array());
	}

	public function update($id_jabatan)
	{
		$jabatan = $this->jabatan_model->detail($id_jabatan);
		$this->form_validation->set_rules('nama_jabatan', 'Jabatan', 'required', array('required' => 'Jabatan Harus diisi'));
		$this->form_validation->set_rules('tahun_jabatan', 'Tahun Jabatan', 'required', array('required' => 'Tahun Jabatan Harus diisi'));

		if ($this->form_validation->run() == FALSE) {

			$data = array(
				'isi' => 'admin_v2/jabatan/edit',
				'title' => 'Halaman Edit Jabatan',
				'jabatan' => $jabatan
			);

			$this->load->view('admin_v2/layout/wrapper', $data);
		} else {

			$data = array(
				'id_jabatan' => $id_jabatan,
				'nama_jabatan' => $this->input->post('nama_jabatan'),
				'tahun_jabatan' => $this->input->post('tahun_jabatan')
			);

			$this->jabatan_model->update($data);
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
					title: 'Jabatan berhasil diubah',
					type: 'success',
				});
            });
            </script>");
			redirect('admin/jabatan');
		}
	}
}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */