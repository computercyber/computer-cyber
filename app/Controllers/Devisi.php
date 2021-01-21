<?php

namespace App\Controllers;

class Devisi extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Devision'
        ];

        return view('devisi/index', $data);
    }
}
