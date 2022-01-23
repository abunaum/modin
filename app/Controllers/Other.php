<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Other extends BaseController
{
    public function index()
    {
        return 'cari apa bos ?';
    }

    public function kalender()
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
            return redirect()->to(base_url('other/kalender'));
        }
        $jmldata = 10;
        $startno = ($jmldata * $cp) - $jmldata;
        $tottrx = count($fperson);
        $bar = 'other';
        if ($jmldata * ($cp - 1) >= $tottrx && $tottrx >= 1) {
            return redirect()->to(base_url('person'));
        }
        $data = [
            'judul' => 'Kalender',
            'bar' => $bar,
            'person' => $person->paginate($jmldata, 'person'),
            'pager' => $person->pager,
            'startno' => $startno,
            'keyword' => $keyword,
            'validation' => \Config\Services::validation()
        ];
        return view('other/kalender', $data);
        // helper('gauth');
        // $client = client();
        // $client->setAccessToken(session('gauth_token'));
        // $service = new \Google\Service\Calendar($client);
        // $event = new \Google\Service\Calendar\Event(array(
        //     'summary' => 'test judul 3',
        //     'location' => 'KUA Maron',
        //     'description' => 'test deskripsi 3',
        //     'start' => array(
        //         'dateTime' => '2022-01-23T09:00:00+07:00',
        //         'timeZone' => 'Asia/Jakarta',
        //     ),
        //     'end' => array(
        //         'dateTime' => '2022-01-23T17:00:00+07:00',
        //         'timeZone' => 'Asia/Jakarta',
        //     ),
        //     'recurrence' => array(
        //         'RRULE:FREQ=DAILY;COUNT=1'
        //     ),
        //     'reminders' => array(
        //         'useDefault' => FALSE,
        //         'overrides' => array(
        //             array('method' => 'popup', 'minutes' => 10),
        //         ),
        //     ),
        // ));

        // $calendarId = 'primary';
        // $event = $service->events->insert($calendarId, $event);
        // dd($event);


        // $calendarId = 'primary';
        // $optParams = array(
        //     'orderBy' => 'startTime',
        //     'singleEvents' => true,
        //     'timeMin' => date('c'),
        // );
        // $results = $service->events->listEvents($calendarId, $optParams);
        // $events = $results->getItems();
        // // dd($events);
        // $kalender = array();

        // // dd($events);
        // foreach ($events as $k) {
        //     $p = explode("T", $k->start->dateTime);
        //     $tanggal = $p[0];
        //     $p2 = explode(":", $p[1]);
        //     $jam = "$p2[0]:$p2[1]:" . substr($p2[2], 0, 2);
        //     $arr = [
        //         'id' => $k->id,
        //         'judul' => $k->summary,
        //         'deskripsi' => $k->description,
        //         'tanggal' => $tanggal,
        //         'jam' => $jam
        //     ];
        //     array_push($kalender, $arr);
        // }

        // dd($kalender);
    }
}
