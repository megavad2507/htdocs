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
//получение данных
$sql_data = mysqli_query($link,'SELECT  `id`, `FULL NAME`, `PRODUCT`,`PRICE`,`DATE`,`TELEPHONE` FROM `products` ');


if(isset($_GET['del'])){
    $sql = mysqli_query($link,"DELETE FROM  `products` WHERE `id` = {$_GET['del']}");
    if($sql) {
        header("Location: Add_order.php");
    }
    else{
        echo "<div class = 'alert alert-danger'>Возникла ошибка ". mysqli_error($link) ."</div>";
    }
}
if(isset($_POST['Name_of_user'])) {
    if (isset($_GET['edit'])) {
        $sql= mysqli_query($link, "UPDATE `products` SET `FULL NAME` = '{$_POST['Name_of_user']}',`PRODUCT` = '{$_POST['Name_of_product']}',
                            `PRICE` = '{$_POST['Price']}', `DATE`= '{$_POST['Date']}', `TELEPHONE` = '{$_POST['Tel']}'  WHERE  `id` = {$_GET['edit']}");
        header("Location: Add_order.php");
    }
    else {
        $sql = mysqli_query($link, "INSERT INTO `products`(`FULL NAME`,`PRODUCT`,`PRICE`,`DATE`,`TELEPHONE`)
        VALUES('{$_POST['Name_of_user']}','{$_POST['Name_of_product']}','{$_POST['Price']}','{$_POST['Date']}','{$_POST['Tel']}' )");
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
}
if(isset($_GET['edit'])) {
    $sql = mysqli_query($link, "SELECT  `FULL NAME`, `PRODUCT`, `PRICE`, `DATE`, `TELEPHONE` FROM `products` WHERE `id`={$_GET['edit']} ");
    $product = mysqli_fetch_array($sql);
}



?>
