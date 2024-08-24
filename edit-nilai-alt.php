<?php 
require 'functions.php';
$tittle = "Edit Nilai Alternatif";

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
// $query = query("SELECT * FROM nilai_alternatif WHERE id_nilai = $id")[0]; error dikarenakan ada nama atribut yang kurang
$query = mysqli_query($conn, "SELECT * FROM nilai_alternatif WHERE id_nilai = $id LIMIT 1");
$nilai_alt = mysqli_fetch_assoc($query);


$periode = mysqli_query($conn, "SELECT * FROM periode");
$skala_nilai = mysqli_query($conn, "SELECT * FROM skala_penilaian");
$alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
$kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
                                                        
if (isset($_POST['submit'])) {
    if (edit_nilai_alt($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'nilai-alternatif.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'edit-nilai-alt.php';
            </script>
        ";
    }
}

require('templates/header.php');
require('templates/navbar.php');

?>


<!-- [ Main Content ] start -->

<div class="pcoded-main-container">

    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="col-md-12 col-xl-8">
                        <div class="card card-social">
                            <div class="card-block border-bottom">
                            <h3>Edit Nilai Alternatif</h3>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="kode">ID</label>
                                            <input type="text" class="form-control" name="id" value="<?= $nilai_alt["id_nilai"]; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlSelect1">Periode</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="periode">
                                                        <?php 
                                                        $tahun = $nilai_alt["periode"]; 
                                                        ?>
                                                        <?php foreach($periode as $row) : ?>
                                                        <option value="<?= $row['periode']; ?>" <?php if($tahun == $row['periode']) : ?> selected="selected"<?php endif;?>>
                                                            <?= $row['periode']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlSelect1">Alternatif (Supplier)</label>
                                                    <select class="form-control" name="alternatif">
                                                        <?php 
                                                        $supplier = $nilai_alt["nama_alt"]; 
                                                        ?>
                                                        <?php foreach($alternatif as $row) : ?>
                                                        <option value="<?= $row['nama_alt']; ?>" <?php if($supplier == $row['nama_alt']) : ?> selected="selected"<?php endif;?>>
                                                            <?= $row['nama_alt']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kriteria">Kriteria</label>
                                                <select class="form-control" name="kriteria">
                                                        <?php 
                                                        $namakriteria = $nilai_alt["kriteria"]; 
                                                        ?>
                                                        <?php foreach($kriteria as $row) : ?>
                                                        <option value="<?= $row['nama_krt']; ?>" <?php if( $row['nama_krt'] == $namakriteria) : ?> selected="selected"<?php endif;?>>
                                                            <?= $row['nama_krt']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                </select>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="keterangan">Keterangan</label>
                                                    <select class="form-control" id="keterangan" name="keterangan">
                                                        <?php 
                                                        $keterangan = $nilai_alt["keterangan"]; 
                                                        ?>
                                                        <?php foreach($skala_nilai as $row) : ?>
                                                        <option value="<?= $row['keterangan']; ?>" <?php if( $row['keterangan'] == $keterangan) : ?> selected="selected"<?php endif;?>>
                                                            <?= $row['keterangan']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="nilai">Nilai</label>
                                                    <select class="form-control" id="nilai" name="nilai">
                                                        <?php 
                                                        $nilai = $nilai_alt["nilai"]; 
                                                        ?>
                                                        <?php foreach($skala_nilai as $row) : ?>
                                                        <option value="<?= $row['nilai']; ?>" <?php if( $row['nilai'] == $nilai) : ?> selected="selected"<?php endif;?>>
                                                            <?= $row['nilai']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        <a href="nilai-alternatif.php" type="submit" class="btn btn-success btn-sm">Kembali</a>
                                    </form>                              
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