<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Google_Client;
use Google_Service;
use Google_Service_Resource;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Auth',
        ];
        return view('auth/index', $data);
    }

    public function createurl()
    {
        helper('gauth');
        $client = client();
        $client->setRedirectUri(base_url('auth/proses'));
        $url = $client->createAuthUrl();
        return redirect()->to($url);
    }

    public function proses()
    {
        $code = $this->request->getVar('code');
        helper('gauth');
        $client = client();
        $client->setRedirectUri(base_url('auth/proses'));
        $token = $client->fetchAccessTokenWithAuthCode($code);
        if (!isset($token['error'])) {
            $google_service = Oauth2($client);
            session()->set('gauth_token', $token['access_token']);
            $data = $google_service->userinfo_v2_me->get();
            $user = new \App\Models\User();
            $getuser = $user->where('email', $data['email'])->first();
            if (!$getuser) {
                session()->setFlashdata('error', 'User tidak terdaftar');
                return redirect()->to(base_url('/auth'));
            }
            $user->save([
                'id' => $getuser['id'],
                'oauth_id' => $data['id'],
                'nama' => $data['name'],
                'gambar' => $data['picture']
            ]);
            $newdata = [
                'id' => $getuser['id'],
                'logged_in' => true,
            ];

            session()->set($newdata);
            return redirect()->to(base_url());
        } else {
            $url = $client->createAuthUrl();
            return redirect()->to($url);
        }
    }

    public function logout()
    {
        session()->destroy();
        helper('gauth');
        $client = client();
        $client->revokeToken();
        return redirect()->to(base_url('auth'));
    }
}
