<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$data = array(
			'title' => $site->namaweb,
			'site' => $site,
			'title_sub' => 'Contact Us',
			'isi'	=> 'home/contact',
			'site' => $site
		);
		$this->load->view('layout/wrapper', $data);
	}

	// function sendMail() {
	//     $ci = get_instance();
	//     $ci->load->library('email');
	//     $config['protocol'] = "smtp";
	//     $config['smtp_host'] = "ssl://smtp.gmail.com";
	//     $config['smtp_port'] = "465";
	//     $config['smtp_user'] = "your_email@gmail.com";
	//     $config['smtp_pass'] = "your_password";
	//     $config['charset'] = "utf-8";
	//     $config['mailtype'] = "html";
	//     $config['newline'] = "\r\n";


	//     $ci->email->initialize($config);

	//     $ci->email->from('your_email@gmail.com', 'Your Name');
	//     $list = array('recipient_email@domain.com');
	//     $ci->email->to($list);
	//     $ci->email->subject('judul email');
	//     $ci->email->message('isi email');
	//     if ($this->email->send()) {
	//         echo 'Email sent.';
	//     } else {
	//         show_error($this->email->print_debugger());
	//     }
	// }

	// public function prosespengiriman()
	// {
	//    $this->load->library('email');

	//    //konfigurasi email
	//    $config = array();
	//    $config['charset'] = 'utf-8';
	//    $config['useragent'] = 'ComputerCyber'; //bebas sesuai keinginan kamu
	//    $config['protocol']= "smtp";
	//    $config['mailtype']= "html";
	//    $config['smtp_host']= "ssl://smtp.gmail.com";
	//    $config['smtp_port']= "465";
	//    $config['smtp_timeout']= "20";
	//    $config['smtp_user']= "cc.umrah@gmail.com";              //isi dengan email anda
	//    $config['smtp_pass']= "computercyber2018";            // isi dengan password dari email anda
	//    $config['crlf']="\r\n";
	//    $config['newline']="\r\n";

	//    $config['wordwrap'] = TRUE;

	//  //memanggil library email dan set konfigurasi untuk pengiriman email

	//    $this->email->initialize($config);
	//  //konfigurasi pengiriman kotak di view ke pengiriman email di gmail
	//    $this->email->from($this->input->post('from'));
	//    $this->email->to($this->input->post('to'));
	//    $this->email->subject($this->input->post('subject'));
	//    $this->email->message($this->input->post('isi'));

	// //proses uploads

	// //    $this->upload->initialize(array(
	// //    "upload_path"   => "./assets/upload/image/",
	// //    "allowed_types" => "*"
	// //    ));

	// // pernyataan jika pengiriman berhasil atau tidak

	//    if($this->email->send())
	//    {
	//     $site=$this->konfigurasi_model->listing();
	// 	$data = array(
	// 		'title' => $site->namaweb.' - Berhasil dikirim',
	// 		'site' => $site,
	// 		'title_sub' => 'Contact Us',
	// 		'isi'	=> 'home/contact',
	// 		'site' => $site );
	// 	$this->load->view('layout/wrapper', $data);
	//    }else
	//    {
	//     $site=$this->konfigurasi_model->listing();
	// 	$data = array(
	// 		'title' => $site->namaweb.' - Gagal dikirim',
	// 		'site' => $site,
	// 		'title_sub' => 'Contact Us',
	// 		'isi'	=> 'home/contact',
	// 		'site' => $site );
	// 	$this->load->view('layout/wrapper', $data);
	//    }

	//   }

}

/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */