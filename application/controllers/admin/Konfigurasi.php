<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Konfigurasi_model');
    }

    public function auto_emailer_agenda()
    {
        $this->Konfigurasi_model->listing()->row_array();
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */