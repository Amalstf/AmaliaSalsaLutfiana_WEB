<?php
require 'functions4.php';
if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil disimpan');
                document.location.href = 'index5.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('data gagal disimpan');
                document.location.href = 'tambah_data4.php';
            </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <h1>Tamabah Data Mahasiswa</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama">
            </li>
            <li>
                <label for="Nim">Nim :</label>
                <input type="text" name="Nim" id="Nim" required>
            </li>
            <li>
                <label for="Email">Email :</label>
                <input type="text" name="Email" id="Email" required>
            </li>
            <li>
                <label for="Jurusan">Jurusan :</label>
                <input type="text" name="Jurusan" id="Jurusan" required>
            </li>
            <li>
                <label for="Gambar">Gambar :</label>
                <input type="file" name="Gambar" id="Gambar">
            </li>
            <li>
                <button type="submit" name="submit"> Tambah </button>
            </li>
        </ul>
    </form>
</body>

</html>