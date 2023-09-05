<?php
// Import Fpdf class
// require(APPPATH . 'Libraries/Fpdf/Fpdf.php');
// require(APPPATH . 'Libraries/Fpdf/Fpdf.php');
// use Fpdf;
$pdf = new \Fpdf('L','mm','A4');
$pdf->AddPage();
// header
        $pdf->Image('https://edu.paylite.co.id/assets/img/logo_main.jpeg', 10, 10, 30); // Logo
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(10);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(250, 10, 'PEMERINTAH KABUPATEN KUNINGAN', 0, 1, 'C'); // Header info
        $pdf->Cell(10);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(250, 10, 'DINAS PENDIDIKAN DAN KEBUDAYAAN', 0, 1, 'C');
        $pdf->Cell(10);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(250, 10, 'SEKOLAH DASAR NEGERI 3 HAURKUNING', 0, 1, 'C');
        $pdf->Cell(10);
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->Cell(250, 8, 'Dusun Kaliwon, Kecamatan Nusaherang, Kabupaten Kuningan, Jawa Barat', 0, 2, 'C');
        $pdf->Cell(40);
        $pdf->Line(20, 46, 275, 46);
        $pdf->Line(20, 46.3, 275, 46.3);
        $pdf->Ln(10); // Line break
// header
// content
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 5, 'Rekapitulasi Absensi', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Tahun Ajaran 2023 - Ganjil', 0, 1, 'C');
        // $pdf->Cell(0, 10, '', 0, 2); // Line break

        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(25, 5, 'Kelas', 0, 0, 'L');
        $pdf->Cell(18, 5, ':', 0, 1, 'L');
        $pdf->Cell(25, 5, 'Mata Ajar', 0, 0, 'L');
        $pdf->Cell(18, 5, ':', 0, 1, 'L');
        $pdf->Cell(25, 5, 'Pengajar', 0, 0, 'L');
        $pdf->Cell(18, 5, ':', 0, 1, 'L');
        $pdf->Cell(25, 5, 'Wali Kelas', 0, 0, 'L');
        $pdf->Cell(18, 5, ':', 0, 1, 'L');

        // Table header
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(8, 20, 'No', 1, 0, 'C');
        $pdf->Cell(18, 20, 'NIS/ NISN', 1, 0, 'C');
        $pdf->Cell(52, 20, 'Nama Peserta Didik', 1, 0, 'C');
        $pdf->Cell(201.5, 10, 'Tanggal', 1, 1, 'C');

        $pdf->Cell(8, 20, '', 0, 0, 'C');
        $pdf->Cell(18, 20, '', 0, 0, 'C');
        $pdf->Cell(52, 20, '', 0, 0, 'C');
        for ($i = 1; $i <= 31; $i++) {
            $pdf->Cell(6.5, 10, $i, 1, 0, 'C');
        }
        $pdf->Ln(); // Line break

        // Table data loop
        $pdf->SetFont('Arial', '', 8);
        for ($i = 1; $i <= 50; $i++) {
            $pdf->Cell(8, 10, $i, 1, 0, 'C');
            $pdf->Cell(18, 10, '0123008741', 1, 0, 'C');
            $pdf->Cell(52, 10, 'Agung Rizki Nurhidayat Muhamad Soleh', 1, 0, 'L');
            for ($j = 1; $j <= 31; $j++) {
                $pdf->Cell(6.5, 10, 'v', 1, 0, 'C');
            }
            $pdf->Ln(); // Line break
        }
        // end loop
// content
// footer
        $pdf->SetY(-15); // Position at 1.5 cm from the bottom
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(0, 10, 'https://edu.paylite.co.id', 0, 0, 'C');
// footer
$filed = $pdf->Output('Rekapitulasi_Absensi.pdf','D');
// echo $filed;

?>