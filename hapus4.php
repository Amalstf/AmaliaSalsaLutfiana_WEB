<?php
require 'functions4.php';

$id=$_GET["id"];

if( hapus ($id) > 0){
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href = 'index5.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal dihapus');
        document.location.href = 'index5.php';
    </script>
    ";
    echo "<br>";
    echo mysqli_error($conn);
}
