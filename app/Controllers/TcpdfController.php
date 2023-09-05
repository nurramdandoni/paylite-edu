<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use TCPDF;

class TcpdfController extends BaseController
{
    public function generatePDF()
    {
        
        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $hehe['logo'] = "https://edu.paylite.co.id/assets/img/logo_main.jpeg";
        $hehe['kabupaten'] = "KUNINGAN";
        $hehe['nama_sekolah'] = "SEKOLAH DASAR NEGERI 3 HAURKUNING";
        $hehe['alamat'] = "Dusun Kaliwon, Kecamatan Nusaherang, Kabupaten Kuningan, Jawa Barat";
        $hehe['tahun_ajaran'] = "Tahun Ajaran 2023 - Ganjil";
        $hehe['kelas'] = "-";
        $hehe['mata_ajar'] = "-";
        $hehe['pengajar'] = "-";
        $hehe['wali_kelas'] = "Leni, S.Pd.";
        // // // Isi konten PDF (ganti dengan konten laporan Anda)
        $html = view('pdf_template_absensi_dompdf',$hehe); // Misalnya, gunakan view untuk mengatur tampilan laporan
        
        // output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output('invoice.pdf', 'I');
    }
}
