<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <?php 
        $a = 5;
        $b = 4;

        echo"apakah $a sama dengan $b :". ($a==$b);
        echo"<br> apakah $a Tidak sama dengan $b :". ($a!=$b);
        echo"<br>apakah $a lebih besar $b :". ($a>$b);
        echo"<br>apakah $a lebih kecil $b :". ($a<$b);
        echo"<br>apakah $a sama dengan $b dan $a lebih besar $b :". (($a==$b) && ($a>$b));
        echo"<br>apakah $a sama dengan $b atau $a lebih besar  $b :". (($a==$b) || ($a>$b));

        echo"<hr>";

        $gaji = 3000000;
        $pajak = 0.3;
        $hasil = $gaji - ($gaji*$pajak);

        echo"Gaji sebelumnya adalah :".$gaji;
        echo"<br>Gaji bersihnya adalah :". $hasil;

    ?>

    <hr>


</body>
</html>