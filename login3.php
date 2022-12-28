<?php
    session_start();
    require 'functions7.php';

    // cek cookie
    if(isset($_COOKIE['id'] && isset($_COOKIE['username']))) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id
        $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        if($key == hash('sha256', $row['username'])) {
            $_SESSION['login'] = true;
        }
    }


    if(isset($_SESSION["login"])) {
        // echo $_SESSION["login"];
        header("Location:index8.php");
        exit;
    }

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {

                //set session
                $_SESSION["login"] = true;

                //cek remember me
                if(isset($_POST['remember'])) {
                    //enkripsi cookie menggunakan hash tipe sha256
                    setcookie('id', $row['id'], time()+60);
                    setcookie('key', hash(sha256, $row['username']), time()+60);
                }

                // redirect ke halaman index8.php
                header("Location:index8.php");
                exit;
            }
        }
        $error = true;
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>

<body>
    <h1> Halaman Login</h1>

    <?php if (isset($error)) : ?>
        <p style="color:red;font-style:bold">
            Username dan Password salah</p>

    <?php endif ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>