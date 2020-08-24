<?php include 'header.php'; ?>

<?php

function tambah($koneksi)
{
    if (isset($_POST['input_postingan'])) {
        $id_user = $_SESSION['id_user'];
        $id = uniqid();
        $judul = $_POST['judul'];
        $tglrilis = $_POST['tgl_rilis'];
        $isi = $_POST['isi'];

        $foto = $_FILES['foto_konten']['name'];

        if (move_uploaded_file($_FILES['foto_konten']['tmp_name'], "images/postingan/" . $_FILES['foto_konten']['name'])) {
            echo 'Gambar berhasil di upload';
        } else {
            echo 'Gambar gagal di upload';
        }

        $query_input = mysqli_query($koneksi, "INSERT INTO postingan VALUES(md5('$id'), '$judul', '$isi','$tglrilis', '$foto', '$id_user')");

        if ($query_input) {
            echo '<script>alert("Postingan Berhasil di Upload")
                window.location.href="postingan_autor.php";
            </script>';
        } else {
            echo '<script>alert("Postingan gagal di Upload")
                window.location.href="postingan_autor.php";
            </script>';
        }
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
                                    <h4 class="card-title">FORM POSTINGAN</h4>
                                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" placeholder="Judul postingan" name="judul" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Realese</label>
                                            <input type="date" class="form-control" name="tgl_rilis" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto Konten</label>
                                            <input type="file" class="form-control" name="foto_konten" required>
                                        </div>

                                        <label class="form-group">Masukkan postingan</label>
                                        <!-- summeernote -->
                                        <textarea class="form-group summernote" name="isi" required></textarea>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success mr-2" name="input_postingan">Post</button>
                                            <!-- <button class="btn btn-light" type="reset">Reset</button> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        function tampil_data($koneksi)
        {
            $id_user = $_SESSION['id_user'];

        ?>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data postingan</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-border data">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Judul</th>
                                            <th>Tanggal Release</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- proses menampilkan data dari databases -->
                                        <?php
                                        $show_query = mysqli_query($koneksi, "SELECT * FROM postingan WHERE id_user='$id_user' ");
                                        if (mysqli_num_rows($show_query) == 0) {
                                            echo '<tr>Tidak ada data></tr>';
                                        } else {
                                            $no = 1;
                                            while ($data = mysqli_fetch_assoc($show_query)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><img src="images/postingan/<?php echo $data['foto']; ?>" alt=""></td>
                                                    <td><?php echo $data['judul']; ?></td>
                                                    <td><?php echo $data['tgl_release']; ?></td>
                                                    <td>
                                                        <a href="" class="btn btn-warning">Edit</a>
                                                        <a href="" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                        <?php
                                                $no++;
                                            }
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    <?php
        }
    }
    ?>


    <?php

    if (isset($_GET['aksi'])) {
        switch ($_GET['aksi']) {
            case 'create':
                tambah($koneksi);
                tampil_data($koneksi);
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


    <script src="vendors/summernote/dist/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: "400px"
            });
        });
    </script>

    </body>

    </html>