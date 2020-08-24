<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        $nim = "09239424845";
        $nama = "Muhammad Novariadi";
        $umur = 24;
        $nilai = 90.99;
        $status = True;

        echo"NIM : ". $nim. "<br>";
        echo"Nama : ". $nama. "<br>";
        echo"Umur : ". $umur. "<br>";
        printf("Nilai : %.3f <br>",$nilai);
        if ($status){
            echo"Status : Anda Masih Kuliah";
        } else {
            echo"Status : Anda Masih Kuliah";
        };

    ?>
    
</body>
</html>