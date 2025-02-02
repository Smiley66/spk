<?php 
require 'functions.php';
$tittle = "Add Data Users";

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
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
                                <h3>Registrasi User</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required autocomplete="off" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="password2">Confirm Password</label>
                                                <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select id="role" name="role" class="form-control" required>
                                                    <option value="">Pilih Role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="hrd">HRD</option>
                                                    <option value="pegawai">Pegawai</option>
                                                </select>
                                            </div>
                                            <button type="submit" name="register" class="btn btn-primary btn-sm">Register</button>
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
</div>
<!-- akhir main content -->

<?php 
require('templates/footer.php');
?>
