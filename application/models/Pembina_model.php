<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembina_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function admin_listing()
    {
        $query = $this->db->get('pembina');
        return $query->result();
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */