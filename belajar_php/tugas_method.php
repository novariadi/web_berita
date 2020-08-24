<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Nama :</label>
        <input type="text" name="nama_lengkap"> 
        <br>
        <label for="">Tanggal Lahir :</label>
        <input type="date" name="tgl_lahir">
        <br>
        <label for="">Tempat Lahir :</label>
        <input type="text" name="tmpt_lahir">
        <br>
        <label for="">Nomor Hp :</label>
        <input type="number" name="nomor_hp">
        <br>
        <label for="">Pekerjaan :</label>
        <input type="text" name="pekerjaan">
        <br>
        <label for="">Username :</label>
        <input type="text" name="username">
        <br>
        <label for="">Password :</label>
        <input type="password" name="sandi">
        <br>
        <label>Kabupaten</label>
        <select name="list_kota">
            <option>Banda Aceh</option>
            <option>Aceh Besar</option>
            <option>Pide</option>
            <option>Bireun</option>
            <option>Lhokseumawe</option>
            <option>Aceh Jaya</option>
            <option>Simeule</option>
            <option>Aceh Tamiang</option>
            <option>Meulaboh</option>
        </select>
        <br>
        <label for="">Agama :</label>
        <select name="relegion">
            <option >Islam</option>
            <option >Kristen</option>
            <option >Budha</option>
            <option >Konghucu</option>
        </select>
        <br>
        <label for="">Jenis Kelamin :</label>
        <input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki
        <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan
        <br>
        <label for="">Hobi :</label>
        <input type="checkbox" name="hobi" value="sepak-bola"> Sepak Bola
        <input type="checkbox" name="hobi" value="voli"> Voli
        <input type="checkbox" name="hobi" value="music"> Music
        <input type="checkbox" name="hobi" value=ghibah> Ghibah
        <br>
        <label for="">Alamat :</label>
        <textarea name="address" cols="10" rows="2"></textarea>
        <br>
        <label for="">Upload foto :</label>
        <input type="file" name="foto">
        <br>
        <input type="submit" name="input" value="Tampilkan">
    </form>

    <?php
    
    if(isset($_POST['input'])) {
        $name = $_POST['nama_lengkap'];
        $tanggal_lahir = $_POST['tgl_lahir'];
        $tempat_lahir = $_POST['tmpt_lahir'];
        $nomorhp = $_POST['nomor_hp'];
        $job = $_POST['pekerjaan'];
        $username= $_POST['username'];
        $password = $_POST['sandi'];
        $kabupaten = $_POST['list_kota'];
        $agama = $_POST['relegion'];
        $jeniskelamin = !empty($_POST['jenis_kelamin'])? $_POST['jenis_kelamin']: 'anda belum memilih jenis kelamin';
        $hobby = !empty($_POST['hobi'])? $_POST['hobi']:"anda belum memilih hobi";
        $alamat = $_POST['address'];

        $file = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'],"img/".$_FILES['foto']['name']);

        echo"$name <br> 
        $tanggal_lahir <br>
        $tempat_lahir<br>$nomorhp<br>
        $job<br>
        $username<br> 
        $password<br>
        $kabupaten<br>
        $agama<br>
        $jeniskelamin<br>
        $hobby<br>
        $alamat <br>
        <img src='img/$file' width='500px'>";
    }
    ?>

    <script src="js/bootstrap.js"></script>
</body>
</html>