<!doctype html>
<html lang="eng">
<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="index.php">GameNews</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="index.php"><i class="fa-solid fa-house"></i>Главная</a></li>
                    <li><a href="#"><i class="fa-solid fa-circle-info"></i>О нас</a></li>
                    <li><a href="#"><i class="fa-solid fa-database"></i>Услуги</a></li>

                    <li>
                        <?php if (isset($_SESSION['id'])): ?>
                            <a href="#"><i class="fa fa-user"></i>
                                <?php echo $_SESSION['login'] ?>
                            </a>
                            <ul>
                                <?php if ($_SESSION['admin']): ?>
                                    <li><a href="admin/admin.php">Админ панель</a></li>
                                <?php endif; ?>
                                <li><a href="#">Выход</a></li>
                            </ul>
                        <?php else: ?>
                            <a href="log.php"><i class="fa fa-user"></i>
                               Войти
                            </a>
                            <ul>
                                <li><a href="reg.php">Регистрация</a></li>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
</html>