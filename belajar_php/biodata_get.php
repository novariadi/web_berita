<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form action="">
    <label for="">Name :</label>
    <input type="text" name="nama_lengkap">
    <br>
    <label for="">Tanggal :</label>
    <input type="date" name="tgl">
    <input type="submit" name="input" value="tampilkan">
    </form>

    <?php
    
    if (isset($_GET['input'])){
        $name= $_GET['nama_lengkap'];
        $tanggal= $_GET['tgl'];

        echo"$name <br> $tanggal" ;
    }
    
    ?>

    
</body>
</html>