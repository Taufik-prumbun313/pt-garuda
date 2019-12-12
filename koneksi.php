<?php

class Database
{

    private $connection;

    public function __construct()
    {
        $this->connect_db();
    }

    function connect_db()
    {
        $this->connection = mysqli_connect('localhost', 'root', '', 'pt_garuda');
        if (mysqli_connect_error()) {
            die("Database Failed" . mysqli_connect_error() . mysqli_connect_errno());
        }
    }


    function create($id, $foto, $nama, $alamat, $umur, $gaji, $kelamin, $jabatan, $anak)
    {
        $sql = "INSERT INTO karyawan (id_karyawan, foto_karyawan, Nama, alamat, umur, gaji, jenis_kelamin, jabatan, Jumlah_anak) VALUES ('$id', '$foto', '$nama', '$alamat', '$umur', '$gaji', '$kelamin', '$jabatan', '$anak')";

        $res = mysqli_query($this->connection, $sql);
        if ($res) {
            return True;
        } else {
            return False;
        }
    }

    function read($id = null)
    {
        $sql = "SELECT * FROM karyawan";
        if ($id) {
            $sql .= "WHERE id_karyawan=$id";
        };
        $res = mysqli_query($this->connection, $sql);
        return $res;
    }


    function update($foto, $nama, $alamat, $umur, $gaji, $kelamin, $jabatan, $anak, $id)
    {
        $sql = "UPDATE karyawan SET foto_karyawan='$foto', Nama='$nama', alamat='$alamat', umur='$umur', gaji='$gaji', jenis_kelamin='$kelamin', jabatan='$jabatan', Jumlah_anak='$anak' WHERE id_karyawan=$id";
        $res = mysqli_query($this->connection, $sql);
        if ($res) {
            return True;
        } else {
            return false;
        }
    }


    public function delete($id)
    {
        $sql = "DELETE FROM karyawan WHERE id_karyawan=$id";
        $res = mysqli_query($this->connection, $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}

$database = new Database();
