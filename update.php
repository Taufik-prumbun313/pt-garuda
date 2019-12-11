<?php 
require_once('koneksi.php');

$id = $_GET['id_karyawan'];
      $res = $database->read ($id);
      $getid = mysqli_fetch_assoc($res);



?>