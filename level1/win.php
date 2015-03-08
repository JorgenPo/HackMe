<?php



echo <<<_END
<!doctype html>
<html>
<head>
<title>Уровень первый</title>
<link href="../css/styles.css" rel="stylesheet"/>
<link href="../css/sign_page.css" rel="stylesheet"/>
</head>
<body>
  <header>
  <span class="logo"><a href="../index.html">Сломай меня<span class="smile">:)</span></a></span>
  </header>
  <form class="winner" action="winner.php" method="POST">
  <h1>Поздравляем, Вы взломали сайт!</h1>
  <p>Вам удалось взломать сайт. Вы разгадали имя пользователя и пароль от аккаунта администратора.
     Введите свое имя, чтобы все узнали <strong>победителя</strong>:</p>
    <input type="text" autofocus name="winner"/> 
	<input type="submit" value="Рассказать всем!" />
  </form>
</body>
</html>
_END;
?>