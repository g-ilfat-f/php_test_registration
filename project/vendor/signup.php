<?php

    session_start();

    // Подключение к базе данных
    $connect = mysqli_connect('localhost', 'root', 'root', 'test_php');

    if (!$connect) {
    die('Error connect to DataBase');
    }

    // Регистрация
    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {
        $path = 'uploads/' . time() . $_FILES['avatar']['name'];

        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: ../register.php');
        }

        $password = md5($password);

        mysqli_query($connect,"INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) 
        VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");
        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');

    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

    // Авторизация, получаем логин и пароль из базы данных
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` 
         WHERE `login` = '$login' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email']
        ];

        header('Location: ../profile.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
    }
