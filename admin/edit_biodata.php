<?php include 'header.php'; ?>

<?php
function ubah($koneksi)
{
    if (isset($_POST['ubah_biodata'])) {
        $id = $_POST['id_biodata'];
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tanggal_lahir'];
        $tmplahir = $_POST['tempat_lahir'];
        $alamat = $_POST['alamat'];
        $gender = $_POST['jenis_kelamin'];
        // upload file foto
        $foto = $_FILES['foto']['name'];
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['foto']['size'];
        $foto_tmp = $_FILES['foto']['tmp_name'];

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === TRUE) {
            if ($ukuran < 10440700) {
                move_uploaded_file($foto_tmp, 'images/' . $foto);
                $query_update = mysqli_query($koneksi, "UPDATE biodata SET nama='$nama', tanggal_lahir='$tgl_lahir', tempat_lahir='$tmplahir' , alamat='$alamat',foto='$foto',jenis_kelamin='$gender' WHERE id_biodata='$id' ");
                // die($query_input);
                if ($query_update && isset($_GET['aksi'])) {
                    if ($_GET['aksi'] == 'update') {
                        echo '<script>alert("data berhasil di update")
                        window.location.href="biodata.php";
                    </script>';
                    } else {
                        echo '<script>alert("data GAGAL di update")
                        window.location.href="biodata.php";
                        </script>';
                    }
                } else {
                    echo '<script>alert("Gagal Upload Foto")
                    window.location.href="biodata.php";
                    </script>';
                }
            } else {
                echo '<script>alert("Ukuran foto terlalu besar")
                window.location.href="biodata.php";
                </script>';
            }
        } else {
            echo '<script>alert("Ekstensi Foto Tidak Diperbolehkan")
            window.location.href="biodata.php";
            </script>';
        }
    }

?>

    <?php
    $id = $_GET['id'];
    $query_show = mysqli_query($koneksi, "SELECT * FROM biodata WHERE id_biodata='$id'");

    if (mysqli_num_rows($query_show) == 0) {
        echo '<script>window.history.back()</script>';
    } else {
        $data = mysqli_fetch_assoc($query_show);
    }

    ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 d-flex align-items-stretch grid-margin">
                    <div class="row flex-grow">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">BIODATA</h4>
                                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_biodata" value="<?php echo $data['id']; ?>">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" placeholder="Tanggal lahir" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" placeholder="Tempat lahir" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin']; ?>">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" class="form-control" name="foto" value="<?php echo $data['foto']; ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-success mr-2" name="ubah_biodata">Submit</button>
                                        <button class="btn btn-light" type="reset">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
}
    ?>

    <?php
    if (isset($_GET['aksi'])) {
        switch ($_GET['aksi']) {
            case 'create':
                tambah($koneksi);
                // tampil_data($koneksi);
                break;
            case 'read':
                tampil_data($koneksi);
                break;
            case 'update':
                ubah($koneksi);
                break;
            case 'delete':
                hapus($koneksi);
                tampil_data($koneksi);
                break;
            default:
                echo "<h3>Aksi <i>" . $_GET['aksi'] . "</i> tidak ada ! </h3>";
                tambah($koneksi);
                tampil_data($koneksi);
        }
    } else {
        tambah($koneksi);
        tampil_data($koneksi);
    }
    ?>

    <?php include 'footer.php'; ?>


    </body>

    </html>