<?php

include 'app/database/db.php';

$regStatus = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);
    $admin = 0;



    if ($login === '' || $email === '' || $password1 === '') {

        $regStatus = "Не все поля заполнены!";

    } elseif (mb_strlen($login, 'UTF8') < 3){

        $regStatus = 'Логин должен быть больше трёх символов';

    } elseif ($password1 !== $password2) {

        $regStatus = 'Пароли не совпадают';

//    } elseif (mb_strlen($password1, 'UTF8') < 6) {
//
//        $errorMessage = 'Пароль должен быть более шести символов';

    } else {

        $isExist = selectOne('users', ['email' => $email]);
        if (is_array($isExist) && $isExist['email'] === $email){
            $regStatus = 'Пользователь с таким email уже существует';

        } else {

            $password = password_hash($password1,PASSWORD_DEFAULT);
            $userData = [
                'username' => $login,
                'email' => $email,
                'password' => $password,
                'admin' => $admin
            ];

            $id = insertUserData('users', $userData); //Запись в базу данных
            $user = selectOne('users', ['id' => $id]);

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];

            if($_SESSION['admin']) {
                header('Location: admin/admin.php');
            } else {
                header('Location: index.php');
            }
        }
    }


} else {
    $login = '';
    $email = '';
}