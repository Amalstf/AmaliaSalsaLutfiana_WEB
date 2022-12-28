<?php
// buat koneksi
$conn=mysqli_connect("localhost", "root", "", "phpdatabase");

//cek apakah button submit sudah di tekan atau belum
if (isset($_POST['submit'])) {
	$nama = $_POST["Nama"];
	$nim = $_POST["Nim"];
	$email = $_POST["Email"];
	$jurusan = $_POST["Jurusan"];
	$gambar = $_POST["Gambar"];

	// var_dump($nama);
	// die();

	//query insert data
	$query = " INSERT INTO mahasiswa VALUES ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";
	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn > 0)) {
		echo " data berhasil disimpan";
	} else {
		echo "gagal";
		echo "<br>";
		echo mysqli_error($conn);
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Data</title>
	</head>
	<body>
		<h1>Tambah Data Mahasiswa</h1>
		<form action="" method="post">
			<ul>
				<li>
					<!-- for pada label terhubung dengan id jadi jika label nama diklik maka textfield nama akan aktif jika -->
					<label for="Nama">Nama :</label>
					<input type="text" name="Nama" id="Nama">
				</li>

				<li>
					<!-- for pada label terhubung dengan id jadi jika label nama diklik maka textfield nama akan aktif jika -->
					<label for="Nim">Nim :</label>
					<input type="text" name="Nim" id="Nim">
				</li>

				<li>
					<!-- for pada label terhubung dengan id jadi jika label nama diklik maka textfield nama akan aktif jika -->
					<label for="Email">Email :</label>
					<input type="text" name="Email" id="Email">
				</li>

				<li>
					<!-- for pada label terhubung dengan id jadi jika label nama diklik maka textfield nama akan aktif jika -->
					<label for="Jurusan">Jurusan :</label>
					<input type="text" name="Jurusan" id="Jurusan">
				</li>

				<li>
					<!-- for pada label terhubung dengan id jadi jika label nama diklik maka textfield nama akan aktif jika -->
					<label for="Gambar">Gambar :</label>
					<input type="text" name="Gambar" id="Gambar">
				</li>

				<li>
					<button type="submit" name="submit"> Tambah </button>
				</li>
			</ul>
		</form>
	</body>
</html>