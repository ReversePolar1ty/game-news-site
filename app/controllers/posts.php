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
    $id = '';
    $post_title = '';
    $content = '';
    $publish = '';
    $topic = '';
}

//ПОЛУЧАЕМ СПИСОК ВСЕХ СТАТЕЙ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $id_topic = $post['id_topic'];
    $publish = $post['status'];
}


//РЕДАКТИРУЕМ ВЫБРАННУЮ КАТЕГОРИЮ
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_edit'])) {

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $id_topic = trim($_POST['id_topic']);
    $publish = trim($_POST['status']);

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

    if ($title === '' || $content === '' || $topic === '') {

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
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic,
        ];

        updateData('posts', $post, $id);
        header('location: index.php');
        exit();
    }

} else {
    $post_title = '';
    $content = '';
    $publish = isset($_POST['publish']) ? 1 : 0;
    $topic = '';
}


////УДАЛЕНИЕ ПОСТА
//if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_post_id'])) { //ПОЛУЧАЕМ СПИСОК ВСЕХ ЗАПИСЕЙ
//    $id = $_GET['delete_post_id'];
//    deleteData('posts', $id);
//    header('location: index.php');
//}