<?php
	$to = "crisleymarques651@gmail.com";
	$subject = "Pedido número".$id;
	$message = $descricao;
	$header = "MIME-Version: 1.0/n";
	$header .= "Content-type: text/html; charset=iso-8859-1/n";
	$header .= "From: ecitcuite.pedagogico@gmail.com/n";
	mail($to, $subject, $message, $header);
?>