<?php
include_once "../../path.php";
include_once "../../app/controllers/topics.php";
include_once "../../app/database/db.php";
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
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <title>GameNews</title>
</head>
<body>

<?php include("../../app/include/header-admin.php"); ?>

<div class="container">

    <?php include "../../app/include/sidebar-admin.php"; ?>

    <div class="posts col-9">
        <div class="button row">
            <a href="<?php echo BASE_URL . "admin/topics/create.php";?>" class="col-2 btn btn-success">Создать</a>
            <span class="col-1"></span>
            <a href="<?php echo BASE_URL . "admin/topics/index.php";?>" class="col-3 btn btn-warning">Редактировать</a>
        </div>
        <div class="row title-table">
            <h2>Создать категорию</h2>
        </div>
        <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
                <!--                    Вывод массива с ошибками-->
                <p><?php include_once "../../app/support/errorInfo.php";?></p>
            </div>
            <form action="create.php" method="post">
                <div class="col mb-4">
                    <label for="content" class="form-label">Название категории</label>
                    <input name="title" value="<?=$title?>" type="text" class="form-control" placeholder="" aria-label="Название категории">
                </div>
                <div class="col mb-4">
                    <label for="content" class="form-label">Описание категории</label>
                    <textarea name="description" class="form-control" id="content" rows="3"><?=$description?></textarea>
                </div>
                <div class="col">
                    <button name="topic-create" class="btn btn-primary" type="submit">Создать категорию</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>


<!-- footer -->
<?php include("../../app/include/footer.php"); ?>
<!-- // footer -->


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>