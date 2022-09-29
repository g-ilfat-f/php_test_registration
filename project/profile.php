<?php
    session_start();

    if (!$_SESSION['user']) {
        header('Location: index.php');
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

<div class="profile">
    <img src="<?= $_SESSION['user']['avatar'] ?>" width="100" alt="фото">
    <h2 class="name"><?= $_SESSION['user']['full_name'] ?></h2>
    <a href="vendor/logout.php" class="logout">Выход</a>
</div>

</body>
</html>