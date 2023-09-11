<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<!-- <iframe src="//whulsaux.com/4/6311694" frameborder="0" style="width: 100%; height: 100vh;"></iframe> -->
<button onclick="visitAds()">Visit</button>


<script>
  function visitAds(){

    var link = "//whulsaux.com/4/6311694";
    var newTab = window.open(link, '_blank');
  
    if (newTab) {
      newTab.onload = function() {
        if (newTab.document && newTab.document.documentElement) {
          if (newTab.document.documentElement.innerHTML.includes("404 Not Found")) {
            console.log("Tautan menghasilkan error 404.");
          } else {
            console.log("Tautan berhasil dimuat tanpa error 404.");
          }
        }
      };
    } else {
      console.log("Tidak dapat membuka tautan di tab baru. Pastikan browser Anda mengizinkan jendela pop-up.");
    }
  }

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