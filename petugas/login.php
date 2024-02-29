<?php

include("../koneksi/koneksi.php");
error_reporting(0);
session_start();
if(isset($_SESSION['Username'])) {
    echo "<script>alert('Maaf anda sudah login'); window.location.replace('index.php')</script>";
}
if (isset($_POST['submit'])) {
    $namauser = $_POST['Username'];
    $password = md5($_POST['Password']);

    $sql = "SELECT * FROM user WHERE Username='$namauser' AND Password='$password'";
    $result = mysqli_query($koneksi, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        $Level = $row ['Level'];
        $_SESSION['Level'] = $Level;

        $_SESSION['Username'] = $row['Username'];

        header("Location: index.php");
        echo "<script>alert('Berhasil Masuk!')</script>";
    }else {
        echo "<script>alert('Username atau Password Salah. Silakan Coba Lagi')";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Silahkan Login!</h3>
                </div>
                <div class="card-body">

                    <form action="" method="post">

                    <div class="mb3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="Username" required>
                    </div>
                    <div class="mb3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="Password" required>
                    </div>
                    <div class="mb3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Ingat Saya</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>