<?php 
require "functions.php";
$tittle = "Data Karyawan";
require('templates/header.php');
require('templates/navbar.php');


$alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
// var_dump($alternatif);
// die();
?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="col-xl-12 col-xl-12">
                        <div class="card card-social">
                            <div class="card-block border-bottom">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
                                </ol>
                                <h3>Data Pegawai</h3>
                                <!-- Button trigger modal -->
                                <a href="add-alternatif.php" class="btn btn-primary btn-sm">
                                  Add Data Pegawai
                              </a>
                              <hr>
                              <div class="page-wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body table-border-style">
                                                <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Karyawan</th>
                                            <th>Bagian Produksi</th>
                                            <th>Detail</th>
                                            <th>Phone</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($alternatif as $alt) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $alt['kode_alt']; ?></td>
                                            <td><?= $alt['nama_alt']; ?></td>
                                            <td><?= $alt['kategori']; ?></td>
                                            <td><?= $alt['detail']; ?></td>
                                            <td><?= $alt['phone']; ?></td>      
                                            <td><?= $alt['address']; ?></td>
                                            <td class="text-center">
                                                <a href="edit-alt.php?id=<?= $alt['id_alt'];?>"><i class="feather icon-edit"></i></a> | 
                                                <a href="hapus-alt.php?id=<?= $alt['id_alt'];?>"><i class="feather icon-trash-2"></i></a>
                                            </td>
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
            </div>
        </div>
    </div>
</div>


<?php 

require('templates/footer.php');


?>