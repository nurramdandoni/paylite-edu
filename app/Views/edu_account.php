<?= $this->extend('layout/page_edu_layout') ?>

<?= $this->section('content') ?>
<div class="row" style="background-color: #f0f0f0;border-radius: 30px;padding: 20px;">
    Informasi Sekolah
    <div class="form-group">
        <label for="formNpsn">Nomor Legalitas (NPSN)</label>
        <input readonly type="text" class="form-control" id="formNpsn" aria-describedby="formNpsn" placeholder="NPSN">
        <small id="formNpsntext" class="form-text text-muted">Masukan Nomor Legalitas Lembaga</small>
    </div>
    <div class="form-group">
        <label for="formJenjangPendidikan">Jenjang Pendidikan</label>
        <select disabled type="text" class="form-control" id="formJenjangPendidikan" aria-describedby="formJenjangPendidikan" placeholder="Jenjang Pendidikan">
                      
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
        <input type="text" class="form-control" id="formWebsite" aria-describedby="formWebsite" placeholder="Website Sekolah" value="https://edu.paylite.co.id">
        <small id="formWebsitetext" class="form-text text-muted">Masukan Website Sekolah</small>
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
    <div id="logo"></div>
    
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

getLembagaPendidikan();

async function getLembagaPendidikan(){
    // jenjang pendidikan
        // Data yang akan dikirim dalam permintaan GET
        await fetch('https://api.paylite.co.id/jenjangPendidikan')
            .then(response => {
                if (!response.ok) {
                throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the response body as JSON
            })
            .then(data => {
                // Handle the JSON data
                console.log(data.data);
                let jenjangPendidikan = '';
                for (const item of data.data) {
                    jenjangPendidikan += `<option value="`+item.jenjang_pendidikan_id+`">`+item.nama_jenjang+`</option>`;
                }
                $("#formJenjangPendidikan").html(jenjangPendidikan);

            })
            .catch(error => {
                console.error('Fetch error:', error);
                // Handle errors here
            });
        // akhir jenjang pendidikan

    const data = await fetchData('https://api.paylite.co.id/lembagaPendidikan/'+lembaga_pendidikan_id+'');
    console.log(data.data);
    $("#formNpsn").val(data.data.nomor_legalitas);
    $("#formJenjangPendidikan").val(data.data.jenjang_pendidikan_id);
    $("#formSkAkreditasi").val(data.data.sk_akreditasi);
    $("#formNamaLembaga").val(data.data.nama_lembaga);
    $("#formNamaKepalaSekolah").val(data.data.nama_kepala_sekolah);
    $("#formWebsite").val(data.data.website);
    $("#formEmailSekolah").val(data.data.email_sekolah);
    $("#formNoSekolah").val(data.data.nomor_telepon);
    $("#formLatitudeSekolah").val(data.data.latitude);
    $("#formLongitudeSekolah").val(data.data.longitude);
    $("#logo").html(`<img src="<?= base_url()?>assets/img/`+data.data.logo_sekolah+`" style="width:200px;"/>`);
}
</script>
<?= $this->endSection() ?>