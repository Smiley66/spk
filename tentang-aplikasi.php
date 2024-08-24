<?php 
$tittle = "Tentang Aplikasi";

require('templates/header.php');
require('templates/navbar.php');


?>


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Tentang Aplikasi</li>
                                            </ol>
                                        </nav>
                                        <hr>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto p-5">
                                                <i class="fas fa-globe text-primary f-48"></i>
                                            </div>
                                            <div class="col justify-content-center">
                                                <h3>Tentang Aplikasi</h3>
                                                <p>Aplikasi atau Sistem Pendukung Keputusan (SPK) ini digunakan untuk membantu manager perusahaan atau pihak yang mempunyai wewenang dalam pengambilan keputusan. Contoh dalam kasus ini yaitu Penilaian Kinerja Pegawai pada CV Jaya Makmur, dimana dalam proses penilaian kinerja Pegawai digunakan sistem SPK tersebut.</p>
                                                <p>Metode yang digunakan pada SPK ini yaitu <i>Metode Perbandingan Eksponensial</i> (MPE), dimana merupakan salah satu metode untuk menentukan urutan prioritas alternatif keputusan dengan krtiteria jamak. Teknik ini digunakan sebagai pembantu bagi individu dalam pengambilan keputusan untuk menggunakan rancang bangun model yang telah terdefinisi dengan baik pada tahapan proses . Dalam menggunakan metode perbandingan eksponensial, ada beberapa tahapan yang harus dilakukan, yaitu:
                                                <br>1. Menyusun alternatif-alternatif keputusan yang akan dipilih 
                                                <br>2. Menentukan kriteria atau perbandingan keriteria keputusan yang penting untuk dievaluasi 
                                                <br>3. Menentukan tingkat kepentingan dari setiap kriteria keputusan atau pertimbangan kriteria
                                                <br>4. Melakukan penilaian terhadap semua alternatif pada setiap kriteria
                                                <br>5. Menentukan urutan prioritas keputusan didasarkan pada skor atau nilai total masing-masing alternative</p>
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



<?php require('templates/footer.php'); ?>