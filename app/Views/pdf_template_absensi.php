<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Absensi</title>
      <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- new -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        /* CSS untuk mengatur tampilan header */
        .header {
            display: inline-block;
            justify-content: center;
            align-items: center;
            border-bottom: 2px solid #000;
            padding: 10px 0;
        }


        /* CSS untuk mengatur tampilan footer */
        .footer {
            border-top: 2px solid #000;
            padding: 10px 0;
            text-align: center;
        }
        .header1 {
            font-size: 20px;
        }
        .header2 {
            font-size: 15px;
        }
        .header3 {
            font-size: 22px;
        }
    </style>
</head>
<body>
    <div style="text-align:center">
        <table border="1" style="border-bottom: 2px solid #000;width:100%;">
            <tr>
                <td rowspan="4"><img style="width:120px;margin-left:20px;" class="header-logo" src="https://edu.paylite.co.id/assets/img/logo_main.jpeg" alt="Logo"></td>
                <td style="text-align:center;font-size:23px;margin-bottom:0px;">PEMERINTAH KABUPATEN KUNINGAN</td>
            </tr>
            <tr>
                <td style="text-align:center;font-size:20px;">DINAS PENDIDIKAN DAN KEBUDAYAAN</td>
            </tr>
            <tr>
                <td style="text-align:center;font-size:23px;margin-top:0px;">SEKOLAH DASAR NEGERI 3 HAURKUNING</td>
            </tr>
            <tr>
                <td style="text-align:center;font-size:11px;margin-top:4px;">Dusun Kaliwon, Kecamatan Nusaherang, Kabupaten Kuningan, Jawa Barat</td>
            </tr>
        </table>
    </div>
    <div style="text-align:center;">
        <!-- Isi laporan Anda di sini -->
        <h1>Laporan Absensi</h1>
        <p>Tahun Ajaran 2023 - Ganjil - <?= $anjir; ?></p>
    </div>
    <div class="row">
        <div class="col-md-2">Kelas</div><div class="col-md-4">:</div><div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-2">Mata Pelajaran</div><div class="col-md-4">:</div><div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-2">Guru Pengajar</div><div class="col-md-4">:</div><div class="col-md-3"></div>
    </div>

</body>
</html>
