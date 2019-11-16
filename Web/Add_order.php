<!--//--><?php //require_once 'validation-form/check_login.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Raleway">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.inputmask.js"></script>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <title>Document</title>
</head>
<body>
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
?>
<?php
//заполнение бд
    if(isset($_POST["Name_of_user"]) && isset($_POST["Name_of_product"]) && isset($_POST["Price"]) && isset($_POST["Date"]) && isset($_POST["Tel"])){
        $sql = mysqli_query($link,"INSERT INTO `products`(`FULL NAME`,`PRODUCT`,`PRICE`,`DATE`,`TELEPHONE`)
        VALUES('{$_POST['Name_of_user']}','{$_POST['Name_of_product']}','{$_POST['Price']}','{$_POST['Date']}','{$_POST['Tel']}' )");
        if($sql){
            echo "<p>Tha data was sucessfull added</p>";
        }
        else{
            echo "<p>Error : ".mysqli_error($link)."</p>";
        }
    }
?>
<?php
//получение данных
    $sql = mysqli_query($link,'SELECT `FULL NAME`, `PRODUCT`,`PRICE`,`DATE`,`TELEPHONE` FROM `products` ');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered table-primary">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ФИО</th>
                        <th>Название товара</th>
                        <th>Цена</th>
                        <th>Дата</th>
                        <th>Контактный телефон</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $number_of_rows = 1;
                    while($result = mysqli_fetch_array($sql)) {
                        echo '<tr>';
                        echo '<td>' . $number_of_rows . '</td>';
                        echo '<td>' . $result['FULL NAME'] . '</td>';
                        echo '<td>' . $result['PRODUCT'] . '</td>';
                        echo '<td>' . $result['PRICE'] . '</td>';
                        echo '<td>' . $result['DATE'] . '</td>';
                        echo '<td>' . $result['TELEPHONE'] . '</td> </tr>';
                        $number_of_rows++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <form method="post" action="Add_order.php">
                <table class="table table-primary">
                    <tr>
                        <td>Фамилия Имя Отчество: </td>
                        <td><input type="text" name="Name_of_user" required></td>
                    </tr>
                    <tr>
                        <td>Название товара</td>
                        <td><input type="text" name="Name_of_product" required></td>
                    </tr>
                    <tr>
                        <td>Цена</td>
                        <td><input type="number" size="10" name="Price" required>руб.</td>
                    </tr>
                    <tr>
                        <td>Дата</td>
                        <td><input type="date" name="Date" required></td>
                    </tr>
                    <tr>
                        <td>Контактный телефон</td>
<!--                        <td><input type="tel" name="Tel" value="+7" required pattern="[(][0-9]{3}[)][ -][0-9]{3}[ -][0-9]{2}[ -][0-9]{2}"></td>-->
                        <td><input type="text" id="tel" value="" name="Tel" required></td>
                    </tr>
                    <tr class="table-success">
                        <td colspan="2"><input class="btn btn-success mb-2" type="submit" value="Отправить"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tel').inputmask("+7(999)999-99-99");
    });
    document.getElementById("Price").addEventListener("input", allowOnlyDigits);
    function allowOnlyDigits() {
        if (this.validity.valid) {
            this.setAttribute('current-value', this.value.replace(/[^\d]/g, ""));
        }
        this.value = this.getAttribute('current-value');
    }
</script>
</html>
