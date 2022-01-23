<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard'
        ];
        return view('dashboard', $data);
    }
}
