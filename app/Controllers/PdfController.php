<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use CodeIgniter\Controller;

class PdfController extends Controller
{
    public function generatePDF()
    {
        echo "test";
        // Buat objek DOMPDF
        $dompdf = new Dompdf();

        // // Buat opsi DOMPDF
        // $options = new Options();
        // $options->set('isHtml5ParserEnabled', true);
        // $options->set('isPhpEnabled', true);

        // // Terapkan opsi ke objek DOMPDF
        // $dompdf->setOptions($options);

        // // Isi konten PDF (ganti dengan konten laporan Anda)
        // $html = view('pdf_template_absensi'); // Misalnya, gunakan view untuk mengatur tampilan laporan

        // // Muat konten ke DOMPDF
        // $dompdf->loadHtml($html);

        // // Render PDF (menghasilkan PDF)
        // $dompdf->render();

        // // Tampilkan atau unduh PDF
        // $dompdf->stream("laporan_absensi.pdf", array("Attachment" => false));
    }
}
