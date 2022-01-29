<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Proses extends BaseController
{
    public function index()
    {
        return 'cari apa bos ?';
    }

    public function data_masuk()
    {
        // $var = $this->request->getVar();
        // dd($var);
        $db = \Config\Database::connect();
        $db->transStart();
        $nikah = new \App\Models\Datanikah();
        $person = new \App\Models\Person();
        $pr = $person->where('nik', $this->request->getVar('nikpr'))->first();
        $idpr = $pr['id'];
        $lk = $person->where('nik', $this->request->getVar('niklk'))->first();
        $idlk = $lk['id'];
        $nikah->insert([
            'jenis' => 'masuk',
            'register' => $this->request->getVar('noregister'),
            'idpr' => $idpr,
            'statuspr' => $this->request->getVar('statuspr'),
            'statusaypr' => $this->request->getVar('statusaypr'),
            'statusibpr' => $this->request->getVar('statusibpr'),
            'idlk' => $idlk,
            'statuslk' => $this->request->getVar('statuslk'),
        ]);
        $idnikah = $nikah->getInsertID();
        $noac = new \App\Models\Noac();
        if ($this->request->getVar('noac') != '') {
            $noac->insert([
                'idnikah' => $idnikah,
                'idperson' => $idpr,
                'noac' => $this->request->getVar('noac')
            ]);
        }
        if ($this->request->getVar('noaclk') != '') {
            $noac->insert([
                'idnikah' => $idnikah,
                'idperson' => $idlk,
                'noac' => $this->request->getVar('noaclk')
            ]);
        }
        if ($this->request->getVar('statusaypr') == 'ada') {
            $aypr = $person->where('nik', $this->request->getVar('nikay'))->first();
            $idaypr = $aypr['id'];
            $ortu = new \App\Models\Ortuada();
            $ortu->insert([
                'idnikah' => $idnikah,
                'status' => 'aypr',
                'bin' => $this->request->getVar('binay'),
                'idperson' => $idaypr
            ]);
        } else {
            $ortu = new \App\Models\Ortumeninggal();
            $ortu->insert([
                'idnikah' => $idnikah,
                'status' => 'aypr',
                'nama' => $this->request->getVar('namaaypr')
            ]);
        }

        if ($this->request->getVar('statusibpr') == 'ada') {
            $ibpr = $person->where('nik', $this->request->getVar('nikib'))->first();
            $idibpr = $ibpr['id'];
            $ortu = new \App\Models\Ortuada();
            $ortu->insert([
                'idnikah' => $idnikah,
                'status' => 'ibpr',
                'bin' => $this->request->getVar('binib'),
                'idperson' => $idibpr
            ]);
        } else {
            $ortu = new \App\Models\Ortumeninggal();
            $ortu->insert([
                'idnikah' => $idnikah,
                'status' => 'ibpr',
                'nama' => $this->request->getVar('namaibpr')
            ]);
        }

        $statusdesa = $this->request->getVar('statuscatin');
        if ($statusdesa == 'beda') {
            $dataaylk = [
                'statusaylk' => 'meninggal',
            ];
            $nikah->update($idnikah, $dataaylk);
            $ortu = new \App\Models\Ortumeninggal();
            $ortu->insert([
                'idnikah' => $idnikah,
                'status' => 'aylk',
                'nama' => $this->request->getVar('binlk')
            ]);
        } else {
            if ($this->request->getVar('statusaylk') == 'ada') {
                $dataaylk = [
                    'statusaylk' => 'ada',
                ];
                $nikah->update($idnikah, $dataaylk);
                $aylk = $person->where('nik', $this->request->getVar('nikaylk'))->first();
                $idaylk = $aylk['id'];
                $ortu = new \App\Models\Ortuada();
                $ortu->insert([
                    'idnikah' => $idnikah,
                    'status' => 'aylk',
                    'bin' => $this->request->getVar('binaylk'),
                    'idperson' => $idaylk
                ]);
            } else {
                $dataaylk = [
                    'statusaylk' => 'meninggal',
                ];
                $nikah->update($idnikah, $dataaylk);
                $ortu = new \App\Models\Ortumeninggal();
                $ortu->insert([
                    'idnikah' => $idnikah,
                    'status' => 'aylk',
                    'nama' => $this->request->getVar('namaaylk')
                ]);
            }

            if ($this->request->getVar('statusiblk') == 'ada') {
                $dataayib = [
                    'statusiblk' => 'ada',
                ];
                $nikah->update($idnikah, $dataayib);
                $iblk = $person->where('nik', $this->request->getVar('nikiblk'))->first();
                $idiblk = $iblk['id'];
                $ortu = new \App\Models\Ortuada();
                $ortu->insert([
                    'idnikah' => $idnikah,
                    'status' => 'iblk',
                    'bin' => $this->request->getVar('biniblk'),
                    'idperson' => $idiblk
                ]);
            } else {
                $dataiblk = [
                    'statusiblk' => 'meninggal',
                ];
                $nikah->update($idnikah, $dataiblk);
                $ortu = new \App\Models\Ortumeninggal();
                $ortu->insert([
                    'idnikah' => $idnikah,
                    'status' => 'iblk',
                    'nama' => $this->request->getVar('namaiblk')
                ]);
            }
        }

        $acara = new \App\Models\Acara();
        $acara->insert([
            'idnikah' => $idnikah,
            'maskawin' => $this->request->getVar('maskawin'),
            'tempat' => $this->request->getVar('lokasi'),
            'tanggalnikah' => $this->request->getVar('tglnikah'),
            'jam' => $this->request->getVar('jam') . ':00'
        ]);
        $db->transComplete();
        if ($db->transStatus() === false) {
            session()->setFlashdata('error', [
                'pesan' => 'Ooops.',
                'value' => 'Gagal menginput data'
            ]);
            return redirect()->to(base_url('nikah/masuk'));
        } else {
            session()->setFlashdata('sukses', [
                'pesan' => 'Mantap.',
                'value' => 'Data berhasil di input'
            ]);
            return redirect()->to(base_url('nikah/masuk'));
        }
    }

    public function person()
    {
        $nama = $this->request->getVar('nama');
        $nik = $this->request->getVar('nik');
        $jk = $this->request->getVar('jk');
        $status = $this->request->getVar('status');
        $noac = $this->request->getVar('noac');
        $tempatlahir = $this->request->getVar('tempatlahir');
        $tgllahir = $this->request->getVar('tgllahir');
        $kerja = $this->request->getVar('kerja');
        $agama = $this->request->getVar('agama');
        $wn = $this->request->getVar('wn');
        $provinsi = $this->request->getVar('provinsi');
        $kabkot = $this->request->getVar('kabkot');
        $kec = $this->request->getVar('kec');
        $des = $this->request->getVar('des');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        $alamat = $this->request->getVar('alamat');

        $validasi = \Config\Services::validation();
        if (!$this->validate(
            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus di isi.',
                    ]
                ],
                'nik' => [
                    'rules' => 'required|numeric|is_unique[person.nik]',
                    'errors' => [
                        'required' => 'NIK harus di isi.',
                        'numeric' => 'NIK harus angka.',
                        'is_unique' => 'NIK sudah terdaftar'
                    ]
                ],
                'jk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin harus di pilih.',
                    ]
                ],
                'tempatlahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat lahir harus di isi.',
                    ]
                ],
                'tgllahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Lahir harus di pilih.',
                    ]
                ],
                'kerja' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pekerjaan harus di isi.',
                    ]
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Agama harus di isi.',
                    ]
                ],
                'wn' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kewarganegaraan harus di isi.',
                    ]
                ],
                'provinsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Provinsi harus di pilih.',
                    ]
                ],
                'kabkot' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kabupaten / Kota harus di pilih.',
                    ]
                ],
                'kec' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kecamatan harus di pilih.',
                    ]
                ],
                'des' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Desa harus di pilih.',
                    ]
                ],
                'rt' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'RT harus di pilih.',
                    ]
                ],
                'rw' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'RW harus di pilih.',
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Dusun / Jalan harus di isi.',
                    ]
                ]
            ]
        )) {
            session()->setFlashdata('error', [
                'pesan' => 'Gagal memasukkan Data.',
                'value' => $validasi->getErrors()
            ]);
            return redirect()->to(base_url('person'))->withInput();
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/provinsi/$provinsi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $provinsi = json_decode($response, TRUE);
        $provinsi = $provinsi['nama'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/kota/$kabkot",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $kabkot = json_decode($response, TRUE);
        $kabkot = $kabkot['nama'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/kecamatan/$kec",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $kec = json_decode($response, TRUE);
        $kec = $kec['nama'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/kelurahan/$des",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $des = json_decode($response, TRUE);
        $des = $des['nama'];

        $this->person->save([
            'nama' => $nama,
            'nik' => $nik,
            'jeniskelamin' => $jk,
            'status' => $status,
            'noac' => $noac,
            'tempatlahir' => $tempatlahir,
            'tanggallahir' => $tgllahir,
            'pekerjaan' => $kerja,
            'agama' => $agama,
            'wn' => $wn,
            'provinsi' => $provinsi,
            'kabkot' => $kabkot,
            'kecamatan' => $kec,
            'keldes' => $des,
            'rt' => $rt,
            'rw' => $rw,
            'jalan' => $alamat
        ]);
        session()->setFlashdata('sukses', [
            'pesan' => 'Data berhasil di input.'
        ]);
        return redirect()->to(base_url('person'));
    }

    public function edit_person($id = 0)
    {
        $person = $this->person->where('id', $id)->first();
        if (!$person) {
            return redirect()->to(base_url('person'));
        }
        $nikperson = $person['nik'];
        $nama = $this->request->getVar('nama');
        $nik = $this->request->getVar('nik');
        $jk = $this->request->getVar('jk');
        $tempatlahir = $this->request->getVar('tempatlahir');
        $tgllahir = $this->request->getVar('tgllahir');
        $kerja = $this->request->getVar('kerja');
        $agama = $this->request->getVar('agama');
        $wn = $this->request->getVar('wn');
        $provinsi = $this->request->getVar('provinsi');
        $kabkot = $this->request->getVar('kabkot');
        $kec = $this->request->getVar('kec');
        $des = $this->request->getVar('des');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        $alamat = $this->request->getVar('alamat');

        $validasi = \Config\Services::validation();
        if (!$this->validate(
            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus di isi.',
                    ]
                ],
                'nik' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'NIK harus di isi.',
                        'numeric' => 'NIK harus angka.',
                    ]
                ],
                'jk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin harus di pilih.',
                    ]
                ],
                'tempatlahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat lahir harus di isi.',
                    ]
                ],
                'tgllahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Lahir harus di pilih.',
                    ]
                ],
                'kerja' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pekerjaan harus di isi.',
                    ]
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Agama harus di isi.',
                    ]
                ],
                'wn' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kewarganegaraan harus di isi.',
                    ]
                ],
                'provinsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Provinsi harus di pilih.',
                    ]
                ],
                'kabkot' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kabupaten / Kota harus di pilih.',
                    ]
                ],
                'kec' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kecamatan harus di pilih.',
                    ]
                ],
                'des' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Desa harus di pilih.',
                    ]
                ],
                'rt' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'RT harus di pilih.',
                    ]
                ],
                'rw' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'RW harus di pilih.',
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Dusun / Jalan harus di isi.',
                    ]
                ]
            ]
        )) {
            session()->setFlashdata('error', [
                'pesan' => 'Gagal Edit Data.',
                'value' => $validasi->getErrors()
            ]);
            return redirect()->to(base_url("person/detail/$nikperson"))->withInput();
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/provinsi/$provinsi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $provinsi = json_decode($response, TRUE);
        $provinsi = $provinsi['nama'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/kota/$kabkot",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $kabkot = json_decode($response, TRUE);
        $kabkot = $kabkot['nama'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/kecamatan/$kec",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $kec = json_decode($response, TRUE);
        $kec = $kec['nama'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.farizdotid.com/api/daerahindonesia/kelurahan/$des",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $des = json_decode($response, TRUE);
        $des = $des['nama'];

        $this->person->save([
            'id' => $id,
            'nama' => $nama,
            'nik' => $nik,
            'jeniskelamin' => $jk,
            'tempatlahir' => $tempatlahir,
            'tanggallahir' => $tgllahir,
            'pekerjaan' => $kerja,
            'agama' => $agama,
            'wn' => $wn,
            'provinsi' => $provinsi,
            'kabkot' => $kabkot,
            'kecamatan' => $kec,
            'keldes' => $des,
            'rt' => $rt,
            'rw' => $rw,
            'jalan' => $alamat
        ]);
        session()->setFlashdata('sukses', [
            'pesan' => 'Data berhasil di input.'
        ]);
        return redirect()->to(base_url("person/detail/$nikperson"));
    }
}
