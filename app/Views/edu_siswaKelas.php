<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Siswa ->  <span id="titleKelas"></span> - Tahun Ajaran <span id="titleTahunAjaran"></span> </h6>
              <h6>Wali Kelas :  <span id="titleWaliKelas">< </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <div id="contentFormInputEdit">
                  <!-- Button trigger modal -->
                  <button id="judulModal" onclick="formTambah()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Peserta Didik
                  </button>
                </div>
              <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NISN</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
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
        const tahun_ajaran_id = '<?= $tahun_ajaran_id; ?>';
        const kelas_id = '<?= $kelas_id; ?>';
        getDataKelas();
        
        $("#liDash").html("Data Kelas");
        $("#liDash2").html("Data Kelas");
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
        $("#krs").removeClass("active");

        async function getDataKelas(){
          const postSiswa = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  tahun_ajaran_id: tahun_ajaran_id,
                  kelas_id: kelas_id
                }
                console.log("SENDERRRRv : ", postSiswa);
          const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postSiswa), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/dataKelasWhere',requestOptions);
                    console.log(data.data);
                    let temp = '';
                    for(item of data.data){
                      let icon = 'secondary';
                      if(item.siswa.status == 'aktif'){
                        icon = 'success';
                      }
                      temp += `
                      <tr id="lsR`+item.data_kelas_id+`">
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="data:image/jpeg;base64,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" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">`+item.siswa.nisn+`</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">`+item.siswa.nama_siswa+`</h6>
                          </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-`+icon+`">`+item.siswa.status+`</span>
                      </td>
                      <td class="align-middle">
                        <a style="cursor:pointer;" onclick="removeDataKelasById('`+item.data_kelas_id+`','`+item.siswa.nama_siswa+`')" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Hapus dari Kelas
                        </a>
                      </td>
                    </tr>
                      `;
                    }
                    if(data.data.length > 0){
                      $("#list").html(temp);
                      $("#titleKelas").html(item.kelas.nama_kelas);
                      $("#titleWaliKelas").html(item.guru.nama_guru);
                      $("#titleTahunAjaran").html(item.tahun_ajaran.nama_tahun_ajaran);
                    }
                    $('#example').DataTable();
                }

                async function formTambah(){
                  console.log("clicked");
                  $("#modalTitle").html("Tambah Data Kelas");
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
                    <label for="waliKelas">Wali Kelas</label>
                    <select onchange="changeLive()" class="form-control" id="DKwaliKelas">
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="siswa">Siswa</label>
                    <select class="form-control " id="DKsiswa">
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
                  await getGuru();
                  await getSiswa();
                  $("#DKtahunAjaran").val('<?= $tahun_ajaran_id; ?>');
                  $("#DKtahunAjaran").attr('disabled',true) 
                  $("#DKkelas").val('<?= $kelas_id; ?>');
                  $("#DKkelas").attr('disabled',true) 
                  // 
                let id_kelas = $("#DKkelas").val();
                  let tahun_ajaran_id = $("#DKtahunAjaran").val();
                  const where2 = {
                    tahun_ajaran_id: tahun_ajaran_id,
                    kelas_id: id_kelas
                  };
                  const hasilCekWaliKelas = await cekExistWaliKelas(where2);
                  console.log("WALI KELAS :::: ",hasilCekWaliKelas);
                  if(hasilCekWaliKelas.data.length > 0){
                    $("#DKwaliKelas").val(hasilCekWaliKelas.data[0].wali_kelas_id);
                    $("#DKwaliKelas").attr('disabled',true) 
                  }else{
                    $("#DKwaliKelas").attr('disabled',false) 

                  }  
                // 
                 
                }

                
                async function removeDataKelasById(data_kelas_id,nama){
                  console.log(data_kelas_id);
                  const requestOptions = {
                  method: 'DELETE', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },// Mengubah data menjadi bentuk JSON
                };
                  var confirmation = confirm("Apakah Anda yakin Menghapus Data Kelas "+nama+"?");
                  if (confirmation) {
                    const data = await fetchData('https://api.paylite.co.id/dataKelas/'+data_kelas_id+'',requestOptions);
                    // return data;
                    if(data.status == 'Sukses'){
                      alert("Data Kelas "+nama+" Berhasil Dihapus!");
                      $("#lsR"+data_kelas_id).hide();
                    }else{
                      alert("Data Kelas "+nama+" Gagal Dihapus!");
                    }
                  } else {
                      // Batal logout
                  }
                }

                async function getExist(id){
                    const data = await fetchData('https://api.paylite.co.id/dataKelas/'+id+'');
                    return data;
                }
                async function cekExist(where){
                  const postDatagetMataAjar = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  tahun_ajaran_id: where.tahun_ajaran_id,
                  kelas_id: where.kelas_id,
                  siswa_id: where.siswa_id
                }
                console.log("cekkk : ",postDatagetMataAjar);
                  const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postDatagetMataAjar), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/dataKelasWhere', requestOptions);
                    return data;
                }
                async function cekExistWaliKelas(where){
                  const postDatagetMataAjar = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  tahun_ajaran_id: where.tahun_ajaran_id,
                  kelas_id: where.kelas_id
                }
                console.log("cekkk : ",postDatagetMataAjar);
                  const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postDatagetMataAjar), // Mengubah data menjadi bentuk JSON
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
                  const hasilCekWaliKelas = await cekExistWaliKelas(where2);
                  console.log("WALI KELAS :::: ",hasilCekWaliKelas);
                  if(hasilCekWaliKelas.data.length > 0){
                    $("#DKwaliKelas").val(hasilCekWaliKelas.data[0].wali_kelas_id);
                    $("#DKwaliKelas").attr('disabled',true) 
                  }else{
                    $("#DKwaliKelas").attr('disabled',false) 

                  }
                }
                async function insertDataKelas(dataPost){
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
                async function updateDataKelas(id,dataPost){
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
                  const wali_kelas_id = $("#DKwaliKelas").val();
                  const siswa_id = $("#DKsiswa").val();
                  const description = $("#description").val();
                  const postData = {
                      tipe: tipe,
                      lembaga_pendidikan_id: lembaga_pendidikan_id,
                      tahun_ajaran_id: tahun_ajaran_id,
                      kelas_id: kelas_id,
                      wali_kelas_id: wali_kelas_id,
                      siswa_id: siswa_id,
                      description: description,
                    }
                  console.log("BEfore send : ", postData);
                  // cek data sebelumnya dengan nama yang sama
                  const where = {
                    tahun_ajaran_id: tahun_ajaran_id,
                    kelas_id: kelas_id,
                    siswa_id: siswa_id
                  };
                  const hasilCek = await cekExist(where);
                  
                    console.log("Hasil Cek ::: ", hasilCek);
                  if(hasilCek.data.length > 0){
                    console.log("id nya : ", id);
                    if(id != undefined){
                      const update = await updateDataKelas(id,postData);
                      if(update.status == "Sukses"){
                        alert("Data Berhasil Diperbaharui");
                        $("#cls").click();
                        getDataKelas();
                      }else{
                        alert("upsh ada kesalahan!");
                      }
                    }else{
                      alert("siswa dengan Nama : "+hasilCek.data[0].siswa.nama_siswa+" Sudah Ada di Kelas ini!");

                    }
                  }else{
                    // proses insert/update data
                    if(tipe == "add"){

                      const inserted = await insertDataKelas(postData);
                      if(inserted){
                        alert("Data Berhasil Ditambahkan");
                        $("#cls").click();
                        getDataKelas();
                      }else{
                        alert("upsh ada kesalahan!");
                      }
                    }else{
                      const update = await updateDataKelas(id,postData);
                      if(update.status == "Sukses"){
                        alert("Data Berhasil Diperbaharui");
                        $("#cls").click();
                        getDataKelas();
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
                async function getSiswa(){
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
                    const data = await fetchData('https://api.paylite.co.id/siswaWhere', requestOptions);
                    console.log("list tahun", data.data);
                    let temp2 = '';
                    for(item2 of data.data){
                      temp2 += `<option value="`+item2.siswa_id+`">`+item2.nama_siswa+`</option>`;
                    }
                    $("#DKsiswa").html(temp2);
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