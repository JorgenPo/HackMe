<?php



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
  <form class="winner" action="winner.php" method="POST">
  <h1>�����������, �� �������� ����!</h1>
  <p>��� ������� �������� ����. �� ��������� ��� ������������ � ������ �� �������� ��������������.
     ������� ���� ���, ����� ��� ������ <strong>����������</strong>:</p>
    <input type="text" autofocus name="winner"/> 
	<input type="submit" value="���������� ����!" />
  </form>
</body>
</html>
_END;
?>