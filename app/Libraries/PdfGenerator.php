<?php

namespace App\Libraries;

use FPDF;

class PdfGenerator extends FPDF
{
    // Fungsi untuk mengatur header
    function Header()
    {
        // Atur font untuk header
        $this->SetFont('Arial', 'B', 12);

        // Tambahkan judul header
        $this->Cell(0, 10, 'Laporan PDF', 0, 1, 'C');
    }

    // Fungsi untuk mengatur footer
    function Footer()
    {
        // Atur posisi di bagian bawah halaman
        $this->SetY(-15);

        // Atur font untuk footer
        $this->SetFont('Arial', 'I', 8);

        // Tambahkan nomor halaman
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    }

    // Fungsi untuk menambahkan konten ke PDF
    function addContent($content)
    {
        // Tambahkan konten ke halaman
        $this->MultiCell(0, 10, $content);
    }
}
