<?php 
$this->simple_login->cek_login();
$id_user=$this->session->userdata('id');
$user_login=$this->user_model->detail($id_user);
if($user_login->akses_level=="99") { 
	redirect('login/logout','refresh');
} else {
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');
}