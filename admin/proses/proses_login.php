<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = md5($_POST['pass']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);
    $data = mysqli_fetch_assoc($query);

    if ($cek > 0) {
        if ($data['level'] == 'admin') {
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['id_user'] = $data['id_user'];

            echo '<script>alert("Selamat Datang Admin")
                window.location.href="../index.php";
            </script>';
        } elseif ($data['level'] == 'operator') {
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['id_user'] = $data['id_user'];

            echo '<script>alert("Selamat Datang operator")
                window.location.href="../index.php";
            </script>';
        } elseif ($data['level'] == 'autor') {
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['id_user'] = $data['id_user'];

            echo '<script>alert("Selamat Datang autor")
                window.location.href="../index.php";
            </script>';
        } else {
            header("location:../login.php?pesan=gagal");
        }
    } else {
        echo '<script>alert("username/password salah !!")
            window.location.href="../login.php";
        </script>';
        // header("location:../login.php");
    }
}
