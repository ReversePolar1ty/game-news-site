<?php
require_once 'app/controllers/users.php';
require_once 'path.php'
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Awesome Fonts -->
    <script src="https://kit.fontawesome.com/69c8394ba0.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <title>GameNews</title>
</head>
<body>
<!--БЛОК HEADER START-->

<?php include("app/include/header.php") ?>

<!--БЛОК HEADER END-->
<!-- FORM -->
<div class="container reg_form">
    <form class="row justify-content-center" method="post" action="log.php">
        <h2 class="col-12">Авторизация</h2>
        <div class="mb-12 col-12 col-md-12 err">
            <!--                    Вывод массива с ошибками-->
            <p><?php include_once "app/support/errorInfo.php";?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Email</label>
            <input name="email" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" placeholder="Введите ваш email">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <button name="button-log" type="submit" class="btn btn-primary">Войти</button>
            <a href="reg.php">Зарегистрироваться</a>
        </div>
    </form>
</div>
<!-- END FORM -->

<!--FOOTER START-->

<?php include("app/include/footer.php"); ?>

<!--БЛОК FOOTER END-->