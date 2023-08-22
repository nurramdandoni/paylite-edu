<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Pengajar</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jabatan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="data:image/jpeg;base64,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" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Adeyati Nurhayati, S. Pd., M. Pd.</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Kepala Sekolah</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Aktif</span>
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
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="data:image/jpeg;base64,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" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Hilal Tauhidman, S. Pd.</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Guru Olahraga</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Aktif</span>
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
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        $("#liDash").html("Data Pengajar");
        $("#liDash2").html("Data Pengajar");
        $("#dashboard").removeClass("active");
        $("#account").removeClass("active");
        $("#tahunAjaran").removeClass("active");
        $("#mataAjar").removeClass("active");
        $("#kelas").removeClass("active");
        $("#kurikulum").removeClass("active");
        $("#dataPengajar").addClass("active");
        $("#dataPesertaDidik").removeClass("active");
        $("#dataKelas").removeClass("active");
        $("#jadwalPengajaran").removeClass("active");
        $("#absensi").removeClass("active");
        $("#nilai").removeClass("active");
      </script>
<?= $this->endSection() ?>