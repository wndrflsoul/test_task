<!DOCTYPE HTML>

<HTML lang="ru">

    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Формы регистрации и автризации</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </HEAD>

<body>
    
    <div class="container mt-4">
        <?php
        if($_COOKIE['user'] == ''):
        ?>
        <div class="row">
            <div class="col">
                <h1>Регистрация</h1>
                <form action="check.php" method="post">
                <div id="error"></div>>
                <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя пользователя!"><br>
                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Введите номер телефона пользователя!"><br>
                <input type="text" class="form-control" name="email" id="email" placeholder="Введите электронную почту пользователя!"><br>
                <input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль пользователя!"><br>
                <input type="text" class="form-control" name="repassword" id="repassword" placeholder="Подтвердите пароль!"><br>
                <button id="buttonsuccess"class="btn btn-success" type="submit">

                    Подтвердить

                </button>
                </form>
            </div>
            <div class="col">
                <h1>Авторизация</h1>
                <form action="login.php" method="post">
                <div id="error"></div>>
                <input type="text" class="form-control" name="email_or_telephone" id="email_or_telephone" placeholder="Введите электронную почту или номер телефона"><br>
                <input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль пользователя!"><br>
                <div class="g-recaptcha" data-sitekey="6LesZD4lAAAAAOPRrlJ9xNtq4wB5OMsJUB5yMzY_"></div>
                <button id="buttonsuccess"class="btn btn-success" type="submit">

                    Подтвердить

                </button>
                </form>
            </div>
        </div>
        <?php else:?>

            <?php
            header('Location: /mainpage.php');
            ?>

        <?php endif;?>
        <script src="js/password_confirm.js"></script>
    </div>

</body>
</HTML>