<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use TCPDF;

class TcpdfController extends BaseController
{
    public function generatePDF($tahun_ajaran_id,$kelas_id)
    {
        $data['logo'] = "https://edu.paylite.co.id/assets/img/logo_main.jpeg";
        $data['kabupaten'] = "KUNINGAN";
        $data['nama_sekolah'] = "SEKOLAH DASAR NEGERI 3 HAURKUNING";
        $data['alamat'] = "Dusun Kaliwon, Kecamatan Nusaherang, Kabupaten Kuningan, Jawa Barat";
        $data['tahun_ajaran'] = "Tahun Ajaran 2023 - Ganjil";
        $data['kelas'] = "-";
        $data['mata_ajar'] = "-";
        $data['pengajar'] = "-";
        $data['wali_kelas'] = "Leni, S.Pd.";
        $data['bulan'] = "Agustus";
        $html = view('invoice',$data);

		$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output('Laporan_Absensi_Kelas.pdf', 'I');
    }
    public function generateMataAjarPDF($tahun_ajaran_id,$kelas_id,$kurikulum_id,$guru_id)
    {
        $data['logo'] = "https://edu.paylite.co.id/assets/img/logo_main.jpeg";
        $data['kabupaten'] = "KUNINGAN";
        $data['nama_sekolah'] = "SEKOLAH DASAR NEGERI 3 HAURKUNING";
        $data['alamat'] = "Dusun Kaliwon, Kecamatan Nusaherang, Kabupaten Kuningan, Jawa Barat";

        // get dataKelas
        $postDataKelas = [
        'lembaga_pendidikan_id' => '32',
        'tahun_ajaran_id' => $tahun_ajaran_id,
        'kelas_id' => $kelas_id,
        ];
        $requestUrlDataKelas = 'https://api.paylite.co.id/dataKelasWhere';
        $chDataKelas = curl_init(); // Inisialisasi curl
        // Set opsi permintaan
        curl_setopt($chDataKelas, CURLOPT_URL, $requestUrlDataKelas);
        curl_setopt($chDataKelas, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($chDataKelas, CURLOPT_POST, 1);
        curl_setopt($chDataKelas, CURLOPT_POSTFIELDS, json_encode($postDataKelas));
        curl_setopt($chDataKelas, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        ]);
        $responseDataKelas = curl_exec($chDataKelas); // Eksekusi permintaan
        if (curl_errno($chDataKelas)) {
        echo 'Error: ' . curl_error($chDataKelas);
        }
        curl_close($chDataKelas); // Tutup koneksi cURL
        $dataCurlDataKelas = json_decode($responseDataKelas, true); // Menguraikan respons JSON
        // get dataKelas

        // get data kurikulum
        $requestUrlDataKurikulum = 'https://api.paylite.co.id/kurikulum/'.$kurikulum_id;
        $chDataKurikulum = curl_init(); // Inisialisasi curl
        // Set opsi permintaan
        curl_setopt($chDataKurikulum, CURLOPT_URL, $requestUrlDataKurikulum);
        curl_setopt($chDataKurikulum, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($chDataKurikulum, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        ]);
        $responseDataKurikulum = curl_exec($chDataKurikulum); // Eksekusi permintaan
        if (curl_errno($chDataKurikulum)) {
        echo 'Error: ' . curl_error($chDataKurikulum);
        }
        curl_close($chDataKurikulum); // Tutup koneksi cURL
        $dataCurlDataKurikulum = json_decode($responseDataKurikulum, true); // Menguraikan respons JSON
        // get data kurikulum

        // get data guru
        $requestUrlDataGuru = 'https://api.paylite.co.id/guru/'.$guru_id;
        $chDataGuru = curl_init(); // Inisialisasi curl
        // Set opsi permintaan
        curl_setopt($chDataGuru, CURLOPT_URL, $requestUrlDataGuru);
        curl_setopt($chDataGuru, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($chDataGuru, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        ]);
        $responseDataGuru = curl_exec($chDataGuru); // Eksekusi permintaan
        if (curl_errno($chDataGuru)) {
        echo 'Error: ' . curl_error($chDataGuru);
        }
        curl_close($chDataGuru); // Tutup koneksi cURL
        $dataCurlDataGuru = json_decode($responseDataGuru, true); // Menguraikan respons JSON
        // get data kurikulum



        // print_r($dataCurlDataKurikulum);die;
        // echo "<br>";
        // echo "-----------------------------------------------------------";
        $data['tahun_ajaran'] = $dataCurlDataKelas["data"][0]["tahun_ajaran"]["nama_tahun_ajaran"];
        $data['kelas'] = $dataCurlDataKelas["data"][0]["kelas"]["nama_kelas"];
        $data['mata_ajar'] = $dataCurlDataKurikulum["data"][0]["mata_ajar"]["nama_mata_ajar"];
        $data['pengajar'] = $dataCurlDataGuru["data"]["nama_guru"];
        $data['wali_kelas'] = $dataCurlDataKelas["data"][0]["guru"]["nama_guru"];
        $data['bulan'] = "Agustus";
        $list = array();
        for($i=0;$i<count($dataCurlDataKelas["data"]);$i++){
            array_push($list,$dataCurlDataKelas["data"][$i]["siswa"]);
        }
        $data['siswaList'] = $list;


        // echo var_dump($list);
        // echo "<br>";
        // echo "<br>";
        // echo "-----------------------------------------------------------";
        // die();
        $html = view('invoice',$data);

		$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output('Laporan_Absensi_Kelas_Mata_Ajar.pdf', 'I');
    }
}
