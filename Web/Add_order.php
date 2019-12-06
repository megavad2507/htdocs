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
    <script src="https://kit.fontawesome.com/5ffafa98ae.js"></script>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <title>Document</title>
</head>
<body>
<?php  require_once  'send.php'?>

<div class="container-fluid" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered ">
                <thead class="table-danger">
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
                    while($result = mysqli_fetch_array($sql_data)) {
                        echo '<tr>';
                        echo '<td>' . $result['id'] .'</td>';
                        echo '<td>' . $result['FULL NAME'] . '</td>';
                        echo '<td>' . $result['PRODUCT'] . '</td>';
                        echo '<td>' . $result['PRICE'] . '</td>';
                        echo '<td>' . $result['DATE'] . '</td>';
                        echo '<td>' . $result['TELEPHONE'] . '</td>';
                        echo "<td><a href='?del={$result['id']}'><i class='fa fa-trash' aria-hidden='true'></i></a><a href='?edit={$result['id']}'><i class='fa fa-pencil' aria-hidden='true'></i></a> </td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <form method="post">
                <table class="table table-bordered">
                    <tr>
                        <td>Фамилия Имя Отчество: </td>
                        <td><input type="text" name="Name_of_user" value="<?= isset($_GET['edit']) ? $product['FULL NAME']: '' ; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Название товара</td>
                        <td><input type="text" name="Name_of_product" value="<?= isset($_GET['edit']) ? $product['PRODUCT'] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Цена</td>
                        <td><input type="number" size="10" name="Price" value="<?= isset($_GET['edit']) ? $product['PRICE'] : ''; ?>" required>руб.</td>
                    </tr>
                    <tr>
                        <td>Дата</td>
                        <td><input type="date" name="Date"  value="<?= isset($_GET['edit']) ? $product['DATE'] : ''; ?>"required></td>
                    </tr>
                    <tr>
                        <td>Контактный телефон</td>
                        <td><input type="text" id="tel" name="Tel" value="<?= isset($_GET['edit']) ? $product['TELEPHONE'] : ''; ?>"  required></td>
                    </tr>
                    <tr class="table">
                        <td colspan="2"><input class="btn mb-2 btn-success"  type="submit" value="Отправить"></td>
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
