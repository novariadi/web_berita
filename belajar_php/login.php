<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="adi">Email address :</label>
                        <input type="email" id="adi" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="pass">Password :</label>
                        <input type="password" id="adi" name="pass" >
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Submit</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>



    <?php

        if (isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['pass'];

            if ($email == 'adi@adi' && $password== 'masuk'){
                echo "<script>alert('Selamat anda berhasil login')
                window.location.href='../admin';
                </script>";
            }else {
                echo "<script>alert('Anda gagal login')</script>";
            }
        }





        // $username = "adi";
        // $password = "admin";

        // if($username=="adi" && $password=="admin") {
        //     echo"Selamat anda berhasil login";
        // }else{
        //     echo"username atau password salah";
        // }
    ?>


<script src="../js/bootstrap.js"></script>
</body>
</html>