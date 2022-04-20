<?php
    include 'config.php';
    if(isset($_POST['submit']) && $_POST["ho_ten"]!='' && $_POST["email"]!='' && $_POST["password"]!='') {
        $ho_ten = $_POST["ho_ten"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        //repassword

        $sql = "SELECT * FROM user WHERE email = '$email'";
        $old = mysqli_query($conn, $sql);
        // $password = md5($password);
        if(mysqli_num_rows($old) > 0) {
            header("location:register.php");
        } 
        $sql = "INSERT INTO user (email, password, ho_ten) VALUES ('$email', '$password', '$ho_ten')";
        
        mysqli_query($conn, $sql);
        header("location:login.php");
    } else {
        header("location:register.php");
    }
?>