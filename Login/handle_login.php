<?php
    session_start();
    require_once "./quan_li_sinh_vien/connect.php";
    $s_name = $_POST["name"];
    $s_pass = $_POST["pass"];
    $query="Select * from login where name = '$s_name'" ;
    echo $query;
    $result= mysqli_query($db,$query);
    $data = mysqli_fetch_array($result);

    if ($s_pass == $data["pass"]) {
        $_SESSION['name']=  $s_name;
        header('location:./quan_li_sinh_vien/');
    }else{
        header('location:index.php?erro=The Name you entered isnt connected to an account. Find your account and log in.');
    }