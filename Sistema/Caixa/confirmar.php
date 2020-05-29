<?php
	include("../Cliente/conection.php");
	$id = $_GET['pedido'];
	//mysql_select_db("u245590556_feira", $conexao);
	$query2 = sprintf("SELECT * FROM pedido WHERE id = '$id'");
	$dados = mysqli_query($conexao, $query2) or die(mysql_error());
	$linha2 = mysqli_fetch_assoc($dados);

	$produto = $linha2['produto'];
	$query3 = sprintf("SELECT * FROM produto WHERE id = '$produto'");
	$dados2 = mysqli_query($conexao, $query3) or die(mysql_error());
	$linha3 = mysqli_fetch_assoc($dados2);
	$preco = $linha2['preco'];
	$descricao = $linha2['descricao'];

	mysqli_query($conexao, "UPDATE total SET total_g = total_g+'$preco' WHERE id_g=1");
	mysqli_query($conexao, "UPDATE total SET pedidos = pedidos + 1 WHERE id_g=1");
	mysqli_query($conexao, "UPDATE pedido SET confirmado = 'yes' WHERE id='$id'");
	if ($linha2['tipo'] == "a") {
		mysqli_query($conexao, "UPDATE total_acai SET total_a = total_a+'$preco' WHERE id_a=1");
		mysqli_query($conexao, "UPDATE total_acai SET produto_a = produto_a+1 WHERE id_a=1");
		//include("../EMAIL/mail_a.php");
	}elseif ($linha2['tipo'] == "s") {
		mysqli_query($conexao, "UPDATE total_salgados SET total_s = total_s+'$preco' WHERE id_s=1");
		mysqli_query($conexao, "UPDATE total_salgado SET produto_s = produto_s+1 WHERE id_s=1");
		//include("../EMAIL/mail_s.php");
	}
	echo $descricao;
	#header("location: ../PDF/gerar_pdf.php?pedido=". urlencode($descricao));
	header("location: ../PDF/gerar_pdf.php?pedido=". urlencode($id) .  "&valor=" . urlencode($preco) . "&descricao=" . urlencode($descricao));
?>