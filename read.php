<?php
require_once('koneksi.php');
$res = $database->read();


 ?>

<!DOCTYPE html>
<html>
<head>

	<title>gurihhhhhh</title>
</head>
<body>

	<p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>

	<h3>Data karyawan</h3>

	<table cellpadding="10" cellspacing="10" border="1">
		<tr bgcolor="#CCCCCC">
			<th>No.</th>
      <th>foto</th>
			<th>Nama karyawan</th>
			<th>Alamat</th>
      <th>Umur</th>
      <th>Gaji</th>
      <th>Jenis Kelamin</th>
      <th>Jabatan</th>
      <th>Jumlah Anak</th>

		</tr>



    <?php
      while ($data = mysqli_fetch_assoc($res)){
        ?>
        <tr>
          <td><img src='images/".$data['foto']."' width='100' height='100'></td>
            <td><?php echo $data['id_karyawan']; ?></td>
            <td><?php echo $data['foto']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['jenis_kelamin']; ?></td>
            <td><?php echo $data['umur']; ?></td>
            <td><?php echo $data['gender']; ?></td>
            <td><?php echo $data['gaji']; ?></td>
            <td><?php echo $data['jabatan']; ?></td>
            <td><?php echo $data['umur']; ?></td>
            <td><a href="edit1.php?id_karyawan=<?php echo $data['id_karyawan']; ?>" class="btn btn-primary">Edit</a></td>
            <td><a href="delete.php" class="btn btn-danger">Hapus</a></td>

        </tr>
      <?php } ?>


	</table>
</body>
</html>
