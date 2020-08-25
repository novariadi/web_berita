<?php include 'header.php' ?>

<!-- function tambah data -->
<?php

function tambah($koneksi)
{
  if (isset($_POST['input_kategori'])) {
    $id = uniqid();
    $kategori = $_POST['nama_kategori'];

    if (!empty($kategori)) {
      $query_input = "INSERT INTO kategori VALUES(md5('$id'),'$kategori') ";
      $simpan = mysqli_query($koneksi, $query_input);

      if ($simpan && isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'create') {
          echo '<script> alert("data berhasil di disimpan")
            window.location.href="kategori.php";
            window.history.back();
          </script>';
        }
      }
    } else {
      echo '<script>alert("data gagal di disimpan")</script>';
    }
  }
?>


  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
          <div class="row flex-grow">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Data Kategori</h4>
                  <form class="forms-sample" action="" method="POST">
                    <div class="form-group">
                      <label>Masukkan Kategori</label>
                      <input type="text" class="form-control" placeholder="Kategori" name="nama_kategori" required>
                    </div>
                    <button type="submit" class="btn btn-success mr-2" name="input_kategori">Submit</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- menampilkan data user dengan data teble -->

      <div class="row">
        <?php
        function tampil_data($koneksi)
        {
          $sql = "SELECT * FROM kategori";
          $query = mysqli_query($koneksi, $sql);
        ?>

          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Data User</h4>
                <div class="table-responsive">
                  <!-- awal tabel -->
                  <table class="table table-striped table-border data">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $no = 1;
                      while ($data = mysqli_fetch_array($query)) {
                      ?>

                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['nama_kategori']; ?></td>
                          <td>
                            <a href="kategori.php?aksi=update&id=<?php echo $data['id_kategori']; ?> & nama_kategori=<?php echo $data['nama_kategori']; ?>" class="btn btn-warning">Edit</a>
                            <a href="kategori.php?aksi=delete&id=<?php echo $data['id_kategori']; ?>" onclick="return confrim('Apakah anda Yakin untuk menghapus ?')" class="btn btn-danger">Hapus</a>
                          </td>
                        </tr>

                      <?php
                        $no++;
                      }
                      ?>

                    </tbody>
                  </table>
                  <!-- akhir tabel -->
                </div>
              </div>
            </div>
          </div>
      </div>

  <?php
        }
      }
  ?>

  <!-- function ubah data -->

  <?php

  function ubah($koneksi)
  {

    if (isset($_POST['ubah_kategori'])) {
      $id = $_POST['id_kategori'];
      $nama = $_POST['nama_kategori'];

      if (!empty($nama)) {
        $query_update = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori='$id'  ");
        if ($query_update && isset($_GET['aksi'])) {
          if ($_GET['aksi'] == 'update') {
            echo '<script>alert("data berhasil di update")
            window.location.href="kategori.php";
          </script>';
          }
        } else {
          echo '<script>alert("data berhasil di update")</script>';
        }
      }
    }



    if (isset($_GET['id'])) { ?>


      <div class="col-md-12 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Form Data Kategori</h4>
                <form class="forms-sample" action="" method="POST">
                  <input type="hidden" name="id_kategori" value="<?php echo $_GET['id']; ?>">
                  <div class="form-group">
                    <label>Masukkan Kategori</label>
                    <input type="text" class="form-control" placeholder="Kategori" name="nama_kategori" value="<?php echo $_GET['nama_kategori']; ?>" required>
                  </div>
                  <button type="submit" class="btn btn-success mr-2" name="ubah_kategori">Submit</button>
                  <button class="btn btn-light" type="reset">Reset</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php }
  }
?>




<!-- funtion hapus data -->
<?php

function hapus($koneksi)
{
  if (isset($_GET['id']) && isset($_GET['aksi'])) {
    $id = $_GET['id'];

    $query_hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id' ");

    if ($query_hapus) {
      if ($_GET['aksi'] == 'delete') {
        echo '<script>alert("data berhasil dihapus")
          window.location.href="kategori.php";
        </script>';
      }
    } else {
      echo '<script>alert("data gagal dihapus")</script>';
    }
  }
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

  </div>



  <?php include 'footer.php'; ?>

  </body>

  </html>