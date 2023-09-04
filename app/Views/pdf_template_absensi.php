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

        .header-logo {
            width: 120px; /* Sesuaikan ukuran logo */
            height: auto; /* Sesuaikan ukuran logo */
            margin-right: 50px;
            display: inline-block;
        }

        .header-info {
            text-align: center;
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
    <!-- <img class="header-logo" src="https://edu.paylite.co.id/assets/img/logo_main.jpeg" alt="Logo"> -->
        
    <!-- <div class="row">
        <div class="col-md-2">logo</div>
        <div class="col-md-4">
            <div class="header1">PEMERINTAH KABUPATEN KUNINGAN</div>
            <div class="header2">DINAS PENDIDIKAN DAN KEBUDAYAAN</div>
            <div class="header3">SEKOLAH DASAR NEGERI 3 HAURKUNING</div>
            <div class="header4">Dusun Kaliwon, Kecamatan Nusaherang, Kabupaten Kuningan, Jawa Barat</div>
        </div>
    </div> -->
    <table border="1">
        <tr>
            <td colspan="4">logo</td>
            <td>PEMERINTAH KABUPATEN KUNINGAN</td>
        </tr>
        <tr>
            <td>DINAS PENDIDIKAN DAN KEBUDAYAAN</td>
        </tr>
        <tr>
            <td>SEKOLAH DASAR NEGERI 3 HAURKUNING</td>
        </tr>
        <tr>
            <td>Dusun Kaliwon, Kecamatan Nusaherang, Kabupaten Kuningan, Jawa Barat</td>
        </tr>
    </table>
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
