<?php
include 'koneksi.php';

if(isset($_POST['submit'])){

    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn,
    "INSERT INTO products(nama_produk,harga,deskripsi)
    VALUES('$nama','$harga','$deskripsi')");

    header("Location: dashboard_admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Tambah Produk</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">
            Simpan
        </button>

    </form>

</div>

</body>
</html>