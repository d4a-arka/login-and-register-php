<?php
include "service/database.php";
session_start();
$login_msg="";

 if(isset($_SESSION["is_login"])){
    header("location: dashboard.php");
}



if (isset($_POST['login'])) {
    $usn = $_POST['usn'];
    $pw = $_POST['pw'];
    $hash_pw=hash('sha256',$pw);

    $sql="SELECT * FROM user where username='$usn' 
    AND password='$hash_pw'";

    $result=$conn->query($sql);

    if ($result->num_rows>0) {
        $data = $result->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        $_SESSION["is_login"] = true;
         header("location: dashboard.php");

    } else {
        $login_msg= "Data Akun Tidak Ditemukan";
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
        <h2>Login Here</h2>
    </div>
    <i><?= $login_msg ?></i>
    <div style="">
        <form action="" method="post">
            <label for="usm">Username: </label>
            <input type="text" placeholder="username" name="usn" id="usn"> <br>
            <label for="pw">Password: </label>
            <input type="password" placeholder="password" id="pw" name="pw"> <br>
            <button type="submit" name="login" id="login">Login</button>
            
        </form>
    </div>

    <?php include "layout/footer.html"?>
</body>
</html>