<?php
require 'connect.php';
if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $active = 0;
  mysqli_set_charset($connection,"utf8");
  $query = "INSERT INTO users(username,password,email,active) VALUES ('$username','$password','$email','$active')";
  $result = mysqli_query($connection,$query);
  if($result){
    $smsg = "Okay";
  }
  else{
    $fmsg = "BAd";
  }
}
?>
