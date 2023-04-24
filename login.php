<?php

$email_or_telephone = htmlspecialchars((trim($_POST['email_or_telephone'])));
$password = htmlspecialchars((trim($_POST['password'])));
$mysql = new mysqli('localhost', 'f0798062_wndrfl', 'lfrdnw', 'f0798062_wndrfl');   

// Проверка того, что есть данные из капчи

if (!$_POST["g-recaptcha-response"]) {
    // Если данных нет, то программа останавливается и выводит ошибку
    exit("Вы не прошли проверку.");
} else { // Иначе создаём запрос для проверки капчи
    // URL куда отправлять запрос для проверки
    $url = "https://www.google.com/recaptcha/api/siteverify";
    // Ключ для сервера
    $key = "6LesZD4lAAAAAHp6sVb7KLwcus7e7uT8qoI06-Ns";
    // Данные для запроса
    $query = array(
        "secret" => $key, // Ключ для сервера
        "response" => $_POST["g-recaptcha-response"], // Данные от капчи
        "remoteip" => $_SERVER['REMOTE_ADDR'] // Адрес сервера
    );
 
    // Создаём запрос для отправки
    $ch = curl_init();
    // Настраиваем запрос 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_POST, true); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query); 
    // отправляет и возвращает данные
    $data = json_decode(curl_exec($ch), $assoc=true); 
    // Закрытие соединения
    curl_close($ch);
 
    // Если не success то
    if (!$data['success']) {
        // Останавливает программу
        exit("ВЫ РОБОТ");
    } else {
        // Иначе выводим логин и Email
        echo $_POST['login'] . "<br/>". 
             $_POST['email'];
    }
}

// Выполнение запроса MySql

$result = $mysql -> query("SELECT * FROM `users` WHERE `telephone`='$email_or_telephone' OR `email`='$email_or_telephone';");
$user = $result -> fetch_assoc();

if (mysqli_num_rows($result) == 0) {
    echo "Такого пользователя не существует!";
    exit();
}

// Регистрация куки текущего пользователя

setcookie('user', $user['name'], time() + 3600, "/");

$mysql -> close();
header('Location: /');

?>