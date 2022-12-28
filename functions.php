<?php
// Membuat koneksi
$conn = mysqli_connect("localhost", "root", "", "phpdatabase");

// cek koneksi jika error
if (!$conn) {
    die('Koneksi Error : '.mysqli_connect_errno()
    .' - '.mysqli_connect_error());
}

// Ambil data dari tabel mahasiswa/query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// var_dump($result);
// die();

// function query akan menerima isi parameter dari string query yang ada pada index2.php (line 3)
function query($query_kedua) {
    // dikarenakan $conn diluar function query maka dibutuhkan scope global $conn
    global $conn;
    $result = mysqli_query($conn, $query_kedua);

    // wadah kosong untuk menampung isi array pada saat looping 16
    $rows = [];
    // var_dump($row);
    // die();

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
        var_dump($rows);
    }

    return $rows;
}

function tambah ($data) {
    global $conn;

    $nama = htmlspecialchars($data["Nama"]);
    $nim = htmlspecialchars($data["Nim"]);
    $email = htmlspecialchars($data["Email"]);
    $jurusan = htmlspecialchars($data["Jurusan"]);
    $gambar = htmlspecialchars($data["Gambar"]);

    // $nama = $data["nama"];
    // $nim = $data["nim"];
    // $email = $data["email"];
    // $jurusan = $data["jurusan"];
    // $gambar = $data["gambar"];

    $query = " INSERT INTO mahasiswa VALUES ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id ");
    return mysqli_affected_rows($conn);
}
?>