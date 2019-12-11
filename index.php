<?php
require_once('koneksi.php');

if(isset($_POST) & !empty($_POST))
{
    $id = $_POST['id'];
    $foto = $_POST['foto'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];
    $gaji = $_POST['gaji'];
    $kelamin = $_POST['gender'];
    $jabatan = $_POST['jabatan'];
    $anak = $_POST['anak'];


    $res = $database->create($id,$foto,$nama,$alamat,$umur,$gaji,$kelamin,$jabatan,$anak);
    if($res){
        echo '<script> alert("DATA UPDATE"); </script>';
        header("location:show.php");
    }else{
        echo '<script> alert("DATA FAILED"); </script>';
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
    <link rel="stylesheet" href="style.css">
    <!-- mobile style -->
    <link rel="stylesheet" href="css/mobile-style.css">
    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/4d5d34d37d.js" crossorigin="anonymous"></script>





    <title>index</title>
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
                        <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <!-- LINK trigger modal -->
                        <a class="nav-link" href="#daftarModal" data-toggle="modal" data-target="#daftarModal">Daftar Karyawan</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>



    <!-- Content -->

    <div class="section-1 container-fluid py-5">
        <div class="pendaftaran">
            <div class="row text-justify-center">
                <div class="col-sm-6">
                    <img src="img/service-banner.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="desc">
                        <h6 class="pt-3">PENDAFTARAN KARYAWAN GARUDA INDONESIA</h6>
                        <p>Bagi Karyawan PT.GARUDA INDONESIA diharapkan mendaftarkan diri terlebih dahulu.</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#daftarModal">
                            Daftar Disini
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bawah"></div>



    <!-- MODAL -->

    <div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <input type="hidden" name="id">
                                <!-- FOTO KARYAWAB -->
                                <div class="form-group">
                                    <label for="foto"><b>Upload Foto</b></label>
                                    <input type="file" name="foto" class="form-control-file" id="foto">
                                </div>
                                <!-- NAMA -->
                                <div class="form-group">
                                    <label for="input"><b>Nama</b></label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                                </div>
                                <!-- ALAMAT -->
                                <div class="form-group">
                                    <label for="input"><b>Alamat</b></label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
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


    <!-- footer -->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>