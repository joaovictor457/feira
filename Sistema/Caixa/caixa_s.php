<?php
	require_once "../Cliente/conection.php";
  	//include("../Cliente/reset.php");
	session_start();
	if (!isset($_SESSION['user_session']) && !isset($_SESSION['senha_session'])){
		header("location: ../../index.php");
	}else{
		$user = $_SESSION['user_session'];
		$senha = $_SESSION['senha_session'];

		$query = sprintf("SELECT * FROM conta WHERE USUARIO = '$user' AND SENHA = '$senha' ");	
		$dado = mysqli_query($conexao, $query) or die("Erro2");
		$linha = mysqli_fetch_assoc($dado);
				
		if ($linha['tipo_conta'] == "pc_1") {
            header("location: ../../index_logado.php");
        }elseif ($linha['tipo_conta'] == "caixa_a") {
            header("location: caixa_a.php");
        }elseif($linha['tipo_conta'] == "administrador"){
            header("location: administrador.php");
        }elseif ($linha['tipo_conta'] == "caixa_s") {
           
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pedidos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/estilo_s3.css">
	<meta http-equiv="refresh" content="5;url=caixa_a.php">
</head>
<body>
	<div id="img">
	<?php
		$query2 = sprintf("SELECT * FROM pedido WHERE tipo = 's' and confirmado='not' ORDER BY id ASC ");
		$dados = mysqli_query($conexao, $query2) or die(mysql_error());
		$linha2 = mysqli_fetch_assoc($dados);
		$total  = mysqli_num_rows($dados);
 
		
		if ($total == 0) {
			echo "<h1>Ainda não tem nenhum pedido</h1>";
		}else{
			echo "<table id='tabela'>
       			<thead>
          		  <tr>
		            <th>ID</th>
		            <th>PREÇO</th>
		            <th>PC</th>
		            <th>CANCELAR</th>
		            <th>CONFIRMAR</th>
		          </tr>
		        </thead>";
			do{
				$id = $linha2['id'];
				$preco = $linha2['preco'];
				echo "<tbody>
				          <tr>
				            <td>",$linha2['id'],"</td>
				            <td>R$ ",number_format($linha2['preco'], '2'),"</td>
				            <td>",$linha2['pc'],"</td>
				            <td><a href='?go=delete&pedido=". urlencode($id) ."'><img src='CSS/x.png'></a></td>
				            <td><a href='confirmar.php?go=confirmado&pedido=". urlencode($id) ."' target='_blank'><img src='CSS/v.png'></a></td>
				          </tr>
				      </tbody>";
			}while($linha2 = mysqli_fetch_assoc($dados));
			echo "</table>";
		}
		if (@$_GET['go'] == "delete") {
			$id = $_GET['pedido'];
			mysqli_query($conexao, "DELETE FROM pedido WHERE id = '$id'");
			header("location: caixa_a.php");
		}
		?>
	</div>
</body>
</html>
<?php
		}
	}
?>
<?php
if (@$_GET["go"] == "sair") {
		unset($_SESSION["user_session"]);
		unset($_SESSION["senha_session"]);
		header("location: ../../index.php");
	}
?>