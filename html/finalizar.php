<?php 
	$preco = $_GET['preco'];
	$descricao = $_GET['descricao'];
	// echo $descricao,", ", $preco;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirme sua compra!</title>
	<link rel="stylesheet" type="text/css" href="CSS/confirmar2.css"> 
	<meta charset="utf-8">
	<meta charset="latin1">
</head>
<body>
	<!-- <form method="POST" <?php echo "action=finalizar.php?confirmar=true&preco=".urlencode($preco)."&descricao=" .urlencode($descricao); ?>>
		<input type="submit" value="confirmar">
	</form> -->
	<div class="all">
	<div class="con">
		<h2 id="pedido">Pedido</h2>
        <form method="POST" <?php echo "action=finalizar.php?confirmar=true&preco=".urlencode($preco)."&descricao=" .urlencode($descricao); ?>>
            <!-- <p id="nome">Açaí tradicional</p> -->
            <p id="descricao"><?php echo $_GET['descricao']; ?></p>
            <p id="preço">TOTAL: <?php echo number_format($_GET['preco'], 2); ?> </p>
            <input class="confirmar" type="submit" value="CONFIRMAR">
            <input class="cancelar" type="submit" value="ou cancele, clicando aqui.">
        </form>
    </div>
	</div>
	<?php
		if (@$_GET['confirmar'] == "true") {
			$user = $_SESSION['user_session'];
			$preco = $pedido['preco'];
			$tipo = $pedido['tipo'];
			$descricao = $pedido['descricao'];
			mysql_query("INSERT INTO pedido(produto, preco, pc, confirmado, tipo, descricao) VALUES ('$id', '$preco', '$user', 'not', '$tipo', '$descricao')");
			#mysql_query("UPDATE total SET total_g = total_g +'$preco' WHERE id_g=1");
			header("location: index.php");
		}
		?>
</body>
</html>
<?php
		if (@$_GET['confirmar'] == "true") {
			$preco = $_GET['preco'];
			$descricao = $_GET['descricao'];
			$conexao = mysql_pconnect("localhost", "root", "");
			mysql_select_db("feira_empreendedor", $conexao);
			mysql_query("INSERT INTO pedido(produto, preco, pc, confirmado, tipo, descricao) VALUES ('1', '$preco', 'pc_1', 'not', 's', '$descricao')");
			#mysql_query("UPDATE total SET total_g = total_g +'$preco' WHERE id_g=1");
			header("location: index.php");
		}
	?>