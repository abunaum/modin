<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Modelnikah extends BaseController
{
    public function index()
    {
        return "cari apa bos?";
    }

    public function masukn1lk($id = 0)
    {
        $person = new \App\Models\Person();
        $noac = new \App\Models\Noac();
        $nikah = new \App\Models\Datanikah();
        $ortuada = new \App\Models\Ortuada();
        $ortumeninggal = new \App\Models\Ortumeninggal();
        $dn = $nikah->where('id', $id)->first();
        if (!$dn) {
            session()->setFlashdata('error', [
                'pesan' => 'Ooops.',
                'value' => 'Data tidak ditemukan'
            ]);
            return redirect()->to(base_url('nikah/masuk'));
        }
        // dd($dn);
        $lk = $person->where('id', $dn['idlk'])->first();
        $lk = array_merge($lk, ['status' => $dn['statuslk']]);
        $noaclk = $noac->where(['idnikah' => $dn['id'], 'idperson' => $lk['id']])->first();
        if ($noaclk != null) {
            $lk = array_merge($lk, ['noac' => $noaclk['noac']]);
        }

        if ($dn['statusaylk'] == 'ada') {
            $aylk = $ortuada->where(['idnikah' => $dn['id'], 'status' => 'aylk'])->first();
            $bin = $aylk['bin'];
            $aylk = $person->where('id', $aylk['idperson'])->first();
            $aylk = array_merge($aylk, ['bin' => $bin]);
            $aylk = [
                'status' => 'hidup',
                'detail' => $aylk
            ];
        } else {
            $aylk = $ortumeninggal->where(['idnikah' => $dn['id'], 'status' => 'aylk'])->first();
            $aylk = [
                'status' => 'meninggal',
                'nama' => $aylk['nama']
            ];
        }

        if ($dn['statusiblk'] == 'ada') {
            $iblk = $ortuada->where(['idnikah' => $dn['id'], 'status' => 'iblk'])->first();
            $bin = $iblk['bin'];
            $iblk = $person->where('id', $iblk['idperson'])->first();
            $iblk = array_merge($iblk, ['bin' => $bin]);
            $iblk = [
                'status' => 'hidup',
                'detail' => $iblk
            ];
        } else {
            $iblk = $ortumeninggal->where(['idnikah' => $dn['id'], 'status' => 'iblk'])->first();
            $iblk = [
                'status' => 'meninggal',
                'nama' => $iblk['nama']
            ];
        }
        if ($dn['statusaylk'] == 'ada') {
            $aylk = $ortuada->where(['idnikah' => $dn['id'], 'status' => 'aylk'])->first();
            $bin = $aylk['bin'];
            $aylk = $person->where('id', $aylk['idperson'])->first();
            $aylk = array_merge($aylk, ['bin' => $bin]);
            $aylk = [
                'status' => 'hidup',
                'detail' => $aylk
            ];
        } else {
            $aylk = $ortumeninggal->where(['idnikah' => $dn['id'], 'status' => 'aylk'])->first();
            $aylk = [
                'status' => 'meninggal',
                'nama' => $aylk['nama']
            ];
        }

        if ($dn['statusiblk'] == 'ada') {
            $iblk = $ortuada->where(['idnikah' => $dn['id'], 'status' => 'iblk'])->first();
            $bin = $iblk['bin'];
            $iblk = $person->where('id', $iblk['idperson'])->first();
            $iblk = array_merge($iblk, ['bin' => $bin]);
            $iblk = [
                'status' => 'hidup',
                'detail' => $iblk
            ];
        } else {
            $iblk = $ortumeninggal->where(['idnikah' => $dn['id'], 'status' => 'iblk'])->first();
            $iblk = [
                'status' => 'meninggal',
                'nama' => $iblk['nama']
            ];
        }
        $data = [
            'id' => $dn['id'],
            'register' => $dn['register'],
            'lk' => $lk,
            'aylk' => $aylk,
            'iblk' => $iblk
        ];
        $data = [
            'data' => $data
        ];
        $view = view('template/model/n1', $data);
    }
}
