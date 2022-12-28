<?php
    session_start();

    if(!isset($_SESSION["login"])) {
        echo $_SESSION["login"];
        header("Location:login4.php");
        exit;
    }

    require 'functions8.php';
    $jumlahdataperhalaman = 2;

    $jumlahdata = count(query("SELECT * FROM mahasiswa"));
    $jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);

    $halamanaktif = (isset($_GET["halaman"])?$_GET["halaman"]:1);
    $dataawal = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;

    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $dataawal, $jumlahdataperhalaman");

    if (isset($_POST["cari"])) {
        $mahasiswa = cari($_POST["keyword"]);
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1> Daftar Mahasiswa</h1>
    <a href="tambah_data8.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari"> cari </button>
    </form>
    <br>

    <!-- navigasi -->
    <?php if($halamanaktif > 1):?>
    <a href="?halaman=<?= $halamanaktif - 1 ?>">&laquo;</a>
    <?php endif;?>

    <?php for($i; $i <= $jumlahhalaman; $i++) : ?>
    <?php if($i == $halamanaktif):?>
        <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red"><?php echo $i; ?></a>
    <?php else:?>
        <a href="?halaman=<?= $i; ?>"><?php echo $i; ?></a>
    <?php endif; ?>
    <?php endfor;?>

    <?php if($halamanaktif < $jumlahhalaman):?>
    <a href="?halaman=<?= $halamanaktif + 1 ?>">&raquo;</a>
    <?php endif ?>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["Nama"]; ?></td>
                <td><?= $row["Nim"]; ?></td>
                <td><?= $row["Email"]; ?></td>
                <td><?= $row["Jurusan"]; ?></td>
                <td> <img src="image/<?php echo $row["Gambar"]; ?>" alt="" heigth="100" width="100" srcset=""></td>
                <td>
                    <a href="edit6.php?id=<?php echo $row["id"]; ?>">Edit</a>
                    <a href="hapus7.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('apakah anda ingin menghapus data?')"> Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>

</html>