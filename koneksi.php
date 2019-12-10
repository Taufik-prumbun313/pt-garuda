<?php

// class database{
//       private $connection;
//       function __construct(){
//         $this->connect_db();
//       }
//       public function connect_db(){
//         $this->connection = mysqli_connect('localhost','root','','sekolah');
//         if (mysqli_connect_error()){
//           die("database failed" . mysqli_connect_error() .mysqli_connect_errno());
//         }
//       }

  class database{
    private $connection;
    function __construct(){
      $this->connect_db();

    }
    public function connect_db(){
      $this->connection = mysqli_connect('localhost','root','','PT_GARUDA');
      if (mysqli_connect_error()) {
        die ("database failed" . mysqli_connect_error() .mysqli_connect_errno());

      }
    }
    public function create($foto_karyawan,$nama,$alamat,$umur,$gaji,$kelamin,$jabatan,$jumlah_anak){
      $sql = "INSERT INTO karyawan (foto_karyawan, Nama, alamat, umur, gaji, jenis_kelamin, jabatan, Jumlah_anak)
      VALUES ('$foto_karyawan','$nama','$alamat','$umur','$gaji','$kelamin','$jabatan','$jumlah_anak')";
      $res = mysqli_query($this->connection, $sql);
      if ($res) {
        return true;
      } else {
        return false;
      }
    }
    public function read($id_karyawan=null){

    // if ($id_siswa) {$sql .="where id_siswa=$id_siswa";}
    // $res= mysqli_query($this->connection, $sql);
    //   return $res;
    //   // yg bisa
      $sql = "SELECT * FROM karyawan";
      if($id_karyawan){ $sql .= " WHERE id_karyawan=$id_karyawan";}
      $res = mysqli_query($this->connection, $sql);
      return $res;
    }
  }

  $database = new database();
 ?>
 <!-- public function read($id_siswa=null){
 $sql = "SELECT * FROM siswa";
 // if ($id_siswa) {$sql .="where id_siswa=$id_siswa";}
 // $res= mysqli_query($this->connection, $sql);
 //   return $res;
 //   // yg bisa
   $sql = "SELECT * FROM siswa";
   if($id_siswa){ $sql .= " WHERE id_siswa=$id_siswa";}
   $res = mysqli_query($this->connection, $sql);
   return $res;
} -->
