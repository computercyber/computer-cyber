<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function master()
    {
        // if ($this->input->get('id') != date('d')) {
        //     redirect('oops');
        // } else {
        //     $date_encrypt = time();
        //     $token_session = sha1('admin' . $date_encrypt);
        //     $this->session->set_userdata('key', $date_encrypt);
        //     redirect('auth/login?session=' . $token_session);
        // }

        $date_encrypt = time();
        $token_session = sha1('admin' . $date_encrypt);
        $this->session->set_userdata('key', $date_encrypt);
        redirect('auth/login?session=' . $token_session);
    }

    public function login()
    {
        $get_token_session = $this->input->get('session');

        if ($get_token_session == null) {
            redirect('oops');
        } elseif ($get_token_session != sha1('admin' . $this->session->userdata('key'))) {
            redirect('oops');
        }

        if ($this->session->userdata('key') == $this->session->userdata('key')) {
            $data = array(
                'title' => 'Login Administrator',
            );
            $this->load->view('admin/login_view', $data);

            $this->session->unset_userdata('key');
        } else {
            redirect('oops');
        }
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */