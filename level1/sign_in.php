<?php
require_once 'login.php';

$user = '';
$pass = '';
$msg = '';
  
if(isset($_GET["user"]) && 
   isset($_GET["pass"]))
{
  $user = $_GET["user"];
  $pass = $_GET["pass"];
}

if($user && $pass)
{
  if(!check_password($pass))
  {
    $msg = "Некорректный пароль. Пароль должен быть не менее 6 символов в длину.";
  }
  else if(!check_username($user))
  {
    $msg = "Неккоректное имя пользователя. Имя не может содержать символа
	            $, а так же должно быть не меньше 4 символов в длину.";
  }
  else if(login_as_admin($user, $pass))
  {
    setcookie("auth", "admin", time() + 60 * 60 * 2, '/');
  }
  else
    $msg = "Неверное сочетание имя - пароль.";
}
else
  $msg = "Заполните все поля формы!";

if($_COOKIE['auth'] == "admin")
  header("Location: win.php");
  
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
  <h1>Уровень первый</h1>
  <form class="sign_in" action="sign_in.php" method="GET">
  <span class="message">$msg</span>
    Введите имя <input type="text" autofocus name="user" placeholder="Имя" /> 
	Введите пароль <input type="password" name="pass" placeholder="Пароль"/>
	<input type="submit" value="Войти в систему" />
  </form>
</body>
</html>
_END;
?>