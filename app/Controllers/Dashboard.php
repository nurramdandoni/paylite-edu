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
                $response = $this->setCookieData();
                if($response){
                    if(isset($_COOKIE['subscriber_id'])){

                        $this->setCookieData2();
                    }
                }
                echo "sampai sini";
                // return view('edu_dashboard');
            }
        }else{
            return $this->response->redirect('https://account.paylite.co.id');  
        }
    }
    public function setCookieData(){
        $ch = curl_init();
                $data = array(
                    'user_id' => $_COOKIE['user_id'],
                    'paylite_produk_id' => 1
                );
                $data_json = json_encode($data);

                curl_setopt($ch, CURLOPT_URL, 'https://api.paylite.co.id/subscriberWhere');
                // curl_setopt($ch, CURLOPT_URL, 'http://localhost:8080/login');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                $data = curl_exec($ch);
                curl_close($ch);

                $consume = json_decode($data, true);
                // echo var_dump($consume);
                // echo "----------------------<br>";
                // echo ($consume["data"][0]["subscriber_id"]);

                setcookie("role_produk_id",$consume["data"][0]["role_produk_id"],time() + (60 * 60 * 24),"/", ".paylite.co.id");
                setcookie("subscriber_status_id",$consume["data"][0]["subscriber_status_id"],time() + (60 * 60 * 24),"/", ".paylite.co.id");
                setcookie("status_pay",$consume["data"][0]["status_pay"],time() + (60 * 60 * 24),"/", ".paylite.co.id");
                setcookie("program_id",$consume["data"][0]["program_id"],time() + (60 * 60 * 24),"/", ".paylite.co.id");
                setcookie("end_subscribe",$consume["data"][0]["end_subscribe"],time() + (60 * 60 * 24),"/", ".paylite.co.id");
                setcookie("subscriber_id",$consume["data"][0]["subscriber_id"],time() + (60 * 60 * 24),"/", ".paylite.co.id");
                return true;
    }
    public function setCookieData2(){
        $chs = curl_init();
                $dataget = array(
                    'subscriber_id' => $_COOKIE['subscriber_id']
                );
                $data_jsonget = json_encode($dataget);

                curl_setopt($chs, CURLOPT_URL, 'https://api.paylite.co.id/eduUserWhere');
                // curl_setopt($chs, CURLOPT_URL, 'http://localhost:8080/login');
                curl_setopt($chs, CURLOPT_POST, 1);
                curl_setopt($chs, CURLOPT_POSTFIELDS, $data_jsonget);
                curl_setopt($chs, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($chs, CURLOPT_RETURNTRANSFER, 1);

                $dataEduUser = curl_exec($chs);
                curl_close($chs);
                
                $consume1 = json_decode($dataEduUser, true);
                // echo var_dump($consume1);
                setcookie("lembaga_pendidikan_id",$consume1["data"][0]["lembaga_pendidikan_id"],time() + (60 * 60 * 24),"/", ".paylite.co.id");
                return true;
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
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
            return $this->response->redirect('https://account.paylite.co.id');
        }
    }
    public function register()
    {
        if(isset($_COOKIE['statusProduk'])){
            if($_COOKIE['statusProduk'] == 'prepareSubscriberRegister'){
                return view('edu_preparation');
            }else{
                return $this->response->redirect('https://edu.paylite.co.id');
            }
        }else{
            return $this->response->redirect('https://account.paylite.co.id');
        }
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