<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/5ffafa98ae.js"></script>
    <title>Document</title>
</head>
<body>
<?php
///подключение к бд
$host = 'localhost';
$user = 'root';
$pass = "";
$db_name = '313';
$link = mysqli_connect($host,$user,$pass,$db_name);
mysqli_set_charset($link,'utf8');
if(!$link) {
    echo "Error to connect db. Code of error " . mysqli_connect_errno() . " error is " . mysqli_connect_error();
    exit();
}


if(isset($_POST['Article'])) {
    $sql1 = mysqli_query($link, "SELECT * FROM `type_of_goods` WHERE  `Type of product` = '{$_POST['category-product']}'");
    if(!$sql1){
        echo mysqli_error($link);
    }
    $result1 = mysqli_fetch_array($sql1);
}
// $sql = mysqli_query($link, "INSERT INTO `info` VALUES('{$_POST['Article']}','{$_POST['Name_of_product']}','{$_POST['Price']}','{$_POST['description']}'),1");

// $sql = mysqli_query($link,"INSERT INTO `info` (`id`, `Article`, `Name of product`, `Price`, `description`, `idTypeProduct`)
// VALUES (NULL, '{$_POST['Article']}','{$_POST['Name_of_product']}','{$_POST['Price']}','{$_POST['description']}'),'{$result['idTypeProduct']}')");
if(isset($_POST['Name_of_product'])) {
    if (isset($_GET['edit'])) {
        $sql1 = mysqli_query($link, "SELECT `idTypeProduct` FROM `type_of_goods` WHERE  `Type of product` = '{$_POST['category-product']}'");
        if(!$sql1){
            echo mysqli_error($link);
        }
        $result1 = mysqli_fetch_array($sql1);
        $sql= mysqli_query($link, "UPDATE `info` SET `idTypeProduct` = '{$result1['idTypeProduct']}',`Name of product` = '{$_POST['Name_of_product']}',
                            `Article`= '{$_POST['Article']}',`Price` = '{$_POST['Price']}', `description` = '{$_POST['description']}'  WHERE  `id` = {$_GET['edit']}");
        if(!$sql1){
            echo mysqli_error($link);
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    else {
        $sql1 = mysqli_query($link, "SELECT `idTypeProduct` FROM `type_of_goods` WHERE  `Type of product` = '{$_POST['category-product']}'");
        if(!$sql1){
            echo mysqli_error($link);
        }
        $result1 = mysqli_fetch_array($sql1);
        echo ($result1);
        $sql = mysqli_query($link,"INSERT INTO `info` (`id`, `Article`, `Name of product`, `Price`, `description`, `idTypeProduct`)
    VALUES (NULL, '{$_POST['Article']}','{$_POST['Name_of_product']}','{$_POST['Price']}','{$_POST['description']}','{$result1['idTypeProduct']}')");
        if(!$sql){
            echo mysqli_error($link);
        }
    }
}
if(isset($_GET['del'])){
    $sql = mysqli_query($link,"DELETE FROM  `info` WHERE `id` = {$_GET['del']}");
    if($sql) {
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    else{
        echo "<div class = 'alert alert-danger'>Возникла ошибка ". mysqli_error($link) ."</div>";
    }
}
if(isset($_GET['edit'])) {
    $sql = mysqli_query($link, "SELECT `id`, `Article`, `Name of product`, `Price`, `description` FROM `info` WHERE `id`={$_GET['edit']} ");
    $product = mysqli_fetch_array($sql);
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered ">
                <thead class="table-danger">
                <tr>
                    <th>#</th>
                    <th>Категория изделия</th>
                    <th>Название товара</th>
                    <th>Артикул</th>
                    <th>Цена</th>
                    <th>Описание товара</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // $sql_data = mysqli_query($link,'SELECT  `id`, `Article`, `Name of product`, `Price`, `description`, `idTypeProduct` FROM `info` ');
                //$result_type = mysqli_query($link,'SELECT `Type of product` FROM `type_of_goods` WHERE  `idTypeProduct` = '{mysqli_fetch_array($sql_data)}' ')
                $sql_data = mysqli_query($link,"SELECT `id`,`Article`,`Name of product`, `Price`, `description`,`Type of product` 
                FROM info,type_of_goods WHERE info.idTypeProduct=type_of_goods.idTypeProduct ");


                if(!$sql_data){
                    echo mysqli_error($link);
                }
                //print_r(mysqli_fetch_assoc($sql_data));
                while($result = mysqli_fetch_array($sql_data)) {
                    echo '<tr>';
                    echo '<td>' . $result['id'] .'</td>';
                    echo '<td>' . $result['Type of product'] . '</td>';
                    echo '<td>' . $result['Name of product'] . '</td>';
                    echo '<td>' . $result['Article'] . '</td>';
                    echo '<td>' . $result['Price'] . '</td>';
                    echo '<td>' . $result['description'] . '</td>';

                    echo "<td><a href='?del={$result['id']}'><i class='fa fa-trash' aria-hidden='true'></i></a><a href='?edit={$result['id']}'><i class='fa fa-pencil' aria-hidden='true'></i></a> </td>";
                    echo '<tr>';
                }
                //                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <form method="post">
                <table class="table table-bordered">
                    <tr>
                        <form method="post">
                            <td>Категория изделия: </td>
                            <td><select name="category-product" required>
                                    <option value="Кольца">Кольца</option>
                                    <option value="Серьги">Серьги</option>
                                    <option value="Часы" >Часы</option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                        <td>Название товара</td>
                        <td><input type="text" name="Name_of_product" value="<?= isset($_GET['edit']) ? $product['Name of product'] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Артикул</td>
                        <td><input type="text" name="Article" value="<?= isset($_GET['edit']) ? $product['Article'] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Цена</td>
                        <td><input type="number" size="10" name="Price" value="<?= isset($_GET['edit']) ? $product['Price'] : ''; ?>" required>руб.</td>
                    </tr>
                    <tr>
                        <td>Описание товара</td>
                        <td><textarea  placeholder="Введите описание..." cols="30" rows="3" name="description" ><?= isset($_GET['edit']) ? $product['description'] : ''; ?></textarea></td>
                    </tr>
                    <tr class="table">
                        <td colspan="2"><input class="btn mb-2 btn-success"  type="submit" value="Отправить"></td>
                    </tr>
            </form>
            </table>
            </form>
        </div>
    </div>

</body>
</html>





