<?php

include_once __DIR__ . '/../database/db.php';
include_once __DIR__ . '/../../path.php';

$errMsg = [];

//ЗАПУСК СЕССИИ ПОЛЬЗОВАТЕЛЯ
function userSession($userData): void{
    $_SESSION['id'] = $userData['id'];
    $_SESSION['login'] = $userData['username'];
    $_SESSION['admin'] = $userData['admin'];

    if($_SESSION['admin']) {
        header('Location: ' . BASE_URL . 'admin/posts/index.php');
    } else {
        header('Location: ' . BASE_URL);
    }
}

//РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЕЙ
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg']) ) {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);
    $admin = 0;

    if ($login === '' || $email === '' || $password1 === '') {

        array_push($errMsg, "Не все поля заполнены!");

    } elseif (mb_strlen($login, 'UTF8') < 3){

        array_push($errMsg, 'Логин должен быть больше трёх символов');

    } elseif ($password1 !== $password2) {

        array_push($errMsg, 'Пароли не совпадают');

//    } elseif (mb_strlen($password1, 'UTF8') < 6) {
//
//        array_push($errMsg, 'Пароль должен быть более шести символов');

    } else {

        $isExist = selectOne('users', ['email' => $email]);
        if (is_array($isExist) && $isExist['email'] === $email){
            array_push($errMsg, 'Пользователь с таким email уже существует');

        } else {

            $password = password_hash($password1,PASSWORD_DEFAULT);
            $userData = [
                'username' => $login,
                'email' => $email,
                'password' => $password,
                'admin' => $admin
            ];

            $id = insertData('users', $userData); //Запись в базу данных
            $user = selectOne('users', ['id' => $id]);

            userSession($user);
        }
    }


} else {
    $login = '';
    $email = '';
}

//АВТОРИЗАЦИЯ ПОЛЬЗОВАТЕЛЕЙ
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    if ($email === '' || $password === '') {
        array_push($errMsg, 'Неверный пароль');
    } else {
        $isExist = selectOne('users', ['email' => $email]);
        if (is_array($isExist) && password_verify($password, $isExist['password'])) {

            userSession($isExist);

        } else {
            array_push($errMsg, 'Неверные данные');
        }
    }

}