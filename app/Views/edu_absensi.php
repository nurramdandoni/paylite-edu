<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<script src="<?= base_url()?>assets/js/html5-qrcode.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Absensi</h6>
            </div>
            <div id="reader"></div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">John Michael</h6>
                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Hadir</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Alexa Liras</h6>
                            <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Tidak Hadir</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user3">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Laurent Perrier</h6>
                            <p class="text-xs text-secondary mb-0">laurent@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Hadir</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user4">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Michael Levi</h6>
                            <p class="text-xs text-secondary mb-0">michael@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Hadir</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user5">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Richard Gran</h6>
                            <p class="text-xs text-secondary mb-0">richard@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Tidak Hadir</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user6">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Miriam Eric</h6>
                            <p class="text-xs text-secondary mb-0">miriam@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Tidak Hadir</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<script>
  let hariIni = '';
  let Nisn = '';
  let Waktu = '';

  var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
    function onScanSuccess(decodedText, decodedResult) {
    // Handle on success condition with the decoded text or result.
    console.log(`Scan result:`, decodedResult);
        // alert(`Scan result: ${decodedText}`);
        const inputString = decodedResult.decodedText;
        const parts = inputString.split(" - "); // Membagi string berdasarkan tanda "-"

        const id = parts[0]; // Bagian pertama (ID)
        Nisn = id;
        const name = parts[1]; // Bagian kedua (Nama)

        console.log("ID:", id);
        console.log("Nama:", name);
        const currentTimeFormatted = getCurrentTimeFormatted();
        console.log("Jam saat ini:", currentTimeFormatted);
        const currentDayFormatted = getFormattedDay();
        hariIni = currentDayFormatted;
        Waktu = currentTimeFormatted;
        console.log("Hari saat ini (format 1-7, Senin = 1):", currentDayFormatted);
        console.log("id lembaga ", lembaga_pendidikan_id);

        // await cekNisnAfterAbsen();
        const postCeker = {
            lembaga_pendidikan_id: lembaga_pendidikan_id,
            hari_id: hariIni,
            nisn: Nisn,
            waktu: Waktu
                }
        console.log(postCeker);
        cek();
    }

    function getCurrentTimeFormatted() {
      const now = new Date();
      const hours = now.getHours();
      const minutes = now.getMinutes();

      const formattedHours = hours < 10 ? "0" + hours : hours;
      const formattedMinutes = minutes < 10 ? "0" + minutes : minutes;

      const formattedTime = `${formattedHours}:${formattedMinutes}`;
      return formattedTime;
    }

    function getFormattedDay() {
      const daysOfWeek = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
      
      const now = new Date();
      const dayIndex = now.getDay(); // Mengambil nilai 0-6 (Minggu-Sabtu)
      
      const formattedDay = (dayIndex === 0) ? 7 : dayIndex; // Konversi agar Senin dimulai dari 1
      return formattedDay;
    }
    async function cek() {
      try {
        const datacek = await cekNisnAfterAbsen();
      } catch (error) {
        console.error("Error:", error);
      }
    }
    async function cekNisnAfterAbsen() {
      const postCekerNisn = {
        lembaga_pendidikan_id: lembaga_pendidikan_id,
        nisn: Nisn
      };
      
      const requestOptionsCekNisn = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(postCekerNisn),
      };
      const postCeker = {
        lembaga_pendidikan_id: lembaga_pendidikan_id,
        hari_id: hariIni,
        nisn: Nisn,
        waktu: Waktu
      };
      
      const requestOptions = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(postCeker),
      };

      try {
        const cekNisn = await fetchData('https://api.paylite.co.id/siswaWhere', requestOptionsCekNisn);
        console.log("CEK NISN : ",cekNisn);
        const dataJadwal = await fetchData('https://api.paylite.co.id/jadwalPelajaranWhereJoinByKrsNisn', requestOptions);
        console.log("INI HASIL Dari CEK JADWAL PELAJARAN BY KRS NIS",dataJadwal);
        if(cekNisn.data.length > 0){
          // alert("NISN Terdaftar!");
          if(dataJadwal.data.length > 0){
            const printBack = await inputAbsensi(data.data[0].jadwal_pelajaran_id,data.data[0].siswa_id);
          }else{
            alert("Sesi Absensi Berakhir, Hubungi Guru Kelas/ Mata Pelajaran! (Pastikan anda ada jadwal pelajaran hari ini atau jam absensi valid!)");
          }
        }else{
          alert("Mohon Maaf NISN Tidak Terdaftar, Hubungi Pihak Sekolah!");
        }
        // if(data.status == 'Sukses'){
        //   console.log("Processing input data..............");
        //   console.log("Processing input data.............. jadwal Pelajaran : ",data.data[0].jadwal_pelajaran_id);
        //   console.log("Processing input data.............. jadwal Pelajaran : ",data.data[0].siswa_id);
        //   const printBack = await inputAbsensi(data.data[0].jadwal_pelajaran_id,data.data[0].siswa_id);
        // }else{
        //   alert("Mohon Maaf NISN Tidak Terdaftar, Hubungi Pihak Sekolah!");
        // }

        // Di sini, Anda bisa melanjutkan dengan memproses data sesuai kebutuhan
        // Misalnya, Anda dapat memeriksa panjang data.data dan memberikan respons sesuai dengan itu.
      } catch (error) {
        console.error("Error:", error);
      }
    }
    async function inputAbsensi(id_jadwal,id_siswa) {
      const postAbsensi = {
        lembaga_pendidikan_id: lembaga_pendidikan_id,
        jadwal_pelajaran_id: id_jadwal,
        siswa_id: id_siswa,
        status_kehadiran: "hadir"
      };
      
      const requestOptions = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(postAbsensi),
      };

      try {
        const data = await fetchData('https://api.paylite.co.id/absensi', requestOptions);
        console.log(data);
        if(data.status == 'Sukses'){
          console.log("Processing input data..............");
          console.log("Berhasil : ",data.data);
          alert("Absensi Berhasil!");
        }else{
          alert("Terjadi Kesalahan saat Input Data, Silahkan Ulangi kembali!");
        }

        // Di sini, Anda bisa melanjutkan dengan memproses data sesuai kebutuhan
        // Misalnya, Anda dapat memeriksa panjang data.data dan memberikan respons sesuai dengan itu.
      } catch (error) {
        console.error("Error:", error);
      }
    }


    
</script>
<style>
    #reader {
        border: 3px solid #cb0c9f !important;
        border-radius: 10px;
        border-color: #cb0c9f;
    }
</style>
<script>
        $("#liDash").html("Absensi");
        $("#liDash2").html("Absensi");
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
        $("#absensi").addClass("active");
        $("#nilai").removeClass("active");
      </script>
<?= $this->endSection() ?>