<?= $this->extend('layout/page_edu_register_layout') ?>

<?= $this->section('content') ?>
      <div class="row">
        <div id="formAdmin">
            <div class="form-group">
                  <label for="formRoleProduk">Status User</label>
                  <select type="text" class="form-control" id="formRoleProduk" aria-describedby="formRoleProduk" placeholder="Status Pengguna">
                  </select>
                  <small id="formRoleProduktext" class="form-text text-muted">Pilih Status Pengguna Anda</small>
              </div>
            <!-- <form> -->
              <div id="nonAdmin" class="form-group">
                  <label for="formNisNisnNip">Nomor Induk (NISN/NIS/NIP)</label>
                  <input type="text" class="form-control" id="formNisNisnNip" aria-describedby="formNisNisnNip" placeholder="NISN/ NIS/ NIP">
                  <small id="formNisNisnNiptext" class="form-text text-muted">Masukan Nomor Induk</small>
              </div>
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
                  <small id="formWebsitetext" class="form-text text-muted">Masukan Website Sekolah</small>
              </div>
              <div class="form-group">
                  <label for="formNoSekolah">Nomor Telepon Sekolah</label>
                  <input type="text" class="form-control" id="formNoSekolah" aria-describedby="formNoSekolah" placeholder="Nomor Telepon Sekolah">
                  <small id="formNoSekolahtext" class="form-text text-muted">Masukan Nomor Telepon Sekolah</small>
              </div>
              <!-- <div class="form-group">
                  <label for="formLogoSekolah">Logo Sekolah</label>
                  <input type="file" class="form-control-file" id="formLogoSekolah">
              </div> -->
              <!-- <button id="latlon" class="btn btn-primary">Daftarkan Koordinat Sekolah</button> -->
              <span id="aktivasiAkunAdmin" class="btn btn-primary">Aktivasi Akun Admin</span>
              <!-- </form> -->
        </div>

      </div>
      <script>
        let idProduk = "1";
        let user_idCookie = '<?= $_COOKIE["user_id"]; ?>';
        let id_subscriber = '';
        let id_lembaga_pendidikan = '';

        let formRoleProduk = '';
        let formNpsn = '';
        let formNisNisnNip = '';
        let formJenjangPendidikan = '';
        let formSkAkreditasi = '';
        let formNamaLembaga = '';
        let formNamaKepalaSekolah = '';
        let formWebsite = '';
        let formNoSekolah = '';
        $("#nonAdmin").hide();
        // Role Produk
        // Data yang akan dikirim dalam permintaan GET
        const postDataRole = {
                paylite_produk_id: idProduk,
            };

            // Objek opsi untuk konfigurasi permintaan
            console.log(postDataRole);
            const requestOptionsRole = {
            method: 'POST', // Metode permintaan
            headers: {
                'Content-Type': 'application/json', // Jenis konten yang dikirim
                // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
            },
            body: JSON.stringify(postDataRole) // Mengubah data menjadi bentuk JSON
            };
            fetch('https://api.paylite.co.id/roleProdukWhere',requestOptionsRole)
            .then(response => {
                if (!response.ok) {
                throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the response body as JSON
            })
            .then(data => {
                // Handle the JSON data
                console.log(data.data);
                let RoleProduk = '';
                for (const item of data.data) {
                    RoleProduk += `<option value="`+item.role_produk_id+`">`+item.role_name+`</option>`;
                }
                $("#formRoleProduk").html(RoleProduk);

            })
            .catch(error => {
                console.error('Fetch error:', error);
                // Handle errors here
            });
        // akhir role produk

        // jenjang pendidikan
        // Data yang akan dikirim dalam permintaan GET
            fetch('https://api.paylite.co.id/jenjangPendidikan')
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
        $("#formRoleProduk").change(function(){
            let role = $("#formRoleProduk").val();
            if(role != 1){
                $("#aktivasiAkunAdmin").html("AKTIVASI AKUN");
                $("#nonAdmin").show();
                $("#formSkAkreditasi").prop("disabled", true);
                $("#formNamaLembaga").prop("disabled", true);
                $("#formNamaKepalaSekolah").prop("disabled", true);
                $("#formWebsite").prop("disabled", true);
                $("#formNoSekolah").prop("disabled", true);
            }else{
                $("#aktivasiAkunAdmin").html("AKTIVASI AKUN ADMIN");
                $("#nonAdmin").hide();
                $("#formNpsn").prop("disabled", false);
                $("#formJenjangPendidikan").prop("disabled", false);
                $("#formSkAkreditasi").prop("disabled", false);
                $("#formNamaLembaga").prop("disabled", false);
                $("#formNamaKepalaSekolah").prop("disabled", false);
                $("#formWebsite").prop("disabled", false);
                $("#formNoSekolah").prop("disabled", false);
            }
        });
        $("#aktivasiAkunAdmin").click(function() {
                console.log("ok");
                console.log("ok");
                formRoleProduk = $("#formRoleProduk").val();
                formNpsn = $("#formNpsn").val();
                formNisNisnNip = $("#formNisNisnNip").val();
                formJenjangPendidikan = $("#formJenjangPendidikan").val();
                formSkAkreditasi = $("#formSkAkreditasi").val();
                formNamaLembaga = $("#formNamaLembaga").val();
                formNamaKepalaSekolah = $("#formNamaKepalaSekolah").val();
                formWebsite = $("#formWebsite").val();
                formNoSekolah = $("#formNoSekolah").val();
                const data = {
                    formRoleProduk,
                    formNisNisnNip,
                    formNpsn,
                    formJenjangPendidikan,
                    formSkAkreditasi,
                    formNamaLembaga,
                    formNamaKepalaSekolah,
                    formWebsite,
                    formNoSekolah
                }
                console.log(data);
                async function fetchData(url, requestOptions) {
                    try {
                        const response = await fetch(url, requestOptions);

                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }

                        const data = await response.json();
                        return data;
                    } catch (error) {
                        console.error('Fetch error:', error);
                        // Handle errors here
                        // throw error;
                        return {status:"gagal"};
                    }
                }
                async function insertSubscriber(){
                    const postDataInsertSubscriber = {
                            user_id: user_idCookie,
                            paylite_produk_id: idProduk,
                            role_produk_id: formRoleProduk,
                            status_pay: "not pay"
                        };
                    const requestOptionsPre = {
                            method: 'POST', // Metode permintaan
                            headers: {
                                'Content-Type': 'application/json', // Jenis konten yang dikirim
                                // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                            },
                            body: JSON.stringify(postDataInsertSubscriber) // Mengubah data menjadi bentuk JSON
                        };
                        const data = await fetchData('https://api.paylite.co.id/subscriber', requestOptionsPre);
                        return data;
                }
                async function insertLembagaPendidikan(){
                    const postDataInsertLembagaPendidikan = {
                        nomor_legalitas:formNpsn,
                        jenjang_pendidikan_id:formJenjangPendidikan,
                        sk_akreditasi:formSkAkreditasi,
                        nama_lembaga:formNamaLembaga,
                        nama_kepala_sekolah:formNamaKepalaSekolah,
                        website:formWebsite,
                        nomor_telepon:formNoSekolah,
                        email_sekolah:"-"
                        };
                        console.log("data sebelum insert lembaga", postDataInsertLembagaPendidikan);
                    const requestOptionsPre = {
                            method: 'POST', // Metode permintaan
                            headers: {
                                'Content-Type': 'application/json', // Jenis konten yang dikirim
                                // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                            },
                            body: JSON.stringify(postDataInsertLembagaPendidikan) // Mengubah data menjadi bentuk JSON
                        };
                        const data = await fetchData('https://api.paylite.co.id/lembagaPendidikan', requestOptionsPre);
                        return data;
                }
                async function insertEduUsers(){
                    const postDatainsertEduUsers = {
                        subscriber_id: id_subscriber,
                        lembaga_pendidikan_id: id_lembaga_pendidikan
                        };
                        console.log("data sebelum insert Edu Users", postDatainsertEduUsers);
                    const requestOptionsPre = {
                            method: 'POST', // Metode permintaan
                            headers: {
                                'Content-Type': 'application/json', // Jenis konten yang dikirim
                                // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                            },
                            body: JSON.stringify(postDatainsertEduUsers) // Mengubah data menjadi bentuk JSON
                        };
                        const data = await fetchData('https://api.paylite.co.id/eduUser', requestOptionsPre);
                        return data;
                }
                async function cekAdminLembaga(){
                        let route = 'https://api.paylite.co.id/cekAdminLembaga/'+formNpsn+'';
                        console.log("route cek : ",route);
                        const data = await fetchData('https://api.paylite.co.id/cekAdminLembaga/'+formNpsn+'');
                        return data.status;
                }

                async function ceknpsn(){
                    const postDataCekNpsn = {
                        nomor_legalitas: formNpsn
                    };
    
                    const requestOptions = {
                        method: 'POST', // Metode permintaan
                        headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                        },
                        body: JSON.stringify(postDataCekNpsn), // Mengubah data menjadi bentuk JSON
                    };
                    const data = await fetchData('https://api.paylite.co.id/lembagaPendidikanWhere', requestOptions);
                    return data;
                    
                }
                async function cekGuru(npsn){
                    const postDataCekGuru = {
                        nip: formNisNisnNip,
                        lembaga_pendidikan_id: npsn
                    };
    
                    const requestOptions = {
                        method: 'POST', // Metode permintaan
                        headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                        },
                        body: JSON.stringify(postDataCekGuru), // Mengubah data menjadi bentuk JSON
                    };
                    const data = await fetchData('https://api.paylite.co.id/guruWhere', requestOptions);
                    return data;
                    
                }
                async function cekSiswa(npsn){
                    const postDataCekGuru = {
                        nisn: formNisNisnNip,
                        lembaga_pendidikan_id: npsn
                    };
    
                    const requestOptions = {
                        method: 'POST', // Metode permintaan
                        headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                        },
                        body: JSON.stringify(postDataCekGuru), // Mengubah data menjadi bentuk JSON
                    };
                    const data = await fetchData('https://api.paylite.co.id/siswaWhere', requestOptions);
                    return data;
                }
                async function cekEduUser(id_lembaga){
                    const postDataCekEduUser = {
                        subscriber_id: id_subscriber,
                        lembaga_pendidikan_id: id_lembaga_pendidikan
                    };
    
                    const requestOptions = {
                        method: 'POST', // Metode permintaan
                        headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                        },
                        body: JSON.stringify(postDataCekEduUser), // Mengubah data menjadi bentuk JSON
                    };
                    const data = await fetchData('https://api.paylite.co.id/eduUserWhere', requestOptions);
                    return data;
                }


                async function redirectToEdu(){
                    <?php
                                            $cookieName = "statusProduk";
                                            $cookieValue = "registered";
                                            $cookieExpiration = time() + (60 * 60 * 24); // Contoh: kadaluarsa setelah 24 jam
                                            $cookiePath = "/";
                                            $cookieDomain = ".paylite.co.id";

                                            echo "document.cookie = '$cookieName=$cookieValue; expires=$cookieExpiration; path=$cookiePath; domain=$cookieDomain';";
                                            ?>
                                        window.location.href = "https://edu.paylite.co.id";
                }
                async function main() {
                    // Contoh penggunaan
                    const postDataCekSubscriberRole = {
                        user_id: user_idCookie,
                        paylite_produk_id: idProduk,
                        role_produk_id: formRoleProduk,
                    };
    
                    const requestOptions = {
                        method: 'POST', // Metode permintaan
                        headers: {
                            'Content-Type': 'application/json', // Jenis konten yang dikirim
                            // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
                        },
                        body: JSON.stringify(postDataCekSubscriberRole), // Mengubah data menjadi bentuk JSON
                    };
                    try {
                        const data = await fetchData('https://api.paylite.co.id/subscriberWhere', requestOptions);
                        console.log(data);

                        let stat = data.data.length;
                        if (stat > 0) {
                            // ...
                            console.log("exist");
                            console.log(data.data[0].subscriber_id);
                            id_subscriber = data.data[0].subscriber_id;
                            if(formRoleProduk == 1){
                                if(formNpsn == ''){
                                    alert("NPSN Wajib Diisi!");
                                }else{
                                    const statusAdmin = await cekAdminLembaga();
                                    console.log("status admin : ",statusAdmin);
                                    if(statusAdmin == 'Sukses'){
                                        alert("NPSN Telah Didaftarkan, Anda tidak dapat mendaftar sebagai Admin Pada NPSN Tersebut!");
                                    }else{
                                        const dataLembaga = await insertLembagaPendidikan();
                                        if(dataLembaga.status == 'gagal'){
                                            alert("Pastikan mengisi data dengan benar!");
                                        }else{
                                            id_lembaga_pendidikan =dataLembaga.data.lembaga_pendidikan_id;
                                            const eduUserInserted = await insertEduUsers();
                                            console.log("status edu user",eduUserInserted.status);
                                            // alert("Selamat Sekolah anda terdaftar!")
                                            redirectToEdu();
                                        }
                                        console.log("log 1", dataLembaga);
                                    }
                                    
                                }
                            }else{
                                const hasilCekNpsn = await ceknpsn();
                                console.log("st 1 ",hasilCekNpsn);
                                if(hasilCekNpsn.data.length > 0){
                                    id_lembaga_pendidikan = hasilCekNpsn.data[0].lembaga_pendidikan_id;
                                    // alert("Sekolah anda terdaftar");
                                    if(formRoleProduk == 2){
                                        const hasilCekGuru = await cekGuru(id_lembaga_pendidikan);
                                        console.log("hasil cek guru 1 : ",hasilCekGuru);
                                        if(hasilCekGuru.data.length > 0){
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                redirectToEdu();
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                redirectToEdu();
                                                // insert guru oleh admin
                                            }
                                        }else{
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                alert("Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                alert("Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                                // insert guru oleh admin
                                            }
                                        }
                                    }else if(formRoleProduk == 4){
                                        const hasilCekSiswa = await cekSiswa(id_lembaga_pendidikan);
                                        console.log("hasil cek siswa 1 : ",hasilCekSiswa);
                                        if(hasilCekSiswa.data.length > 0){
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                redirectToEdu()
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                redirectToEdu();
                                                // insert siswa oleh admin
                                            }
                                        }else{
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                alert("Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                alert("Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                                // insert siswa oleh admin
                                            }
                                        }

                                    }else{
                                        // insert eduUser
                                        const hasilCekSiswa = await cekSiswa(id_lembaga_pendidikan);
                                        console.log("hasil cek siswa ortu 1 : ",hasilCekSiswa);
                                        if(hasilCekSiswa.data.length > 0){
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                redirectToEdu()
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                redirectToEdu();
                                                // insert siswa oleh admin
                                            }
                                        }else{
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                alert("Putra/i Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                alert("Putra/i Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                                // insert siswa oleh admin
                                            }
                                        }
                                        console.log("ortu");
                                    }
                                }else{
                                    alert("Mohon maaf Sekolah Anda belur terdaftar, silahkan hubungi pihak sekolah!");
                                }
                            }
                        } else {
                            // ...
                            console.log("not exist");
                            if(formRoleProduk == 1){
                                if(formNpsn == ''){
                                    alert("NPSN Wajib Diisi!");
                                }else{
                                    const statusAdmin = await cekAdminLembaga();
                                    console.log("status admin : ",statusAdmin);
                                    if(statusAdmin == 'Sukses'){
                                        alert("NPSN Telah Didaftarkan, Anda tidak dapat mendaftar sebagai Admin Pada NPSN Tersebut!");
                                    }else{
                                        console.log("ini selepas insert subscriber");
                                        const res_subscriber = await insertSubscriber();
                                        console.log(res_subscriber.data.subscriber_id);
                                        id_subscriber = res_subscriber.data.subscriber_id;

                                        const dataLembaga = await insertLembagaPendidikan();
                                        if(dataLembaga.status == 'gagal'){
                                            alert("Pastikan mengisi data dengan benar!");
                                        }else{
                                            id_lembaga_pendidikan =dataLembaga.data.lembaga_pendidikan_id;
                                            const eduUserInserted = await insertEduUsers();
                                            console.log("status edu user 2",eduUserInserted.status);
                                            // alert("Selamat Sekolah anda terdaftar!")
                                            redirectToEdu();
                                        }
                                        console.log("log 2", dataLembaga);
                                    }
                                    
                                }
                            }else{
                                // insert subscriber
                                const res_subscriber = await insertSubscriber();
                                // alert("sampe sini : ");
                                // alert("sampe sini : ", res_subscriber.status);
                                console.log(res_subscriber.data.subscriber_id);
                                id_subscriber = res_subscriber.data.subscriber_id;
                                const hasilCekNpsn = await ceknpsn();
                                console.log("st 2 ",hasilCekNpsn);
                                if(hasilCekNpsn.data.length > 0){

                                    id_lembaga_pendidikan = hasilCekNpsn.data[0].lembaga_pendidikan_id;
                                    // alert("Sekolah anda terdaftar");
                                    if(formRoleProduk == 2){
                                        const hasilCekGuru = await cekGuru(id_lembaga_pendidikan);
                                        console.log("hasil cek guru 1 : ",hasilCekGuru);
                                        if(hasilCekGuru.data.length > 0){
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                redirectToEdu()
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                redirectToEdu();
                                                // insert guru oleh admin
                                            }
                                        }else{
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                alert("Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                alert("Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                                // insert guru oleh admin
                                            }
                                        }
                                    }else if(formRoleProduk == 4){
                                        const hasilCekSiswa = await cekSiswa(id_lembaga_pendidikan);
                                        console.log("hasil cek siswa 1 : ",hasilCekSiswa);
                                        if(hasilCekSiswa.data.length > 0){
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                redirectToEdu()
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                redirectToEdu();
                                                // insert siswa oleh admin
                                            }
                                        }else{
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                alert("Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                alert("Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                                // insert siswa oleh admin
                                            }
                                        }

                                    }else{
                                        // insert eduUser
                                        const hasilCekSiswa = await cekSiswa(id_lembaga_pendidikan);
                                        console.log("hasil cek siswa ortu 1 : ",hasilCekSiswa);
                                        if(hasilCekSiswa.data.length > 0){
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                redirectToEdu()
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                redirectToEdu();
                                                // insert siswa oleh admin
                                            }
                                        }else{
                                            const exist = await cekEduUser();
                                            if(exist.data.length > 0){
                                                
                                                alert("Putra/i Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                            }else{

                                                // insert eduUser
                                                const eduUserInserted = await insertEduUsers();
                                                alert("Putra/i Anda Tidak Terdaftar silahkan Hubungi Pihak Sekolah!");
                                                // insert siswa oleh admin
                                            }
                                        }
                                        console.log("ortu");
                                    }
                                }else{
                                    alert("Mohon maaf Sekolah Anda belur terdaftar, silahkan hubungi pihak sekolah!");
                                }
                                // insert edu_users
                                // insert siswa/guru/siswa
                            }
                        }
                    } catch (error) {
                        // Handle errors here
                    }
                }

                main(); // Memanggil fungsi asinkron
            });
            
      </script>
      <?= $this->endSection() ?>