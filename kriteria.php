<?php 
require "functions.php";
$tittle = "Data Kriteria";

require('templates/header.php');
require('templates/navbar.php');


$kriteria = mysqli_query($conn, "SELECT * FROM kriteria");

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
                                        <li class="breadcrumb-item"><a href="#!">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
                                    </ol>
                                </nav>
                                <h3>Data Kriteria</h3>
                                <!-- Button trigger modal -->
                                <a href="add-kriteria.php" class="btn btn-primary btn-sm">
                                  Add Data Kriteria
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
                                            <th>Kriteria</th>
                                            <!-- <th>Tren Kriteria</th> -->
                                            <th>Bobot</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($kriteria as $krt) : ?>
                                        <tr>
                                            <td><?= $i++;?></td>
                                            <td><?= $krt['kode_krt'];?></td>
                                            <td><?= $krt['nama_krt'];?></td>
                                            <td><?= $krt['bobot_krt'];?></td>
                                            <td class="text-center">
                                                <a href="edit-kriteria.php?id=<?= $krt['id_krt'];?>"><i class="feather icon-edit"></i></a> | 
                                                <a href="hapus-kriteria.php?id=<?= $krt['id_krt'];?>"><i class="feather icon-trash-2"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                                <p>**Bobot kriteria dan nilai bobot kriterianya diperoleh dan ditentukan oleh perusahaan.</p>
                                <p>***Bobot kriteria <b>Tingkat Harga</b> memiliki nilai minus (-), dikarenakan jika tingkat harga rendah maka nilai akan semakin tinggi.</p>
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