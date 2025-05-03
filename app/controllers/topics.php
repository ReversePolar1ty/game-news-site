<?php
require_once __DIR__ .  "/../database/db.php";

$createStatus = '';

$title = '';
$description = '';

//СОЗДАНИЕ КАТЕГОРИИ
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if ($title === '' || $description === '') {

        $createStatus = "Не все поля заполнены";


    } else {

        $isExist = selectOne('topics', ['title' => $title]);
        if (is_array($isExist) && mb_strtolower($isExist['title']) === mb_strtolower($title)){
            $createStatus = 'Категория с таким названием уже существует';

        } else {

            $topics = [
                'title' => $title,
                'description' => $description,
            ];

            insertData('topics', $topics); //Запись в базу данных
            header('location: index.php');
        }
    }


} else {
    $login = '';
    $email = '';
}

//ПОЛУЧЕНИЕ ВСЕХ КАТЕГОРИЙ
$allTopics = selectAll('topics');



//РЕДАКТИРОВАНИЕ КАТЕГОРИИ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) { //ПОЛУЧАЕМ СПИСОК ВСЕХ КАТЕГОРИЙ
    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);
    $id = $topic['id'];
    $title = $topic['title'];
    $description = $topic['description'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])) { //РЕДАКТИРУЕМ ВЫБРАННУЮ КАТЕГОРИЮ

    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if ($title === '' || $description === '') {

        $createStatus = "Не все поля заполнены";

    } else {

//        $isExist = selectOne('topics', ['title' => $title]);
//        if (is_array($isExist) && mb_strtolower($isExist['title']) === mb_strtolower($title)){
//            $createStatus = 'Категория с таким названием уже существует';

//        } else {

            $topics = [
                'title' => $title,
                'description' => $description,
            ];

            updateData('topics', $topics, $_POST['id']); //Запись в базу данных
            header('location: index.php');
    }
}

//УДАЛЕНИЕ КАТЕГОРИИ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) { //ПОЛУЧАЕМ СПИСОК ВСЕХ КАТЕГОРИЙ
    $id = $_GET['delete_id'];
    deleteData('topics', $id);
    header('location: index.php');
}