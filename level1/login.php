<?php // Функции проверки и авторизации.

/*Функция, которая выполняет логин в качестве администратора.*/
function login_as_admin($user, $pass)
{ 
  $server = mysql_db_login();//Подключаемся к базе данных.
  
  $querry = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
  
  $result = mysql_query($querry);
  if(mysql_num_rows($result) == 0)
    return 0;
	
  $row = mysql_fetch_row($result);
  
  if($row[3] == 'admin')
    return 1;
  else
    return 0;
}

//Проверяет допустимость пароля
//Длина пароля должна быть не менее 6 знаков.
//Возвращает 0, если пароль не соотв. требованиям.
function check_password($password)
{
  if(strlen($password) < 6 || strlen($password) > 25)
    return 0;
	
  return 1;
}

//Проверяет допустимость имени
//Имя пользователя не может содержать некоторых запрещенных знаков
//Возвращает 0, если имя не соотв. требованиям.
function check_username($user)
{
  if(strpos($user, '$'))
    return 0;
  
  if(strlen($user) < 4 || strlen($user) > 25)
    return 0;
	
  return 1;
}

//Пытается подключится к базе данных 
//Информацию о базе берет из db.php
function mysql_db_login()
{ 
  require_once 'database.php';
  $server = mysql_connect($db_host, $db_user, $db_pass);
  
  if(!$server) die("Не удалось подключится к базе данных: ".mysql_error());
  
  mysql_select_db($db_database) 
    or die("Невозможно подключится к данной базе данных: ".mysql_error());
  
  return $server;
}
?>