<?php
    $name = htmlspecialchars((trim($_POST['name'])));

    $telephone = htmlspecialchars((trim($_POST['telephone'])));

    $email = htmlspecialchars((trim($_POST['email'])));

    $password = htmlspecialchars((trim($_POST['password'])));

    $mysql = new mysqli('localhost', 'f0798062_wndrfl', 'lfrdnw', 'f0798062_wndrfl');   

    if(mb_strlen($name) > 40) {
        echo "Имя пользователя должно быть не более 40 символов!";
        exit();
    }
    else if(mb_strlen($telephone < 8)) {
        echo "Номер телефона пользователя должен быть больше 8 символов";
        exit();
    }
    else if(mb_strlen($email < 10)) {
        echo "Электронная почта пользователя должна быть не менее 10 символов";
        exit();
    }
    else if(mb_strlen($password < 5)) {
        echo "Пароль пользователя должен быть больше 5 символов";
        exit();
    }

    $user_id = $_COOKIE['user'];
    $req_id = $mysql -> query("SELECT id FROM `users` WHERE `name` = '$user_id'");
    $result = mysqli_fetch_assoc($req_id);

    $mysql -> query("UPDATE `users` SET `name`='$name', `telephone`='$telephone', `email`='$email', `password`='$password' WHERE id = $result[id];");
    $mysql -> close();
    header('Location: /');
  ?>