<?php 

require "functions.php";
$tittle = "Surat Keputusan Penilaian Kinerja Supplier PT AMG";
// ambil data di URL
$kode = $_GET["kode"];

// query data mahasiswa berdasarkan id
$peringkat = mysqli_query($conn, "SELECT * FROM rangking WHERE kode_rank = '$kode' ORDER BY nilai_alt DESC");

$ket = mysqli_fetch_assoc($peringkat);

require('templates/header.php');

// Format tanggal dengan mengganti bulan ke bahasa Indonesia
function formatTanggalIndonesia($tanggal) {
    $bulanInggris = array(
        'January', 'February', 'March', 'April', 'May', 'June', 
        'July', 'August', 'September', 'October', 'November', 'December'
    );
    $bulanIndonesia = array(
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );
    return str_replace($bulanInggris, $bulanIndonesia, date('d F Y', strtotime($tanggal)));
}

?>


<!-- [ Main Content ] start -->
            <div class="container mt-5">
                <div class="main-body">
                    <div class="col-md-12 col-xl-12">
                        <div class="card card-social">
                            <div class="card-block border-bottom">
                                <div class="page-wrapper">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h1>CV Jaya Makmur </h1>
                                                <p>di JL.Raya rtm Kelapa Dua Depok Rt 07/012 Kelurahan tugu Kecamatan Cimanggis Kota Depok 1645</p>
                                                <hr style="border: 3px solid black;">
                                                <br>
                                                <h3>Surat Keputusan Penilaian Kinerja Pegawai</h3>
                                            </div>
                                            <div class="card-body table-border-style text-align-center">
                                            <p class="text-justify">Berdasarkan perhitungan menggunakan sistem pendukung keputusan (SPK) menggunakan metode perbandingan eksponensial (MPE) dengan melakukan penilaian terhadap kriteria pada masing-masing Karyawan yang dilakukan oleh perusahaan, maka didapatkan hasil urutan peringkat kinerja Pegawai terbaik. Berikut nilai <b>SKOR</b> dan <b>Ranking</b> dari kinerja Pegawai yang ada pada CV Jaya Makmur.</p>                             
                                        
                                            <h5>Kode : <?= $ket['kode_rank'];?> | Periode : <?= $ket['periode'];?></h5>
                                            <table id="" class="table table-sm text-center" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Karyawan</th>
                                                        <th>Skor</th>
                                                        <th>Peringkat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                <?php foreach ($peringkat as $p) : ?>
                                                
                                                <tr>
                                                    <td  class="text-justify"><?= $p['nama_alt'];?></td>
                                                    <td><?= $p['nilai_alt'];?></td>
                                                    <td><?= $i++;?></td>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            </table>
                                            <div>
                                            <p class="text-justify">Demikian surat keputusan penilaian kinerja Pegawai, harap digunakan sebagaimana mestinya.</p>

                                            <p class="text-right">Jakarta, <?= formatTanggalIndonesia(date('Y-m-d')) ?></p><br><br>
                            
                                            <p class="mt-1 text-right">Direktur Utama</p>
                                        </div>
                                    </div>
                                <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- akhir main content -->


<!-- sintaks untuk print halamnan -->
<script type="text/javascript">
    window.print();
</script>

<?php 

require('templates/footer.php');

?>
