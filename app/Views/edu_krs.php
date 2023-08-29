<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data KRS</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <div id="contentFormInputEdit">
                  <!-- Button trigger modal -->
                  <button id="judulModal" onclick="formTambah()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data KRS
                  </button>
                </div>
              <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Ajaran</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kelas</th>
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
        getDataKrs();
        
        $("#liDash").html("Data KRS");
        $("#liDash2").html("Data KRS");
        $("#dashboard").removeClass("active");
        $("#account").removeClass("active");
        $("#tahunAjaran").removeClass("active");
        $("#mataAjar").removeClass("active");
        $("#kelas").removeClass("active");
        $("#kurikulum").removeClass("active");
        $("#dataPengajar").removeClass("active");
        $("#dataPesertaDidik").removeClass("active");
        $("#dataKelas").addClass("active");
        $("#jadwalPengajaran").removeClass("active");
        $("#absensi").removeClass("active");
        $("#nilai").removeClass("active");

        async function getDataKrs(){
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
                    const data = await fetchData('https://api.paylite.co.id/krsWhereJoin/'+lembaga_pendidikan_id+'');
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
                        <div class="align-middle">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">`+item.nama_kelas+`</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <a href="`+'<?= base_url(); ?>krsKelas/'+item.dTh+'/'+item.dKk+`" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Lihat KRS
                        </a>
                      </td>
                    </tr>
                      `;
                    }
                    if(data.data.length > 0){
                      $("#list").html(temp);
                    }
                    $('#example').DataTable();
                }

                    async function formTambah(){
                  console.log("clicked");
                  $("#modalTitle").html("Tambah Data KRS");
                  $("#modalButtonAction").html("Tambah");
                  let form = `
                  <input type="hidden" id="typeForm" value="add"/>
                  <div class="form-group">
                    <label for="tahunAjaran">Tahun Ajaran</label>
                    <select onchange="changeLive()" class="form-control" id="DKtahunAjaran">
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <select onchange="changeLive()" class="form-control" id="DKkelas">
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="siswa">Kurikulum</label>
                    <select class="form-control " id="DKkurikulum">
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" rows="3">-</textarea>
                  </div>
                  `;
                  // $("#modalContent").html('<?= $_COOKIE['lembaga_pendidikan_id']; ?>');
                  $("#modalContent").html(form);
                  await getTahunAjaran();
                  await getKelas();
                  // 
                  let tahun_ajaran_id = $("#DKtahunAjaran").val();
                  await getKurikulum(tahun_ajaran_id);
                  // 
                 
                }
                async function getExist(id){
                    const data = await fetchData('https://api.paylite.co.id/dataKelas/'+id+'');
                    return data;
                }
                async function cekExist(where){
                  const postDatagetKurikulum = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  tahun_ajaran_id: where.tahun_ajaran_id,
                  kelas_id: where.kelas_id,
                  kurikulum_id: where.kurikulum_id
                }
                console.log("cekkk : ",postDatagetKurikulum);
                  const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postDatagetKurikulum), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/krsWhere', requestOptions);
                    return data;
                }
                async function cekdatakelasList(where){
                  const postDatagetDataKelasList = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  tahun_ajaran_id: where.tahun_ajaran_id,
                  kelas_id: where.kelas_id
                }
                console.log("cekkk : ",postDatagetDataKelasList);
                  const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postDatagetDataKelasList), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/dataKelasWhere', requestOptions);
                    return data;
                }
                async function changeLive(){
                  let id_kelas = $("#DKkelas").val();
                  let tahun_ajaran_id = $("#DKtahunAjaran").val();
                  const where2 = {
                    tahun_ajaran_id: tahun_ajaran_id,
                    kelas_id: id_kelas
                  };
                  await getKurikulum(tahun_ajaran_id)
                }
                async function insertDataKrs(dataPost){
                  const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(dataPost), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/dataKelas', requestOptions);
                    return data;
                }
                async function updateDataKrs(id,dataPost){
                  const requestOptions = {
                  method: 'PUT', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(dataPost), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/dataKelas/'+id+'', requestOptions);
                    return data;
                }

                async function modalButtonAction(){
                  const tipe = $("#typeForm").val();
                  const id = $("#idData").val();
                  const tahun_ajaran_id = $("#DKtahunAjaran").val();
                  const kelas_id = $("#DKkelas").val();
                  const kurikulum_id = $("#DKkurikulum").val();
                  const description = $("#description").val();

                  const whereList = {
                    tahun_ajaran_id: tahun_ajaran_id,
                    kelas_id: kelas_id
                  };

                  const listSiswaKelas = await cekdatakelasList(whereList);
                  console.log("Data Siswa Di KElas : ",listSiswaKelas);
                  const postData = {
                      tipe: tipe,
                      lembaga_pendidikan_id: lembaga_pendidikan_id,
                      tahun_ajaran_id: tahun_ajaran_id,
                      kelas_id: kelas_id,
                      kurikulum_id: kurikulum_id,
                      description: description,
                    }
                  console.log("BEfore send : ", postData);
                  // cek data sebelumnya dengan nama yang sama
                  const where = {
                    tahun_ajaran_id: tahun_ajaran_id,
                    kelas_id: kelas_id,
                    kurikulum_id: kurikulum_id
                  };
                  const hasilCek = await cekExist(where);
                  
                    console.log("Hasil Cek ::: ", hasilCek);
                  if(hasilCek.data.length > 0){
                    console.log("id nya : ", id);
                    if(id != undefined){
                      // const update = await updateDataKrs(id,postData);
                      if(update.status == "Sukses"){
                        alert("Data Berhasil Diperbaharui");
                        $("#cls").click();
                        getDataKrs();
                      }else{
                        alert("upsh ada kesalahan!");
                      }
                    }else{
                      alert("Kurikulum : "+hasilCek.data[0].kurikulum.mata_ajar.nama_mata_ajar+" Sudah Ada di Kelas ini!");

                    }
                  }else{
                    // proses insert/update data
                    if(tipe == "add"){

                      // const inserted = await insertDataKrs(postData);
                      if(inserted){
                        alert("Data Berhasil Ditambahkan");
                        $("#cls").click();
                        getDataKrs();
                      }else{
                        alert("upsh ada kesalahan!");
                      }
                    }else{
                      // const update = await updateDataKrs(id,postData);
                      if(update.status == "Sukses"){
                        alert("Data Berhasil Diperbaharui");
                        $("#cls").click();
                        getDataKrs();
                      }else{
                        alert("upsh ada kesalahan!");
                      }

                    }
                  }

                };
                    
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
                    console.log("list tahun", data.data);
                    let temp2 = '';
                    for(item2 of data.data){
                      temp2 += `<option value="`+item2.tahun_ajaran_id+`">`+item2.nama_tahun_ajaran+`</option>`;
                    }
                    $("#DKtahunAjaran").html(temp2);
                    return true;
              }
                async function getKelas(){
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
                    const data = await fetchData('https://api.paylite.co.id/kelasWhere', requestOptions);
                    console.log("list tahun", data.data);
                    let temp2 = '';
                    for(item2 of data.data){
                      temp2 += `<option value="`+item2.kelas_id+`">`+item2.nama_kelas+`</option>`;
                    }
                    $("#DKkelas").html(temp2);
                    return true;
              }
                async function getGuru(){
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
                    const data = await fetchData('https://api.paylite.co.id/guruWhere', requestOptions);
                    console.log("list tahun", data.data);
                    let temp2 = '';
                    for(item2 of data.data){
                      temp2 += `<option value="`+item2.guru_id+`">`+item2.nama_guru+`</option>`;
                    }
                    $("#DKwaliKelas").html(temp2);
                    return true;
              }
                async function getKurikulum(tahun_ajaran_id){
                  const postDatagetKurikulum = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  tahun_ajaran_id: tahun_ajaran_id
                }
          const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postDatagetKurikulum), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/kurikulumWhere', requestOptions);
                    console.log("list tahun", data.data);
                    let temp2 = '';
                    for(item2 of data.data){
                      temp2 += `<option value="`+item2.kurikulum_id+`">`+item2.mata_ajar.nama_mata_ajar+`</option>`;
                    }
                    $("#DKkurikulum").html(temp2);
                    return true;
              }

                
        var previousLink = document.querySelector('#example_previous a');
  
        if (previousLink) {
            previousLink.textContent = 'Prev';
        }
      </script>
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?= $this->endSection() ?>