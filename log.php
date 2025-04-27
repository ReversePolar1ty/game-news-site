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

    <title>Hello, world!</title>
</head>
<body>
<!--БЛОК HEADER START-->

<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="index.php">My blog</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="index.php"><i class="fa-solid fa-house"></i>Главная</a></li>
                    <li><a href="#"><i class="fa-solid fa-circle-info"></i>О нас</a></li>
                    <li><a href="#"><i class="fa-solid fa-database"></i>Услуги</a></li>

                    <li>
                        <a href="#"><i class="fa-solid fa-circle-user"></i>Кабинет</a>
                        <ul>
                            <li><a href="#">Админ панель</a></li>
                            <li><a href="#">Выход</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</header>

<!--БЛОК HEADER END-->
<!-- FORM -->
<div class="container reg_form">
    <form class="row justify-content-center" method="post" action="log.html">
        <h2 class="col-12">Авторизация</h2>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Логин</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" class="btn btn-primary">Войти</button>
            <a href="reg.php">Зарегистрироваться</a>
        </div>
    </form>
</div>
<!-- END FORM -->

<!--FOOTER START-->

<div class="footer container-fluid">
    <div class="footer-content container">
        <div class="row">
            <div class="footer-section about col-md-4 col-12">
                <h3 class="logo-text">Мой блог</h3>
                <p>
                    ВидеоигроксВидеоигроксВидеоигроксВидеоигрокс
                    ВидеоигроксВидеоигрокс
                    ВидеоигроксВидеоигроксВидеоигроксВидеоигрокс
                    ВидеоигроксВидеоигрокс
                </p>
                <div class="contact">
                    <span><i class="fas fa-phone"></i> &nbsp; 374-238-217 </span>
                    <span><i class="fas fa-envelope"></i> &nbsp; videogamesdata@gmail.com </span>
                </div>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-section links col-md-4 col-12">
                <h3>Quick Links</h3>
                <br>
                <ul>
                    <a href="#">
                        <li>События</li>
                    </a>
                    <a href="#">
                        <li>Команда</li>
                    </a>
                    <a href="#">
                        <li>Галерея</li>
                    </a>
                    <a href="#">
                        <li>Работа у нас</li>
                    </a>
                    <a href="#">
                        <li>О нас</li>
                    </a>
                </ul>
            </div>
            <div class="footer-section contact-form col-md-4 col-12">
                <h3>Контакты</h3>
                <br>
                <form action="index.php" method="post">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
                    <textarea rows="4" name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
                    <button type="submit" class="btn btn-big contact-btn">
                        <i class="fas fa-envelope"></i>
                        Отправить
                    </button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; myblog.com | Designed by Me
        </div>
    </div>
</div>

<!--БЛОК FOOTER END-->