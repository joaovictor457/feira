<?php 
	$preco = $_GET['preco'];
	$descricao = $_GET['descricao'];
	// echo $descricao,", ", $preco;
?>
<<!DOCTYPE html>
<html>
	<head>
		<title>Confirme sua compra!</title>
		<link rel="stylesheet" type="text/css" href="CSS/finalizar.css"> 
		<meta charset="utf-8">
		<meta charset="latin1">
		<style type="text/css">
			.confirmar {
				background: #ffc800;
			}
			.confirmar:hover {
				background-color: #a81c1e;
			}
		</style>
	</head>
	<body style="background-image: url(img/quickfood.png);">
	<?php
	session_start();
		@$id = $_GET['id'];
		include("conection.php");
		#mysql_select_db("feira_empreendedor", $conexao);
		$query = sprintf("SELECT * FROM produto WHERE id = '$id'");
		$query2 = mysqli_query($conexao, $query) or die ("Erro de conexão");
		$pedido = mysqli_fetch_assoc($query2);

	?>
	<!-- <form method="POST" <?php echo "action=finalizar.php?confirmar=true&preco=".urlencode($preco)."&descricao=" .urlencode($descricao); ?>>
		<input type="submit" value="confirmar">
	</form> -->
		<div class="all">
			<div class="con">
				<h1 id="pedido">Pedido</h1>
		        <form method="POST" class="form"<?php echo "action=finalizar.php?confirmar=true&preco=".urlencode($preco)."&descricao=" .urlencode($descricao); ?>>
		            <!-- <p id="nome">Açaí tradicional</p> -->
			            <p id="descricao"><?php echo $_GET['descricao']; ?></p>
			            <p id="preco">TOTAL: <?php echo number_format($_GET['preco'], 2); ?> </p>
			            <input class="confirmar" type="submit" value="CONFIRMAR">
			            <p>
			            	<a class="cancelar" href="../../html/quickfood.php">ou cancele, clicando aqui.</a>
			            </p> 
		        </form>
		    </div>
		</div>
	<?php
		// if (@$_GET['confirmar'] == "true") {
		// 	$user = $_SESSION['user_session'];
		// 	$preco = $pedido['preco'];
		// 	$tipo = $pedido['tipo'];
		// 	$descricao = $pedido['descricao'];
		// 	mysql_query("INSERT INTO pedido(produto, preco, pc, confirmado, tipo, descricao) VALUES ('$id', '$preco', '$user', 'not', '$tipo', '$descricao')");
		// 	#mysql_query("UPDATE total SET total_g = total_g +'$preco' WHERE id_g=1");
		// 	header("location: index.php");
		// }
		?>
	</body>
</html>
<?php
		if (@$_GET['confirmar'] == "true") {
			$user = $_SESSION['user_session'];
			$preco = $_GET['preco'];
			$descricao = $_GET['descricao'];
			//$conexao = mysql_pconnect("localhost", "root", "");
			//ysql_select_db("feira_empreendedor", $conexao);
			mysqli_query($conexao, "INSERT INTO pedido(produto, preco, pc, confirmado, tipo, descricao) VALUES ('1', '$preco', '$user', 'not', 's', '$descricao')");
			#mysql_query("UPDATE total SET total_g = total_g +'$preco' WHERE id_g=1");
			header("location: ../../index_logado.php");
		}
	?>