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

    public function generateFPDF(){
            require(APPPATH .'../ThirdParty/fpdf/fpdf.php');

            // Membuat objek FPDF
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(40,10,'Hello, FPDF!');
            $pdf->Output('laporan.pdf');

        //  echo "Hello fpdf";
    }
}
