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

<form class="form" action="vendor/signup.php" method="post" enctype="multipart/form-data">
    <label>ФИО</label>
    <input class="input" type="text" name="full_name" placeholder="Введите свое полное имя">
    <label>Логин</label>
    <input class="input" type="text" name="login" placeholder="Введите свой логин">
    <label>Почта</label>
    <input class="input" type="email" name="email" placeholder="Введите адрес своей почты">
    <label>Изображение профиля</label>
    <input class="input" type="file" name="avatar">
    <label>Пароль</label>
    <input class="input" type="password" name="password" placeholder="Введите пароль">
    <label>Подтверждение пароля</label>
    <input class="input" type="password" name="password_confirm" placeholder="Подтвердите пароль">
    <button type="submit" class="button">Регистрация</button>
    <p class="text_reg">
        У вас уже есть аккаунт? - <a href="index.php" class="link">авторизируйтесь</a>!
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