<?php

namespace App\Controllers;

class Karya extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Karya'
        ];

        return view('karya/index', $data);
    }
}
