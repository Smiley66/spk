<?php 
require 'functions.php';
$tittle = "Edit Data Users";

$id = $_GET["id"];

// Ambil data user berdasarkan id
$users = query("SELECT * FROM user WHERE id = $id")[0];

if (isset($_POST["update"])) {
    if (edit_user($_POST) > 0) {
        echo "<script>
                alert('Edit user berhasil!');
                document.location.href = 'user.php';
              </script>";
    } else {
        echo mysqli_error($conn);
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
                    <div class="col-md-6 col-xl-6">
                        <div class="card card-social">
                            <div class="card-block border-bottom">
                              
                            <h3>Edit User</h3>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?= $users['id'];?>">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?= $users['username'];?>" required autocomplete="off" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Confirm Password</label>
                                            <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select name="role" class="form-control" required>
                                                <option value="Admin" <?= ($users['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                                <option value="HRD" <?= ($users['role'] == 'HRD') ? 'selected' : ''; ?>>HRD</option>
                                                <option value="Pegawai" <?= ($users['role'] == 'Pegawai') ? 'selected' : ''; ?>>Pegawai</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary btn-sm">Update</button>
                                        <a href="user.php" class="btn btn-success btn-sm">Kembali</a>
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
