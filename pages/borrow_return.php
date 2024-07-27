<?php
session_start();
include '../includes/db.php';
if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $kode_buku = $_POST['kode_buku'];
    $action = $_POST['action'];

    if ($action == 'borrow') {
        $sql = "INSERT INTO transaksi (nim, kode_buku, tanggal_pinjam) VALUES ('$nim', '$kode_buku', NOW())";
    } else {
        $sql = "UPDATE transaksi SET tanggal_kembali = NOW() WHERE nim='$nim' AND kode_buku='$kode_buku' AND tanggal_kembali IS NULL";
    }

    if ($conn->query($sql) === TRUE) {
        echo ucfirst($action) . " berhasil!";
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
    <title>Peminjaman & Pengembalian</title>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Peminjaman & Pengembalian</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="kode_buku" class="form-label">Kode Buku</label>
                <input type="text" class="form-control" id="kode_buku" name="kode_buku" required>
            </div>
            <div class="mb-3">
                <label for="action" class="form-label">Action</label>
                <select class="form-select" id="action" name="action" required>
                    <option value="borrow">Pinjam</option>
                    <option value="return">Kembalikan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMN2M9ifjQkjH47e5YCF2YzFJpvo6u+uC49pVyb+5j1T9G9Ke5m5bhxjpN9keEN4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4Agzp9weTk7o/j0I4i9YheS7Lj14+iFvHztxhsJH5qYopHCR5lE2" crossorigin="anonymous"></script>
</body>
</html>
