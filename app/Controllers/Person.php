<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Person extends BaseController
{
    public function index()
    {
        $keyword = $this->request->getVar('cari');
        if (!$keyword) {
            $fperson = $this->person->findall();
            $person = $this->person;
        } else {
            $fperson = $this->person->cari($keyword)->findall();
            $person = $this->person->cari($keyword);
        }

        $cp = $this->request->getVar('page_person') ? $this->request->getVar('page_person') : 1;
        if (!preg_match('/^\d+$/', $cp)) {
            return redirect()->to(base_url('person'));
        }
        $jmldata = 10;
        $startno = ($jmldata * $cp) - $jmldata;
        $tottrx = count($fperson);
        $bar = 'person';
        if ($jmldata * ($cp - 1) >= $tottrx && $tottrx >= 1) {
            return redirect()->to(base_url('person'));
        } else {
            $data = [
                'judul' => 'Person',
                'bar' => $bar,
                'person' => $person->paginate($jmldata, 'person'),
                'pager' => $person->pager,
                'startno' => $startno,
                'keyword' => $keyword,
                'validation' => \Config\Services::validation()
            ];
            return view('person/index', $data);
        }
    }

    public function detail($nik = 0)
    {
        $person = $this->person->where('nik', $nik)->first();
        if (!$person) {
            return redirect()->to(base_url('person'));
        }
        $bar = 'person';
        $data = [
            'judul' => "Person - $nik",
            'bar' => $bar,
            'person' => $person,
            'validation' => \Config\Services::validation()
        ];
        return view('person/detail', $data);
    }
}
