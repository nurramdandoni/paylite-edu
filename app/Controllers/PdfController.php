<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;

class PdfController extends BaseController
{
    public function generatePDF()
    {
        $dompdf = new Dompdf();

        // // // Isi konten PDF (ganti dengan konten laporan Anda)
        $html = view('pdf_template_absensi'); // Misalnya, gunakan view untuk mengatur tampilan laporan
        $dompdf->setPaper('A4','portrait');
        // // Muat konten ke DOMPDF
        $dompdf->loadHtml($html);

        // // Render PDF (menghasilkan PDF)
        $dompdf->render();

        // // Tampilkan atau unduh PDF
        // $dompdf->stream("laporan_absensi.pdf", array("Attachment" => false));
        $dompdf->stream();
    }
}
