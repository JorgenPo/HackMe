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
  echo '�� ����� ��� � ������';
}
else
{
  echo '������� ��� � ������';
}

echo <<<_END
<!doctype html>
<html>
<head>
<title>������� ������</title>
<link href="css/styles.css" rel="stylesheet"/>
</head>
<body>
  <header class="menu"><a href="index.html">�� �������</a></header>
  <h1>������� ������</h1>
  <span class="message">$msg</span>
  <form class="sign_in" action="sign_in.php" method="GET">
    ������� ��� <input type="text" name="user" placeholder="���" /> 
	������� ������ <input type="password" name="pass" placeholder="������"/>
	<input type="submit" value="����� � �������" />
  </form>
</body>
</html>
_END;
?>