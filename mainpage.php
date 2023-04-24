<!doctype html>

<html lang="ru">

<head>

  <title>Редактирование</title>

  <link rel="stylesheet" href="css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

<body>

<div class="container mt-4">

<p>Привет <?=$_COOKIE['user']?>! На данной странице вы можете отредактировать свои данные! Чтобы выйти нажмите <a href="/exit.php">"тык"</a>.</p>

<form action="edit.php" method="post">
<input type="text" class="form-control" name="name" id="name" placeholder="Введите имя пользователя!"><br>
<input type="text" class="form-control" name="telephone" id="telephone" placeholder="Введите номер телефона пользователя!"><br>
<input type="text" class="form-control" name="email" id="email" placeholder="Введите электронную почту пользователя!"><br>
<input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль пользователя!"><br>
<button id="buttonsuccess"class="btn btn-success" type="submit">
Подтвердить
</button>
 </form>

</div>

</body>

</html>