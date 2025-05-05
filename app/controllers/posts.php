<?php

require_once __DIR__ .  "/../database/db.php";

if(!$_SESSION){
    header("Location: " . BASE_URL . "log.php");
}

$errMsg = [];

$post_title = '';
$content = '';
$img = '';
$id = '';
$topic = '';

$allTopics = selectAll('topics'); //ПОЛУЧЕНИЕ ВСЕХ КАТЕГОРИЙ
$posts = selectAll('posts'); //ПОЛУЧЕНИЕ ВСЕХ ПОСТОВ
$postAdm = selectAllFromPostsWithUsers('posts', 'users'); //МАССИВ ОБЪЕДИНЁННЫХ БД ДЛЯ ПОЛУЧЕНИЯ НИКА

//СОЗДАНИЕ ПОСТА
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_create'])) {

    // Проверка изображения
    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = mime_content_type($fileTmpName); // более точная проверка
        $imgPath = ROOT_PATH . "\assets\images\posts\\" . $imgName;

        if (strpos($fileType, 'image') !== 0) {
            array_push($errMsg, "Файл не является изображением");
        } else {
            $result = move_uploaded_file($fileTmpName, $imgPath);
            if ($result) {
                $_POST['img'] = $imgName;
            } else {
                array_push($errMsg, "Ошибка загрузки изображения на сервер");
            }
        }
    } else {
        $_POST['img'] = null; // если файл не загружен
    }

    // Получение и валидация других данных
    $post_title = trim($_POST['title']);
    $content = trim($_POST['content']);
    if (!empty($_POST['topic'])) {
        $topic = trim($_POST['topic']);
    }
    $publish = isset($_POST['publish']) ? 1 : 0;

    if ($post_title === '' || $content === '' || $topic === '') {

        array_push($errMsg, "Не все поля заполнены");

    } elseif (mb_strlen($post_title, 'UTF-8') < 6) {

        array_push($errMsg, "Название статьи должно быть более шести символов");

    }

    // Если есть ошибки — не продолжаем
    if (!empty($errMsg)) {
        return;
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $post_title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic,
        ];

        insertData('posts', $post); // Запись в базу данных
        header('location: index.php');
        exit();
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
