<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row" style="background-color: #f0f0f0;border-radius: 30px;padding: 20px;">
    Informasi Sekolah
    <div class="form-group">
        <label for="formNpsn">Nomor Legalitas (NPSN)</label>
        <input type="text" class="form-control" id="formNpsn" aria-describedby="formNpsn" placeholder="NPSN">
        <small id="formNpsntext" class="form-text text-muted">Masukan Nomor Legalitas Lembaga</small>
    </div>
    <div class="form-group">
        <label for="formJenjangPendidikan">Jenjang Pendidikan</label>
        <select type="text" class="form-control" id="formJenjangPendidikan" aria-describedby="formJenjangPendidikan" placeholder="Jenjang Pendidikan">
                      
        </select>
        <small id="formJenjangPendidikantext" class="form-text text-muted">Pilih Jenjang Pendidikan</small>
    </div>
    <div class="form-group">
        <label for="formSkAkreditasi">SK Akreditasi</label>
        <input type="text" class="form-control" id="formSkAkreditasi" aria-describedby="formSkAkreditasi" placeholder="SK Akreditasi">
        <small id="formSkAkreditasitext" class="form-text text-muted">Masukan Nomor SK Akreditasi ( Opsional )</small>
    </div>
    <div class="form-group">
        <label for="formNamaLembaga">Nama Lembaga</label>
        <input type="text" class="form-control" id="formNamaLembaga" aria-describedby="formNamaLembaga" placeholder="Nama Lembaga">
        <small id="formNamaLembagatext" class="form-text text-muted">Masukan Nama Lembaga</small>
    </div>
    <div class="form-group">
        <label for="formNamaKepalaSekolah">Nama Kepala Sekolah</label>
        <input type="text" class="form-control" id="formNamaKepalaSekolah" aria-describedby="formNamaKepalaSekolah" placeholder="Nama Kepala Sekolah">
        <small id="formNamaKepalaSekolahtext" class="form-text text-muted">Masukan Nama Kepala Sekolah</small>
    </div>
    <div class="form-group">
        <label for="formWebsite">Website Sekolah</label>
        <input type="text" class="form-control" id="formWebsite" aria-describedby="formWebsite" placeholder="Website Sekolah">
        <small id="formWebsitetext" class="form-text text-muted">https://edu.paylite.co.id</small>
    </div>
    <div class="form-group">
        <label for="formNoSekolah">Email Sekolah</label>
        <input type="text" class="form-control" id="formEmailSekolah" aria-describedby="formEmailSekolah" placeholder="Nomor Telepon Sekolah">
        <small id="formEmailSekolahtext" class="form-text text-muted">Masukan Email Sekolah</small>
    </div>
    <div class="form-group">
        <label for="formNoSekolah">Nomor Telepon Sekolah</label>
        <input type="text" class="form-control" id="formNoSekolah" aria-describedby="formNoSekolah" placeholder="Nomor Telepon Sekolah">
        <small id="formNoSekolahtext" class="form-text text-muted">Masukan Nomor Telepon Sekolah</small>
    </div>
    Alamat Sekolah
    <div class="form-group">
        <label for="formProvinsiSekolah">Provinsi</label>
        <input type="text" class="form-control" id="formProvinsiSekolah" aria-describedby="formProvinsiSekolah" placeholder="Nomor Telepon Sekolah">
        <small id="formProvinsiSekolahtext" class="form-text text-muted">Masukan Provinsi</small>
    </div>
    <div class="form-group">
        <label for="formKabupatenSekolah">Kabupaten</label>
        <input type="text" class="form-control" id="formKabupatenSekolah" aria-describedby="formKabupatenSekolah" placeholder="Nomor Telepon Sekolah">
        <small id="formKabupatenSekolahtext" class="form-text text-muted">Masukan Kabupaten</small>
    </div>
    <div class="form-group">
        <label for="formKecamatanSekolah">Kecamatan</label>
        <input type="text" class="form-control" id="formKecamatanSekolah" aria-describedby="formKecamatanSekolah" placeholder="Nomor Telepon Sekolah">
        <small id="formKecamatanSekolahtext" class="form-text text-muted">Masukan Kecamatan</small>
    </div>
    <div class="form-group">
        <label for="formDesaSekolah">Desa</label>
        <input type="text" class="form-control" id="formDesaSekolah" aria-describedby="formDesaSekolah" placeholder="Nomor Telepon Sekolah">
        <small id="formDesaSekolahtext" class="form-text text-muted">Masukan Desa</small>
    </div>
    Koordinat Sekolah
    <div class="form-group">
        <label for="formLatitudeSekolah">Latitude</label>
        <input type="text" class="form-control" id="formLatitudeSekolah" aria-describedby="formLatitudeSekolah" placeholder="Nomor Telepon Sekolah">
        <small id="formLatitudeSekolahtext" class="form-text text-muted">Masukan Latitude</small>
    </div>
    <div class="form-group">
        <label for="formLongitudeSekolah">Longitude</label>
        <input type="text" class="form-control" id="formLongitudeSekolah" aria-describedby="formLongitudeSekolah" placeholder="Nomor Telepon Sekolah">
        <small id="formLongitudeSekolahtext" class="form-text text-muted">Masukan Longitude</small>
    </div>
    Logo Sekolah
    <div>Logo</div>
    
    Informasi Admin Sekolah
    <div class="form-group">
        <label for="formEmailAdminSekolah">Email Admin</label>
        <input type="text" class="form-control" id="formEmailAdminSekolah" aria-describedby="formEmailAdminSekolah" placeholder="Nomor Telepon Sekolah">
        <small id="formEmailAdminSekolahtext" class="form-text text-muted">Masukan Email Admin</small>
    </div>
</div>

<script>
$("#liDash").html("Account");
$("#liDash2").html("Account");
$("#dashboard").removeClass("active");
$("#account").removeClass("active");
$("#tahunAjaran").removeClass("active");
$("#mataAjar").removeClass("active");
$("#kelas").removeClass("active");
$("#kurikulum").removeClass("active");
$("#dataPengajar").removeClass("active");
$("#dataPesertaDidik").removeClass("active");
$("#dataKelas").removeClass("active");
$("#jadwalPengajaran").removeClass("active");
$("#absensi").removeClass("active");
$("#nilai").removeClass("active");
$("#krs").removeClass("active");
$("#absensiReport").removeClass("active");
</script>
<?= $this->endSection() ?>