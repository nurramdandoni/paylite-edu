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
    public function generateMataAjarPDF($tahun_ajaran_id,$kelas_id,$kurikulum_id)
    {
        $data['logo'] = "https://edu.paylite.co.id/assets/img/logo_main.jpeg";
        $data['kabupaten'] = "KUNINGAN";
        $data['nama_sekolah'] = "SEKOLAH DASAR NEGERI 3 HAURKUNING";
        $data['alamat'] = "Dusun Kaliwon, Kecamatan Nusaherang, Kabupaten Kuningan, Jawa Barat";

        $lembaga_pendidikan_id = '32';
        $th = $tahun_ajaran_id;

        $postSiswa = [
        'lembaga_pendidikan_id' => $lembaga_pendidikan_id,
        'tahun_ajaran_id' => $th,
        'kelas_id' => $kelas_id,
        ];

        $requestUrl = 'https://api.paylite.co.id/dataKelasWhere';

        $ch = curl_init(); // Inisialisasi curl

        // Set opsi permintaan
        curl_setopt($ch, CURLOPT_URL, $requestUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postSiswa));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        ]);

        $response = curl_exec($ch); // Eksekusi permintaan

        if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
        }

        curl_close($ch); // Tutup koneksi cURL

        $data = json_decode($response, true); // Menguraikan respons JSON

        print_r($data);
        echo "<br>";
        echo "-----------------------------------------------------------";
        $data['tahun_ajaran'] = $data[0]['tahun_ajaran']['nama_tahun_ajaran'];
        $data['kelas'] = $data[0]['kelas']['nama_kelas'];
        $data['mata_ajar'] = "-";
        $data['pengajar'] = "-";
        $data['wali_kelas'] = "Leni, S.Pd.";
        $data['bulan'] = "Agustus";


        echo var_dump($data);
        echo "<br>";
        echo "<br>";
        echo "-----------------------------------------------------------";
        die();
        // $html = view('invoice',$data);

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
