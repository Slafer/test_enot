<!DOCTYPE html>
<html lang='ru'>
<?php
require 'inc/CurrencyTable.php';
require 'inc/CurrencyForm.php';
require 'inc/db.php';
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="assets/css/main.css">

    <title>Личный Кабинет</title>
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
            <li class="nav-item">
                <?php if(isset($_COOKIE['user']) == false): ?>
            <a class="nav-link" href="signup.php"> Регистрация <span class="sr-only"></span></a>
            <li class="nav-item">

            <li class="nav-item">
                <a class="nav-link" href="auth.php"> Авторизация <span class="sr-only"></span></a>
            <li class="nav-item">
                <?php else: ?>
            <li class="nav-item active">
                <a class="nav-link" href="cabinet.php"> ЛК <span class="sr-only">(current)</span></a>
            <li class="nav-item">
            <li class="nav-item">
                <a class="nav-link" href="validation/exit.php"> Выход <span class="sr-only"></span></a>
            <li class="nav-item">
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>
    <form  action = "inc/update_data.php"><input type ="submit" value='Обновить данные'></input></form>
    <?php
        $db = new db();
        $CurrencyList = $db->get_currencies();
        foreach ($CurrencyList as $Currency)
        {
            $abbr = $Currency[0];
            $name = $Currency[1];
            $rate = $Currency[2];
            $curr = new CurrencyForm($abbr, $name, $rate);
            if (isset($_POST["S$abbr"]))
            {
                if ($_POST["$abbr"] != 0 and $_POST["RUB$abbr"] != 0)
                {
                    echo 'Заполните только одно поле!';
                    
                }
                else if ($_POST["$abbr"] != 0)
                {
                    $curr->calc_to_right(floatval($_POST["$abbr"]));
                }
                else if ($_POST["RUB$abbr"] != 0)
                {
                    $curr->calc_to_left(floatval($_POST["RUB$abbr"]));
                } else
                {
                    $curr->print_form();
                }
            } else
            {
            $curr->print_form();
            }
        }
    ?>
</body>

</html>