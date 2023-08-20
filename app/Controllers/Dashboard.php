<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Google_Client;

class Dashboard extends BaseController
{
  
    public function index()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_dashboard');
        }
    }
    public function account()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_account');
        }
    }
    public function tahunAjaran()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_tahunAjaran');
        }
    }
    public function mataAjar()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_mataAjar');
        }
    }
    public function kelas()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_kelas');
        }
    }
    public function kurikulum()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_kurikulum');
        }
    }
    public function dataPengajar()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_dataPengajar');
        }
    }
    public function dataPesertaDidik()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_dataPesertaDidik');
        }
    }
    public function dataKelas()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_dataKelas');
        }
    }
    public function jadwalPengajaran()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_jadwalPengajaran');
        }
    }
    public function absensi()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_absensi');
        }
    }
    public function nilai()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return redirect()->route('register');
        }else{
            return view('edu_nilai');
        }
    }
    public function aktivasi()
    {
        if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
            return view('edu_preparation');
        }else{
            return view('edu_aktivasi');
        }
    }
    public function register()
    {
            return view('edu_preparation');
    }

    public function calbackGoogle()
    {
            $ch = curl_init();
            // role 1 core, role 2 agency, role 3 mitra (sekolah,toko,ruko), role 4 enduser
            $data = array(
                'username' => 'email',
                'fullName' => 'name',
                'gender' => 'gender',
                'location' => 'locale',
                'picture' => 'picture',
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