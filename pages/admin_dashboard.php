<?php
session_start();
if (!isset($_SESSION['nim']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
<div class="container text-center">
            <img src="../images/logoNav.png" alt="Logo Perpustakaan" class="logo">
            <h1 class="mt-3">Tempat Admin Untuk Bekerja</h1>
        </div>
    <div class="container">
        <h2 class="my-4">Admin Dashboard</h2>
        <a href="add_book.php" >Tambah Buku</a>
        <a href="borrow_return.php" class="btn btn-secondary">Peminjaman & Pengembalian</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMN2M9ifjQkjH47e5YCF2YzFJpvo6u+uC49pVyb+5j1T9G9Ke5m5bhxjpN9keEN4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4Agzp9weTk7o/j0I4i9YheS7Lj14+iFvHztxhsJH5qYopHCR5lE2" crossorigin="anonymous"></script>
</body>
</html>
