<?php 
require 'functions.php';
$tittle = "Add Nilai Alternatif";

$periode = mysqli_query($conn, "SELECT * FROM periode");
$skala_nilai = mysqli_query($conn, "SELECT * FROM skala_penilaian");
$alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
$kriteria = mysqli_query($conn, "SELECT * FROM kriteria");

$test1 = mysqli_query($conn, "SELECT * FROM test1");


if (isset($_POST['submit'])) {
    if (tambah_test_alt($_POST) > 0) {
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
                document.location.href = 'add-nilai-alt.php';
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
                              
                            <h3>Add Nilai Alternatif (Supplier)</h3>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Periode</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="periode[]">
                                                        <option value="#">- Pilih -</option>
                                                        <?php foreach($periode as $row) : ?>
                                                        <option value="<?= $row['periode'] ?>"><?= $row['periode'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                        </div>
                                        <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Alternatif (Supplier)</label>
                                                    <select class="form-control" name="alternatif[]">
                                                        <option value="#">- Pilih -</option>
                                                        <?php foreach($alternatif as $row) : ?>
                                                        <option value="<?= $row['nama_alt'] ?>"><?= $row['nama_alt'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Penilaiain Kriteria</label>
                                               <table class="table table-borderless">
                                                  <tbody>
                                                    <tr>
                                                      <th scope="row">
                                                        <?php foreach($kriteria as $row) : ?>
                                                            <input type="checkbox" name="kriteria[]" value="<?= $row['nama_krt'] ?>">
                                                            <?= $row['nama_krt'] ?>
                                                        <?php endforeach; ?>
                                                      </th>
                                                      <td>
                                                            <select class="form-control" name="keterangan[]">
                                                                <option value="#">- Pilih -</option>
                                                                <?php foreach($skala_nilai as $row) : ?>
                                                                <option value="<?= $row['keterangan'] ?>"><?= $row['keterangan'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td>
                                                            <select class="form-control" name="keterangan[]">
                                                                <option value="#">- Pilih -</option>
                                                                <?php foreach($skala_nilai as $row) : ?>
                                                                <option value="<?= $row['keterangan'] ?>"><?= $row['keterangan'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      </th>
                                                      <td>
                                                            <select class="form-control" name="keterangan[]">
                                                                <option value="#">- Pilih -</option>
                                                                <?php foreach($skala_nilai as $row) : ?>
                                                                <option value="<?= $row['keterangan'] ?>"><?= $row['keterangan'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      </th>
                                                      <td>
                                                            <select class="form-control" name="keterangan[]">
                                                                <option value="#">- Pilih -</option>
                                                                <?php foreach($skala_nilai as $row) : ?>
                                                                <option value="<?= $row['keterangan'] ?>"><?= $row['keterangan'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>                                    
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