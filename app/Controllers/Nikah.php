<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Nikah extends BaseController
{
    public function index()
    {
        return 'cari apa bos ?';
    }

    public function masuk()
    {
        $personlk = $this->person->where('jeniskelamin', 'lk')->findAll();
        $personpr = $this->person->where('jeniskelamin', 'pr')->findAll();
        $bar = 'nikah';
        $data = [
            'judul' => 'Data Masuk',
            'bar' => $bar,
            'laki' => $personlk,
            'perempuan' => $personpr
        ];
        return view('data_masuk', $data);
    }
}
