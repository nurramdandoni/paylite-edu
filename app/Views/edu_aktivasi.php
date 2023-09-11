<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div>
  <?php for($i=0;$i<6;$i++){?>
    <button class="btn btn-success" onclick="visitAds('<?= $i; ?>')">Visit</button>
  <?php } ?>
</div>


<script>
  let link = [
    "//zirdough.net/4/6311694",
    "//gloorsie.com/4/6316602",
    "//vaikijie.net/4/6316603",
    "//gloacmug.net/4/6316604",
    "//oulsools.com/4/6316605",
    "//keewoach.net/4/6316606"
  ]
  function visitAds(l){

    // var link = "//whulsaux.com/4/6311694";
    var newTab = window.open(link[l], '_blank');
    console.log(link[l]);
    console.log(newTab);
  }
  document.addEventListener("visibilitychange", function() {
  if (document.hidden) {
    // Pengguna telah beralih ke tab lain atau meninggalkan halaman
    console.log("Pengguna telah meninggalkan tab.");
  } else {
    // Pengguna kembali ke tab ini
    console.log("Pengguna kembali ke tab ini.");
  }
});


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