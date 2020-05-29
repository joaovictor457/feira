<?php
  require_once "../Cliente/conection.php";
  //include("../Cliente/reset.php");
  session_start();
  if (!isset($_SESSION['user_session']) && !isset($_SESSION['senha_session'])){
    header("location: ../login.php");
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
        header("location: ../administrador.php");
    }elseif ($linha['tipo_conta'] == "cozinha_s") {
        header("location: cozinha_quick.php");
    }elseif ($linha['tipo_conta'] == "tela_a") {
          
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pedidos</title>
  <meta http-equiv="refresh" content="1;url=tela_a.php">
</head>
<body>
		<?php
      $dados = mysqli_query($conexao, "SELECT id FROM pedido WHERE confirmado = 'pro' ORDER BY id DESC LIMIT 8");
      $linha2 = mysqli_fetch_assoc($dados);
      $total  = mysqli_num_rows($dados);

      if ($total == 0) {
        echo "<h1>Ainda não tem nenhum pedido</h1>";
      }else{
        //echo $linha2['id'];
        do{
           echo $linha2['id']."<br>";
        }while($linha2 = mysqli_fetch_assoc($dados));
      }
    
    ?>
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