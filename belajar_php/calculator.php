<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kalkulator</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- inputan kalkulator -->
                <form action="" method="POST">
                    <input type="number" name="nilai_satu" value=>
                    <input type="number" name="nilai_dua" value=>
                    <br>
                    <button type="submit" class="btn btn-primary" name="tambah"> + </button>
                    <button type="submit" class="btn btn-success" name="kali"> x </button>
                    <button type="submit" class="btn btn-danger" name="bagi"> / </button>
                    <button type="submit" class="btn btn-dark" name="kurang"> - </button>
                </form>
            </div>

            <!-- Proses operatornya -->
            <?php
            
            if(isset($_POST['tambah'])){
                $a = $_POST['nilai_satu'];
                $b = $_POST['nilai_dua'];
                $tambah = !empty($a + $b)?$a + $b:'';
            }else if(isset($_POST['kali'])){
                $a = $_POST['nilai_satu'];
                $b = $_POST['nilai_dua'];
                $kali = $a * $b;
            }else if(isset($_POST['bagi'])){
                $a = $_POST['nilai_satu'];
                $b = $_POST['nilai_dua'];
                $bagi = $a / $b;
            }else if(isset($_POST['kurang'])){
                $a = $_POST['nilai_satu'];
                $b = $_POST['nilai_dua'];
                $kurang = $a - $b;
            }
            
            ?>




            <div class="col-md-6">
                <div class="alert alert-success">
                
                <?php
                    echo"".!empty($tambah)?$tambah:'',!empty($bagi)?$bagi:'',
                    !empty($kali)?$kali:'',
                    !empty($kurang)?$kurang:'';
                ?>
                
                </div>
            </div>
        </div>
    </div>
    



<script src="js/bootstrap.js"></script>
</body>
</html>