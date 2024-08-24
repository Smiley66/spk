<?php 
require "functions.php";
$tittle = "Perhitungan MPE";

require('templates/header.php');
require('templates/navbar.php');

// mysqli_query($conn, "TRUNCATE TABLE rangking");

$nilaiAlt = mysqli_query($conn, "SELECT id_nilai, nama_alt, periode,
sum(IF(kriteria='Kualitas Kerja', nilai, NULL)) AS nilaiA,
sum(IF(kriteria='Kemampuan Beradaptasi', nilai, NULL)) AS nilaiB,
sum(IF(kriteria='Kerjasama Tim', nilai, NULL)) AS nilaiC,
sum(IF(kriteria='Kepemimpinan', nilai, NULL)) AS nilaiD,
sum(IF(kriteria='Keterampilan Komunikasi', nilai, NULL)) AS nilaiE,
max(IF(kriteria='Kualitas Kerja', keterangan, NULL)) AS ketA,
max(IF(kriteria='Kemampuan Beradaptasi', keterangan, NULL)) AS ketB,
max(IF(kriteria='Kerjasama Tim', keterangan, NULL)) AS ketC,
max(IF(kriteria='Kepemimpinan', keterangan, NULL)) AS ketD,
max(IF(kriteria='Keterampilan Komunikasi', keterangan, NULL)) AS ketE
FROM nilai_alternatif GROUP BY nama_alt");

$kriteria1 = mysqli_query($conn, "SELECT nama_krt, bobot_krt FROM kriteria WHERE kode_krt = 'C01'");
$kriteria2 = mysqli_query($conn, "SELECT nama_krt, bobot_krt FROM kriteria WHERE kode_krt = 'C02'");
$kriteria3 = mysqli_query($conn, "SELECT nama_krt, bobot_krt FROM kriteria WHERE kode_krt = 'C03'");
$kriteria4 = mysqli_query($conn, "SELECT nama_krt, bobot_krt FROM kriteria WHERE kode_krt = 'C04'");
$kriteria5 = mysqli_query($conn, "SELECT nama_krt, bobot_krt FROM kriteria WHERE kode_krt = 'C05'");

$ka = mysqli_fetch_array($kriteria1);
$kb = mysqli_fetch_array($kriteria2);
$kc = mysqli_fetch_array($kriteria3);
$kd = mysqli_fetch_array($kriteria4);
$ke = mysqli_fetch_array($kriteria5);

$bobot1 = $ka['bobot_krt'];
$bobot2 = $kb['bobot_krt'];
$bobot3 = $kc['bobot_krt'];
$bobot4 = $kd['bobot_krt'];
$bobot5 = $ke['bobot_krt'];

?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="col-md-12 col-xl-12">
                        <div class="card card-social">
                            <div class="card-block border-bottom">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Perhitungan MPE</li>
                                    </ol>
                                </nav>
                                
                                  <!-- Button trigger modal -->
                                  <!-- <a href="add-kriteria.php" class="btn btn-primary btn-sm">
                                      Hitung
                                  </a> -->
                                  <hr>
                                  <div class="page-wrapper">
                                    <h3>1. Nilai Alternatif</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alternatif</th>
                                                <th><?= $ka['nama_krt'] ?></th>
                                                <th><?= $kb['nama_krt'] ?></th>
                                                <th><?= $kc['nama_krt'] ?></th>
                                                <th><?= $kd['nama_krt'] ?></th>
                                                <th><?= $ke['nama_krt'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($nilaiAlt as $ket) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $ket['nama_alt']; ?></td>
                                                <td><?= $ket['ketA']; ?></td>
                                                <td><?= $ket['ketB']; ?></td>
                                                <td><?= $ket['ketC']; ?></td>
                                                <td><?= $ket['ketD']; ?></td>
                                                <td><?= $ket['ketE']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page-wrapper">
                                    <h3>2. Matriks Keputusan</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alternatif</th>
                                                <th><?= $ka['nama_krt'] ?></th>
                                                <th><?= $kb['nama_krt'] ?></th>
                                                <th><?= $kc['nama_krt'] ?></th>
                                                <th><?= $kd['nama_krt'] ?></th>
                                                <th><?= $ke['nama_krt'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($nilaiAlt as $na) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $na['nama_alt']; ?></td>
                                                <td><?= $na['nilaiA']; ?></td>
                                                <td><?= $na['nilaiB']; ?></td>
                                                <td><?= $na['nilaiC']; ?></td>
                                                <td><?= $na['nilaiD']; ?></td>
                                                <td><?= $na['nilaiE']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <th colspan="2">Bobot</th>
                                                <th><?= $ka['bobot_krt'] ?></th>
                                                <th><?= $kb['bobot_krt']; ?></th>
                                                <th><?= $kc['bobot_krt']; ?></th>
                                                <th><?= $kd['bobot_krt']; ?></th>\
                                                <th><?= $ke['bobot_krt']; ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page-wrapper">
                                    <h3>3. Perhitungan Nilai Kriteria Untuk Setiap Alternatif</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alternatif</th>
                                                <th><?= $ka['nama_krt'] ?></th>
                                                <th><?= $kb['nama_krt'] ?></th>
                                                <th><?= $kc['nama_krt'] ?></th>
                                                <th><?= $kd['nama_krt'] ?></th>
                                                <th><?= $ke['nama_krt'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($nilaiAlt as $na) : 
                                                $nilai1 = $na['nilaiA'];
                                                $nilai2 = $na['nilaiB'];
                                                $nilai3 = $na['nilaiC'];
                                                $nilai4 = $na['nilaiD'];
                                                $nilai5 = $na['nilaiE'];
                                                
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $na['nama_alt']; ?></td>
                                                <td><?= $nilai1.'^'.$bobot1.' = '.round(pow($nilai1,$bobot1),2);?></td>
                                                <td><?= $nilai2.'^'.$bobot2.' = '.round(1 / pow($nilai2, -$bobot2), 3);?></td>
                                                <td><?= $nilai3.'^'.$bobot3.' = '.round(pow($nilai3,$bobot3),2);?></td>
                                                <td><?= $nilai4.'^'.$bobot4.' = '.round(pow($nilai4,$bobot4),2);?></td>
                                                <td><?= $nilai5.'^'.$bobot5.' = '.round(pow($nilai5,$bobot5),2);?></td>
                                            </tr>
                                            <?php endforeach;?>
                                            <tr>
                                                <th colspan="2">Bobot</th>
                                                <th><?= $ka['bobot_krt'] ?></th>
                                                <th><?= $kb['bobot_krt']; ?></th>
                                                <th><?= $kc['bobot_krt']; ?></th>
                                                <th><?= $kd['bobot_krt']; ?></th>
                                                <th><?= $ke['bobot_krt']; ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="page-wrapper">
                                    <h3>4. Perhitungan Nilai Skor</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Alternatif</th>
                                                <th>Perhitungan</th>
                                                <th>Nilai Alternatif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- membuat kode untuk ranking -->
                                            <?php

                                            $queryKode = mysqli_query($conn, "SELECT max(kode_rank) as kodeTerbesar FROM rangking");
                                            $dataRank = mysqli_fetch_array($queryKode);
                                            $kodeRank = $dataRank['kodeTerbesar'];
                                            $urutan = (int) substr($kodeRank, 1, 2);
                                            $urutan++;
                                            $huruf = "P";
                                            $kodeRanking = $huruf . sprintf("%02s", $urutan);
                                            ?>
                                            <!-- membuat kode untuk ranking -->

                                            <?php $i = 1; ?>
                                            <?php foreach ($nilaiAlt as $na) : 
                                                $nilai1 = $na['nilaiA'];
                                                $nilai2 = $na['nilaiB'];
                                                $nilai3 = $na['nilaiC'];
                                                $nilai4 = $na['nilaiD'];
                                                $nilai5 = $na['nilaiE'];

                                                // nilai
                                                $k1 = round(pow($nilai1,$bobot1),2);
                                                $k2 = round(pow($nilai2,$bobot2),2);
                                                $k3 = round(pow($nilai3,$bobot3),2);
                                                $k4 = round(pow($nilai4,$bobot4),2);
                                                $k5 = round(pow($nilai5,$bobot5),2);
                                                $totalalternatif = $k1+$k2+$k3+$k4+$k5;
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $na['nama_alt']; ?></td>
                                                <td><?= $k1 .' + '. $k2 .' + '. $k3 .' + '.  $k4 .' + '.  $k5 .' + '. $k5; ?></td>
                                                <td><?= round(($totalalternatif), 2) ?></td>
                                            </tr>
                                            <?php
                                            $alt = $na['nama_alt'];
                                            $periode = $na['periode'];
                                            $peringkat = $totalalternatif;
                                            mysqli_query($conn, "INSERT INTO rangking VALUES('','$kodeRanking','$periode','$alt','$peringkat')");
                                             ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page-wrapper">
                                    <h3>4. Ranking</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Alternatif</th>
                                                <th>Nilai Alternatif</th>
                                                <th>Peringkat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $peringkat = mysqli_query($conn, "SELECT * FROM rangking GROUP BY nama_alt ORDER BY nilai_alt DESC"); ?>
                                            <?php $rank = 1; ?>
                                            <?php $i = 1; ?>
                                            <?php foreach($peringkat as $p) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $p['nama_alt']; ?></td>
                                                <td><?= $p['nilai_alt']; ?></td>
                                                <td><?= $rank++; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- akhir main content -->

<?php 

require('templates/footer.php');


?>