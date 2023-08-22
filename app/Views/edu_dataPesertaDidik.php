<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Peserta Didik</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-secondary opacity-7"></th>
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
        getSiswa();
        new DataTable('#example');
        var previousLink = document.querySelector('#example_previous a');
  
        if (previousLink) {
            previousLink.textContent = 'Prev';
        }
        $("#liDash").html("Data Peserta Didik");
        $("#liDash2").html("Data Peserta Didik");
        $("#dashboard").removeClass("active");
        $("#account").removeClass("active");
        $("#tahunAjaran").removeClass("active");
        $("#mataAjar").removeClass("active");
        $("#kelas").removeClass("active");
        $("#kurikulum").removeClass("active");
        $("#dataPengajar").removeClass("active");
        $("#dataPesertaDidik").addClass("active");
        $("#dataKelas").removeClass("active");
        $("#jadwalPengajaran").removeClass("active");
        $("#absensi").removeClass("active");
        $("#nilai").removeClass("active");

        async function getSiswa(){
          const postSiswa = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id
                }
          const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postSiswa), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/siswaWhere', requestOptions);
                    console.log(data.data);
                    let temp = '';
                    for(item of data.data){
                      let icon = 'secondary';
                      if(item.status == 'aktif'){
                        icon = 'success';
                      }
                      temp += `
                      <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="data:image/jpeg;base64,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" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">`+item.nama_siswa+`</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-`+icon+`">`+item.status+`</span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Detail
                        </a>
                      </td>
                    </tr>
                      `;
                    }
                    if(data.data.length > 0){
                      $("#list").html(temp);
                    }
                }
      </script>
<?= $this->endSection() ?>