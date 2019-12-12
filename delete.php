<?php
require_once('koneksi.php');


$id = $_GET['id_karyawan'];
$res = $database->delete($id);
if ($res) {
    echo '<script> alert("DATA TERHAPUS"); </script>';
    header("location:show.php");
} else {
    echo '<script> alert("DATA GAGAL TERHAPUS"); </script>';
    header("location:show.php");
}
