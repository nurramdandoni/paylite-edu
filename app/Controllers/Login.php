<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Google_Client;

class Login extends BaseController
{
    protected $googleclient;

    public function __construct()
    {
        $this->googleclient = new Google_Client();

        $this->googleclient->setClientId('1058137227951-d46lp4m3iae48fsvor0f1873a1qcq0no.apps.googleusercontent.com');
        $this->googleclient->setClientSecret('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');
        $this->googleclient->setRedirectUri('https://account.paylite.co.id/login/calbackGoogle');
        $this->googleclient->addScope('email');
        $this->googleclient->addScope('profile');
        // $this->googleclient->addScope('https://www.googleapis.com/auth/user.birthday.read');
        // $this->googleclient->addScope('https://www.googleapis.com/auth/user.phonenumbers.read');
        // $this->googleclient->addScope('https://www.googleapis.com/auth/user.gender.read');

        // // Set permintaan izin tambahan
        // $this->googleclient->setIncludeGrantedScopes(true);
        // // Mendapatkan data jenis kelamin, nomor telepon, dan tanggal lahir
        // $this->googleclient->setRequestVisibleActions('http://schemas.google.com/AddActivity', 'http://schemas.google.com/BuyActivity');

    }
    public function index()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('login', $data);
    }
    public function edu()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('edu', $data);
    }
    public function fin()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('fin', $data);
    }
    public function retail()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('retail', $data);
    }
    public function kios()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('kios', $data);
    }

    public function calbackGoogle()
    {
        $token = $this->googleclient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            // echo var_dump($token);
            $this->googleclient->setAccessToken($token['access_token']);
            $googleService = new \Google_Service_Oauth2($this->googleclient);
            $dataGoogle = $googleService->userinfo->get();
            echo '<pre>';
            echo var_dump($dataGoogle);
            echo '</pre>';
            echo $dataGoogle['name'];

            echo "<br>";
            echo "<br>";

            $ch = curl_init();
            // role 1 core, role 2 agency, role 3 mitra (sekolah,toko,ruko), role 4 enduser
            $data = array(
                'username' => $dataGoogle['email'],
                'fullName' => $dataGoogle['name'],
                'gender' => $dataGoogle['gender'],
                'location' => $dataGoogle['locale'],
                'picture' => $dataGoogle['picture'],
                'password' => 'SSOPaylite22@#',
                'signWithEmail' => false,
                'signWithGoogle' => true,
                'role' => 3
            );
            $data_json = json_encode($data);

            curl_setopt($ch, CURLOPT_URL, 'https://api.paylite.co.id/login');
            // curl_setopt($ch, CURLOPT_URL, 'http://localhost:4000/login');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Error: ' . curl_error($ch);
            } else {
                echo 'Response: ' . $result;
            }

            curl_close($ch);


        }
    }
}