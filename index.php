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


<!--БЛОК КАРУСЕЛИ START-->

<div class="container">
    <div class="row">
        <h2 class="slider-title">Последние публикации</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="">First slide label</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="">First slide label</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="">First slide label</a></h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!--БЛОК КАРУСЕЛИ END-->


<!--БЛОК MAIN START-->

<div class="container">
    <div class="content row">
        <!-- MAIN CONTENT -->
        <div class="main-content col-md-9 col-12">
            <h2>Последние публикации</h2>

            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.png" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Прикольная статья на тему динамического сайта</a>
                    </h3>
                    <i class="far fa-user">Имя автора</i>
                    <i class="far fa-calendar">Mar 11, 2025</i>
                    <p class="preview-text">
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.png" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Прикольная статья на тему динамического сайта</a>
                    </h3>
                    <i class="far fa-user">Имя автора</i>
                    <i class="far fa-calendar">Mar 11, 2025</i>
                    <p class="preview-text">
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.png" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Прикольная статья на тему динамического сайта</a>
                    </h3>
                    <i class="far fa-user">Имя автора</i>
                    <i class="far fa-calendar">Mar 11, 2025</i>
                    <p class="preview-text">
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.png" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Прикольная статья на тему динамического сайта</a>
                    </h3>
                    <i class="far fa-user">Имя автора</i>
                    <i class="far fa-calendar">Mar 11, 2025</i>
                    <p class="preview-text">
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.png" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Прикольная статья на тему динамического сайта</a>
                    </h3>
                    <i class="far fa-user">Имя автора</i>
                    <i class="far fa-calendar">Mar 11, 2025</i>
                    <p class="preview-text">
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.png" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Прикольная статья на тему динамического сайта</a>
                    </h3>
                    <i class="far fa-user">Имя автора</i>
                    <i class="far fa-calendar">Mar 11, 2025</i>
                    <p class="preview-text">
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                        Какой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текстКакой-то текст
                    </p>
                </div>
            </div>
        </div>

        <!-- SIDEBAR CONTENT -->
        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Поиск</h3>
                <form action="index.html" method="post">
                    <label>
                    <input type="text" name="search-term" class="text-input" placeholder="Поиск...">
                    </label>
                </form>
            </div>

            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <li><a href="#">Poems</a></li>
                    <li><a href="#">Quotes</a></li>
                    <li><a href="#">Fiction</a></li>
                    <li><a href="#">Inspiration</a></li>
                    <li><a href="#">Motivation</a></li>
                    <li><a href="#">Life Lessons</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
<!--БЛОК MAIN END-->

<!--FOOTER START-->

<?php include("app/include/footer.php"); ?>

<!--БЛОК FOOTER END-->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>