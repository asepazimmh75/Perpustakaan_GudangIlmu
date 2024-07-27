<?php
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    if ($role == 'admin') {
        $sql = "SELECT * FROM admin WHERE nim='$nim'";
    } else {
        $sql = "SELECT * FROM anggota WHERE nim='$nim'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['nim'] = $row['nim'];
            $_SESSION['role'] = $role;
            if ($role == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: member_dashboard.php");
            }
            exit();
        } else {
            echo "Password salah";
        }
    } else {
        echo "NIM tidak ditemukan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
<header class="bg-light py-3">
        <div class="container text-center">
        <a href="../index.php"><img src="../images/logoNav.png" alt="Logo Perpustakaan" class="logo">
        </a>
            <h1 class="mt-3">Selamat Datang di Website Perpustakaan</h1>
        </div>
    </header>
    <div class="container">
        <h2 class="my-4">Login</h2>
        <form method="post">
            <div class="mb-3">
                <label for="role" class="form-label">Login sebagai</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMN2M9ifjQkjH47e5YCF2YzFJpvo6u+uC49pVyb+5j1T9G9Ke5m5bhxjpN9keEN4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4Agzp9weTk7o/j0I4i9YheS7Lj14+iFvHztxhsJH5qYopHCR5lE2" crossorigin="anonymous"></script>
</body>
</html>
