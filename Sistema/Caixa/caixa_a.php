<?php
	require_once "../Cliente/conection.php";
	session_start();
	if (!isset($_SESSION['user_session']) && !isset($_SESSION['senha_session'])){
		header("location: ../index.php");
	}else{
		$user = $_SESSION['user_session'];
		$senha = $_SESSION['senha_session'];

		//$conexao = @mysql_pconnect("localhost", "u245590556_space", "space123") or die("Não foi possível conectar ao servidor");
		//mysql_select_db("u245590556_feira", $conexao) or die("Banco de dados não localizado");
		$query = sprintf("SELECT * FROM conta WHERE USUARIO = '$user' AND SENHA = '$senha' ");	
		$dado = mysqli_query($conexao, $query) or die("Erro2");
		$linha = mysqli_fetch_assoc($dado);
				
		if ($linha['tipo_conta'] == "pc_1") {
            header("location: ../../index_logado.php");
        }elseif ($linha['tipo_conta'] == "caixa_s") {
            header("location: caixa_s.php");
        }elseif($linha['tipo_conta'] == "administrador"){
            header("location: administrador.php");
        }elseif ($linha['tipo_conta'] == "caixa_a") {
           
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pedidos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/estilo_a2.css">
	<meta http-equiv="refresh" content="5;url=caixa_a.php">
</head>
<body>
	<div id="img">
	<?php
		//mysql_select_db("u245590556_feira", $conexao) or die("Banco de dados não localizado");
		$query2 = sprintf("SELECT * FROM pedido WHERE tipo = 'a' and confirmado='not' ORDER BY id ASC ");
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
		}/*elseif (@$_GET['go'] == "confirmado"){
			mysql_query("UPDATE total SET total_g = total_g+'$preco' WHERE id_g=1");
			mysql_query("UPDATE total SET pedidos = pedidos + 1 WHERE id_g=1");
			mysql_query("UPDATE total_acai SET total_a = total_a+'$preco' WHERE id_a=1");
			mysql_query("UPDATE total_acai SET produto_a = produto_a+1 WHERE id_a=1");
			mysql_query("UPDATE pedido SET confirmado = 'yes' WHERE id='$id'");
			echo "<script language='javascript'>setTimeout(document.location = 'caixa_a.html', '_blank');</script>";
			#header('Location: /target.php', true, $code)# to forward user to another page:
			#header("location: caixa_a.php");
		}*/
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