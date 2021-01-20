<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Computer Cyber'
		];

		return view('layout/index', $data);
	}
}
