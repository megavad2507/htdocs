<?php
require "header.php";
require_once "connection.php";
set_connection('localhost','root','','goods');
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="bestseller-icon">
                <i class="far fa-grin-stars"></i> Наши товары
            </div>
        </div>
        <div class="row">
            <?php
            $sql = mysqli_query($GLOBALS['link'],"SELECT Name_of_product,Price,image_path FROM `info` ");
            while($result = mysqli_fetch_array($sql)):
            ?>
            <div class="col-md-3 ml-6 bestseller positioner-of-product">
                <a href="#"><img class="img_product" src= "<?php echo "images/products/".$result['image_path']; ?>" alt="Кольцо"></a>
                <hr>
                <div>
                    Название товара: <br><strong><?echo $result['Name_of_product'];?></strong>
                </div>
                <br>
                <div>
                    <?echo $result['Price'].'₽';?>
                </div>
            </div>
            <? endwhile;?>
        </div>
    </div>
    <hr>
<?php
    require "footer.html";
?>
