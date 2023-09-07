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
        $data['tahun_ajaran'] = "Tahun Ajaran 2023 - Ganjil";
        $data['kelas'] = "-";
        $data['mata_ajar'] = "-";
        $data['pengajar'] = "-";
        $data['wali_kelas'] = "Leni, S.Pd.";
        $data['bulan'] = "Agustus";


        echo var_dump($data);die();
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
