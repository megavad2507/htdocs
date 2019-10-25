<?php require_once 'validation-form/check_login.php'?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Регистарция или вход</title>
</head>
<header>
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</header>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h1>Форма регистрации</h1>
        <?php
          if(isset($smsg)){ ?> <div class="alert alert-success" role="alert"><?php echo $smsg;?></div><?php }?>
          <?php
          if(isset($fmsg)){ ?> <div class="alert alert-danger" role="alert">
            <?php echo $fmsg; ?></div><?php }?>
        <form method="post">
          Имя <input type="text" class="form-control" name="username"><br>
          Email <input type="text" class="form-control" name="email"><br>
          Пароль(от 4 до 12 символов) <input type="password" class="form-control" name="password"><br>
          <button class="btn btn-success" type="submit">Зарегистрироваться</button><br>
        </form>
      </div>
      <div class="col-md-4">
        <h1>Форма авторизации</h1>
        <!-- <?php
          if(isset($))
        ?> -->
        <form method="post">
          Email <input type="text" class="form-control" name="email"><br>
          Пароль(от 4 до 12 символов) <input type="password" class="form-control" name="password"><br>
          <button class="btn btn-success" type="submit">Войти</button><br>
        </form>
        <?php require_once 'validation-form/auth.php' ?>
      </div>
      </div>
    </div>
</body>
</html>
