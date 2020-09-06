<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{

    public function listing()
    {
        $this->db->select('*')
            ->from('jurusan_in_umrah')
            ->order_by('fakultas', 'desc');

        return $this->db->get();
    }
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */