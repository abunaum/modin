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
        $nikah = new \App\Models\Datanikah();
        $newdatanikah = array();
        $datanikah = $nikah->where('jenis', 'masuk')->findAll();
        foreach ($datanikah as $dn) {
            $person = new \App\Models\Person();
            $pr = $person->where('id', $dn['idpr'])->first();
            $lk = $person->where('id', $dn['idlk'])->first();
            $acara = new \App\Models\Acara();
            $acara = $acara->where('idnikah', $dn['id'])->first();
            $newdn = [
                'id' => $dn['id'],
                'jenis' => 'masuk',
                'register' => $dn['register'],
                'nikpr' => $pr['nik'],
                'niklk' => $lk['nik'],
                'acara' => $acara['tanggalnikah']
            ];
            array_push($newdatanikah, $newdn);
        }
        // dd($newdatanikah);
        $personlk = $this->person->where('jeniskelamin', 'lk')->findAll();
        $personpr = $this->person->where('jeniskelamin', 'pr')->findAll();
        $bar = 'nikah';
        $data = [
            'judul' => 'Data Masuk',
            'bar' => $bar,
            'laki' => $personlk,
            'perempuan' => $personpr,
            'data' => $newdatanikah
        ];
        return view('data_masuk', $data);
    }

    public function masukdetail($id = 0)
    {
        $person = new \App\Models\Person();
        $noac = new \App\Models\Noac();
        $nikah = new \App\Models\Datanikah();
        $acara = new \App\Models\Acara();
        $ortuada = new \App\Models\Ortuada();
        $ortumeninggal = new \App\Models\Ortumeninggal();
        $dn = $nikah->where('id', $id)->first();
        // dd($dn);
        if (!$dn) {
            session()->setFlashdata('error', [
                'pesan' => 'Ooops.',
                'value' => 'Data tidak ditemukan'
            ]);
            return redirect()->to(base_url('nikah/masuk'));
        }
        $acara = $acara->where('idnikah', $dn['id'])->first();
        $pr = $person->where('id', $dn['idpr'])->first();
        $lk = $person->where('id', $dn['idlk'])->first();
        $pr = array_merge($pr, ['status' => $dn['statuspr']]);
        $lk = array_merge($lk, ['status' => $dn['statuslk']]);

        $noacpr = $noac->where(['idnikah' => $dn['id'], 'idperson' => $pr['id']])->first();
        if ($noacpr != null) {
            $pr = array_merge($pr, ['noac' => $noacpr['noac']]);
        }
        $noaclk = $noac->where(['idnikah' => $dn['id'], 'idperson' => $lk['id']])->first();
        if ($noaclk != null) {
            $lk = array_merge($lk, ['noac' => $noaclk['noac']]);
        }

        if ($dn['statusaypr'] == 'ada') {
            $aypr = $ortuada->where(['idnikah' => $dn['id'], 'status' => 'aypr'])->first();
            $bin = $aypr['bin'];
            $aypr = $person->where('id', $aypr['idperson'])->first();
            $aypr = array_merge($aypr, ['bin' => $bin]);
            $aypr = [
                'status' => 'hidup',
                'detail' => $aypr
            ];
        } else {
            $aypr = $ortumeninggal->where(['idnikah' => $dn['id'], 'status' => 'aypr'])->first();
            $aypr = [
                'status' => 'meninggal',
                'nama' => $aypr['nama']
            ];
        }

        if ($dn['statusibpr'] == 'ada') {
            $ibpr = $ortuada->where(['idnikah' => $dn['id'], 'status' => 'ibpr'])->first();
            $bin = $ibpr['bin'];
            $ibpr = $person->where('id', $ibpr['idperson'])->first();
            $ibpr = array_merge($ibpr, ['bin' => $bin]);
            $ibpr = [
                'status' => 'hidup',
                'detail' => $ibpr
            ];
        } else {
            $ibpr = $ortumeninggal->where(['idnikah' => $dn['id'], 'status' => 'ibpr'])->first();
            $ibpr = [
                'status' => 'meninggal',
                'nama' => $ibpr['nama']
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

        // dd($dn);
        $data = [
            'id' => $dn['id'],
            'register' => $dn['register'],
            'pr' => $pr,
            'aypr' => $aypr,
            'ibpr' => $ibpr,
            'lk' => $lk,
            'aylk' => $aylk,
            'iblk' => $iblk,
            'acara' => $acara
        ];
        $bar = 'nikah';
        $data = [
            'judul' => 'Detail Pernikahan',
            'bar' => $bar,
            'data' => $data
        ];
        return view('nikah/detail_masuk', $data);
    }
}
