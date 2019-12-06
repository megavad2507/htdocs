

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <title>Вход и регистрация</title>
</head>
<body>
<?php
    require_once 'validation-form/AuthPHP.php';
    require_once 'check_censure.php';

    require_once  'validation-form/registration.php';
?>
<body>
<?php if(!isset($_SESSION['is_logged'])):?>
<div class="container col-md-4">
    <div class="toggle"><i class="fa fa-times"></i></div>
    <div class="form">
        <h3>Войти</h3>
        <p>Войти через:</p>
        <a href="https://oauth.vk.com/authorize?client_id=7236626&display=page&redirect_uri=http://jeweler-from-mos.com/validation-form/authVK.php&response_type=code">
            <img src="http://info-less.ru/article/6/resources/vk.png"/>
        </a>
        <?php
            if($_SESSION['try']){
                if($_SESSION['auth']){
                    echo "<div class ='alert-danger'>Вы ввели неправильно email или пароль</div>";
                }
            }
        ?>
        <form method="post">
        <label>Email : <span>*</span></label>
        <input type="email" class="txt" name="email" />
        <label>Пароль : <span>*</span></label>
        <input type="password" class="txt" name="password" />
        <button type="submit" name="button" id="btn-enter">Войти</button>
        </form>
    </div>
    <div class="form signin">
        <h3>Зарегистрироваться</h3>
<!--        --><?php
//            if($_SESSION['censure']){
//                echo "<div class = 'alert-danger'>Не используйте мат</div>";
//            }
//        ?>
        <form method="post">
        <label>Имя : <span>*</span></label>
        <input type="text" class="txt" name="username" />
        <label>Email : <span>*</span></label>
        <input type="email" class="txt" name="email"/>
        <label>Пароль : <span>*</span></label>
        <input type="password" class="txt" name="password" />
        <button type="submit" name="button" id="btn-register">Зарегистрироваться</button>
        </form>
    </div>
</div>
<?php else: header('Location: profile.php');
endif;?>
</body>
<script src="https://kit.fontawesome.com/5ffafa98ae.js"></script>
<script>
    $('.signin').hide();
    $('.toggle').click(function () {
        $(this).next().slideToggle(400);
        $(this).next().next().slideToggle(400);
    });

</script>
</html>
