<?php
	session_start();
	if (!isset($_SESSION['user_session']) && !isset($_SESSION['senha_session'])){
		header("location: Sistema/login.php");
	}else{
        $user = $_SESSION['user_session'];
        $senha = $_SESSION['senha_session'];

        $conexao = @mysql_pconnect("localhost", "u245590556_space", "space123") or die("Não foi possível conectar ao servidor");
        mysql_select_db("u245590556_feira", $conexao) or die("Banco de dados não localizado");
        $query = sprintf("SELECT * FROM conta WHERE USUARIO = '$user' AND SENHA = '$senha' ");    
        $dado = mysql_query($query, $conexao) or die("Erro2");
        $linha = mysql_fetch_assoc($dado);
                
       if ($linha['tipo_conta'] == "caixa_a") {
            header("location: Sistema/Caixa/caixa_s.php");
        }elseif ($linha['tipo_conta'] == "caixa_s") {
            header("location: Sistema/Caixa/caixa_a.php");
        }elseif($linha['tipo_conta'] == "administrador"){
            header("location: Sistema/administrador.php");
        }elseif ($linha['tipo_conta'] == "cozinha_a") {
        	header("location: Sistema/COZINHA/cozinha_ice.php");
        }elseif ($linha['tipo_conta'] == "cozinha_s") {
        	header("location: Sistema/COZINHA/cozinha_quick.php");
    	}elseif ($linha['tipo_conta'] == "pc_1") {
    		if (@$_GET["go"] == "sair") {
				unset($_SESSION["user_session"]);
				unset($_SESSION["senha_session"]);
				header("location: index.php");
			}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<html lang="pt-br">
		<title>II FEIRA DO EMPREENDEDOR</title>
		<link rel="stylesheet" type="text/css" href="css/index-log.css">
		<link rel="stylesheet" type="text/css" href="css/indexMax800.css">
		<link rel="stylesheet" type="text/css" href="css/b.css">
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/js2.js"></script>
		<script type="text/javascript" src="js/menuMobile.js"></script>
		<meta name="content" content="Marketing Digital">
		<link rel="shortcut icon" href="img/favicon.png" type="image/x-png"/>
	</head>
	<body>
		<div class="container">
			<!-- CABEÇALHO -->
		<header>
			<div id="cabeçalho_menu">
				<div class="menu" id="menuMobile">
					<a href="#" id="pg" class="menu_op" onmouseover="aparecer_linha1()" onmouseout="sumir_linha1()">
						<p>INÍCIO</p>
					</a>
					<a href="#fornecedores" id="vendas" class="menu_op" onmouseover="aparecer_linha2()" onmouseout="sumir_linha2()">
						<p>COMPRAS</p>
					</a>
					<a href="#slider" id="patro" class="menu_op" onmouseover="aparecer_linha3()" onmouseout="sumir_linha3()">
						<p>PATROCINADORES</p>
					</a>
					<div class="img-logo">
						<a href="#"><img src="img/logo.png" title="ECIT CUITÉ" id="logo_cabeçalho"></a>
					</div>	
					<a href="#redes_sociais" id="rs" class="menu_op" onmouseover="aparecer_linha4()" onmouseout="sumir_linha4()">
						<p>REDES SOCIAIS</p>
					</a>
					<a href="#redirecionar_quem_somos" id="sobre" class="menu_op" onmouseover="aparecer_linha5()" onmouseout="sumir_linha5()">
						<p>SOBRE</p>
					</a>
					<a href="?go=sair" id="login" class="menu_op" onmouseover="aparecer_linha6()" onmouseout="sumir_linha6()">
						<p>SAIR</p>
					</a>
				</div>
				<div class="letreiro">
					<a href="#"><img src="img/logofeira.png" id="logofeira" ></a>
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
		      		<a href="#" class="trs"><img src="img/BL.png" alt="BL" class="imagens" /></a>
		      		<a href="#" class="trs"><img src="img/bahia.png" alt="Bahia" class="imagens" /></a>
		      		<a href="#" class="trs"><img src="img/biju.png" alt="Biju" class="imagens" /></a>
		      		<a href="#" class="trs"><img src="img/horah.png" alt="Hora H" class="imagens" /></a>
		      		<a href="#" class="trs"><img src="img/lojao.png" alt="Lojão" class="imagens" /></a>
		      		<a href="#" class="trs"><img src="img/mariju.png" alt="Mariju" class="imagens" /></a>
		      		<a href="http://www.pbnettelecom.com.br/" class="trs" target="_blank"><img src="img/pbnet.png" alt="PBnet" class="imagens" /></a>
		      		<a href="#" class="trs"><img src="img/piso.png" alt="Piso" class="imagens" /></a>
		      		<a href="#" class="trs"><img src="img/vidinho.png" alt="Vidinho" class="imagens" /></a>
		   		</div>
			</figure>

			<!-- FORNECEDORES -->
			<div id="all">
			<div id="fornecedores">
				<div class="box">
					<div class="imgBox">
						<img src="img/icedream.png" id="img-dream">
					</div>
					<div class="content">
						<article class="botao">
							<a class="a" href="html/icecream.php">Comprar</a>
						</article>
					</div>
				</div>
			</div>
			<div id="fornecedores2">
				<div class="box2">
					<div class="imgBox2">
						<img src="img/quickfood.png" id="img-dream">
					</div>
					<div class="content2">
						<article class="botao2">
							<a class="a2" href="html/quickfood.php">Comprar</a>
						</article>
					</div>
				</div>
			</div>
			</div>
			<!--<div id="fornecedores">
				<a href="html/icecream.html"><img src="img/icedream.png" id="img-dream" title="Clique em Qualquer lugar da imagem para fazer o pedido do seu açaí"></a>
				<a href="html/quickfood.html"><img src="img/quickfood.png" id="img-quick" title="Clique em Qualquer lugar da imagem para fazer o pedido do seu salgado"></a>
			</div>	-->

			<div class="redes-socias-fornecedores">
				<a href="https://www.instagram.com/icedream__/" target="_blank"><img src="img/instagram.png" class="redes" id="insta" title="@Ice_Cream"></a>
			</div>

			<div class="redes-socias-fornecedores2">
				<a href="https://www.instagram.com/quuickfoodd/" target="_blank"><img src="img/instagram.png" class="redes" id="insta2" title="@Quick_Food"></a>
			</div>

			<!-- REDES SOCIAIS -->

			<div class="redes_sociais" id="redes_sociais">
				
				<h1 id="siga">SIGA<br/>NOSSAS</h1>
				<h1 id="nossas">REDES<br/>SOCIAIS</h1>

				<div id="imagens_redes_sociais">
					
					<img src="img/img1.jpg" id="img1" class="imgs_redes">

					<img src="img/img2.jpg" id="img2" class="imgs_redes">

					<img src="img/img3.jpg" id="img3" class="imgs_redes">

					<img src="img/img4.jpg" id="img4" class="imgs_redes">

					<img src="img/img5.jpg" id="img5" class="imgs_redes">

					<!-- IMAGENS O INSTAGRAM E FACEBOOK DA ESCOLA -->

					<div class="redes_sociais_escola">
						<div id="instagram_redes-div">
							<img src="img/insta_redes.jpg" id="insta_redes" class="redes_escola">
							<div class="informação_insta">
								<h1 class="h1_k">@feiradoempreendedor</h1>
								<a href="https://www.instagram.com/feiradoempreendedorismo/" id="seguir_but"><button class="link_button">Seguir</button></a>
						</div>
						</div>
						<div id="facebook_redes-div">
							<a href="https://www.facebook.com/jornalistajoseitamardarochacandido/" target="_blank"><img src="img/facebook_redes.png" id="facebook_redes" class="redes_escola"></a>
							<div class="informação_face">
								<h1 class="h1_k">ECIT - Cuité</h1>
								<a href="https://www.facebook.com/jornalistajoseitamardarochacandido/?ref=br_rs" target="_blank"><button class="link_button">Curtir</button></a>
							</div>
						</div>
					</div>	
				</div>
			</div>
			<div id="redirecionar_quem_somos"></div>

			<div class="quemsomos" id="quemsomos">
				<div id="ajuste_quemsomos">
					<h1>QUEM SOMOS</h1>
					<p id="p1">A Primeira edição da Feira do Empreendedor da ECIT - Cuité aconteceu no ano passado, 2017, organizada pelo Professor do curso de Administração Rinaldo Filho. O evento foi considerado um sucesso pelo organizador e professor da instituição, que neste ano estará organizando juntamente com o Professor do curso de Informática Mateus Dantas, a sua segunda edição com mais inovações que esperam por você.
					<br/>
					<p id="p2">Este ano o evento contará com a participação do curso técnico de Informática, que ajudará com as vendas desenvolvendo um e-commerce, este que você está acessando agora, para o evento. Esta edição também contará com diversas novidades, envolvendo: Arte, empreendedorismo, tecnologia e entre outras variadas. Então fique ligado, em: fdeecitcuite.com! :)</p>
					<p id="p3">O objetivo do evento é fazer com que os estudantes do curso técnico em Administração e Informática trabalhem juntos na criação de um "mini comercio" e além disto, trazer novos alunos para a nossa escola, que graças ao evento tem a oportunidade de conhecer nossas instalações, cotidadiano e didática. 
					Não deixe de participar, venha fazer um lanche conosco!</p>
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
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.353732411729!2d-36.175379385684984!3d-6.476802495314618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ae112a53fe1ed9%3A0xd270486a50538b2f!2sEscola+Estadual+Cidad%C3%A3+Integral+T%C3%A9cnica+Jornalista+Jos%C3%A9+Itamar+da+Rocha+C%C3%A2ndido.!5e0!3m2!1spt-BR!2sbr!4v1536168668229" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="menu_baixo">
				<div id="img_menu_baixo">
					<img src="img/logobordas.png">
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
			</div>
		</div>
	</body>
</html>
<?php 
	}
}
?>