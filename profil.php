<?php 

require('templates/header.php');
require('templates/navbar.php');


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
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Kriteria</th>
                                            <th>Nama Kriteria</th>
                                            <th>Jenis Kriteria</th>
                                            <th>Bobot Kriteria(%)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>C1</td>
                                            <td>New York</td>
                                            <td>Director</td>
                                            <td>Director</td>
                                            <td class="text-center">
                                                <a href="edit-kriteria.php"><i class="feather icon-edit"></i></a> | 
                                                <a href="hapus-kriteria.php"><i class="feather icon-trash-2"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Director</td>
                                            <td>New York</td>
                                            <td>Director</td>
                                            <td>Director</td>
                                            <td class="text-center">
                                                <a href="#"><i class="feather icon-edit"></i></a> | 
                                                <a href="#"><i class="feather icon-trash-2"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Director</td>
                                            <td>New York</td>
                                            <td>Director</td>
                                            <td>Director</td>
                                            <td class="text-center">
                                                <a href="#"><i class="feather icon-edit"></i></a> | 
                                                <a href="#"><i class="feather icon-trash-2"></i></a>
                                            </td>
                                        </tr>
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