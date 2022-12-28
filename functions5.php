<?php

$conn = mysqli_connect("localhost", "root", "", "phpdatabase");

if(!$conn) {
    die('Koneksi Error : '.mysqli_connect_errno().' - '.mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

function query($query_kedua) {
    global $conn;
    $result = mysqli_query($conn, $query_kedua);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($data["Nama"]);
    $nim = htmlspecialchars($data["Nim"]);
    $email = htmlspecialchars($data["Email"]);
    $jurusan = htmlspecialchars($data["Jurusan"]);
    $gambar = htmlspecialchars($data["Gambar"]);

    // $nama=$data["Nama"];
    // $nim=$data["Nim"];
    // $email=$data["Email"];
    // $jurusan=$data["Jurusan"];
    // $gambar=$data["Gambar"];

    $query = " INSERT INTO mahasiswa
                    VALUES
                    ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    //return false
    $nama_file = $_FILES['Gambar']['name'];
    $ukuran_file = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmpfile = $_FILES['Gambar']['tmp_name'];

    //cek kondisi apakah user sudah melakuak proses upload
    if ($error == 4) {
        echo "
       <script>
           alert('Tidak ada gambar yang diupload');
       </script>
        ";
        return false;
    }

    $jenis_gambar = ['jpg', 'jpeg', 'gif', 'png'];
    $pecah_gambar = explode('.', $nama_file);
    $pecah_gambar = strtolower(end($pecah_gambar));

    if (!in_array($pecah_gambar, $jenis_gambar)) {
        echo "
       <script>
           alert('yang anda upload bukan file gambar');
       </script>
        ";
        return false;
    }

    if ($ukuran_file > 10000000) {
        echo "
       <script>
           alert('ukuran gambar terlalu besar');
       </script
       ";
        return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $pecah_gambar;

    move_uploaded_file($tmpfile, 'image/' . $namafilebaru);

    return $namafilebaru;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, " DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["Nama"]);
    $nim = htmlspecialchars($data["Nim"]);
    $email = htmlspecialchars($data["Email"]);
    $jurusan = htmlspecialchars($data["Jurusan"]);
    $GambarLama = htmlspecialchars($data["GambarLama"]);

    if ($_FILES['Gambar']['error'] == 4) {
        $gambar = $GambarLama;
    } else {
        $gambar = upload();
    }

    $query = " UPDATE mahasiswa SET
                Nama = '$nama', 
                Nim = '$nim', 
                Email = '$email', 
                Jurusan = '$jurusan', 
                Gambar = '$gambar' 
                WHERE id = $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $sql = "SELECT * FROM mahasiswa 
            WHERE 
            nama LIKE '%$keyword%' OR 
            nim LIKE '%$keyword%' OR 
            email LIKE '%$keyword%' OR 
            jurusan LIKE '%$keyword%' 
            ";

    return query($sql);
}

function registrasi($data) {
    global $conn;
    $username = strtolower(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username sudah ada');
            </script>
        ";
        return false;
    }

    if ($password != $password2) {
        echo "
        <script>
            alert('password anda tidak sama');
        </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, " INSERT INTO users VALUES ('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}
