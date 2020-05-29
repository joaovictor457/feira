<!DOCTYPE html>
<html>
	<head>
		<title>Confirme sua compra!</title>
		<link rel="stylesheet" type="text/css" href="CSS/finalizar.css"> 
		<meta charset="utf-8">
		<meta charset="latin1">
		<style type="text/css">
			.confirmar {
				background: #8deb00;
			}
			.confirmar:hover {
				background-color: #a9177b;
			}
		</style>
	</head>
	<body style="background-image: url(img/icedream.png);">
	<?php
	session_start();
		$id = $_GET['id'];
		include("conection.php");
		#mysql_select_db("feira_empreendedor", $conexao);
		$query = sprintf("SELECT * FROM produto WHERE id = '$id'");
		$query2 = mysqli_query($conexao, $query) or die ("Erro de conexão");
		$pedido = mysqli_fetch_assoc($query2);
	?>
		<div class="all">
			<div class="con">
				<h2 id="pedido">Pedido</h2>
		        <form method="POST" class="form"<?php echo "action=confirmar.php?id=",urlencode($id),"&confirmar=true"; ?>>
		            <p id="nome"><?php echo $pedido['nome']; ?></p>
		            <p id="descricao"><?php echo $pedido['descricao']; ?></p>
		            <p id="preco">TOTAL: <?php echo number_format($pedido['preco'], "2"); ?> </p>
		            <input class="confirmar" type="submit" value="CONFIRMAR" >
		            <p>
		            	<a class="cancelar" href="../../html/icecream.php">ou cancele, clicando aqui.</a>
		            </p>
		        </form>
		    </div>
		</div>
	<?php
		if (@$_GET['confirmar'] == "true") {
			$user = $_SESSION['user_session'];
			$preco = $pedido['preco'];
			$tipo = $pedido['tipo'];
			$descricao = $pedido['descricao'];
			mysqli_query($conexao, "INSERT INTO pedido(produto, preco, pc, confirmado, tipo, descricao) VALUES ('$id', '$preco', '$user', 'not', '$tipo', '$descricao')");
			#mysql_query("UPDATE total SET total_g = total_g +'$preco' WHERE id_g=1");
			header("location: ../../index.php");
		}
	?>
	</body>
</html>