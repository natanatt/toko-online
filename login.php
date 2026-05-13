<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM users WHERE username='$username' AND password='$password'");

    $data = mysqli_fetch_assoc($query);

    if($data){

        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];

        if($data['role'] == 'admin'){
            header("Location: dashboard_admin.php");
        } else {
            header("Location: dashboard_user.php");
        }

    } else {
        echo "Login gagal";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Login</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" name="login" class="btn btn-primary">
            Login
        </button>

    </form>

</div>

</body>
</html>