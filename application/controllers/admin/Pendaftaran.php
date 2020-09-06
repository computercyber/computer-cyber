<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');
require_once FCPATH . 'vendor/dompdf/dompdf/src/Dompdf.php';
require_once FCPATH . 'vendor/dompdf/dompdf/src/Options.php';
require_once FCPATH . 'vendor/dompdf/dompdf/autoload.inc.php';

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use \Dompdf\Dompdf;
use Dompdf\Options;

// End load library


class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftaran_model');
    }

    public function index()
    {
        $pendaftaran = $this->Pendaftaran_model->listing();

        $data = array('title' => 'Halaman List Pendaftar', 'isi' => 'admin_v2/pendaftaran/list', 'pendaftaran' => $pendaftaran);
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function konfigurasi()
    {
        $pendaftaran = $this->Pendaftaran_model->listing();
        $konfigurasi_pendaftaran = $this->Pendaftaran_model->getConfigRegister()->row_array();
        $konfigurasi_pengumuman = $this->Pendaftaran_model->getConfigRegister()->row_array();

        // $this->form_validation->set_rules('tanggal_pendaftaran_mulai', 'Tanggal Pendaftaran', 'required', array('required' => 'Tanggal Pendafataran Mulai harus diisi'));
        // $this->form_validation->set_rules('tanggal_pendaftaran_selesai', 'Tanggal Pendaftaran', 'required', array('required' => 'Tanggal Pendafataran selesai harus diisi'));

        // $this->form_validation->set_rules('tanggal_pengumuman_mulai', 'Tanggal Pengumuman', 'required', array('required' => 'Tanggal Pengumuman Mulai harus diisi'));
        // $this->form_validation->set_rules('tanggal_pengumuman_selesai', 'Tanggal Pengumuman', 'required', array('required' => 'Tanggal Pengumuman selesai harus diisi'));


        $type = htmlspecialchars($this->input->post('type', TRUE));

        echo $type;
        // die;

        // if ($this->form_validation->run()) {


        if ($type == 'pendaftaran') {
            $tanggal_pendaftaran_mulai = htmlspecialchars($this->input->post('tanggal_pendaftaran_mulai', TRUE));
            $tanggal_pendaftaran_selesai = htmlspecialchars($this->input->post('tanggal_pendaftaran_selesai', TRUE));

            // echo $type;
            // die;

            $this->db->where('id_konfigurasi', 1);
            $this->db->update('konfigurasi_pendaftaran', [
                'tanggal_mulai' => $tanggal_pendaftaran_mulai,
                'tanggal_selesai' => $tanggal_pendaftaran_selesai
            ]);

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
						title: 'Konfigurasi pendaftaran berhasil diubah',
						type: 'success',
					});
            	});
            	</script>");
            redirect('admin/pendaftaran/konfigurasi');
        } elseif ($type == 'pengumuman') {
            $tanggal_pengumuman_mulai = htmlspecialchars($this->input->post('tanggal_pengumuman_mulai', TRUE));
            $tanggal_pengumuman_selesai = htmlspecialchars($this->input->post('tanggal_pengumuman_selesai', TRUE));

            $this->db->where('id_konfigurasi', 1);
            $this->db->update('konfigurasi_pengumuman', [
                'tanggal_mulai' => $tanggal_pengumuman_mulai,
                'tanggal_selesai' => $tanggal_pengumuman_selesai
            ]);

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
                    title: 'Konfigurasi pengumuman berhasil diubah',
                    type: 'success',
                });
            });
            </script>");
            redirect('admin/pendaftaran/konfigurasi');
        }
        // } else {
        $data = array(
            'title' => 'Konfigurasi Web Pendaftaran',
            'isi' => 'admin_v2/pendaftaran/konfigurasi',
            'pendaftaran' => $pendaftaran,
            'konfigurasi_pendaftaran' => $konfigurasi_pendaftaran,
            'konfigurasi_pengumuman' => $konfigurasi_pengumuman
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
        // }
    }

    public function resetData()
    {
        $pendaftaran = $this->Pendaftaran_model->resetData();
        $this->session->set_flashdata('sukses', 'Data Berhasil di Reset');
        redirect('admin/pendaftaran');
    }

    public function detail($id_peserta)
    {
        $get_id_peserta = urldecode(decrypt_url($id_peserta));

        $pendaftaran = $this->Pendaftaran_model->detail($get_id_peserta);
        $data = array(
            'title' => 'Halaman Detail Pendaftar',
            'isi' => 'admin_v2/pendaftaran/detail',
            'pendaftar' => $pendaftaran
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function delete($id_peserta)
    {
        $get_id_peserta = urldecode(decrypt_url($id_peserta));

        $pendaftaran = $this->Pendaftaran_model->delete($id_peserta);

        //hapus gambar
        // if ($pendaftaran->gambar != "") {
        //     unlink('./assets/upload/image/' . $anggota->gambar);
        // }
        //end hapus gambar

        $data = array('id_peserta' => $get_id_peserta);
        $this->Pendaftaran_model->delete($data);
        $this->session->set_flashdata('hapus_anggota', 'Anggota telah dihapus');
        redirect('admin/pendaftaran');
    }

    public function accept($id_peserta)
    {
        $get_id_peserta = urldecode(decrypt_url($id_peserta));

        $get_calon_anggota_from_db = $this->db->get_where('calon_anggota', array(
            'id_peserta' => $get_id_peserta
        ))->row();

        $get_tahun_angkatan = str_split($get_calon_anggota_from_db->nim, 2);

        $dataInsert = array(
            'nama_anggota'              => $get_calon_anggota_from_db->nama,
            'nim'                       => $get_calon_anggota_from_db->nim,
            'tahun_angkatan_anggota'    => '20' . $get_tahun_angkatan[0],
            'tahun_masuk_anggota'       => date('Y'),
            'tanggal_lahir'             => $get_calon_anggota_from_db->tanggal_lahir,
            'jenis_kelamin_anggota'     => $get_calon_anggota_from_db->jenis_kelamin,
            'jurusan'                   => $get_calon_anggota_from_db->jurusan,
            'email_anggota'             => $get_calon_anggota_from_db->email,
            'alamat_anggota'            => $get_calon_anggota_from_db->alamat,
            'no_hp'                     => $get_calon_anggota_from_db->no_hp,
            'gambar'                    => $get_calon_anggota_from_db->gambar,
            'status_anggota'            => 'aktif',
            'is_approved'                => 0,
            'id_divisi'                 => $get_calon_anggota_from_db->divisi,
            'id_jabatan'                => null,
        );

        $this->db->insert('anggota', $dataInsert);

        $get_anggota_from_db = $this->db->get_where('anggota', array(
            'nim'           => $get_calon_anggota_from_db->nim,
            'email_anggota' => $get_calon_anggota_from_db->email,
        ))->row();

        $dataAnggotaDiterima = array(
            'id_anggota_diterima' => $get_anggota_from_db->id_anggota,
            'status'              => 'diterima',
            'waktu_diterima'      => time()
        );

        $this->db->insert('anggota_diterima', $dataAnggotaDiterima);

        $this->session->set_flashdata('status', "<script>
		$(window).on('load', function() {
		$('#toast-add-new-member').toast('show');
		});
        </script>");
        $this->session->set_flashdata('nama_anggota', $get_calon_anggota_from_db->nama);
        redirect('admin/pendaftaran');
    }

    public function deny($id_peserta)
    {
        $get_id_peserta = urldecode(decrypt_url($id_peserta));

        $get_calon_anggota_from_db = $this->db->get_where('calon_anggota', array(
            'id_peserta' => $get_id_peserta
        ))->row();

        $get_anggota_from_db = $this->db->get_where('anggota', array(
            'nim'   => $get_calon_anggota_from_db->nim,
            'email_anggota' => $get_calon_anggota_from_db->email
        ))->row();

        $get_anggota_diterima_from_db = $this->db->get_where('anggota_diterima', array(
            'id_anggota_diterima' => $get_anggota_from_db->id_anggota
        ))->row();

        $this->db->delete('anggota', array(
            'nim'   => $get_calon_anggota_from_db->nim,
            'email_anggota' => $get_calon_anggota_from_db->email
        ));

        $this->db->delete('anggota_diterima', array(
            'id_anggota_diterima' => $get_anggota_from_db->id_anggota
        ));

        $this->session->set_flashdata('status', "<script>
		$(window).on('load', function() {
		$('#toast-deny-member').toast('show');
		});
        </script>");
        $this->session->set_flashdata('nama_anggota', $get_calon_anggota_from_db->nama);
        redirect('admin/pendaftaran');
    }

    public function export_pdf()
    {
        $data['calon_anggota'] = $this->Pendaftaran_model->getDataExport()->result();

        $dompdf = new \Dompdf\Dompdf();

        $view = $this->load->view('admin_v2/pendaftaran/pdf', $data, true);

        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Pendaftar Anggota Baru ' . date('Y'), array("Attachment" => true));
    }

    public function export_excel()
    {
        $data['calon_anggota'] = $this->Pendaftaran_model->getDataExport()->result();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->getProperties()->setCreator('Computer Cyber')
            ->setLastModifiedBy('Computer Cyber')
            ->setTitle('Pendaftar Anggota Baru ' . date('Y'))
            ->setSubject('Pendaftar')
            ->setDescription('Pendaftar Anggota Baru ' . date('Y'))
            ->setKeywords('')
            ->setCategory('list');

        $spreadsheet->setActiveSheetIndex(0);

        $spreadsheet->getActiveSheet()->setCellValue('B1', 'NAMA');
        $spreadsheet->getActiveSheet()->setCellValue('C1', 'NIM');
        $spreadsheet->getActiveSheet()->setCellValue('D1', 'E-MAIL');
        $spreadsheet->getActiveSheet()->setCellValue('E1', 'NO HP');
        $spreadsheet->getActiveSheet()->setCellValue('F1', 'JENIS KELAMIN');
        $spreadsheet->getActiveSheet()->setCellValue('G1', 'TANGGAL_LAHIR');
        $spreadsheet->getActiveSheet()->setCellValue('H1', 'JURUSAN');
        $spreadsheet->getActiveSheet()->setCellValue('I1', 'PENGALAMAN ORGANISASI');
        $spreadsheet->getActiveSheet()->setCellValue('J1', 'ALAMAT');
        $spreadsheet->getActiveSheet()->setCellValue('K1', 'ALASAN MASUK');
        $spreadsheet->getActiveSheet()->setCellValue('L1', 'DIVISI TUJUAN');
        $spreadsheet->getActiveSheet()->setCellValue('M1', 'TANGGAL DAFTAR');

        $i = 2;
        $no = 1;

        foreach ($data['calon_anggota'] as $a) {
            $spreadsheet->getActiveSheet()->setCellValue('A' . $i, $no++);
            $spreadsheet->getActiveSheet()->setCellValue('B' . $i, ucwords($a->nama));
            $spreadsheet->getActiveSheet()->setCellValue('C' . $i, $a->nim);
            $spreadsheet->getActiveSheet()->setCellValue('D' . $i, strtolower($a->email));
            $spreadsheet->getActiveSheet()->setCellValue('E' . $i, $a->no_hp);
            $spreadsheet->getActiveSheet()->setCellValue('F' . $i, $a->jenis_kelamin);
            $spreadsheet->getActiveSheet()->setCellValue('G' . $i, $a->tanggal_lahir);
            $spreadsheet->getActiveSheet()->setCellValue('H' . $i, $a->judul_jurusan);
            $spreadsheet->getActiveSheet()->setCellValue('I' . $i, $a->pengalaman_organisasi);
            $spreadsheet->getActiveSheet()->setCellValue('J' . $i, $a->alamat);
            $spreadsheet->getActiveSheet()->setCellValue('K' . $i, $a->alasan_masuk);
            $spreadsheet->getActiveSheet()->setCellValue('L' . $i, $a->nama_divisi);
            $spreadsheet->getActiveSheet()->setCellValue('M' . $i, $a->date_created);

            $i++;
        }



        $spreadsheet->getActiveSheet()->setTitle('Pendaftar Anggota Baru ' . date('Y'));

        $spreadsheet->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . 'Pendaftar Anggota Baru ' . date('Y') . '.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    // AJAX REQUEST 
    public function accept_ajax()
    {
        $get_id_peserta = $this->input->post('id_peserta');

        $get_calon_anggota_from_db = $this->db->get_where('calon_anggota', array(
            'id_peserta' => $get_id_peserta
        ))->row();

        $check_anggota_diterima = $this->db->get_where('anggota', array(
            'nim'           => $get_calon_anggota_from_db->nim,
            'email_anggota' => $get_calon_anggota_from_db->email,
        ))->row();

        if ($check_anggota_diterima) {
            $this->_deny_ajax($get_id_peserta);

            echo json_encode([
                'status'       => 0,
                'peserta'      => $get_calon_anggota_from_db->nama
            ]);
        } else {
            $get_tahun_angkatan = str_split($get_calon_anggota_from_db->nim, 2);

            // copy data to anggota
            $dataInsert = array(
                'nama_anggota'              => $get_calon_anggota_from_db->nama,
                'nim'                       => $get_calon_anggota_from_db->nim,
                'tahun_angkatan_anggota'    => '20' . $get_tahun_angkatan[0],
                'tahun_masuk_anggota'       => date('Y'),
                'tanggal_lahir'             => $get_calon_anggota_from_db->tanggal_lahir,
                'jenis_kelamin_anggota'     => $get_calon_anggota_from_db->jenis_kelamin,
                'jurusan'                   => $get_calon_anggota_from_db->jurusan,
                'email_anggota'             => $get_calon_anggota_from_db->email,
                'alamat_anggota'            => $get_calon_anggota_from_db->alamat,
                'no_hp'                     => $get_calon_anggota_from_db->no_hp,
                'gambar'                    => $get_calon_anggota_from_db->gambar,
                'status_anggota'            => 'calon',
                'is_approved'                => 0,
                'id_divisi'                 => $get_calon_anggota_from_db->divisi,
                'id_jabatan'                => null,
            );

            $this->db->insert('anggota', $dataInsert);

            // move photo profile
            // if (file_exists($file = 'http://localhost/register/uploads/img_member_candidate/' . $get_calon_anggota_from_db->gambar)) {
            //     copy($file,  FCPATH . '/assets/upload/image/' . $get_calon_anggota_from_db->gambar);
            // }

            get_mimes_from_url('http://localhost/register/uploads/img_member_candidate/' . $get_calon_anggota_from_db->gambar, $get_calon_anggota_from_db->gambar, FCPATH . '/assets/upload/image/');

            // $this->do_resize($get_calon_anggota_from_db->gambar);

            $get_anggota_from_db = $this->db->get_where('anggota', array(
                'nim'           => $get_calon_anggota_from_db->nim,
                'email_anggota' => $get_calon_anggota_from_db->email,
            ))->row();

            $dataAnggotaDiterima = array(
                'id_anggota_diterima' => $get_anggota_from_db->id_anggota,
                'status'              => 'diterima',
                'waktu_diterima'      => time()
            );

            $this->db->insert('anggota_diterima', $dataAnggotaDiterima);

            echo json_encode([
                'status'       => 1,
                'peserta'      => $get_calon_anggota_from_db->nama
            ]);
        }



        // $this->session->set_flashdata('status', "<script>
        // $(window).on('load', function() {
        // $('#toast-add-new-member').toast('show');
        // });
        // </script>");
        // $this->session->set_flashdata('nama_anggota', $get_calon_anggota_from_db->nama);
        // redirect('admin/pendaftaran');

    }

    public function do_resize($filename)
    {

        $source_path =  FCPATH . '/assets/upload/image/' . $filename;
        $target_path =  FCPATH . '/assets/upload/image/' . $filename;

        $config_manip = array(

            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            // 'quality'     => "100%",
            'width' => 400,
            'height' => 400
        );

        $this->image_lib->initialize($config_manip);
        $this->load->library('image_lib', $config_manip);


        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
            die();
        }
    }

    private function _deny_ajax($id_peserta)
    {
        $get_id_peserta = $id_peserta;

        $get_calon_anggota_from_db = $this->db->get_where('calon_anggota', array(
            'id_peserta' => $get_id_peserta
        ))->row();

        $get_anggota_from_db = $this->db->get_where('anggota', array(
            'nim'   => $get_calon_anggota_from_db->nim,
            'email_anggota' => $get_calon_anggota_from_db->email
        ))->row();

        $get_anggota_diterima_from_db = $this->db->get_where('anggota_diterima', array(
            'id_anggota_diterima' => $get_anggota_from_db->id_anggota
        ))->row();

        $this->db->delete('anggota', array(
            'nim'   => $get_calon_anggota_from_db->nim,
            'email_anggota' => $get_calon_anggota_from_db->email
        ));

        $this->db->delete('anggota_diterima', array(
            'id_anggota_diterima' => $get_anggota_from_db->id_anggota
        ));

        if (file_exists($file = FCPATH . '/assets/upload/image/' . $get_anggota_from_db->gambar)) {
            unlink($file);
        }

        echo json_encode([
            'status'       => 0,
            'peserta'      => $get_anggota_from_db->nama
        ]);
        // $this->session->set_flashdata('status', "<script>
        // $(window).on('load', function() {
        // $('#toast-deny-member').toast('show');
        // });
        // </script>");
        // $this->session->set_flashdata('nama_anggota', $get_calon_anggota_from_db->nama);
        // redirect('admin/pendaftaran');
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */