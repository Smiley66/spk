<?php 
require 'functions.php';
$tittle = "Edit Data Pegawai";

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$alt = query("SELECT * FROM alternatif WHERE id_alt = $id")[0];

if (isset($_POST['submit'])) {
    if (edit_alt($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diedit!');
                document.location.href = 'alternatif.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diedit!');
                document.location.href = 'edit-alt.php';
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
                    <div class="col-md-12 col-xl-12">
                        <div class="card card-social">
                            <div class="card-block border-bottom">
                              
                            <h3>Edit Data Pegawai (Alternatif)</h3>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                        <div class="col-sm-6">
                                            <input type="hidden" name="id" value="<?= $alt["id_alt"]; ?>">
                                            <div class="form-group">
                                                <label for="kode">Kode</label>
                                                <input type="text" class="form-control" name="kode" value="<?= $alt["kode_alt"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Pegawai</label>
                                                <input type="text" class="form-control" name="supplier" value="<?= $alt["nama_alt"]; ?>" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <input type="text" class="form-control" name="kategori" value="<?= $alt["kategori"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="detail">Detail</label>
                                                <input type="text" class="form-control" name="detail" value="<?= $alt["detail"]; ?>">
                                        </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone">No Handphone</label>
                                                <input type="text" class="form-control" name="phone" value="<?= $alt["phone"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="kontak">Nama Kontak</label>
                                                <input type="text" class="form-control" name="kontak" value="<?= $alt["contact_name"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Alamat</label>
                                                <input type="text" class="form-control" name="address" value="<?= $alt["address"]; ?>">
                                            </div>
                                        </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        <a href="alternatif.php" type="submit" class="btn btn-success btn-sm">Kembali</a>
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
</div>
<!-- akhir main content -->


<?php 

require('templates/footer.php');


?>