<?php
require_once "login.php";

if(isset($_POST['winner']))
{
  if(strlen($_POST['winner']) > 40)
    $winner = substr($_POST['winner'], 0, 40);
	
  setWinner($winner);
}

function getWinner()
{
  $server = mysql_db_login();
	
  $query = "SELECT * FROM winners LIMIT 0,1";
  $result = mysql_query($query);
  
  if(!$result)
    return 0;
	
  $row = mysql_fetch_row($result);
  
  return $row[1];
}

function setWinner($winner)
{
  $server = mysql_db_login();
  
  $query = "DELETE * FROM winners";
  mysql_query($query, $db_server);
  
  $winner = md5($winner);
  
  $query = "INSERT INTO winners VALUES".
           "(NULL, '$winner', CURRENT_TIMESTAMP)";
  $result = mysql_query($query);
  
  if(!$result)
    return 0;
	
  return 1;
}

header("Location: ../index.html");
?>