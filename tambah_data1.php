<?php
	require 'functions1.php';
	// cek apakah button submit sudah di tekan atau belum
	if (isset($_POST['submit'])) {
		//cek sukses data ditambah menggunakan function tambah functions.php
		if(tambah($_POST) > 0) {
			echo "
			<script>
				alert('data berhasil disimpan');
				document.location.href='index.php';
			</script>
			";
		} else {
			echo "
			<script>
				alert('data gagal disimpan');
				document.location.href='tambah_data1.php';
			</script>";
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
					<input type="text" name="Nim" id="Nim" required>
				</li>

				<li>
					<!-- for pada label terhubung dengan id jadi jika label nama diklik maka textfield nama akan aktif jika -->
					<label for="Email">Email :</label>
					<input type="text" name="Email" id="Email" required>
				</li>

				<li>
					<!-- for pada label terhubung dengan id jadi jika label nama diklik maka textfield nama akan aktif jika -->
					<label for="Jurusan">Jurusan :</label>
					<input type="text" name="Jurusan" id="Jurusan" required>
				</li>

				<li>
					<!-- for pada label terhubung dengan id jadi jika label nama diklik maka textfield nama akan aktif jika -->
					<label for="Gambar">Gambar :</label>
					<input type="text" name="Gambar" id="Gambar" required>
				</li>

				<li>
					<button type="submit" name="submit"> Tambah </button>
				</li>
			</ul>
		</form>
	</body>
</html>