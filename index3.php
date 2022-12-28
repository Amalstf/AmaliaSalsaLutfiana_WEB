<?php
    require 'functions.php';
    $mahasiswa = query("SELECT * FROM mahasiswa");
    // var_dump($result);
    // die();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
        }
        
        th {
            background-color: wheat;
        }
    </style>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah_data.php">Tambah Data Mahasiswa</a>

    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>

        <!-- Contoh data Static -->
        <?php foreach ($mahasiswa as $row):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["Nama"]; ?></td>
            <td><?= $row["Nim"]; ?></td>
            <td><?= $row["Email"]; ?></td>
            <td><?= $row["Jurusan"]; ?></td>
            <td><img src="image/<?php echo $row["Gambar"]; ?>" alt="" height="100" width="100" srcset=""></td>
            <td>
                <a href="">Edit</a>
                <a href="hapus.php?id=<?php echo $row["id"];?>"onclick="return confirm('Apa kamu yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>
</html>