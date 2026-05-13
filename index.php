<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toko Online</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1 class="text-center">TOKO ONLINE</h1>

    <div class="mb-3">
        <a href="login.php" class="btn btn-primary">Login</a>
        <a href="register.php" class="btn btn-success">Register</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Deskripsi</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($data)) { ?>

        <tr>
            <td><?= $row['nama_produk']; ?></td>
            <td>Rp. <?= $row['harga']; ?></td>
            <td><?= $row['deskripsi']; ?></td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>