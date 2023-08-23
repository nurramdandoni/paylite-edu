<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Jadwal Pengajaran</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hari</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jam Mengajar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mata Ajar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengajar</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody id="list">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <style>
        .custom-select.custom-select-sm.form-control.form-control-sm {
            width: 80px;
        }
        #example_filter {
            text-align: right;
            margin-right: 10px;
        }
        #example_info {
            margin-left: 20px;
            margin-top: 10px;
        }
      </style>
      <script>
        getJadwalPengajaran();
        new DataTable('#example');
        var previousLink = document.querySelector('#example_previous a');
  
        if (previousLink) {
            previousLink.textContent = 'Prev';
        }
        $("#liDash").html("Jadwal Pengajaran");
        $("#liDash2").html("Jadwal Pengajaran");
        $("#dashboard").removeClass("active");
        $("#account").removeClass("active");
        $("#tahunAjaran").removeClass("active");
        $("#mataAjar").removeClass("active");
        $("#kelas").removeClass("active");
        $("#kurikulum").removeClass("active");
        $("#dataPengajar").removeClass("active");
        $("#dataPesertaDidik").removeClass("active");
        $("#dataKelas").removeClass("active");
        $("#jadwalPengajaran").addClass("active");
        $("#absensi").removeClass("active");
        $("#nilai").removeClass("active");

        async function getJadwalPengajaran(){
          const postJadwalPelajaran = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id
                }
          const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postJadwalPelajaran), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/jadwalPelajaranWhereJoin/'+lembaga_pendidikan_id+'');
                    console.log(data.data);
                    let temp = '';
                    let hari = {};

                    for (start = 0; start < data.data.length; start++) {
                      const currentData = data.data[start];
                      const namaHari = currentData.nama_hari;
                      const jamMulai = currentData.jam_mulai;

                      if (!hari[namaHari]) {
                        hari[namaHari] = {
                          count: 0,
                          jam_group: {
                            data: {}
                          }
                        };
                      }

                      if (!hari[namaHari].jam_group.data[jamMulai]) {
                        hari[namaHari].jam_group.data[jamMulai] = {
                          data: []
                        };
                      }

                      hari[namaHari].count++;
                      hari[namaHari].jam_group.data[jamMulai].data.push({
                        nama_kelas: currentData.nama_kelas,
                        nama_guru: currentData.nama_guru,
                        jadwal_pelajaran_id: currentData.jadwal_pelajaran_id
                      });
                    }

                    console.log(hari.Senin);

                    console.log("ini hasilnya : ",hari);
                    // const array_loop = ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"];
                    // Proses data dan menghitung rowspan
                    let processedData = {};

for (item of data.data) {
  if (!processedData[item.nama_hari]) {
    processedData[item.nama_hari] = {};
  }
  if (!processedData[item.nama_hari][item.jam_mulai]) {
    processedData[item.nama_hari][item.jam_mulai] = [];
  }
  processedData[item.nama_hari][item.jam_mulai].push(item);
}

let temp = "";

for (namaHari in processedData) {
  for (jamMulai in processedData[namaHari]) {
    const items = processedData[namaHari][jamMulai];
    const rowspan = items.length;

    for (let i = 0; i < rowspan; i++) {
      if (i === 0) {
        temp += `
        <tr>
          <td rowspan="${rowspan}">
            <div class="d-flex flex-column justify-content-center">
              <span class="badge badge-sm bg-gradient-success">${namaHari}</span>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0">${jamMulai}</p>
          </td>
          <td class="align-middle text-center text-sm">
            <span class="text-secondary text-xs font-weight-bold">${items[i].nama_kelas}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold">${items[i].nama_mata_ajar}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold">${items[i].nama_guru}</span>
          </td>
          <td class="align-middle">
            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
              Edit
            </a>
          </td>
        </tr>
        `;
      } else {
        temp += `
        <tr>
          <td class="align-middle text-center text-sm">
            <span class="text-secondary text-xs font-weight-bold">${items[i].nama_kelas}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold">${items[i].nama_mata_ajar}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold">${items[i].nama_guru}</span>
          </td>
          <td class="align-middle">
            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
              Edit
            </a>
          </td>
        </tr>
        `;
      }
    }
  }
}

$("#list").html(temp);


// Masukkan HTML ke dalam elemen dengan ID "list"
$("#list").html(temp);

                }
      </script>
<?= $this->endSection() ?>