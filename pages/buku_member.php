<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">judul</th>
      <th scope="col">pengarang</th>
      <th scope="col">tahun terbit</th>
    </tr>
  </thead>
  <?php
    include '../includes/db.php';

    $data = mysqli_query($conn, "SELECT * FROM buku");
    while ($d = mysqli_fetch_array($data)){
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $d['id'];?></th>
      <td><?php echo $d['judul'];?></td>
      <td><?php echo $d['pengarang'];?></td>
      <td><?php echo $d['tahun_terbit'];?></td>
    </tr>

  </tbody>
  <?php
  }
  ?>
</table>
<a href="borrow_return.php" class="btn btn-secondary">Peminjaman & Pengembalian</a>
<a href="member_dashboard.php" class="btn btn-danger">Kembali</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
