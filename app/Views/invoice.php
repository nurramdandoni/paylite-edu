<html>
	<head>
	</head>
	<body>
        <div style="text-align:center;">
            <table border="0" style="border-bottom: 2px solid #000;width:100%;padding:0px;">
                <tr>
                    <td rowspan="4" style="padding-left:40px; width:80px;"><img style="width:80px;" class="header-logo" src="<?= $logo; ?>" alt="Logo"></td>
                    <td style="text-align:center;font-size:18px;margin-bottom:0px;width:650px;"><b>PEMERINTAH KABUPATEN <?= $kabupaten; ?></b></td><td style="width:40px;"></td>
                </tr>
                <tr>
                    <td style="text-align:center;font-size:15px;width:650px;"><b>DINAS PENDIDIKAN DAN KEBUDAYAAN</b></td><td style="width:40px;"></td>
                </tr>
                <tr>
                    <td style="text-align:center;font-size:18px;margin-top:0px;width:650px;"><b><?= $nama_sekolah; ?></b></td><td style="width:40px;"></td>
                </tr>
                <tr>
                    <td style="text-align:center;font-size:11px;margin-top:4px;width:650px;"><?= $alamat; ?></td><td style="width:40px;"></td>
                </tr>
            </table>
        </div>
        <table border="0">
            <tr>
                <td style="text-align:center;font-size:12px;"><b>Rekapitulasi Absensi</b></td>
            </tr>
            <tr>
                <td style="text-align:center;font-size:12px;"><b><?= $tahun_ajaran; ?></b></td>
            </tr>
        </table>
        <table>
            <tr>
                <td></td>
            </tr>
        </table>
        <table border="0" style="margin-top:10px;font-size:11px;">
            <tr>
                <td style="width:100px;">Kelas</td><td>:<?= $kelas; ?></td>
            </tr>
            <tr>
                <td style="width:100px;">Mata Pelajaran</td><td>:<?= $mata_ajar; ?></td>
            </tr>
            <tr>
                <td style="width:100px;">Pengajar</td><td>:<?= $pengajar; ?></td>
            </tr>
            <tr>
                <td style="width:100px;">Wali Kelas</td><td>:<?= $wali_kelas; ?></td>
            </tr>
            <tr>
                <td style="width:100px;">Bulan</td><td>:<?= $bulan; ?></td>
            </tr>
        </table>

        <table border="1">
        <tr>
            <td rowspan="2" style="width:20px;text-align:center;font-size:10px;padding-top:10px;"><b>No</b></td>
            <td rowspan="2" style="width: 70px;text-align:center;font-size:10px;padding-top:10px;"><b>NIS/ NISN</b></td>
            <td rowspan="2" style="width: 200px;text-align:center;font-size:10px;padding-top:10px;"><b>Nama Peserta Didik</b></td>
            <td colspan="31" style="text-align:center;font-size:10px;width: 496px;"><b>Tanggal</b></td>
        </tr>
        <tr>
            <?php for($i=1;$i<32;$i++){?>
                <td style="width: 16px;text-align:center;font-size:10px;"><?= $i; ?></td>
            <?php }?>
        </tr>
        <!-- loop -->
        <?php for($i=0;$i<count($siswaList);$i++){?>
        <tr>
            <td style="width:20px;text-align:center;font-size:9px;"><?= $i+1; ?></td>
            <td style="width: 70px;text-align:left;font-size:9px;">&nbsp;<?= $siswaList[$i]["nisn"]; ?></td>
            <td style="width: 200;text-align:left;font-size:9px;">&nbsp;<?= $siswaList[$i]["nama_siswa"]; ?></td>

            <?php for($j=1;$j<32;$j++){?>
                <td style="width: 16px;text-align:center;font-size:10px;">
                    <?php 
                        if(isset($AbsensisiswaList["kehadiran"][$siswaList[$i]["nisn"]][$j])){
                            if($AbsensisiswaList["kehadiran"][$siswaList[$i]["nisn"]][$j] == "hadir"){
                                ?>
                                <span style="color:green;text-align:center;"><b>v</b></span>
                                <?php
                            }else{
                                echo "-";

                            }
                        }else{
                            ?>
                            <span style="color:red;text-align:center;"><b>x</b></span>
                            <?php
                        }
                    ?>
                </td>
            <?php }?>
        </tr>
        <?php } ?>
        <!-- end loop -->
        
    </table>

	</body>
</html>