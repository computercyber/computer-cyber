<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function engine()
    {
        $data = array(
            'title' => 'Halaman Engine Information',
            'isi' => 'admin_v2/settings/engine',
        );
        $this->load->view('admin_v2/layout/wrapper', $data);
    }

    public function database($type = null, $table = null)
    {
        $get_type = urldecode(decrypt_url($type));
        $get_table = decrypt_url($table);

        if ($get_type != null) {
            if ($get_type == 'backup') {
                // Load the DB utility class
                $this->load->dbutil();

                // Backup your entire database and assign it to a variable


                $backup = &$this->dbutil->backup();

                // Load the file helper and write the file to your server

                $this->load->helper('file');

                write_file('/path/to/cl_cc_backup.sql', $backup);

                // Load the download helper and send the file to your desktop

                $this->load->helper('download');

                sleep(2);

                force_download($this->db->database . '_backup_' . date('d-M-Y') . '.sql', $backup);
            } else if ($get_type == 'truncate') {

                $this->db->truncate($get_table);
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
                        title: 'Tabel " . $get_table . " telah dikosongkan',
                        type: 'success',
                    });
                });
                </script>");
                redirect('admin/settings/database');
            }
        } else {
            $data = array(
                'title' => 'Halaman Database Information',
                'isi' => 'admin_v2/settings/database',
            );
            $this->load->view('admin_v2/layout/wrapper', $data);
        }
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */