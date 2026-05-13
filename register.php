<?php
include 'koneksi.php';

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($conn, "INSERT INTO users(username,password,role)
    VALUES('$username','$password','user')");

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Register</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" name="register" class="btn btn-success">
            Register
        </button>

    </form>

</div>

</body>
</html>