<?php
    session_start();

    if(!isset($_SESSION["login"])) {
        echo $_SESSION["login"];
        header("Location:login2.php");
        exit;
    }

    require 'functions6.php';

    $id=$_GET["id"];

    if (hapus ($id) > 0) {
        echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'index7.php';
        </script>
        ";
    } else {
        echo"
        <script>
            alert('data gagal dihapus');
            document.location.href = 'index7.php';
        </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
?>