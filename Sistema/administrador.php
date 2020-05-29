<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="3;url=?go=sair">
	<meta charset="utf-8">
	<title>adminsitrador</title>
</head>
<body>
	Página ainda em desenvolvimento<br>
	<a href="?go=sair">Sair</a>

</body>
</html>
<?php
	if (@$_GET["go"] == "sair") {
		unset($_SESSION["user_session"]);
		unset($_SESSION["senha_session"]);
		header("location: ../Login/index.php");
	}
?>