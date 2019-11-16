<?php
require_once 'connect.php';
session_start();
$_SESSION['try'] = false;
$_SESSION['auth'] = true;
if(isset($_POST['email']) && isset($_POST['password'])) {
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $query = "SELECT email, password,active FROM `users` WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['is_logged'] = true;
        if($email=== "admin@mail.ru" ){
            $_SESSION['is_admin'] = true;
        }
    }
    else{
        $_SESSION['try'] = true;
    }
//    UnSet($_POST['$username']);
//    UnSet($_POST['password']);
//    UnSet($_POST['email']);
    //$_SESSION['try'] = false;
}


?>