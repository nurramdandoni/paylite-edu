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
              <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
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
                            <h6 class="mb-0 text-sm">Yunus Samudra</h6>
                          </div>
                        </div>
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
                            <h6 class="mb-0 text-sm">Anggita Sofiani</h6>
                          </div>
                        </div>
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
      </script>
<?= $this->endSection() ?>