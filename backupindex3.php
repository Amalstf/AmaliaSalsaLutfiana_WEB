<?php
    session_start();

    if(!isset($_SESSION["login"])) {
        echo $_SESSION["login"];
        header("Location:login5.php");
        exit;
    }

    require 'functions9.php';
    $jumlahdataperhalaman = 2;
    $jumlahdata = count(query(" SELECT * FROM mahasiswa"));

    $jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
    $halamanaktif = (isset($_GET["halaman"])?$_GET["halaman"]:1);

    $dataawal = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
    $mahasiswa = query(" SELECT * FROM mahasiswa LIMIT $dataawal, $jumlahdataperhalaman");
    

    if (isset($_POST["cari"])) {
        $mahasiswa = cari($_POST["keyword"]);
    }
?>

<html lang="en">
<style>
    @media print {
        .logout, .tambah, .form-cari {
            display: none;
        }
        .aksi, .halaman, .cari, .buttoncari {
            display: none;
        }
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1> Daftar Mahasiswa</h1>
    <a href="logout4.php" class="logout"></a>

    <a href="tambah_data9.php" class="tambah">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post" class="form-cari">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari"> cari </button>
    </form>

    <?php if($halamanaktif > 1):?>
    <a href="?halaman=<?= $halamanaktif - 1 ?>" class="halaman">&laquo;</a>
    <?php endif;?>

    <?php for($i = 0; $i <= jumlahhalaman; $i++):?>
    <?php if($i == $halamanaktif):?>
        <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;" class="halaman"><?php echo $i; ?></a>
    <?php else:?>
        <a href="?halaman=<?= $i; ?>" class="halaman"><?php echo $i; ?></a>
    <?php endif; ?>
    <?php endfor;?>

    <?php if($halamanaktif < $jumlahhalaman):?>
        <a href="?halaman=<?= $halamanaktif + 1 ?>" class="halaman">&raquo;</a>
    <?php endif ?>

    <br>

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
                    <a href="edit8.php?id=<?php echo $row["id"]; ?>">Edit</a>
                    <a href="hapus9.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('apakah anda ingin menghapus data?')"> Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>

</html>