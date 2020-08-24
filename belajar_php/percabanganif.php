<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $quiz = 89;
        $tugas = 90;
        $uts = 87;
        $uas = 100;
        
        $ip = (($quiz*0.1)+($tugas*0.2)+($uts*0.3)+($uas*0.4));

        echo"Nilai Quiz kamu : ". $quiz. "<br>";
        echo"Nilai Tugas kamu :". $tugas. "<br>";
        echo"Nilai UTS kamu :". $uts. "<br>";
        echo"Nilai UAS kamu :". $uas. "<br>";

        if($ip >= 85){
            echo"Nilai anda : A";
        }else if($ip >= 73) {
            echo"Nilai anda : B";
        }else if($ip >= 60) {
            echo"Nilai anda : C";
        }else if($ip >= 50) {
            echo"Nilai anda : D";
        }else{
            echo"Nilai anda : E <br>";
        }
    ?>
<hr>

    <?php
        $uang = 60000;
        $aqua = 3000;
        $mieinstan = 2500;
        $saos = 5000;

        $belanja = (($aqua*2)+($mieinstan*3)+($saos*1));

        $kembalian = $uang - $belanja;

        echo"Uang anda : $uang <br>";
        echo"Anda Membeli Aqua seharga : $aqua sebanyak 2 buah<br>";
        echo"Anda Membeli Mie Instan seharga : $mieinstan sebanyak 3 buah<br>";
        echo"Anda Membeli saos seharga : $saos sebanyak 1 buah <br>";
        echo"Anda harus membayar sebesar : $belanja <br>";
        echo"Uang kembalian anda sebesar $kembalian";

    ?>



    
</body>
</html>