<?php
require_once 'app/controllers/users.php';
require_once 'path.php';
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
    <form class="row justify-content-center" method="post" action="reg.php">
        <h2>Регистрация</h2>
        <div class="mb-3 col-12 col-md-4 err">
            <p><?=$regStatus?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="email" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" placeholder="Введите ваш email">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
            <input name="login" value="<?=$login?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
            <input name="password2" type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторите пароль">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <button name="button-reg" type="submit" class="btn btn-primary">Зарегистрироваться</button>
            <a href="log.php">Войти</a>
        </div>
    </form>
</div>
<!-- END FORM -->

<!--FOOTER START-->

<?php include("app/include/footer.php"); ?>

<!--БЛОК FOOTER END-->