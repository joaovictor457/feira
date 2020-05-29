<?php
   	session_start();
    require_once "Sistema/Cliente/conection.php";
    if (!isset($_SESSION['user_session']) && !isset($_SESSION['senha_session'])){
        
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<html lang="pt-br">
		<title>III Feira do Empreendedor</title>
		<link rel="stylesheet" type="text/css" href="css/index/index_.css">
		<link rel="stylesheet" type="text/css" href="css/index/header_.css">
		<link rel="stylesheet" type="text/css" href="css/index/rodape_.css">
		<link rel="stylesheet" type="text/css" href="css/index/b2_.css">
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/js2.js"></script>
		<meta name="content" content="Marketing Digital">
		<link rel="shortcut icon" href="img/favicon.png" type="image/x-png"/>
	</head>
	<body>
		<!-- CABEÇALHO -->
		<header>
			<div id="cabeçalho_menu">
				<div class="menu" id="menuMobile">
					<a href="#" id="inicio" class="menu_op">
						<p>INÍCIO</p>
					</a>
					<a href="#fornecedores" id="compras" class="menu_op">
						<p>COMPRAS</p>
					</a>
					<a href="#slider" id="patro" class="menu_op">
						<p>PATROCINADORES</p>
					</a>
					<div class="img-logo">
						<a href="#"><img src="img/logos/logo.png" title="ECIT CUITÉ" id="logo_cabeçalho"></a>
					</div>	
					<a href="#redes_sociais" id="rs" class="menu_op">
						<p>REDES SOCIAIS</p>
					</a>
					<a href="#redirecionar_quem_somos" id="sobre" class="menu_op">
						<p>SOBRE</p>
					</a>
					<a href="Sistema/login.php" id="login" class="menu_op">
						<p>ENTRAR</p>
					</a>
				</div>
				<!-- LOGO DA FEIRA -->
				<div class="letreiro">
					<a href="#"><img src="img/logos/logo_feira.png" id="logofeira" ></a>
				</div>
			</div>
			<div id="barradiv">
				<img src="img/barra.png" id="barra">
			</div>
		</header>
		<!-- SLIDESHOW -->
		<figure>
	   		<span class="trs next"></span>
	  		<span class="trs prev"></span>
	   		<div id="slider">
	   			<a href="http://www.pbnettelecom.com.br/" class="trs" target="_blank"><img src="img/patrocinadores/pbnet.png" alt="PBnet" class="imagens"></a>
	   			<a href="#" class="trs"><img src="img/patrocinadores/bigode.jpg" alt="Bigode Grosso" class="imagens" /></a>
	      		<a href="#" class="trs"><img src="img/patrocinadores/mariju.png" alt="Mariju" class="imagens" /></a>
	      		<a href="#" class="trs"><img src="img/patrocinadores/ufcg.png" alt="UFCG" class="imagens" /></a>
	      		<a href="#" class="trs"><img src="img/patrocinadores/boticario.jpg" alt="Boticário" class="imagens" /></a>
	      		<a href="#" class="trs"><img src="img/patrocinadores/brunna.jpg" alt="Burnna Prado MakeUp" class="imagens" /></a>
	      		<a href="#" class="trs"><img src="img/patrocinadores/lf.jpg" alt="LF Confecções" class="imagens" /></a>
	      		<a href="#" class="trs"><img src="img/patrocinadores/LoizArts.jpg" alt="Loiz Arts" class="imagens" /></a>
	      		<a href="#" class="trs"><img src="img/patrocinadores/netoBar.jpg" alt="Neto Bar" class="imagens" /></a>
	   		</div>
		</figure>

		<!-- FORNECEDORES -->
		<div id="fornecedores">
			<a href="#"><img src="img/icedream.png" id="img-dream" title="Clique em Qualquer lugar da imagem para fazer o pedido do seu açaí"></a>
			<a href="#"><img src="img/quickfood.png" id="img-quick" title="Clique em Qualquer lugar da imagem para fazer o pedido do seu salgado"></a>
		</div>	
		<div class="redes-socias-fornecedores">
			<a href="https://www.instagram.com/icedream__/" target="_blank"><img src="img/redes/instagram.png" class="redes" id="insta" title="@Ice_Cream"></a>
		</div>
		<div class="redes-socias-fornecedores2">
			<a href="https://www.instagram.com/quuickfoodd/" target="_blank"><img src="img/redes/instagram.png" class="redes" id="insta2" title="@Quick_Food"></a>
		</div>

		<!-- REDES SOCIAIS -->

		<div class="redes_sociais" id="redes_sociais">
			<h1 id="siga">SIGA<br/>NOSSAS</h1>
			<h1 id="nossas">REDES<br/>SOCIAIS</h1>
			<div id="imagens_redes_sociais">				
				<img src="img/redes/img1.jpg" id="img1" class="imgs_redes">
				<img src="img/redes/img2.jpg" id="img2" class="imgs_redes">
				<img src="img/redes/img3.jpg" id="img3" class="imgs_redes">
				<img src="img/redes/img4.jpg" id="img4" class="imgs_redes">
				<img src="img/redes/img5.jpg" id="img5" class="imgs_redes">
			</div>	
			<div class="redes_sociais_escola">
				<div id="instagram_redes-div">
					<img src="img/redes/insta.png" id="insta_redes" class="redes_escola">
					<div class="informação_insta">
						<h1 class="h1_k">@feiradoempreendedor_</h1>
						<a href="https://www.instagram.com/feiradoempreendedor_/" target="_blank" id="seguir_but"><button class="link_button">Seguir</button></a>
					</div>
				</div>
				<div id="facebook_redes-div">
					<img src="img/redes/facebook_redes.png" id="facebook_redes" class="redes_escola"></a>
					<div class="informação_face">
						<h1 class="h1_k">ECIT - Cuité</h1>
						<a href="https://www.facebook.com/jornalistajoseitamardarochacandido/?ref=br_rs" target="_blank"><button class="link_button">Curtir</button></a>
					</div>
				</div>
			</div>	
		</div>
			
		<div id="redirecionar_quem_somos"></div>

		<div class="quemsomos" id="quemsomos">
			<div id="ajuste_quemsomos">
				<h1>QUEM SOMOS</h1>
				<p id="p1">A ECIT - Cuité está pela terceira vez lançando mais uma edição da Feira do Empreendedor e dessa vez trazendo mais ações diversificadas para todo mundo. Devido ao sucesso das edições passadas, buscamos trazer lanches ainda melhores e ações super interessantes!<br/></p>
				<p id="p2">Este ano, o evento contará com a união dos cursos de técnicos de Informática e Administração, trabalhando lado a lado com as áreas de e empreendedorismo e tecnologia. Este site que você está acessado agora foi desenvolvido pelos nossos alunos de Informática e as lanchonetes com comidas deliciosas, pelos alunos de Administração. Teremos também <b>atrações musicais, artes, empreendedorismo, tecnologia e muito mais!</b></p>
				<p id="p3">O objetivo do evento é fazer com que os estudantes do curso técnico em Administração e Informática trabalhem juntos na criação de um comércio eletrônico e além disto, trazer novos alunos para a nossa escola, que, dutante os eventos tem a oportunidade de conhecer nossas instalações, cotidadiano e didática. Não deixe de participar, venha fazer um lanche conosco!</p>
			</div>			
		</div>
		<div class="localização">
			<div id="informações">
				<h2 class="h2">COMO CHEGAR:</h2>
				<p class="p">BR-104, 7, Cuité-PB, 58175-000</p>
				<h2 class="h2">E-MAIL:</h2>
				<p class="p">coordenação@ecitcuite.com.br</p>
				<h2 class="h2">HORÁRIO DE FUNCIONAMENTO:</h2>
				<p class="p">Seg - Sex das 07:30h até às 17h</p>
			</div>
			<iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.353732411729!2d-36.175379385684984!3d-6.476802495314618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ae112a53fe1ed9%3A0xd270486a50538b2f!2sEscola+Estadual+Cidad%C3%A3+Integral+T%C3%A9cnica+Jornalista+Jos%C3%A9+Itamar+da+Rocha+C%C3%A2ndido.!5e0!3m2!1spt-BR!2sbr!4v1536168668229" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="menu_baixo">
			<div id="img_menu_baixo">
				<img src="img/logos/logobordas.png">
			</div>
			<div class="menu_baixo_li">
				<a href="#"><li>INÍCIO</li></a>
				<a href="#fornecedores"><li>COMPRAS</li></a>
				<a href="#slider"><li>PATROCINADORES</li></a>
				<a href="#redes_sociais"><li>REDES SOCIAIS</li></a>
				<a href="#redirecionar_quem_somos"><li>SOBRE</li></a>
			</div>
		</div>
		<div id="barra2"></div>
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
            header("location: Sistema/Caixa/caixa_s.php");
        }elseif ($linha['tipo_conta'] == "caixa_s") {
            header("location: Sistema/Caixa/caixa_a.php");
        }elseif($linha['tipo_conta'] == "administrador"){
            header("location: Sistema/administrador.php");
        }elseif ($linha['tipo_conta'] == "pc_1") {
           header("location: index_logado.php");
        }elseif ($linha['tipo_conta'] == "cozinha_a") {
        	header("location: Sistema/COZINHA/cozinha_ice.php");
        }elseif ($linha['tipo_conta'] == "cozinha_s") {
        	header("location: Sistema/COZINHA/cozinha_quick.php");
        }
    }
?>