<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="POST">
        <label for="">Nama :</label>
        <input type="text" name="nama">
        <br>
        <label for="">Tanggal lahir :</label>
        <input type="date" name="tgl">
        <br>
        <label for="">Alamat :</label>
        <input type="text" name="alamat">
        <br>
        <label for="">No. Hp :</label>
        <input type="text" name="nomor_hp">
        <input type="submit" name="input" value="Tampilkan">
    </form>


    <?php
    
    if (isset($_POST['input'])){

        $name = $_POST['nama'];
        $tanggal = $_POST['tgl'];
        $alamat = $_POST['alamat'];
        $nomor = $_POST['nomor_hp'];
    

        echo"$name <br> $tanggal <br> $alamat <br> $nomor ";
    }
    
    
    ?>


</body>
</html>