<?php 

require "functions.php";
$tittle = "Edit Data Kriteria";

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$krt = query("SELECT * FROM kriteria WHERE id_krt = $id")[0];


if (isset($_POST['submit'])) {
    if (edit_krt($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diedit!');
                document.location.href = 'kriteria.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diedit!');
                document.location.href = 'edit-kriteria.php';
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
                                <h3>Edit Data Kriteria</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?= $krt["id_krt"]; ?>">
                                            <div class="form-row">
                                              <div class="col">
                                                <div class="form-group">
                                                    <label for="kode">Kode</label>
                                                    <input type="text" class="form-control" name="kode" readonly value="<?= $krt["kode_krt"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kriteria">Kriteria</label>
                                                    <input type="text" class="form-control" name="kriteria" value="<?= $krt["nama_krt"]; ?>">
                                                </div>
                                                  
                                              <div class="form-group">
                                                    <label for="bobotKriteria">Bobot Kriteria (%)</label>
                                                    <input type="number" step="0.01" class="form-control" name="bobotkriteria" value="<?= $krt["bobot_krt"]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                                    <a href="kriteria.php" type="submit" class="btn btn-success btn-sm">Kembali</a>

                                </form>                                 
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