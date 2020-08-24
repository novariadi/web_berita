<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <?php
        $bulan = "januari";
        switch($bulan) {
            case "januari":
                echo"Anda memilih bulan januari";
                break;
            case "februari":
                echo"Anda memilih bulan februari";
                break;
            default:
                echo"Anda belum memilih nama bulan";
                break;
        }
    ?>
<br>
<hr>
    <?php
        $username = "user";
        $password = 2222;

        switch(true) {
            case ($username=="admin" && $password==1234):
                echo"Selamat datang admin";
                break;

            case ($username=="operator" && $password==1111):
                echo"Selamat datang operator";
                break;

            case ($username=="user" && $password==2222):
                echo"Selamat datang user";
                break;

            default :
            // statment
                break;
        }
    ?>

<br>
<hr>

    <?php 
        $username = "operator";
        $password = "1111";

        switch([$username,$password]) {
            case ["admin","1234"]:
                echo"Selamat datang admin";
                break;

            case ["operator","1111"]:
                echo"Selamat datang operator";
                break;

            case ["user","2222"]:
                echo"Selamat datang user";
                break;

            default:
            // statment
                break;
        }
    ?>

</body>
</html>