<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tahun Ajaran</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Semester</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
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
        let lembaga_pendidikan_id = '<?= $_COOKIE['lembaga_pendidikan_id']; ?>';
        console.log("ini id : ",lembaga_pendidikan_id);
        getTahunAjaran();
        new DataTable('#example');
        var previousLink = document.querySelector('#example_previous a');
  
        if (previousLink) {
            previousLink.textContent = 'Prev';
        }
        $("#dashboard").removeClass("active");
        $("#account").removeClass("active");
        $("#tahunAjaran").addClass("active");
        $("#mataAjar").removeClass("active");
        $("#kelas").removeClass("active");
        $("#kurikulum").removeClass("active");
        $("#dataPengajar").removeClass("active");
        $("#dataPesertaDidik").removeClass("active");
        $("#dataKelas").removeClass("active");
        $("#jadwalPengajaran").removeClass("active");
        $("#absensi").removeClass("active");
        $("#nilai").removeClass("active");

        async function fetchData(url, options) {
            try {
                const response = await fetch(url, options);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();
                return data;
            } catch (error) {
                console.error('Fetch error:', error);
                // Lakukan penanganan kesalahan di sini, seperti menampilkan pesan kepada pengguna
                return {status:"gagal"};
            }
        }

        async function getTahunAjaran(){
          const postDatagetTahunAjaran = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id
                }
          const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postDatagetTahunAjaran), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/tahunAjaranWhere', requestOptions);
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
                            <h6 class="mb-0 text-sm">`+item.nama_tahun_ajaran+`</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">`+item.description+`</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-`+icon+`">`+item.status+`</span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                      `;
                    }
                    $("#list").html(temp);
                }
        
      </script>
<?= $this->endSection() ?>