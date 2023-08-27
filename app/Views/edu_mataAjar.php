<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Mata Ajar</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <div id="contentFormInputEdit">
                  <!-- Button trigger modal -->
                  <button id="judulModal" onclick="formTambah()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Mata Ajar
                  </button>
                </div>

                <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mata Ajar</th>
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
        getMataAjar();
        var previousLink = document.querySelector('#example_previous a');
  
        if (previousLink) {
            previousLink.textContent = 'Prev';
        }
        $("#liDash").html("Mata Ajar");
        $("#liDash2").html("Mata Ajar");
        $("#dashboard").removeClass("active");
        $("#account").removeClass("active");
        $("#tahunAjaran").removeClass("active");
        $("#mataAjar").addClass("active");
        $("#kelas").removeClass("active");
        $("#kurikulum").removeClass("active");
        $("#dataPengajar").removeClass("active");
        $("#dataPesertaDidik").removeClass("active");
        $("#dataKelas").removeClass("active");
        $("#jadwalPengajaran").removeClass("active");
        $("#absensi").removeClass("active");
        $("#nilai").removeClass("active");

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
                            <h6 class="mb-0 text-sm">`+item.nama_mata_ajar+`</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-`+icon+`">`+item.status+`</span>
                      </td>
                      <td class="align-middle">
                        <a data-toggle="modal" data-target="#exampleModal" onclick="formEdit('`+item.mata_ajar_id+`')" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
                  $("#modalTitle").html("Tambah Mata Ajar");
                  $("#modalButtonAction").html("Tambah");
                  let form = `
                  <input type="hidden" id="typeForm" value="add"/>
                  <div class="form-group">
                    <label for="namaMataAjar">Nama Mata Ajar</label>
                    <input type="text" class="form-control" id="namaMataAjar" aria-describedby="namaMata" placeholder="Nama Mata Ajar. Ex. Matematik">
                    <small id="namaMata" class="form-text text-muted">Masukan Nama Mata Ajar Anda</small>
                  </div>
                  <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="status">Status Mata Ajar</label>
                    <select class="form-control" id="statusMataAjar">
                      <option value="aktif">aktif</option>
                      <option value="non aktif">non aktif</option>
                    </select>
                  </div>
                  `;
                  // $("#modalContent").html('<?= $_COOKIE['lembaga_pendidikan_id']; ?>');
                  $("#modalContent").html(form);
                }
                async function formEdit(id){
                  console.log("clicked");
                  $("#modalTitle").html("Edit Mata Ajar");
                  $("#modalButtonAction").html("Simpan");
                  const dt = await getExist(id);
                  let form = `
                  <input type="hidden" id="typeForm" value="edit"/>
                  <input type="hidden" id="idData" value="`+id+`"/>
                  <div class="form-group">
                    <label for="namaMataAjar">Nama Mata Ajar</label>
                    <input  value="`+dt.data.nama_mata_ajar+`" type="text" class="form-control" id="namaMataAjar" aria-describedby="namaMata" placeholder="Nama Mata Ajar. Ex. Matematik">
                    <small id="namaMata" class="form-text text-muted">Masukan Nama Mata Ajar Anda</small>
                  </div>
                  <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" rows="3">`+dt.data.description+`</textarea>
                  </div>
                  <div class="form-group">
                  <label for="status">Status Mata Ajar</label>
                    <select class="form-control" id="statusMataAjar">
                      <option value="`+dt.data.status+`">`+dt.data.status+`</option>
                      <option value="aktif">aktif</option>
                      <option value="non aktif">non aktif</option>
                    </select>
                  </div>
                  `;
                  // $("#modalContent").html('<?= $_COOKIE['lembaga_pendidikan_id']; ?>');
                  $("#modalContent").html(form);
                  console.log(dt);
                }

                async function getExist(id){
                    const data = await fetchData('https://api.paylite.co.id/mataAjar/'+id+'');
                    return data;
                }
                async function cekExist(namamataajar){
                  const postDatagetMataAjar = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  nama_mata_ajar: namamataajar
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
                    return data;
                }
                async function insertDataMataAjar(dataPost){
                  const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(dataPost), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/mataAjar', requestOptions);
                    return data;
                }
                async function updateDataMataAjar(id,dataPost){
                  const requestOptions = {
                  method: 'PUT', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(dataPost), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/mataAjar/'+id+'', requestOptions);
                    return data;
                }

                async function modalButtonAction(){
                  const tipe = $("#typeForm").val();
                  const id = $("#idData").val();
                  const nama_mata_ajar = $("#namaMataAjar").val();
                  const description = $("#description").val();
                  const status = $("#statusMataAjar").val();
                  const postData = {
                      tipe: tipe,
                      lembaga_pendidikan_id: lembaga_pendidikan_id,
                      nama_mata_ajar: nama_mata_ajar,
                      description: description,
                      status: status
                    }
                  
                  console.log(postData);
                  // cek data sebelumnya dengan nama yang sama
                  const hasilCek = await cekExist(nama_mata_ajar);
                    console.log(hasilCek);
                  if(hasilCek.data.length > 0){
                    alert("Nama Mata Ajar Sudah Digunakan!");
                  }else{
                    // proses insert/update data
                    if(tipe == "add"){

                      const inserted = await insertDataMataAjar(postData);
                      if(inserted){
                        alert("Data Berhasil Ditambahkan");
                        $("#cls").click();
                        getMataAjar();
                      }else{
                        alert("upsh ada kesalahan!");
                      }
                    }else{
                      const update = await updateDataMataAjar(id,postData);
                      if(update.status == "Sukses"){
                        alert("Data Berhasil Diperbaharui");
                        $("#cls").click();
                        getMataAjar();
                      }else{
                        alert("upsh ada kesalahan!");
                      }

                    }
                  }

                };
        var previousLink = document.querySelector('#example_previous a');
  
        if (previousLink) {
            previousLink.textContent = 'Prev';
        }
      </script>
<?= $this->endSection() ?>