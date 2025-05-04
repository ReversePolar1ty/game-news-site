<?php

require_once __DIR__ .  "/../database/db.php";

if(!$_SESSION){
    header("Location: " . BASE_URL . "log.php");
}

$createStatus = null;

$post_title = '';
$content = '';
$image = '';
$id = '';
$topic = '';

$allTopics = selectAll('topics'); //ПОЛУЧЕНИЕ ВСЕХ КАТЕГОРИЙ
$posts = selectAll('posts'); //ПОЛУЧЕНИЕ ВСЕХ ПОСТОВ
$postAdm = selectAllFromPostsWithUsers('posts', 'users'); //МАССИВ ОБЪЕДИНЁННЫХ БД ДЛЯ ПОЛУЧЕНИЯ НИКА

//СОЗДАНИЕ ПОСТА
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_create'])) {

    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $imgPath = ROOT_PATH . "\assets\images\posts\\" . $imgName;

        if(strpos($fileType, 'image') === false) {
            die("Файл не является изображением");
        } else {

            $result = move_uploaded_file($fileTmpName, $imgPath);
            if ($result) {
                $_POST['img'] = $imgName;
            } else {
                $createStatus = "Ошибка загрузки изображения на сервер";
            }
        }
        
    } else {
        $createStatus = "Ошибка получения изображения";
    }

    $post_title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $image = $_FILES['img'];

    $publish = isset($_POST['publish'])  ? 1 : 0;

    if ($post_title === '' || $content === '' || $topic === '') {

        $createStatus = "Не все поля заполнены";

    } elseif (mb_strlen($post_title, 'UTF-8') < 6) {

        $createStatus = "Название статьи должно быть более шести символов";

    }else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $post_title,
            'content' => $content,
            'img' => $image['name'],
            'status' => $publish,
            'id_topic' => $topic,
        ];

        insertData('posts', $post); //Запись в базу данных
        header('location: index.php');
    }
} else {
    $post_title = '';
    $content = '';
}

////УДАЛЕНИЕ ПОСТА
//if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_post_id'])) { //ПОЛУЧАЕМ СПИСОК ВСЕХ КАТЕГОРИЙ
//    $id = $_GET['delete_post_id'];
//    deleteData('posts', $id);
//    header('location: index.php');
//}

//if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) { //ПОЛУЧАЕМ СПИСОК ВСЕХ СТАТЕЙ
//    $id = $_GET['id'];
//    $topic = selectOne('topics', ['id' => $id]);
//    $id = $topic['id'];
//    $title = $topic['title'];
//    $description = $topic['description'];
//}
//
//if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])) { //РЕДАКТИРУЕМ ВЫБРАННУЮ КАТЕГОРИЮ
//
//    $title = trim($_POST['title']);
//    $description = trim($_POST['description']);
//
//    if ($title === '' || $description === '') {
//
//        $createStatus = "Не все поля заполнены";
//
//    } else {
//
////        $isExist = selectOne('topics', ['title' => $title]);
////        if (is_array($isExist) && mb_strtolower($isExist['title']) === mb_strtolower($title)){
////            $createStatus = 'Категория с таким названием уже существует';
//
////        } else {
//
//        $topics = [
//            'title' => $title,
//            'description' => $description,
//        ];
//
//        updateData('topics', $topics, $_POST['id']); //Запись в базу данных
//        header('location: index.php');
//    }
//}
//
