<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Kurikulum</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <div id="contentFormInputEdit">
                  <!-- Button trigger modal -->
                  <button id="judulModal" onclick="formTambah()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Kurikulum
                  </button>
                </div>
              <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Ajaran</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Mata Ajar</th>
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
        getKurikulum();
        $("#liDash").html("Kurikulum");
        $("#liDash2").html("Kurikulum");
        $("#dashboard").removeClass("active");
        $("#account").removeClass("active");
        $("#tahunAjaran").removeClass("active");
        $("#mataAjar").removeClass("active");
        $("#kelas").removeClass("active");
        $("#kurikulum").addClass("active");
        $("#dataPengajar").removeClass("active");
        $("#dataPesertaDidik").removeClass("active");
        $("#dataKelas").removeClass("active");
        $("#jadwalPengajaran").removeClass("active");
        $("#absensi").removeClass("active");
        $("#nilai").removeClass("active");

        async function getKurikulum(){
          const postDatagetKelas = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id
                }
          const requestOptions = {
                  method: 'GET', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postDatagetKelas), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/kurikulumWhereJoin/'+lembaga_pendidikan_id+'');
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
                        <p class="text-xs font-weight-bold mb-0">`+item.nama_mata_ajar+`</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-`+icon+`">`+item.status+`</span>
                      </td>
                      <td class="align-middle">
                        <a data-toggle="modal" data-target="#exampleModal" onclick="formEdit('`+item.kurikulum_id+`')" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
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

                function formTambah(){
                  console.log("clicked");
                  $("#modalTitle").html("Tambah Kurikulum");
                  $("#modalButtonAction").html("Tambah");
                  let form = `
                  <input type="hidden" id="typeForm" value="add"/>
                  <div class="form-group">
                    <label for="status">Tahun Ajaran</label>
                    <select class="form-control" id="tahunAjaranForm">
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="listMataAjar">Mata Ajar</label>
                    <select class="form-control" id="listMataAjar">
                    </select>
                    <small id="listMataAjarLabel" class="form-text text-muted">Masukan List Mata Ajar</small>
                  </div>
                  <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="status">Status Kelas</label>
                    <select class="form-control" id="statusKelas">
                      <option value="aktif">aktif</option>
                      <option value="non aktif">non aktif</option>
                    </select>
                  </div>
                  `;
                  // $("#modalContent").html('<?= $_COOKIE['lembaga_pendidikan_id']; ?>');
                  $("#modalContent").html(form);
                  getTahunAjaran();
                  getMataAjar();
                }
                async function formEdit(id){
                  console.log("clicked");
                  $("#modalTitle").html("Edit Kurikulum");
                  $("#modalButtonAction").html("Simpan");
                  const dt = await getExist(id);
                  let form = `
                  <input type="hidden" id="typeForm" value="edit"/>
                  <input type="hidden" id="idData" value="`+id+`"/>
                  <div class="form-group">
                    <label for="status">Tahun Ajaran</label>
                    <select class="form-control" id="tahunAjaranForm">
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="listMataAjar">Mata Ajar</label>
                    <select class="form-control" id="listMataAjar">
                    </select>
                    <small id="listMataAjarLabel" class="form-text text-muted">Masukan List Mata Ajar</small>
                  </div>
                  <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" rows="3">`+dt.data.description+`</textarea>
                  </div>
                  <div class="form-group">
                  <label for="status">Status Kelas</label>
                    <select class="form-control" id="statusKelas">
                      <option value="`+dt.data.status+`">`+dt.data.status+`</option>
                      <option value="aktif">aktif</option>
                      <option value="non aktif">non aktif</option>
                    </select>
                  </div>
                  `;
                  // $("#modalContent").html('<?= $_COOKIE['lembaga_pendidikan_id']; ?>');
                  $("#modalContent").html(form);
                  console.log("response ::: ",dt);
                  const dtget = await getTahunAjaran();
                  if(dtget){

                    $("#tahunAjaranForm").val(dt.data.tahun_ajaran_id);
                    console.log("yyyy : ",dt.data.tahun_ajaran_id);
                  }
                  const dtget2 = await getMataAjar();
                  if(dtget2){

                    $("#llistMataAjar").val(dt.data.mata_ajar_id);
                    console.log("yyyy : ",dt.data.tahun_ajaran_id);
                  }
                }

                async function getExist(id){
                    const data = await fetchData('https://api.paylite.co.id/kurikulum/'+id+'');
                    return data;
                }
                async function cekExist(tahun_ajaran_id,mata_ajar_id){
                  const postDatagetMataAjar = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  tahun_ajaran_id: tahun_ajaran_id,
                  mata_ajar_id: mata_ajar_id
                }
                  const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postDatagetMataAjar), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/kurikulumWhere', requestOptions);
                    return data;
                }
                async function insertDataKurikulum(dataPost){
                  const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(dataPost), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/kurikulum', requestOptions);
                    return data;
                }
                async function updateDataKurikulum(id,dataPost){
                  const requestOptions = {
                  method: 'PUT', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(dataPost), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/kurikulum/'+id+'', requestOptions);
                    return data;
                }

                async function modalButtonAction(){
                  const tipe = $("#typeForm").val();
                  const id = $("#idData").val();
                  const tahun_ajaran_id = $("#tahunAjaranForm").val();
                  const listMataAjar = $("#listMataAjar").val();
                  const description = $("#description").val();
                  const status = $("#statusKelas").val();
                  const postData = {
                      tipe: tipe,
                      lembaga_pendidikan_id: lembaga_pendidikan_id,
                      tahun_ajaran_id: tahun_ajaran_id,
                      listMataAjar: listMataAjar,
                      description: description,
                      status: status
                    }
                  
                  console.log(postData);
                 // cek data sebelumnya dengan nama yang sama
                  const hasilCek = await cekExist(tahun_ajaran_id,listMataAjar);
                    console.log(hasilCek);
                  if(hasilCek.data.length > 0){
                    console.log("id nya : ", id);
                    if(id != undefined){
                      const update = await updateDataKurikulum(id,postData);
                      if(update.status == "Sukses"){
                        alert("Data Berhasil Diperbaharui");
                        $("#cls").click();
                        getKelas();
                      }else{
                        alert("upsh ada kesalahan!");
                      }
                    }else{
                      alert("Mata Ajar Sudah Ada!");

                    }
                  }else{
                   // proses insert/update data
                    if(tipe == "add"){

                      const inserted = await insertDataKurikulum(postData);
                      if(inserted){
                        alert("Data Berhasil Ditambahkan");
                        $("#cls").click();
                        getKelas();
                      }else{
                        alert("upsh ada kesalahan!");
                      }
                    }else{
                      const update = await updateDataKurikulum(id,postData);
                      if(update.status == "Sukses"){
                        alert("Data Berhasil Diperbaharui");
                        $("#cls").click();
                        getKelas();
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
                    $("#tahunAjaranForm").html(temp2);
                    return true;
              }
              async function getMataAjar(){
          const postDatagetMataAjar = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id
                }
          const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postDatagetMataAjar), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/mataAjarWhere', requestOptions);
                    console.log(data.data);
                    let temp2 = '';
                    for(item2 of data.data){
                      temp2 += `<option value="`+item2.mata_ajar_id+`">`+item2.nama_mata_ajar+`</option>`;
                    }
                    $("#listMataAjar").html(temp2);
                    return true;
                }
        var previousLink = document.querySelector('#example_previous a');
  
        if (previousLink) {
            previousLink.textContent = 'Prev';
        }
      </script>
<?= $this->endSection() ?>