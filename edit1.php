<?php 
	require 'functions2.php';

	// menggunakan method get untuk mengambil id yg telah terseleksi oleh user dan dimasukkan ke dalam variabel baru yaitu $id
	$id = $_GET["id"];
	// var_dump($id);

	// query berdasarkan id dan index ke nol
	$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
	//var_dump($mhs[0]["Nama"]);

	// cek apakah button submit sudah di tekan atau belum
	if (isset($_POST['submit'])) {

		// cek sukses data dirubah menggunakan function edit pada functions1.php
		if (edit($_POST) > 0) {
			echo "
			<script>
				alert('data berhasil diperbaharui');
				document.location.href='index2.php';
			</script>
			";
		} else {
			echo "
			<script>
				alert('data gagal diperbaharui');
				document.location.href='edit1.php';
			</script>";
			echo "<br>";
			echo mysqli_error($conn);
		}
	}	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Update Data</title>
	</head>
	<body>
		<h1>Update Data Mahasiswa</h1>
		<form action="" method="post">
			<li>
				<input type="hidden" name="id" value="<?= $mhs["id"]?>">
			</li>

			<ul>
				<li>
					<label for="Nama">Nama :</label>
					<input type="text" name="Nama" id="Nama" value="<?= $mhs["Nama"]?>">
				</li>

				<li>
					<label for="Nim">Nim :</label>
					<input type="text" name="Nim" id="Nim" required value="<?= $mhs["Nim"]?>">
				</li>

				<li>
					<label for="Email">Email :</label>
					<input type="text" name="Email" id="Email" required value="<?= $mhs["Email"]?>">
				</li>

				<li>
					<label for="Jurusan">Jurusan :</label>
					<input type="text" name="Jurusan" id="Jurusan" required value="<?= $mhs["Jurusan"]?>">
				</li>

				<li>
					<label for="Gambar">Gambar :</label>
					<input type="text" name="Gambar" id="Gambar" required value="<?= $mhs["Gambar"]?>">
				</li>

				<li>
					<button type="submit" name="submit"> Update </button>
				</li>

			</ul>
		</form>
	</body>
</html>