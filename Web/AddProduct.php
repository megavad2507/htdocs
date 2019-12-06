<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/5ffafa98ae.js"></script>
    <title>Document</title>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
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
                require_once 'AddNewProductConfig.php';

                while($result = mysqli_fetch_array($sql_data)) {
                    echo '<tr>';
                    echo '<td>' . $result['id'] .'</td>';
                    echo '<td>' . $result['Type_of_product'] . '</td>';
                    echo '<td>' . $result['Name_of_product'] . '</td>';
                    echo '<td>' . $result['Article'] . '</td>';
                    echo '<td>' . $result['Price'] . '</td>';
                    echo '<td>' . $result['description'] . '</td>';
                    echo '<td><img class="img_product" src="images/products/'.$result['image_path'].'"></td> ';

                    echo "<td><a href='?del={$result['id']}'><i class='fa fa-trash' aria-hidden='true'></i></a><a href='?edit={$result['id']}'><i class='fa fa-pencil' aria-hidden='true'></i></a> </td>";
                    echo '<tr>';
                }
//                ?>
                </tbody>
            </table>
        </div>
        <form enctype='multipart/form-data' method="post">
        <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <td>Категория изделия: </td>
                        <td>
                            <select name="category-product" required>
                                <option value="Кольца" <? if(isset($_GET['edit']))  if( $product['Type_of_product'] == "Кольца"):?> selected = 'selected'<?endif?>>Кольца</option>
                                <option value="Серьги"  <? if(isset($_GET['edit']))  if( $product['Type_of_product'] == "Серьги"):?> selected = 'selected'<?endif?>>Серьги</option>
                                <option value="Часы"  <? if(isset($_GET['edit']))  if( $product['Type_of_product'] == "Часы"):?> selected = 'selected'<?endif?>>Часы</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Название товара</td>
                        <td><input  size="50" type="text" name="Name_of_product" value="<?= isset($_GET['edit']) ? $product['Name_of_product'] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Артикул</td>
                        <td><input  size="50" type="text" name="Article" value="<?= isset($_GET['edit']) ? $product['Article'] : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Цена</td>
                        <td><input  type="number" size="10" name="Price" value="<?= isset($_GET['edit']) ? $product['Price'] : ''; ?>" required>руб.</td>
                    </tr>
                    <tr>
                        <td>Описание товара</td>
                        <td><textarea  placeholder="Введите описание..." cols="50" rows="6" name="description" ><?= isset($_GET['edit']) ? $product['description'] : ''; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Добавьте фотографию товара</td>
                        <td><input type="file" name="AddProductImage"></td>
                    </tr>
                    <tr class="table">
                        <td colspan="2"><input class="btn mb-2 btn-success"  type="submit" value="Отправить"></td>
                    </tr>

                </table>
        </div>
        </form>
</div>
</div>

</body>
</html>