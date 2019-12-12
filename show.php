    <?php
    require_once('koneksi.php');
    if (isset($_POST) & !empty($_POST)) {
        $id = $_POST['id_karyawan'];
        $foto = $_POST['foto_karyawan'];
        $nama = $_POST['Nama'];
        $alamat = $_POST['alamat'];
        $umur = $_POST['umur'];
        $gaji = $_POST['gaji'];
        $kelamin = $_POST['jenis_kelamin'];
        $jabatan = $_POST['jabatan'];
        $anak = $_POST['Jumlah_anak'];
        $res = $database->update($foto, $nama, $alamat, $umur, $gaji, $kelamin, $jabatan, $anak, $id);
        if ($res) {
            echo '<script> alert("DATA UPDATE"); </script>';
        } else {
            echo '<script> alert("DATA GAGAL");</script>';
        }
    }



    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- css -->
        <link rel="stylesheet" href="css/style.css">
        <!-- mobile style -->
        <link rel="stylesheet" href="css/mobile-style.css">
        <!-- font awsome -->
        <script src="https://kit.fontawesome.com/4d5d34d37d.js" crossorigin="anonymous"></script>


        <title>Tabel</title>
    </head>

    <body>

        <!-- HEADER -->
        <div class="header">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <div class="mx-auto"></div>
                <img src="img/logoGA-2x.png" alt="">
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <div class="mx-auto"></div>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>




        <div class="table container-fluid">
            <div class="card">
                <div class="card-body shadow-lg">
                    <table class="table">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Gaji</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Jumlah Anak</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            require_once('koneksi.php');


                            $no = 1;
                            $sql = $database->read();


                            while ($data = mysqli_fetch_assoc($sql)) {
                                ?>
                                <tr class="text-center">
                                    <td><?= $no++ ?> </td>
                                    <!-- <td><?php echo $data['id_karyawan'] ?></td> -->
                                    <td><?php echo "<img src='img/" . $data['foto_karyawan'] . "'>"; ?></td>
                                    <td><?php echo $data['Nama'] ?></td>
                                    <td><?php echo $data['alamat'] ?></td>
                                    <td><?php echo $data['umur'] ?></td>
                                    <td>Rp.<?php echo number_format($data['gaji']) ?></td>
                                    <td><?php echo $data['jenis_kelamin'] ?></td>
                                    <td><?php echo $data['jabatan'] ?></td>
                                    <td><?php echo $data['Jumlah_anak'] ?> Anak</td>

                                    <td>
                                        <!-- Edit -->
                                        <a href="#updatemodal" class="btn btn-primary" data-toggle="modal" data-target="#updateModal<?= $data['id_karyawan']; ?>">Edit</a>

                                        <!-- delete -->
                                        <a href="delete.php?id_karyawan=<?php echo $data['id_karyawan']; ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>


                                <!-- MODAL FORM -->
                                <div class="modal fade" id="updateModal<?= $data['id_karyawan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="color: #0065b3;" class="modal-title" id="exampleModalLabel">Garuda Indonesia</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <!-- FORM -->
                                            <form method="POST">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="hidden" name="id_karyawan" value="<?= $data['id_karyawan'] ?>">
                                                            <!-- FOTO KARYAWAB -->
                                                            <div class="form-group">
                                                                <label for="foto"><b>Upload Foto</b></label>
                                                                <input type="file" name="foto_karyawan" class="form-control-file" id="foto">
                                                            </div>
                                                            <!-- NAMA -->
                                                            <div class="form-group">
                                                                <label for="input"><b>Nama</b></label>
                                                                <input type="text" name="Nama" class="form-control" id="nama" value="<?php echo $data['Nama']; ?>">
                                                            </div>
                                                            <!-- ALAMAT -->
                                                            <div class="form-group">
                                                                <label for="input"><b>Alamat</b></label>
                                                                <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $data['alamat']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <!-- UMUR -->
                                                                        <label for="input"><b>Umur</b></label>
                                                                        <input type="text" name="umur" class="form-control" id="umur" value="<?php echo $data['umur']; ?>">
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <!-- GAJI -->
                                                                        <label for="input"><b>Gaji</b></label>
                                                                        <input type="text" name="gaji" class="form-control" id="gaji" value="<?php echo $data['gaji']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" class="radio">
                                                                <!-- Jenis Kelamin -->
                                                                <label for="input1"><b>Jenis Kelamin</b></label><br>
                                                                <input type="radio" name="jenis_kelamin" id="optionsRadio1" value="pria" <?php if ($data['jenis_kelamin'] == 'pria') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>Pria &nbsp;
                                                                <input type="radio" name="jenis_kelamin" id="optionsRadio1" value="wanita" <?php if ($data['jenis_kelamin'] == 'wanita') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>wanita
                                                            </div>

                                                            <div class="form-group">
                                                                <!-- Jabatan -->
                                                                <label for="input"><b>Jabatan</b></label>
                                                                <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?php echo $data['jabatan']; ?>">
                                                            </div>

                                                            <!-- Jumlah anak -->
                                                            <div class="form-group">
                                                                <label for="input1"><b>Jumlah Anak</b></label>
                                                                <select name="Jumlah_anak" class="form-control">
                                                                    <option>Jumlah Anak</option>
                                                                    <option value="0" <?php if ($data['Jumlah_anak'] == '0') {
                                                                                                echo "selected";
                                                                                            } ?>>Belum Ada</option>
                                                                    <option value="1" <?php if ($data['Jumlah_anak'] == '2') {
                                                                                                echo "selected";
                                                                                            } ?>>1</option>
                                                                    <option value="2" <?php if ($data['Jumlah_anak'] == '2') {
                                                                                                echo "selected";
                                                                                            } ?>>2</option>
                                                                    <option value="3" <?php if ($data['Jumlah_anak'] == '3') {
                                                                                                echo "selected";
                                                                                            } ?>>3</option>
                                                                    <option value="4" <?php if ($data['Jumlah_anak'] == '4') {
                                                                                                echo "selected";
                                                                                            } ?>>4</option>
                                                                    <option value="5" <?php if ($data['Jumlah_anak'] == '5') {
                                                                                                echo "selected";
                                                                                            } ?>>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- BUTTON DALAM MODAL -->
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="simpan" id="updateModal" class="btn btn-primary" value="simpan">Save</button>
                                            </form>
                                            <!-- END Form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- MODAL FORM END -->


                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>

            <a href="index.php" class="btn btn-primary" type="button" value="kembali">Kembali Halaman Depan</a>
        </div>






        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>