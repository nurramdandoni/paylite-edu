<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div style="height:100%;">
  <iframe  src="//whulsaux.com/4/6311694" frameborder="0"></iframe>
</div>

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
        $("#absensiReport").removeClass("active");
      </script>
<?= $this->endSection() ?>