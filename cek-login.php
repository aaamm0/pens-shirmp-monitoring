<?php
    include "koneksi.php";
    session_start();

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM `user` WHERE `email` = '".$email."'";
    $hasil = mysqli_query($koneksi, $query);

    if($hsl = mysqli_fetch_array($hasil)){
        if(password_verify($pass, $hsl['pass'])){
            session_start();
            $_SESSION['user'] = $hsl;
            
            echo"<script> alert('Success !!!'); </script>";
            header('Location: dasboard.php');
        }
        else{
            echo"<script> alert('Email atau Password Anda Salah !!!'); </script>";
            echo '<script>window.location="login.php"</script>';
        }
    }
?>