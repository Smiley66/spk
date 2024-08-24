<?php 
require "functions.php";
require('templates/header.php');
require('templates/navbar.php');

$nilaiAlt = mysqli_query($conn, "SELECT id_nilai, nama_alt, tren_kriteria,
sum(IF(kriteria='IRR (%)', nilai, NULL)) AS kriteriaA,
sum(IF(kriteria='B/C', nilai, NULL)) AS kriteriaB,
sum(IF(kriteria='PBP (Thn)', nilai, NULL)) AS kriteriaC
-- sum(IF(kriteria='Kriteria D', nilai, NULL)) AS kriteriaD
FROM nilai_alternatif GROUP BY nama_alt");

$kriteria1 = mysqli_query($conn, "SELECT nama_krt, tren FROM kriteria WHERE kode_krt = 'C01'");
$kriteria2 = mysqli_query($conn, "SELECT nama_krt, tren FROM kriteria WHERE kode_krt = 'C02'");
$kriteria3 = mysqli_query($conn, "SELECT nama_krt, tren FROM kriteria WHERE kode_krt = 'C03'");

$ka = mysqli_fetch_array($kriteria1);
$kb = mysqli_fetch_array($kriteria2);
$kc = mysqli_fetch_array($kriteria3);
// $d = mysqli_fetch_array($kriteriaD);

mysqli_query($conn, "TRUNCATE TABLE rangking");

// var_dump($trenKriteria);
// die();
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
                                        <li class="breadcrumb-item active" aria-current="page">Perhitungan CPI</li>
                                    </ol>
                                </nav>
                                
                                  <!-- Button trigger modal -->
                                  <!-- <a href="add-kriteria.php" class="btn btn-primary btn-sm">
                                      Hitung
                                  </a> -->
                                  <hr>
                                  <div class="page-wrapper">
                                    <h3>Matriks Perbandingan Berpasangan</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alternatif</th>
                                                <th>Kriteria (<?= $ka['nama_krt'] ?>)</th>
                                                <th>Kriteria (<?= $kb['nama_krt'] ?>)</th>
                                                <th>Kriteria (<?= $kc['nama_krt'] ?>)</th>
                                            </tr>
                                            <tr>
                                                <td>-</td>
                                                <td>Tren Kriteria</td>
                                                <td><?= $ka['tren'] ?></td>
                                                <td><?= $kb['tren'] ?></td>
                                                <td><?= $kc['tren'] ?></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($nilaiAlt as $na) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $na['nama_alt']; ?></td>
                                                <td><?= $na['kriteriaA']; ?></td>
                                                <td><?= $na['kriteriaB']; ?></td>
                                                <td><?= $na['kriteriaC']; ?></td>
                                                
                                            </tr>
                                            <?php endforeach; 

                                            $kriteriaA = mysqli_query($conn, "SELECT sum(nilai) as a FROM nilai_alternatif WHERE kriteria = 'Kriteria A'");
                                            $kriteriaB = mysqli_query($conn, "SELECT sum(nilai) as b FROM nilai_alternatif WHERE kriteria = 'Kriteria B'");
                                            $kriteriaC = mysqli_query($conn, "SELECT sum(nilai) as c FROM nilai_alternatif WHERE kriteria = 'Kriteria C'");
                                            $kriteriaD = mysqli_query($conn, "SELECT sum(nilai) as d FROM nilai_alternatif WHERE kriteria = 'Kriteria D'");
                                            $a = mysqli_fetch_array($kriteriaA);
                                            $b = mysqli_fetch_array($kriteriaB);
                                            $c = mysqli_fetch_array($kriteriaC);
                                            $d = mysqli_fetch_array($kriteriaD);
                                            // var_dump($a);
                                            
                                             ?>
                                            <tr>
                                                <th colspan="2">Total</th>
                                                <th><?= $a['a']; ?></th>
                                                <th><?= $b['b']; ?></th>
                                                <th><?= $c['c']; ?></th>
                                                <!-- <th><?= $d['d']; ?></th> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page-wrapper">
                                    <h3>Perhitungan Nilai Kriteria (<?= $ka['nama_krt'] ?>)</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alternatif</th>
                                                <th colspan="3">Kriteria (<?= $ka['nama_krt'] ?>)</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>-</td>
                                                <td></td>
                                                <td>Nilai N</td>
                                                <td>Nilai N/Min</td>
                                                <td>Nilai N/Min*100</td>
                                            </tr>
                                            <?php 
                                            $mencariNilaiMinKriteriaA = mysqli_query($conn, "SELECT min(nilai) as minA FROM nilai_alternatif WHERE kriteria = 'IRR (%)'");
                                            $minA = mysqli_fetch_array($mencariNilaiMinKriteriaA);
                                            ?>
                                            <?php $i = 1; ?>
                                            <?php foreach ($nilaiAlt as $ka) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $ka['nama_alt']; ?></td>
                                                <td><?= $ka['kriteriaA']; ?></td>
                                                <td><?= $ka['kriteriaA']."/".$minA['minA'] ." = ". round(($ka['kriteriaA']/$minA['minA']),2); ?></td>
                                                <td><?= $ka['kriteriaA']."/".$minA['minA']."*". 100 ." = ".  round(($ka['kriteriaA']/$minA['minA']*100), 2); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page-wrapper">
                                    <h3>Perhitungan Nilai Kriteria (<?= $kb['nama_krt'] ?>)</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alternatif</th>
                                                <th colspan="3">Kriteria (<?= $kb['nama_krt'] ?>)</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>-</td>
                                                <td></td>
                                                <td>Nilai N</td>
                                                <td>Nilai N/Min</td>
                                                <td>Nilai N/Min*100</td>
                                            </tr>
                                            <?php 
                                            $mencariNilaiMinKriteriaB = mysqli_query($conn, "SELECT min(nilai) as minB FROM nilai_alternatif WHERE kriteria = 'B/C'");
                                            $minB = mysqli_fetch_array($mencariNilaiMinKriteriaB);
                                            ?>
                                            <?php $i = 1; ?>
                                            <?php foreach ($nilaiAlt as $ka) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $ka['nama_alt']; ?></td>
                                                <td><?= $ka['kriteriaB']; ?></td>
                                                <td><?= $ka['kriteriaB']."/".$minB['minB'] ." = ". round(($ka['kriteriaB']/$minB['minB']),2); ?></td>
                                                <td><?= $ka['kriteriaB']."/".$minB['minB']."*". 100 ." = ".  round(($ka['kriteriaB']/$minB['minB']*100),2); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page-wrapper">
                                    <h3>Perhitungan Nilai Kriteria (<?= $kc['nama_krt'] ?>)</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alternatif</th>
                                                <th colspan="3">Kriteria (<?= $kc['nama_krt'] ?>)</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>-</td>
                                                <td></td>
                                                <td>Nilai N</td>
                                                <td>Nilai N/Min</td>
                                                <td>Nilai N/Min*100</td>
                                            </tr>
                                            <?php 
                                            $mencariNilaiMinKriteriaC = mysqli_query($conn, "SELECT min(nilai) as minC FROM nilai_alternatif WHERE kriteria = 'PBP (Thn)'");
                                            $minC = mysqli_fetch_array($mencariNilaiMinKriteriaC);
                                            // var_dump($minC[]);

                                            ?>
                                            <?php $i = 1; ?>
                                            <?php foreach ($nilaiAlt as $ka) : 

                                                $nilaiKriteriaC = $minC['minC']/$ka['kriteriaC']*100;

                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $ka['nama_alt']; ?></td>
                                                <td><?= $ka['kriteriaC']; ?></td>
                                                <td><?= $minC['minC']."/". $ka['kriteriaC'] ." = ". round(($minC['minC']/$ka['kriteriaC']),2); ?></td>
                                                <td><?= $minC['minC']."/". $ka['kriteriaC']."*". 100 ." = ". round($nilaiKriteriaC,2); ?></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="page-wrapper">
                                    <h3>Perhitungan Nilai Kriteria D</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alternatif</th>
                                                <th colspan="3">Kriteria D</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>-</td>
                                                <td></td>
                                                <td>Nilai N</td>
                                                <td>Nilai N/Min</td>
                                                <td>Nilai N/Min*100</td>
                                            </tr>
                                            <?php 
                                            $mencariNilaiMinKriteriaD = mysqli_query($conn, "SELECT min(nilai) as minD FROM nilai_alternatif WHERE kriteria = 'Kriteria D'");
                                            $minD = mysqli_fetch_array($mencariNilaiMinKriteriaD);
                                            // var_dump($minD['minD']);
                                            ?>
                                            <?php $i = 1; ?>
                                            <?php foreach ($nilaiAlt as $ka) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $ka['nama_alt']; ?></td>
                                                <td><?= $ka['kriteriaD']; ?></td>
                                                <td><?= $ka['kriteriaD']."/".$minD['minD'] ." = ". $ka['kriteriaD']/$minD['minD']; ?></td>
                                                <td><?= $ka['kriteriaD']."/".$minD['minD']."*". 100 ." = ".  $ka['kriteriaD']/$minD['minD']*100?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div> -->
                                <div class="page-wrapper">
                                    <h3>Perhitungan CPI</h3>
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Alternatif</th>
                                                <th colspan="3">Perhitungan CPI</th>
                                                <th>Nilai Alternatif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $hitungCPI = mysqli_query($conn, "SELECT id_nilai, nama_alt, nilai,
                                                sum(IF(kriteria='IRR (%)', nilai, NULL)) AS kriteriaA,
                                                sum(IF(kriteria='B/C', nilai, NULL)) AS kriteriaB,
                                                sum(IF(kriteria='PBP (Thn)', nilai, NULL)) AS kriteriaC
                                                -- sum(IF(kriteria='Kriteria D', nilai, NULL)) AS kriteriaD
                                                FROM nilai_alternatif GROUP BY nama_alt");

                                            ?>

                                            <?php $i = 1; ?>
                                            <?php foreach($hitungCPI as $cpi) : 

                                                $a = ((100/$minA['minA'])*$cpi['kriteriaA'])*0.3;
                                                $b = (($cpi['kriteriaB']/$minB['minB'])*100)*0.4;
                                                $c = (($minC['minC']/$cpi['kriteriaC'])*100)*0.3; 
                                            ?>

                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $cpi['nama_alt']; ?></td>
                                                <td><?= round($a,2) ?></td>
                                                <td><?= round($b,2) ?></td>
                                                <td><?= round($c,2) ?></td>
                                                <td><?= round(($a+$b+$c), 2) ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page-wrapper">
                                    <h3>Rangking</h3>
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
                                            <?php $i = 1; ?>
                                            <?php foreach($hitungCPI as $rangking) { 

                                                $a = ((100/$minA['minA'])*$rangking['kriteriaA'])*0.3;
                                                $b = (($rangking['kriteriaB']/$minB['minB'])*100)*0.4;
                                                $c = (($minC['minC']/$rangking['kriteriaC'])*100)*0.3;

                                                $peringkat = round(($a+$b+$c), 2);
                                                $alt = $rangking['nama_alt']; 
                                                mysqli_query($conn, "INSERT INTO rangking VALUES('','$alt','$peringkat')");
                                                }
                                            ?>
                                            <?php $peringkat = mysqli_query($conn, "SELECT * FROM rangking ORDER BY nilai_alt DESC"); ?>
                                            <?php $rank = 1; ?>
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