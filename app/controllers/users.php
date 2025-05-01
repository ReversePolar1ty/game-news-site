<?php

include 'app/database/db.php';


$isSubmit = false;
$errorMessage = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);
    $admin = 0;



    if ($login === '' || $email === '' || $password1 === '') {

        $errorMessage = "Не все поля заполнены!";

    } elseif (mb_strlen($login, 'UTF8') < 3){

        $errorMessage = 'Логин должен быть больше трёх символов';

    } elseif ($password1 !== $password2) {

        $errorMessage = 'Пароли не совпадают';

//    } elseif (mb_strlen($password1, 'UTF8') < 6) {
//
//        $errorMessage = 'Пароль должен быть более шести символов';

    } else {

        $isExist = selectOne('users', ['email' => $email]);
        if (is_array($isExist) && $isExist['email'] === $email){
            $errorMessage = 'Пользователь с таким email уже существует';

        } else {

            $password = password_hash($password1,PASSWORD_DEFAULT);
            $userData = [
                'username' => $login,
                'email' => $email,
                'password' => $password,
                'admin' => $admin
            ];

            $id = insertUserData('users', $userData); //Запись в базу данных
        }
    }


} else {
    echo 'GET';
    $login = '';
    $email = '';
}