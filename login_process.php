<?php
    session_start();
    include 'config.php';
    if(isset($_POST["submit"]) && $_POST["email"] != '' && $_POST["password"] != '') {
        $email = $_POST["email"];
        $password = $_POST["password"];
        // $password = md5($password);
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $user = mysqli_query($conn, $sql);
        if(mysqli_num_rows($user) > 0) {
            $_SESSION["user"] = $email;
        } else {
            echo "Nhap sai";
        }
        header("location: trangchu.php");
    } else {
        header("location: login.php");
    }
?>