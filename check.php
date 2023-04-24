<?php

// check.php - файл, обрабатывающий регистрацию пользователя.

    $name = htmlspecialchars((trim($_POST['name'])));
    $telephone = htmlspecialchars((trim($_POST['telephone'])));
    $email = htmlspecialchars((trim($_POST['email'])));
    $password = htmlspecialchars((trim($_POST['password'])));

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


// Коннект к MySql и выполнение запроса

    $mysql = new mysqli('localhost', 'f0798062_wndrfl', 'lfrdnw', 'f0798062_wndrfl');    
    $sql = "SELECT * FROM users WHERE name='$name' OR telephone='$telephone' OR email = '$email'";
    $result = mysqli_query($mysql, $sql);

    if (mysqli_num_rows($result)>0) {

        echo "Такой пользователь уже есть";

    } else {

        $mysql -> query("INSERT INTO `users`(`name`, `telephone`, `email`, `password`) VALUES ('$name','$telephone','$email','$password');");
    }

    $mysql -> close();

    header('Location: /index.php');





//    mysqli_error($mysql);



    

    

?>