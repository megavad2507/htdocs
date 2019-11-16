<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="veiwpoint" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src = "ajax/jquery-3.4.1.min.js"></script>
    <script src = "js/src/modal.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>Jeweler from MOS</title>
</head>
<header>
    <div class="header">
        <div class="holder"></div>
        <div class="container-fluid" id="header">
            <div class="row">
                <div class="col-md-4">
                    <form action="" method="get">
                        <div class="search">
                            <input type="search" name="search" placeholder="Поиск...">
                            <button type="submit"><i id="search-icon" class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4" align="center">
                    <!-- <a href="index.php"><img src="images/logo.png" class="logo" alt="logo" title="Jeweler from MOS"></a> -->
                    <a href="index.php"><span id ="logo">Jeweler-from-MOS</span></a>
                </div>
                <div align="right" class="col-md-4">
                    <?php
                    if(!isset($_SESSION['is_logged'])): ?>
                    <a href="login.php" class="login">Войти или зарегистрироваться</a>
                    <?php else: ?>
                        <a href="profile.php" class="login">Профиль</a>
                        <a href="validation-form/logout.php" class="login">Выйти</a>
                    <?php endif;?>
                </div>
            <ul class="location choose-town">
                <li class="header-nav">
                    <a href="#" id="shop"><i class="fas fa-map-marker-alt"></i>Магазины</a>
                </li>
                <li class="header-nav">Волгоград</li>
            </ul>
            <ul class="choose">
                <li class="header-nav" id="header-nav">
                    <a href="buy_journal.php">Журнал покупок</a>
                </li>
                <li class="header-nav">
                    <a href="journal_lease.php">Журнал сдачи украшений</a>
                </li>
                <li class="header-nav">
                    <a href="users.php">Пользователи</a>
                </li>
                <?php if(isset($_SESSION['is_admin'])): ?>
                <li class="header-nav">
                    <a href="Add_order.php">Добавление заказа</a>
                 </li>
                <?php endif; ?>
<!--                <li class="header-nav">-->
<!--                    <a href="#">Акции</a>-->
<!--                </li>-->
<!--                <li class="header-nav">-->
<!--                    <a href="#">Магазины</a>-->
<!--                </li> -->
            </ul>

        </div>
      </div>
    </div>
    <hr>
</header>
