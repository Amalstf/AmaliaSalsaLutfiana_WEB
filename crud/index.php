<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>
<html>
<style>
    b{
        font-size:24px;
        margin-left : 200px;
    }
    body{
        background-color : khaki;
        color: brown;
        font-family: cursive;
        margin-left:200px;
        margin-top: 50px;
    }
    table{
        border-color : green;
    }
    a{
        color : green;
    }
 </style>
<head>    
    <title>Homepage</title>
    <b>Registrasi Anggota Baru Karang Taruna 2023</b>
</head>
 <br><br><br>
<body>
<a href="add.php">Register New Member</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>Name</th> <th>Phone</th> <th>Address</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['name']."</td>";
        echo "<td>".$user_data['mobile']."</td>";
        echo "<td>".$user_data['email']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>