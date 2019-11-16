<?php
require 'connect.php';
if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];
  $active = 0;
  mysqli_set_charset($connection,"utf8");
  $query = "INSERT INTO users(username,password,email,active) VALUES ('$username','$password','$email','$active')";
  $result = mysqli_query($connection,$query) or die($connection);
  $_SESSION['auth'] = false;
}
?>
