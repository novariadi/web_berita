<?php include 'header.php'; ?>

<?php

function tambah($koneksi)
{
  if (isset($_POST['input_biodata'])) {
    $id = uniqid();
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tanggal_lahir'];
    $tmplahir = $_POST['tempat_lahir'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['jenis_kelamin'];
    // upload file foto
    $foto = $_FILES['foto']['name'];
    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.', $foto);
    $ekstensi = end($x);
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $file = md5($foto) . '_' . date('mjYHis') . '.' . $ekstensi;
    $ukuran = $_FILES['foto']['size'];



    if (in_array($ekstensi, $ekstensi_diperbolehkan) === TRUE) {
      if ($ukuran < 1044070) {
        move_uploaded_file($foto_tmp, 'images/' . $file);
        $query_input = mysqli_query($koneksi, "INSERT INTO biodata VALUES(md5('$id'),'$nama','$tgl_lahir', '$tmplahir' , '$alamat','$file','$gender', '$id_user')");
        // die($query_input);

        if ($query_input) {
          echo '<script>alert("data user berhasil diinput") 
                        window.location.href="biodata.php";
                    </script>';
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


  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
          <div class="row flex-grow">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">BIODATA</h4>
                  <!-- <p class="card-description">
                        Basic form layout
                      </p> -->
                  <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Pilih User</label>
                      <select class="form-control" name="id_user">
                        <?php
                        $show = mysqli_query($koneksi, "SELECT * FROM user");

                        while ($data = mysqli_fetch_array($show)) {
                        ?>
                          <option value="<?= $data['id_user']; ?>"><?= $data['username'] . ' - ' . $data['level']; ?></option>
                        <?php
                        }
                        ?>

                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" class="form-control" placeholder="Tanggal lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" class="form-control" placeholder="Tempat lahir" name="tempat_lahir" required>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" class="form-control" name="foto" required>
                    </div>
                    <button type="submit" class="btn btn-success mr-2" name="input_biodata">Submit</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- <div class="col-12 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Horizontal Form</h4>
                      <p class="card-description">
                        Horizontal form layout
                      </p>
                      <form class="forms-sample">
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                    </div>
                  </div>
                </div> -->
          </div>
        </div>
        <!-- <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Profil Instruktur</h4>
                  <p class="card-description">
                    Masukkan Biodata Anda
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Nama</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Tempat Lahir</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Tanggal Lahir</label>
                      <input type="date" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Jenis Kelamin</label>
                      <select class="form-control" id="exampleFormControlSelect2">
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>

                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail3">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">No HP</label>
                      <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Alamat</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Upload Ijazah</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Upload CV</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Upload SKKNI</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                   
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-5 d-flex align-items-stretch">
              <div class="row flex-grow">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Basic input groups</h4>
                      <p class="card-description">
                        Basic bootstrap input groups
                      </p>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                          </div>
                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <div class="input-group-prepend">
                            <span class="input-group-text">0.00</span>
                          </div>
                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Colored input groups</h4>
                      <p class="card-description">
                        Input groups with colors
                      </p>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend bg-info">
                            <span class="input-group-text bg-transparent">
                              <i class="mdi mdi-shield-outline text-white"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon1">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend bg-primary border-primary">
                            <span class="input-group-text bg-transparent">
                              <i class="mdi mdi mdi-menu text-white"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon2">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon3">
                          <div class="input-group-append bg-primary border-primary">
                            <span class="input-group-text bg-transparent">
                              <i class="mdi mdi-menu text-white"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend bg-primary border-primary">
                            <span class="input-group-text bg-transparent text-white">$</span>
                          </div>
                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                          <div class="input-group-append bg-primary border-primary">
                            <span class="input-group-text bg-transparent text-white">.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Input size</h4>
                  <p class="card-description">
                    This is the default bootstrap form layout
                  </p>
                  <div class="form-group">
                    <label>Large input</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
                  </div>
                  <div class="form-group">
                    <label>Default input</label>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                  </div>
                  <div class="form-group">
                    <label>Small input</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username">
                  </div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Selectize</h4>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Large select</label>
                    <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Default select</label>
                    <select class="form-control" id="exampleFormControlSelect2">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Small select</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Checkbox Controls</h4>
                  <p class="card-description">Checkbox and radio controls</p>
                  <form class="forms-sample">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input"> Default
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" checked> Checked
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" disabled> Disabled
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" disabled checked> Disabled checked
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-radio">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="" checked> Option one
                            </label>
                          </div>
                          <div class="form-radio">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2"> Option two
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-radio disabled">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios2" id="optionsRadios3" value="option3" disabled> Option three is disabled
                            </label>
                          </div>
                          <div class="form-radio disabled">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadio2" id="optionsRadios4" value="option4" disabled checked> Option four is selected and disabled
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Checkbox Flat Controls</h4>
                  <p class="card-description">Checkbox and radio controls with flat design</p>
                  <form class="forms-sample">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input"> Default
                            </label>
                          </div>
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" checked> Checked
                            </label>
                          </div>
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" disabled> Disabled
                            </label>
                          </div>
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" disabled checked> Disabled checked
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-radio form-radio-flat">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="flatRadios1" id="flatRadios1" value="" checked> Option one
                            </label>
                          </div>
                          <div class="form-radio form-radio-flat">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="flatRadios2" id="flatRadios2" value="option2"> Option two
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-radio form-radio-flat disabled">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="flatRadios3" id="flatRadios3" value="option3" disabled> Option three is disabled
                            </label>
                          </div>
                          <div class="form-radio form-radio-flat disabled">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="flatRadios4" id="flatRadios4" value="option4" disabled checked> Option four is selected and disabled
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Horizontal Two column</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option>Category1</option>
                              <option>Category2</option>
                              <option>Category3</option>
                              <option>Category4</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Membership</label>
                          <div class="col-sm-4">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked> Free
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> Professional
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description">
                      Address
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 1</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">State</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 2</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Postcode</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Country</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option>America</option>
                              <option>Italy</option>
                              <option>Russia</option>
                              <option>Britain</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div> -->
      </div>
      <!-- menampilkan data user dengan data teble -->
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Biodata</h4>
              <!-- <p class="card-description">
                    Add class
                    <code>.table</code>
                  </p> -->
              <div class="table-responsive">
                <table class="table table-striped table-border data">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal Lahir</th>
                      <th>Tempat Lahir</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                      <th>Foto</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody> <?php

                          $show_query = mysqli_query($koneksi, "SELECT * FROM biodata");
                          if (mysqli_num_rows($show_query) == 0) {
                            echo '<tr><td colspan="8">Tidak ada data</td></tr>';
                          } else {
                            $id = 1;
                            while ($data = mysqli_fetch_assoc($show_query)) {
                          ?> <tr>
                          <td><?php echo $id; ?></td>
                          <td><?php echo $data['nama']; ?></td>
                          <td><?php echo $data['tanggal_lahir']; ?></td>
                          <td><?php echo $data['tempat_lahir']; ?></td>
                          <td><?php echo $data['alamat']; ?></td>
                          <td><?php echo $data['jenis_kelamin']; ?></td>
                          <td><img src="<?php echo 'images/' . $data['foto']; ?>" alt="Gambar.jpg"></td>
                          <td>
                            <a href="edit_biodata.php?aksi=update&id=<?php echo $data['id_biodata']; ?>" class="btn btn-warning">Edit</a>
                            <a href="biodata.php?aksi=delete&id=<?php echo $data['id_biodata']; ?>" onclick="return confirm('Apakah anda yakin menghapus ?')" class="btn btn-danger">Hapus</a>
                          </td>
                        </tr>
                    <?php
                              $id++;
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
    </div>
  <?php
}
  ?>

  <?php
  function hapus($koneksi)
  {

    if (isset($_GET['id']) && isset($_GET['aksi'])) {
      $id = $_GET['id'];

      $tampil = mysqli_query($koneksi, "SELECT foto FROM biodata WHERE id_biodata='$id' ");

      $data = mysqli_fetch_array($tampil);

      unlink("images/" . $data['foto']);

      $query_hapus = mysqli_query($koneksi, "DELETE FROM biodata WHERE id_biodata='$id'");
      if ($query_hapus) {
        if ($_GET['aksi'] == 'delete') {
          echo '<script>alert("Data Berhasil dihapus")
          window.location.href="biodata.php";
        </script>';
        }
      } else {
        echo '<script>alert("data gagal di hapus")
        window.location.href="biodata.php";
        </script>';
      }
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
    // tampil_data($koneksi);
  }
  ?>

  <?php include 'footer.php'; ?>
  </body>

  </html>