<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация.</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<form class="form" action="vendor/signin.php" method="post">
    <label>Логин</label>
    <input class="input" type="text" name="login" placeholder="Введите свой логин">
    <label>Пароль</label>
    <input class="input" type="password" name="password" placeholder="Введите пароль">
    <button type="submit" class="button">Войти</button>
    <p class="text_reg">
        У вас нет аккаунта? - <a href="register.php" class="link">зарегестрируйтесь</a>!
    </p>
    <p class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </p>
</form>

</body>
</html>