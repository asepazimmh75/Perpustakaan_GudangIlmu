<?php
session_start();
include '../includes/db.php';
if (!isset($_SESSION['nim']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sql = "INSERT INTO buku (judul, pengarang, tahun_terbit) VALUES ('$judul', '$pengarang', '$tahun_terbit')";

    if ($conn->query($sql) === TRUE) {
        echo "Buku berhasil ditambahkan!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Tambah Buku</title>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Tambah Buku</h2>
        <form method="post">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" required>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Buku</button>
            <a href="admin_dashboard.php" >Kembali</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMN2M9ifjQkjH47e5YCF2YzFJpvo6u+uC49pVyb+5j1T9G9Ke5m5bhxjpN9keEN4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4Agzp9weTk7o/j0I4i9YheS7Lj14+iFvHztxhsJH5qYopHCR5lE2" crossorigin="anonymous"></script>
</body>
</html>
