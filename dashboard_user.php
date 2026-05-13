<?php
session_start();

if($_SESSION['role'] != 'user'){
    header("Location: login.php");
}

include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Dashboard User</h2>

    <a href="logout.php" class="btn btn-danger mb-3">Logout</a>

    <table class="table table-bordered">

        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Deskripsi</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($data)) { ?>

        <tr>
            <td><?= $row['nama_produk']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td><?= $row['deskripsi']; ?></td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>