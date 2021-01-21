<?php

namespace App\Controllers;

class Devisi extends BaseController
{
    public function index()
    {
        // dd(url_title('devision'));

        $data = [
            'title' => 'Devision'
        ];

        return view('devisi/index', $data);
    }
}
