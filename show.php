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


    <div class="table container-fluid text-center">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
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

                        $sql = $database->read();
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($sql)) {

                            ?>
                            <tr>
                                <td><?= $no++ ?> </td>
                                <!-- <td><?php echo $data['id_karyawan'] ?></td> -->
                                <td><?php echo "<img src='images/" . $data['foto_karyawan'] . "'>"; ?></td>
                                <td><?php echo $data['Nama'] ?></td>
                                <td><?php echo $data['alamat'] ?></td>
                                <td><?php echo $data['umur'] ?></td>
                                <td>Rp.<?php echo number_format($data['gaji']) ?></td>
                                <td><?php echo $data['jenis_kelamin'] ?></td>
                                <td><?php echo $data['jabatan'] ?></td>
                                <td><?php echo $data['Jumlah_anak'] ?> Anak</td>
                                <!-- Edit -->
                                <td>
                                    <a id="edit_info" data-toggle="modal" data-target="#updateModal" data-id=>
                                    <a href="#updatemodal" class="btn btn-primary" data-toggle="modal" data-target="#updateModal<?= $data['id_karyawan'];?>">Edit</a>
                                    <!-- delete -->
                                    <a href="delete.php?id=<?php echo $data['id_karyawan']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    require_once('koneksi.php');

    $sql = $database->read();
    while ($data = mysqli_fetch_assoc($sql)) { ?>
        <!-- MODAL -->
        <div class="modal fade" id="updateModal<?= $data['id_karyawan'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="color: #0065b3;" class="modal-title" id="exampleModalLabel">Garuda Indonesia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- FORM -->
                    <form action="update.php" method="GET">
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <input type="hidden" name="id_karyawan">
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
                                                <input type="text" name="umur" class="form-control" id="umur" placeholder="umur">
                                            </div>
                                            <div class="col-7">
                                                <!-- GAJI -->
                                                <label for="input"><b>Gaji</b></label>
                                                <input type="text" name="gaji" class="form-control" id="gaji" placeholder="1000000">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" class="radio">
                                        <!-- Jenis Kelamin -->
                                        <label for="input1"><b>Jenis Kelamin</b></label><br>
                                        <input type="radio" name="gender" id="optionsRadio1" value="pria" checked>Pria &nbsp;
                                        <input type="radio" name="gender" id="optionsRadio1" value="wanita" checked>wanita
                                    </div>

                                    <div class="form-group">
                                        <!-- Jabatan -->
                                        <label for="input"><b>Jabatan</b></label>
                                        <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan">
                                    </div>

                                    <!-- Jumlah anak -->
                                    <div class="form-group">
                                        <label for="input1"><b>Jumlah Anak</b></label>
                                        <select name="anak" class="form-control">
                                            <option>Jumlah Anak</option>
                                            <option value="0">Belum Ada</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- BUTTON DALAM MODAL -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="simpan" id="updatedata" class="btn btn-primary" value="simpan">Save</button>
                    </form>
                    <!-- END Form -->
                </div>
            </div>
        </div>
    <?php } ?>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>