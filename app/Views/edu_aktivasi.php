<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
Aktivasi

<script>
        $("#liDash").html("Aktivasi");
        $("#liDash2").html("Aktivasi");
        $("#dashboard").removeClass("active");
        $("#account").removeClass("active");
        $("#tahunAjaran").removeClass("active");
        $("#mataAjar").removeClass("active");
        $("#kelas").removeClass("active");
        $("#kurikulum").removeClass("active");
        $("#dataPengajar").removeClass("active");
        $("#dataPesertaDidik").removeClass("active");
        $("#dataKelas").removeClass("active");
        $("#jadwalPengajaran").removeClass("active");
        $("#absensi").removeClass("active");
        $("#nilai").removeClass("active");
        $("#krs").removeClass("active");
      </script>
<?= $this->endSection() ?>