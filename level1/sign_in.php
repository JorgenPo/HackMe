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
    $msg = "������������ ������. ������ ������ ���� �� ����� 6 �������� � �����.";
  }
  else if(!check_username($user))
  {
    $msg = "������������ ��� ������������. ��� �� ����� ��������� �������
	            $, � ��� �� ������ ���� �� ������ 4 �������� � �����.";
  }
  else if(login_as_admin($user, $pass))
  {
    setcookie("auth", "admin", time() + 60 * 60 * 2, '/');
  }
  else
    $msg = "�������� ��������� ��� - ������.";
}
else
  $msg = "��������� ��� ���� �����!";

if($_COOKIE['auth'] == "admin")
  header("Location: win.php");
  
echo <<<_END
<!doctype html>
<html>
<head>
<title>������� ������</title>
<link href="../css/styles.css" rel="stylesheet"/>
<link href="../css/sign_page.css" rel="stylesheet"/>
</head>
<body>
  <header>
  <span class="logo"><a href="../index.html">������ ����<span class="smile">:)</span></a></span>
  </header>
  <h1>������� ������</h1>
  <form class="sign_in" action="sign_in.php" method="GET">
  <span class="message">$msg</span>
    ������� ��� <input type="text" autofocus name="user" placeholder="���" /> 
	������� ������ <input type="password" name="pass" placeholder="������"/>
	<input type="submit" value="����� � �������" />
  </form>
</body>
</html>
_END;
?>