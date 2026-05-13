<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM products WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn,
    "UPDATE products SET
    nama_produk='$nama',
    harga='$harga',
    deskripsi='$deskripsi'
    WHERE id='$id'");

    header("Location: dashboard_admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Edit Produk</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text"
            name="nama_produk"
            value="<?= $row['nama_produk']; ?>"
            class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number"
            name="harga"
            value="<?= $row['harga']; ?>"
            class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi"
            class="form-control"><?= $row['deskripsi']; ?></textarea>
        </div>

        <button type="submit" name="update" class="btn btn-warning">
            Update
        </button>

    </form>

</div>

</body>
</html>