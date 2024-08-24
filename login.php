<?php 
session_start(); // Aktifkan sesi
require 'functions.php';
$title = "Login";

// Cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // Ambil username berdasarkan id
    $stmt = $conn->prepare("SELECT username FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
        
        // Ambil role dari database
        $stmt = $conn->prepare("SELECT role FROM user WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $_SESSION['role'] = $user['role'];
        
        // Redirect berdasarkan peran
        if (isset($_SESSION['role'])) {
            switch ($_SESSION['role']) {
                case 'admin':
                    header('Location: index.php');
                    break;
                case 'hrd':
                    header('Location: index_hrd.php');
                    break;
                case 'pegawai':
                    header('Location: index_pegawai.php');
                    break;
            }
            exit;
        }
    }
}

if (isset($_SESSION["login"])) {
    // Redirect berdasarkan peran jika sudah login
    if (isset($_SESSION['role'])) {
        switch ($_SESSION['role']) {
            case 'admin':
                header('Location: index.php');
                break;
            case 'hrd':
                header('Location: index_hrd.php');
                break;
            case 'pegawai':
                header('Location: index_pegawai.php');
                break;
        }
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"]; // Ambil peran dari form

    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND role = ?");
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek username
    if ($result->num_rows === 1) {
        // Cek password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Set session
            $_SESSION["login"] = true;
            $_SESSION["role"] = $row["role"];

            // Cek remember me
            if (isset($_POST['remember'])) {
                // Buat cookie
                setcookie('id', $row['id'], time() + (86400 * 30), "/"); // Cookie berlaku 30 hari
                setcookie('key', hash('sha256', $row['username']), time() + (86400 * 30), "/"); // Cookie berlaku 30 hari
            }

            // Redirect berdasarkan peran
            switch ($_SESSION['role']) {
                case 'admin':
                    header('Location: index.php');
                    break;
                case 'hrd':
                    header('Location: index_hrd.php');
                    break;
                case 'pegawai':
                    header('Location: index_pegawai.php');
                    break;
            }
            exit;
        }
    }

    $error = true;
}
?>

<?php require('templates/header.php'); ?>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
    <div class="auth-content container col-md-8">
        <div class="card">
            <div class="row align-items-center">
                <div class="col-md-6 offset-1">
                    <div class="card-body">
                        <img src="../assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">Login Sistem Penunjang Keputusan Penilaian Kinerja Pegawai MPE</h4>
                        <?php if (isset($error)) : ?>
                            <p style="color: red; font-style: italic;">Username / Password salah</p>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-user"></i></span>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <select name="role" class="form-control" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="hrd">HRD</option>
                                    <option value="pegawai">Pegawai</option>
                                </select>
                            </div>
                            <div class="form-group text-left mt-2">
                                <div class="checkbox checkbox-primary d-inline">
                                    <input type="checkbox" id="checkbox-fill-a1" name="remember">
                                    <label for="checkbox-fill-a1" class="cr"> Save credentials</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-4" name="login">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 d-none d-md-block">
                    <img src="assets/images/JM Logo SM.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signup ] end -->

<?php require('templates/footer.php'); ?>
