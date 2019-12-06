<?php
require_once 'AuthPHP.php';
session_destroy();
UnSet($_SESSION['is_logged']);
UnSet($_SESSION['vk_auth']);
//UnSet($_POST['username']);
//UnSet($_POST['email']);
//UnSet($_POST['password']);
header('Location: /index.php');
?>
