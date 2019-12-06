<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if($_SESSION['auth_vk']){
    echo "<img src='".$_SESSION['photo_big']."'/><br>";
    echo "Имя: ".$_SESSION['first_name']."<br>";
    echo "Фамилия: ".$_SESSION['last_name']."<br>";
    echo "Идентификатор: ".$_SESSION['id']."<br>";
    if($_SESSION['sex'] == 0){echo "Пол: не указан<br>";}
    if($_SESSION['sex'] == 1){echo "Пол: женский<br>";}
    if($_SESSION['sex'] == 2){echo "Пол: мужской<br>";}
    echo "Дата рождения: ".$_SESSION['bdate']."<br>";
    echo "Страна: ".$_SESSION['country']['title']."<br>";
    echo "Город: ".$_SESSION['city']['title']."<br>";
}
else {
    echo "Hello " . $_SESSION['email'] . " ";
    echo "Вы вошли\n";
}
echo '<a href="validation-form/logout.php" class = "btn btn-lg btn-success">ВЫЙТИ</a>';
?>
</body>
</html>