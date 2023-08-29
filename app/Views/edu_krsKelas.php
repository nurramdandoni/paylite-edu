<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data KRS ->  <span id="titleKelas"></span> - Tahun Ajaran <span id="titleTahunAjaran"></span> </h6>
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
                  where : {
                    lembaga_pendidikan_id: lembaga_pendidikan_id,
                    tahun_ajaran_id: tahun_ajaran_id,
                    kelas_id: kelas_id
                  },
                  column:"krs.kurikulum_id"
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
                    const data = await fetchData('https://api.paylite.co.id/krsWhereGroup',requestOptions);
                    console.log(data.data);
                    let temp = '';
                    for(item of data.data){
                      let icon = 'secondary';
                      if(item.siswa.status == 'aktif'){
                        icon = 'success';
                      }
                      temp += `
                      <tr>
                      <td>
                        <div class="align-middle">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">`+item.kurikulum.kurikulum_id+`</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          FOllower
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
                        getDataKrs();
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
                        getDataKrs();
                      }else{
                        alert("upsh ada kesalahan!");
                      }
                    }else{
                      const update = await updateDataKelas(id,postData);
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