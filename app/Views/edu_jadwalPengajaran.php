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
              <div id="contentFormInputEdit">
                  <!-- Button trigger modal -->
                  <button id="judulModal" onclick="formTambah()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Jadwal Pengajaran
                  </button>
                </div>
                <table id="example" class="table align-items-center mb-0" style="border-collapse: collapse;">
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
        $("#krs").removeClass("active");

        async function getTahunAjaranAktif(){
                  const postDataTahunAjaranAktif = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  status:"aktif"
                }
                console.log("cekkk : ",postDataTahunAjaranAktif);
                  const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(postDataTahunAjaranAktif), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/tahunAjaranWhere', requestOptions);
                    console.log("ID Tahun Ajaran Aktif : ",data.data[0].tahun_ajaran_id);
                    return data.data[0].tahun_ajaran_id;
                }

        async function getJadwalPengajaran(){
          const th = getTahunAjaranAktif();
          const postJadwalPelajaran = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  tahun_ajaran_id:th
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
                    let isFirstIteration = true;
                    // const keysData = Object.keys(hari);
                    // const keysJamGroup = keysData.map(key => Object.keys(hari[key].jam_group.data));
                    // console.log(`data`, keysData)
                    // console.log(`jam grup`, keysJamGroup)
                    // for(const item in hari){
                      let jCount = data.data;
                      console.log("data mentah ",jCount);
                    for(item=0; item<jCount.length;item++){
                      console.log("hari "+jCount[item].nama_hari+" :", hari[jCount[item].nama_hari].count);
                      console.log("jam : ", hari[jCount[item].nama_hari].jam_group.data[jCount[item].jam_mulai].data.length);
                      // console.log("hari jam "+jCount[item].nama_hari.jam_group.data[jCount[item].jam_mulai]+" :", hari[jCount[item].nama_hari].jam_group.data[jCount[item].jam_mulai].count);
                      let icon = 'secondary';
                      if(jCount[item].status == 'aktif'){
                        icon = 'success';
                      }
                      let tempCondition = '';
                      let tempCondition2 = '';
                      if(isFirstIteration){
                        tempCondition = `<td rowspan="`+hari[jCount[item].nama_hari].count+`">
                          <div class="d-flex flex-column justify-content-center">
                            <span class="badge badge-sm bg-gradient-success">`+jCount[item].nama_hari+`</span>
                          </div>
                      </td>`;
                            tempCondition2 = `<td style="text-align:center;" rowspan="`+hari[jCount[item].nama_hari].jam_group.data[jCount[item].jam_mulai].data.length+`">
                            <p class="text-xs font-weight-bold mb-0">`+jCount[item].jam_mulai+` - `+jCount[item].jam_selesai+`</p>
                          </td>`;
                    }else{
                      if(jCount[item].nama_hari != jCount[item-1].nama_hari){
                        tempCondition = `<td rowspan="`+hari[jCount[item].nama_hari].count+`">
                            <div class="d-flex flex-column justify-content-center">
                              <span class="badge badge-sm bg-gradient-success">`+jCount[item].nama_hari+`</span>
                            </div>
                        </td>`;
                        // if(jCount[item].jam_mulai != jCount[item-1].jam_mulai){
                                tempCondition2 = `<td style="text-align:center;" rowspan="`+hari[jCount[item].nama_hari].jam_group.data[jCount[item].jam_mulai].data.length+`">
                              <p class="text-xs font-weight-bold mb-0">`+jCount[item].jam_mulai+` - `+jCount[item].jam_selesai+`</p>
                            </td>`;
                          //     }
                        }else{
                          
                          if(jCount[item].jam_mulai != jCount[item-1].jam_mulai){
                                tempCondition2 = `<td style="text-align:center;" rowspan="`+hari[jCount[item].nama_hari].jam_group.data[jCount[item].jam_mulai].data.length+`">
                              <p class="text-xs font-weight-bold mb-0">`+jCount[item].jam_mulai+` - `+jCount[item].jam_selesai+`</p>
                            </td>`;
                              }
                        }
                      }
                      temp += `
                      <tr>
                      `+tempCondition+
                      tempCondition2+`
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold">`+jCount[item].nama_kelas+`</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">`+jCount[item].nama_mata_ajar+`</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">`+jCount[item].nama_guru+`</span>
                      </td>
                      <td class="align-middle">
                        <a onclick="formEdit('`+jCount[item].jadwal_pelajaran_id+`')" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                      `;
                      isFirstIteration = false;
                    }
                    if(data.data.length > 0){
                      $("#list").html(temp);
                    }
                }

                async function formTambah(){
                  const th = getTahunAjaranAktif();
                  console.log("clicked");
                  $("#modalTitle").html("Tambah Jadwal Pengajaran");
                  $("#modalButtonAction").html("Tambah");
                  let form = `
                  <input type="hidden" id="typeForm" value="add"/>
                  <div class="form-group">
                    <label for="hari">Hari</label>
                    <select class="form-control" id="DKHari">
                      <option value="1">Senin</option>
                      <option value="2">Selasa</option>
                      <option value="3">Rabu</option>
                      <option value="4">Kamis</option>
                      <option value="5">Jumat</option>
                      <option value="6">Sabtu</option>
                      <option value="7">Minggu</option>
                    </select>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="kelas">Jam Mulai</label>
                      <input type="time" class="form-control" id="DKJamMulai"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="kelas">Jam Selesai</label>
                      <input type="time" class="form-control" id="DKJamSelesai"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control " id="DKkelas">
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="kurikulum">Kurikulum</label>
                    <select class="form-control " id="DKkurikulum">
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pengajar">Pengajar</label>
                    <select class="form-control " id="DKpengajar">
                    </select>
                  </div>
                  `;
                  // $("#modalContent").html('<?= $_COOKIE['lembaga_pendidikan_id']; ?>');
                  $("#modalContent").html(form);
                  await getKelas();
                  await getKurikulum();
                  await getGuru()
                }
                async function formEdit(id){
                  console.log(id);
                  // const th = getTahunAjaranAktif();
                  // console.log("clicked");
                  // $("#modalTitle").html("Tambah Jadwal Pengajaran");
                  // $("#modalButtonAction").html("Tambah");
                  // let form = `
                  // <input type="hidden" id="typeForm" value="add"/>
                  // <div class="form-group">
                  //   <label for="hari">Hari</label>
                  //   <select class="form-control" id="DKHari">
                  //     <option value="1">Senin</option>
                  //     <option value="2">Selasa</option>
                  //     <option value="3">Rabu</option>
                  //     <option value="4">Kamis</option>
                  //     <option value="5">Jumat</option>
                  //     <option value="6">Sabtu</option>
                  //     <option value="7">Minggu</option>
                  //   </select>
                  // </div>
                  // <div class="row">
                  //   <div class="form-group col-md-6">
                  //     <label for="kelas">Jam Mulai</label>
                  //     <input type="time" class="form-control" id="DKJamMulai"/>
                  //   </div>
                  //   <div class="form-group col-md-6">
                  //     <label for="kelas">Jam Selesai</label>
                  //     <input type="time" class="form-control" id="DKJamSelesai"/>
                  //   </div>
                  // </div>
                  // <div class="form-group">
                  //   <label for="kelas">Kelas</label>
                  //   <select class="form-control " id="DKkelas">
                  //   </select>
                  // </div>
                  // <div class="form-group">
                  //   <label for="kurikulum">Kurikulum</label>
                  //   <select class="form-control " id="DKkurikulum">
                  //   </select>
                  // </div>
                  // <div class="form-group">
                  //   <label for="pengajar">Pengajar</label>
                  //   <select class="form-control " id="DKpengajar">
                  //   </select>
                  // </div>
                  // `;
                  // // $("#modalContent").html('<?= $_COOKIE['lembaga_pendidikan_id']; ?>');
                  // $("#modalContent").html(form);
                  // await getKelas();
                  // await getKurikulum();
                  // await getGuru()
                }
                async function insertJadwalPengajaran(dataPost){
                  const requestOptions = {
                  method: 'POST', // Metode permintaan
                  headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                  },
                  body: JSON.stringify(dataPost), // Mengubah data menjadi bentuk JSON
                };
                    const data = await fetchData('https://api.paylite.co.id/jadwalPelajaran', requestOptions);
                    return data;
                }

                async function modalButtonAction(){
                  const thn = await getTahunAjaranAktif();
                  const tipe = $("#typeForm").val();
                  const id = $("#idData").val();
                  const hari_id = $("#DKHari").val();
                  const kurikulum_id = $("#DKkurikulum").val();
                  const kelas_id = $("#DKkelas").val();
                  const siswa_id = $("#DKsiswa").val();
                  const guru_id = $("#DKpengajar").val();
                  const jam_mulai = $("#DKJamMulai").val();
                  const jam_selesai = $("#DKJamSelesai").val();
                  const postData = {
                      tipe: tipe,
                      lembaga_pendidikan_id: lembaga_pendidikan_id,
                      tahun_ajaran_id: thn,
                      hari_id: hari_id,
                      kurikulum_id: kurikulum_id,
                      data_kelas_id: kelas_id,
                      guru_id: guru_id,
                      jam_mulai: jam_mulai,
                      jam_selesai: jam_selesai
                    }
                  console.log("BEfore send : ", postData);
                  // cek data sebelumnya dengan nama yang sama
                  // const where = {
                  //   tahun_ajaran_id: tahun_ajaran_id,
                  //   kelas_id: kelas_id,
                  //   siswa_id: siswa_id
                  // };
                  // const hasilCek = await cekExist(where);
                  
                  //   console.log("Hasil Cek ::: ", hasilCek);
                  // if(hasilCek.data.length > 0){
                  //   console.log("id nya : ", id);
                  //   if(id != undefined){
                  //     const update = await updateDataKelas(id,postData);
                  //     if(update.status == "Sukses"){
                  //       alert("Data Berhasil Diperbaharui");
                  //       $("#cls").click();
                  //       getDataKelas();
                  //     }else{
                  //       alert("upsh ada kesalahan!");
                  //     }
                  //   }else{
                  //     alert("siswa dengan Nama : "+hasilCek.data[0].siswa.nama_siswa+" Sudah Ada di Kelas ini!");

                  //   }
                  // }else{
                  //   // proses insert/update data
                  //   if(tipe == "add"){

                      const inserted = await insertJadwalPengajaran(postData);
                      if(inserted){
                        alert("Data Berhasil Ditambahkan");
                        $("#cls").click();
                        getJadwalPengajaran();
                      }else{
                        alert("upsh ada kesalahan!");
                      }
                  //   }else{
                  //     const update = await updateDataKelas(id,postData);
                  //     if(update.status == "Sukses"){
                  //       alert("Data Berhasil Diperbaharui");
                  //       $("#cls").click();
                  //       getDataKelas();
                  //     }else{
                  //       alert("upsh ada kesalahan!");
                  //     }

                  //   }
                  // }

                };
                async function getKelas(){
                  const aktif = await getTahunAjaranAktif();
                    const postDatagetTahunAjaran = {
                            lembaga_pendidikan_id: lembaga_pendidikan_id,
                            tahun_ajaran_id:aktif
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
                    $("#DKpengajar").html(temp2);
                    return true;
              }
                async function getKurikulum(){
                  const aktif = await getTahunAjaranAktif();
                  console.log("AKTIFFFF : ",aktif);
                  const postDatagetKurikulum = {
                  lembaga_pendidikan_id: lembaga_pendidikan_id,
                  tahun_ajaran_id: aktif
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
      </script>
<?= $this->endSection() ?>