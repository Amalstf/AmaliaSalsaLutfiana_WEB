<?php
    require 'functions2.php';
    $mahasiswa = query("SELECT * FROM mahasiswa");

    // tombol cari ditekan
    // cari pada line 7 adalah name dari button
    if (isset($_POST["cari"])) {
        $mahasiswa = cari($_POST["keyword"]);
    }
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
    <a href="tambah_data2.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari"> cari </button>
    </form>

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
                <a href="edit1.php?id=<?php echo $row["id"];?>">Edit</a>
                <a href="hapus2.php?id=<?php echo $row["id"];?>"onclick="return confirm('Apa kamu yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>
</html>