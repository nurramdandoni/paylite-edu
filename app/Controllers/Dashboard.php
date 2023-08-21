<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Google_Client;

class Dashboard extends BaseController
{
  
    public function index()
    {
        if(isset($_COOKIE['statusProduk'])){

            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_dashboard');
            }
        }else{
            return redirect()->route('register');
            
        }
    }
    public function account()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_account');
            }
        }else{
            return redirect()->route('register');
        }
    }
    public function tahunAjaran()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_tahunAjaran');
            }
        }else{
            return redirect()->route('register');

        }
    }
    public function mataAjar()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_mataAjar');
            }
        }else{
            return redirect()->route('register');

        }
    }
    public function kelas()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_kelas');
            }
        }else{
            
            return redirect()->route('register');
        }
    }
    public function kurikulum()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_kurikulum');
            }
        }else{
            return redirect()->route('register');

        }
    }
    public function dataPengajar()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_dataPengajar');
            }
        }else{
            return redirect()->route('register');
        }
    }
    public function dataPesertaDidik()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_dataPesertaDidik');
            }
        }else{
            return redirect()->route('register');
        }
    }
    public function dataKelas()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_dataKelas');
            }
        }else{
            return redirect()->route('register');

        }
    }
    public function jadwalPengajaran()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_jadwalPengajaran');
            }
        }else{
            return redirect()->route('register');
        }
    }
    public function absensi()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_absensi');
            }
        }else{
            return redirect()->route('register');

        }
    }
    public function nilai()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_nilai');
            }
        }else{
            return redirect()->route('register');

        }
    }
    public function aktivasi()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return redirect()->route('register');
            }else{
                return view('edu_aktivasi');
            }
        }else{
            return redirect()->route('register');
        }
    }
    public function register()
    {
            return view('edu_preparation');
    }
    public function registerCh()
    {
        setcookie("statusProduk","success",time() + (60 * 60 * 24),"/", ".paylite.co.id");
        echo "berhasil";
            // return view('edu_preparation');
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