<?php 
require "functions.php";
$tittle = "Data Hasil Keputusan";
require('templates/header_hrd.php');
require('templates/navbar_hrd.php');

$ranking = mysqli_query($conn, "SELECT * FROM rangking ORDER BY kode_rank ASC");

// membuat array untuk rowspan dinamis
$arr = array();
while ($row = mysqli_fetch_object($ranking)) {
    // code...
    $arr[$row->kode_rank][] = $row;
}
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
                                        <li class="breadcrumb-item active" aria-current="page">Data Hasil Keputusan</li>
                                    </ol>
                                </nav>
                                <h3>Data Hasil Kinerja Pegawai</h3>
                              <hr>
                              <div class="page-wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body table-border-style">
                                                <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Periode</th>
                                            <th>Daftar Pegawai</th>
                                            <th>Skor</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $i = 1; ?>
                                        <?php foreach($arr as $key => $val): ?>
                                        <?php foreach($val as $k => $v): ?>
                                        <tr>
                                            <?php if ($k == 0) : ?>
                                            <td rowspan="<?php echo count($val) ?>">
                                                <?= $i++;?>
                                            </td>
                                            <td rowspan="<?php echo count($val) ?>">
                                                <?= $v->kode_rank ?>
                                            </td>
                                            <td rowspan="<?php echo count($val) ?>">
                                                <?= $v->periode ?>
                                            </td>
                                            <?php endif ?>
                                            <td><?= $v->nama_alt ?></td>
                                            <td><?= $v->nilai_alt ?></td>
                                            <?php if ($k == 0) : ?>
                                            <td rowspan="<?php echo count($val) ?>">
                                                <a class="btn-sm btn-primary" href="cetak-hasil.php?kode=<?= $v->kode_rank ?>" target="_blank" ><i class="fas fa-print"></i> Cetak</a>
                                                <a class="btn-sm btn-danger" href="hapus-hasil.php?kode=<?= $v->kode_rank ?>"><i class="feather icon-trash-2"></i> Hapus</a>
                                            </td>
                                            <?php endif ?>
                                        </tr>
                                        <?php endforeach; ?>
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
<!-- akhir main content -->

<?php 

require('templates/footer.php');


?>