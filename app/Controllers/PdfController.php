<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use Dompdf\Dompdf;
use Dompdf\Options;


class PdfController extends BaseController
{
    public function generatePDF()
    {
        // return view('pdf_template_absensi');
        // Buat objek DOMPDF
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set(array('isRemoteEnabled' => true));
        $dompdf->set_option('defaultMediaType', 'all');
        $dompdf->set_option('isFontSubsettingEnabled', true);

        $dompdf->setOptions($options);
        $hehe['anjir'] = "how are you";
        // // // Isi konten PDF (ganti dengan konten laporan Anda)
        $html = view('pdf_template_absensi',$hehe); // Misalnya, gunakan view untuk mengatur tampilan laporan
        
        // // Muat konten ke DOMPDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','landscape');
        
        // // Render PDF (menghasilkan PDF)
        $dompdf->render();
        
        // // Tampilkan atau unduh PDF
        $dompdf->stream("laporan_absensi.pdf", array("Attachment" => false));
        $dompdf->exit();
        // return view('pdf_template_absensi'); // Misalnya, gunakan view untuk mengatur tampilan laporan
    }

    public function generateFPDF()
    {
        // Import Fpdf class
        // require APPPATH . 'Libraries/Fpdf/fpdf.php';
        // // Buat objek PDF
        // $pdf = new FPDF();

        // // Tambahkan konten ke PDF
        // $content = 'Ini adalah konten PDF yang akan ditambahkan.';
        // $pdf->addContent($content);

        // // Outputkan PDF ke browser
        // $pdf->Output();
        return view('laporan_fpdf');
    }
}
