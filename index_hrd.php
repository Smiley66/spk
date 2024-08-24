<?php
require 'functions.php';
$title = "Dashboard HRD";

require('templates/header_hrd.php');
require('templates/navbar_hrd.php');

// Function to execute SQL query and fetch single result
function query_single($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    if (!$result || mysqli_num_rows($result) == 0) {
        return null;
    }
    return mysqli_fetch_assoc($result);
}
?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5>Dashboard HRD</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard HRD</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->

                        <div class="row">
                            <!-- Jumlah Pegawai -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card bg-c-red">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-25">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Jumlah Pegawai</h6>
                                                <h3 class="m-b-0 text-white">
                                                    <?php
                                                    $query = "SELECT COUNT(*) AS jumlah_pegawai FROM alternatif";
                                                    $result = query_single($query);
                                                    echo $result['jumlah_pegawai'];
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas feather icon-file-text text-c-red f-18"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Daftar Kriteria -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card bg-c-blue">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-25">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Daftar Kriteria</h6>
                                                <h3 class="m-b-0 text-white">
                                                    <?php
                                                    $query = "SELECT COUNT(*) AS jumlah_kriteria FROM kriteria";
                                                    $result = query_single($query);
                                                    echo $result['jumlah_kriteria'];
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas feather icon-file-text text-c-blue f-18"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hasil Keputusan -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card bg-c-green">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-25">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Hasil Keputusan</h6>
                                                <h3 class="m-b-0 text-white">
                                                    <?php
                                                    $query = "SELECT COUNT(*) AS hasil_keputusan FROM rangking";
                                                    $result = query_single($query);
                                                    echo $result['hasil_keputusan'];
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-poll-h text-c-green f-18"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Users -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card bg-c-yellow">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-25">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Data Users</h6>
                                                <h3 class="m-b-0 text-white">
                                                    <?php
                                                    $query = "SELECT COUNT(*) AS jumlah_users FROM user";
                                                    $result = query_single($query);
                                                    echo $result['jumlah_users'];
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users text-c-yellow f-18"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-xl-8">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto">
                                                <i class="fas fa-home text-primary f-36"></i>
                                            </div>
                                            <div class="col text-left">
                                                <h1>APLIKASI WEB</h1>
                                                <p>SISTEM PENDUKUNG KEPUTUSAN KINERJA PEGAWAI CV JAYA MAKMUR</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col text-left">
                                                <p>Aplikasi ini dibuat untuk menyelesaikan Tugas Akhir</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('templates/footer.php'); ?>
