<?php
session_start();
require 'connect.php';
if(isset($_POST['email']) && isset($_POST['password'])){
  $password = $_POST['password'];
  $email = $_POST['email'];
  $query = "SELECT * FROM users WHERE email='$email' and password='$password'";
  $result = mysqli_query($connection,$query) or die(mysqli_error($connection));
  $count =mysqli_num_rows($result);
  if($count == 1){
    $_SESSION['email'] = $email;


}
else{
  $fmsg = "Error";
}
if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  echo "Hello " .$email."";
  echo "Вы вошли";
  echo '<a href="validation-form/logout.php" class = "btn btn-lg btn-success">ВЫЙТИ</a>';
}
}
?>
