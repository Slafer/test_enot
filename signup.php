<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '/inc/db.php';
//require_once __DIR__ . '/inc/funcs.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="assets/css/main.css">

    <title>Регистрация</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="index.php">Test</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Главная <span class="sr-only"></span></a>
            <li class="nav-item active">
                <a class="nav-link" href="signup.php"> Регистрация <span class="sr-only">(current)</span></a>
            <li class="nav-item">
                <?php if(isset($_COOKIE['user']) == false): ?>
            <li class="nav-item">
                <a class="nav-link" href="auth.php"> Авторизация <span class="sr-only"></span></a>
            <li class="nav-item">
                <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="validation/exit.php"> Выход <span class="sr-only"></span></a>
                <?php endif; ?>

            </li>
        </ul>
    </div>
</nav>


<?php // debug($_SESSION); //session_destroy(); ?>
<div class="wrapper mt-5">
    <div class="container">
        <h1 text-align="center">Форма регистрации</h1>
        <form action="validation/check.php" method="post">
            <input type = "text" class="form-control" name="login" id="login" placeholder="Введите логин">
            <input type = "text" class="form-control" name="name" id="name" placeholder="Введите имя">
            <input type = "password" class="form-control" name="pass" id="pass" placeholder="Введите пароль">
            <button class="btn btn-success" type = "submi">Зарегистрировать</button>
        </form>



    </div><!-- /container -->
</div><!-- /wrapper -->

</body>
</html>

