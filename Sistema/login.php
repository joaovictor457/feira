<?php
    session_start();
    require_once "Cliente/conection.php";
    if (!isset($_SESSION['user_session']) && !isset($_SESSION['senha_session'])){
        
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tela login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="CSS/style2.css">
</head>
<body>

    <div class="form-area">
        <h2>Tela de acesso</h2>
        <form method="POST" action="?go=logar">
            <p>Usuário:</p>
            <input type="text" name="usuario" placeholder="Usuário">

            <p>Senha:</p>
            <input type="password" name="senha" placeholder="Senha">

            <input type="submit" name="" value="Logar">
        </form>
    </div>

</body>
</html>
<?php
    }else{
        $user = $_SESSION['user_session'];
        $senha = $_SESSION['senha_session'];

        //$conexao = @mysql_pconnect("localhost", "u245590556_space", "space123") or die("Não foi possível conectar ao servidor");
        //mysql_select_db("u245590556_feira", $conexao) or die("Banco de dados não localizado");
        $query = sprintf("SELECT * FROM conta WHERE USUARIO = '$user' AND SENHA = '$senha' ");    
        $dado = mysqli_query($conexao, $query) or die("Erro2");
        $linha = mysqli_fetch_assoc($dado);
                
        if ($linha['tipo_conta'] == "caixa_a") {
            header("location: Caixa/caixa_s.php");
        }elseif ($linha['tipo_conta'] == "caixa_s") {
            header("location: Caixa/caixa_a.php");
        }elseif($linha['tipo_conta'] == "administrador"){
            header("location: administrador.php");
        }elseif ($linha['tipo_conta'] == "cozinha_a") {
            header("location: COZINHA/cozinha_a");
        }elseif ($linha['tipo_conta'] == "cozinha_s") {
            header("location: COZINHA/cozinha_s");
        }elseif ($linha['tipo_conta'] == "pc_1") {
           header("location: ../index_logado.php");
        }
    }
?>
<?php
    if (@$_GET["go"] == "logar") {
        $user = $_POST["usuario"];
        $senha = $_POST["senha"];

        if (empty($user)) {
            echo "<script>alert('Preencha todos os campos para logar'); history.back();</script>";
        }elseif (empty($senha)) {
            echo "<script>alert('Preencha todos os campos para logar'); history.back();</script>";
        }else{
            $query1 = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM conta WHERE USUARIO = '$user' AND SENHA = '$senha'"));
            if ($query1 == 1) {
                session_start();
                $_SESSION['user_session'] = $user;
                $_SESSION['senha_session'] = $senha;

                if (!isset($_SESSION['user_session']) && !isset($_SESSION['senha_session'])){
                    header("location: login.php");
                }else{
                    //$conexao = @mysql_pconnect("localhost", "u245590556_space", "space123") or die("Não foi possível conectar ao servidor");
                    //mysql_select_db("u245590556_feira", $conexao) or die("Banco de dados não localizado");
                    $query = sprintf("SELECT * FROM conta WHERE USUARIO = '$user' AND SENHA = '$senha' ");    
                    $dado = mysqli_query($conexao, $query) or die("Erro2");
                    $linha = mysqli_fetch_assoc($dado);
                
                    if ($linha['tipo_conta'] == "caixa_a") {
                        header("location: Caixa/caixa_a.php");
                    }elseif ($linha['tipo_conta'] == "caixa_s") {
                        header("location: Caixa/caixa_s.php");
                    }elseif($linha['tipo_conta'] == "administrador"){
                        header("location: administrador.php");
                    }elseif ($linha['tipo_conta'] == "cozinha_a") {
                        header("location: COZINHA/cozinha_ice.php");
                    }elseif ($linha['tipo_conta'] == "cozinha_s") {
                        header("location: COZINHA/cozinha_quick.php");
                    }elseif ($linha['tipo_conta'] == "pc_1") {
                        header("location: ../index_logado.php");
                    }elseif ($linha['tipo_conta'] == "tela_s") {
                        header("location: Telas/tela_s.php");
                    }elseif ($linha['tipo_conta'] == "tela_a") {
                        header("location: Telas/tela_a.php");
                    }
                }

                #echo "<script>alert('Usuário logado com sucesso'); history.back();</script>";
                #header("location: Telas/TelaAdministrativa.php");
            }else{
                echo "<script>alert('Usuário e senha não correspondem.'); history,back();</script>";
            }
        }
    }
?>