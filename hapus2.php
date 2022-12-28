<?php 
require 'functions2.php';

// menggunakan method get untuk mengambil id yang telah terseleksi oleh user dan dimasukkan ke dalam variabel baru yaitu $id
$id=$_GET["id"];

if (hapus($id) > 0) {
	echo "
	<script>
		alert('data berhasil dihapus');
		document.location.href='index2.php';
	</script>
	";
} else {
	echo "
	<script>
		alert('data gagal dihapus');
		document.location.href='index2.php';
	</script>";
	echo "<br>";
	echo mysqli_error($conn);
}
?>