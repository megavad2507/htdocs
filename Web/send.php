<?php
//подключение к бд
$host = 'localhost';
$user = 'root';
$pass = "";
$db_name = 'products';
$link = mysqli_connect($host,$user,$pass,$db_name);
mysqli_set_charset($link,'utf8');
if(!$link){
    echo "Error to connect db. Code of error " .mysqli_connect_errno()." error is ".mysqli_connect_error();
    exit;
}
//заполнение бд
if(isset($_POST["Name_of_user"]) && isset($_POST["Name_of_product"]) && isset($_POST["Price"]) && isset($_POST["Date"]) && isset($_POST["Tel"])){
    $sql = mysqli_query($link,"INSERT INTO `products`(`FULL NAME`,`PRODUCT`,`PRICE`,`DATE`,`TELEPHONE`)
        VALUES('{$_POST['Name_of_user']}','{$_POST['Name_of_product']}','{$_POST['Price']}','{$_POST['Date']}','{$_POST['Tel']}' )");
    if($sql){
        header('Location: '.$_SERVER['HTTP_REFERER']);
        echo "<p>Tha data was sucessfull added</p>";
    }
    else{
        echo "<p>Error : ".mysqli_error($link)."</p>";
    }
}
//получение данных
$sql = mysqli_query($link,'SELECT `FULL NAME`, `PRODUCT`,`PRICE`,`DATE`,`TELEPHONE` FROM `products` ');
?>
