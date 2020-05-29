<?php
	date_default_timezone_set('America/Sao_Paulo');
	$hora = date('H');
	$min = date('i');

	if($hora == 15){
		while($hora == 15){
			include("resetar.php");
		}
		header("location: ../../index.php");
	}else{
		require_once "../Cliente/conection.php";
	}
?>