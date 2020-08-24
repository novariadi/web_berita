<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
        $test=1;

        for($test=1;$test<=9;$test++) {
            echo"Hallo World <br>";
        }

    ?>

    <?php 
        for ($i=1; $i<=10;$i++){
            echo"<br><br>";
        }

        for ($i=1; ; $i++){
            if($i>10){
                break;
            }
            echo"$i";
        }

        $i=1;
        for( ; ; ) {
            if($i>10) {
            break;
            }
            echo"$i";
            $i++;
        }echo"<br><br>";

        for($i =1;$i<=10; print "$i",$i++)
    ?>

    <?php 
        $hewan =array(
            "ayam",
            "kambing",
            "kucing",
            "sapi"
        );
        foreach ($hewan as $key => $data) {
            echo"<br>".$hewan[2];
        }
    ?>

    <?php
        $angka = array(
            1,
            2,
            3,
            4
        );

        foreach ($hewan as $key => $data) {
            echo"<br>".$angka[2]*$angka[3];
        }
    ?>
<br><br><br><br>
    <?php
        for($i=1;$i<=20;$i++){
            if($i % 2 == 0){
                echo"$i <br> ";
            }
        }
    ?>
<br><br><br>
    <?php
        for($i=1;$i<=20;$i++){
            if($i % 2 == 1){
                echo"$i <br>";
            }
        }
    ?>

<br><br><br>

    <?php
    
    for($i=3;$i<=127;$i*=2){
        for($i=3;$i<=127;$i+=1){
            echo"$i";
        }
    }

    ?>



</body>
</html>