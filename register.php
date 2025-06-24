<?php 
include "service/database.php";
session_start();
$register_message = "";

if(isset($_SESSION["is_login"])){
    header("location: dashboard.php");
    exit();
}

if (isset($_POST['register'])) { 
    $usn = $_POST['usn'];
    $pw = $_POST['pw'];
    $hash_pw = hash('sha256', $pw);
    
    $query = "INSERT INTO user (username, password) VALUES ('$usn', '$hash_pw')";
   
    if($conn->query($query)) {  
        $register_message = "Daftar Akun Berhasil, Silakan Login";
    } else {
        $register_message = "Daftar Akun Gagal, Silakan Coba lagi";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
    <?php include "layout/header.html" ?>

    <div>
        <h2>Register Here</h2>
    </div>
    <i><?= $register_message ?></i>
    <div style="">
        <form action="" method="post">
            <label for="usn">Username: </label>  
            <input type="text" placeholder="username" name="usn" id="usn"> <br>
            <label for="pw">Password: </label>
            <input type="password" placeholder="password" id="pw" name="pw"> <br>
            <button type="submit" name="register" id="register">Register</button> 
        </form>
    </div>

    <?php include "layout/footer.html"?>
</body>
</html>