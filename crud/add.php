<html>
<style>
    body{
        background-color : khaki;
        margin-left : 500px;
        margin-top : 200px;
        font-family:cursive;
        color : brown;
    }
    a{
        color: green;
    }
 </style>
<head>
    <title>Add Users</title>
    <b>Registrasi Anggota Baru Karang Taruna 2023</b>
</head>
<br><br>
<body>
    <a href="index.php">New Register</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="70%" border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Address</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr> 
                <td>Phone</td>
                <td><input type="text" name="mobile"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO users(name,email,mobile) VALUES('$name','$email','$mobile')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>