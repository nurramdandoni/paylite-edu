<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Absensi</title>
    <style>
        /* CSS untuk mengatur tampilan header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding: 10px 0;
        }

        .header-logo {
            width: 100px; /* Sesuaikan ukuran logo */
            height: auto; /* Sesuaikan ukuran logo */
        }

        .header-info {
            text-align: right;
        }

        /* CSS untuk mengatur tampilan footer */
        .footer {
            border-top: 2px solid #000;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <!-- Logo -->
        <img class="header-logo" src="<?= base_url(); ?>assets/img/logo_main.jpeg" alt="Logo">
        <!-- Informasi Header -->
        <div class="header-info">
            <div>Baris 1 Informasi</div>
            <div>Baris 2 Informasi</div>
            <div>Baris 3 Informasi</div>
        </div>
    </div>

    <!-- Isi laporan Anda di sini -->
    <h1>Laporan Absensi</h1>
    <p>Isi laporan Anda...</p>

    <!-- Footer -->
    <div class="footer">
        Line Sepanjang Dokumen - Ini adalah footer dokumen Anda
    </div>
</body>
</html>
