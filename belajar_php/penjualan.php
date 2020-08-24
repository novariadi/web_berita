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
        <div class="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <a class="navbar-brand" href="#">NAVShop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- akhir header -->

        <!-- content -->
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST">
                    <label for="">Jumlah barang :</label><br>
                    <input type="text" class="form-control" placeholder="Jumlah barang" name="jumlah">

                    <input type="submit" name="tambah" value="+ Tambah" class="btn btn-success">
                </form>
                
                        <!-- Proses -->
            <?php
                if(isset($_POST['tambah'])){
                ?>

                    <form action="" method='POST'>
                        <?php
                        $jumlah = $_POST['jumlah'];
                        for($i =1; $i <= $jumlah;$i++) {
                        ?>

                            <b>Data Barang ke - <?php echo ''.$i;?> </b>
                            <label for="">Nama barang :</label><br>
                            <input type="text" class="form-control" placeholder="Nama barang" name="nama_barang<?php echo !empty($i)?$i:'';?>"><br>

                            <label for="">Jumlah barang :</label><br>
                            <input type="text" class="form-control" placeholder=" jumlah barang" name="jumlah<?php echo !empty($i)?$i:'';?>"><br>

                            <label for="">Harga barang :</label><br>
                            <input type="text" class="form-control" placeholder=" harga barang" name="harga<?php echo !empty($i)?$i:'';?>"><br>

                        <?php  
                        }
                        ?>

                        <button type="submit" class="btn btn-success" name="total">Cek Harga</button>

                    </form>

                <?php
                }
                ?>
                
                <!-- proses looping data -->

                <?php
                
                if (isset($_POST['total'])) {
                    $nama_barang1 = !empty($_POST['nama_barang1'])?$_POST['nama_barang1']:'';
                    $jumlah1 = !empty($_POST['jumlah1'])?$_POST['jumlah1']:'';
                    $harga1 = !empty($_POST['harga1'])?$_POST['harga1']:'';

                    $nama_barang2 = !empty($_POST['nama_barang2'])?$_POST['nama_barang2']:'';
                    $jumlah2 = !empty($_POST['jumlah2'])?$_POST['jumlah2']:'';
                    $harga2 = !empty($_POST['harga2'])?$_POST['harga2']:'';

                    $nama_barang3 = !empty($_POST['nama_barang3'])?$_POST['nama_barang3']:'';
                    $jumlah3 = !empty($_POST['jumlah3'])?$_POST['jumlah3']:'';
                    $harga3 = !empty($_POST['harga3'])?$_POST['harga3']:'';

                    $hasil1 = !empty($harga1 * $jumlah1)?$harga1 * $jumlah1 :'';
                    $hasil2 = !empty($harga2 * $jumlah2)?$harga2 * $jumlah2 :'';
                    $hasil3 = !empty($harga3 * $jumlah3)?$harga3 * $jumlah3 :'';

                    $total_hasil = !empty($hasil1 + $hasil2 + $hasil3)?$hasil1 + $hasil2 + $hasil3:'';

                }
                
                ?>

                <!-- akhir proses -->
            </div>

            <!-- total hasil colom kanan -->
            <div class="col-md-6">
                <div class="alert alert-warning">

                    <?php
                        echo''. !empty($total_hasil)?'Total Harga yang harus di bayar Rp. '. $total_hasil:'';
                    
                    ?>

                </div>
            </div>
        </div>
    </div>
    <br>

<script scr="../js/bootstrap.js"></script>
</body>
</html>