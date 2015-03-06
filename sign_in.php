<?php
$user = '';
$pass = '';
$msg = '';

if($_GET["user"] && $_GET["pass"])
{
  $user = $_GET["user"];
  $pass = $_GET["pass"];
}
if($user && $pass)
{
  echo 'Вы ввели имя и пароль';
}
else
{
  echo 'Введите имя и пароль';
}

echo <<<_END
<!doctype html>
<html>
<head>
<title>Уровень первый</title>
<link href="css/styles.css" rel="stylesheet"/>
</head>
<body>
  <header class="menu"><a href="index.html">На главную</a></header>
  <h1>Уровень первый</h1>
  <span class="message">$msg</span>
  <form class="sign_in" action="sign_in.php" method="GET">
    Введите имя <input type="text" name="user" placeholder="Имя" /> 
	Введите пароль <input type="password" name="pass" placeholder="Пароль"/>
	<input type="submit" value="Войти в систему" />
  </form>
</body>
</html>
_END;
?>