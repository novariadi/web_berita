<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    $a=1;
    while ( $a <= 10) {
        echo"$a";
    $a++;
    }
    
    ?>

    <hr>

    <?php 
    $a=10;
    while ( $a > -10) {
        echo"$a |";
    $a--;
    }
    
    ?>
    <hr>

    <?php 
    $a=1;
    do {
        echo"coba lakukan <br>";
        $a++;
    } while ($a <= 10);
    
    ?>



</body>
</html>