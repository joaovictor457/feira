<?php 
session_start();
$total = 0;
$descricao = "";

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		$count = count($_SESSION["shopping_cart"]);
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"]
		);
		$_SESSION["shopping_cart"][$count] = $item_array;
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach(@$_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == @$_GET["id"])
			{	
				if(@$_GET['pedido'] == "end"){
					header("location: ../Sistema/Cliente/finalizar.php?preco=".urlencode($_GET['preco'])."&descricao=".urlencode($_GET['descricao']));
					unset($_SESSION["shopping_cart"]);
					
				}else{
					unset($_SESSION["shopping_cart"][$keys]);
					header("location: quickfood.php");
				} 
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<html lang="pt-br">
		<title>Escolha seu lanche!</title>
		<link rel="stylesheet" type="text/css" href="../css/quick/quickfoo.css">
		<link rel="stylesheet" type="text/css" href="../css/quick/produtoq.css">
		<link rel="stylesheet" type="text/css" href="../css/header_p.css">
		<link rel="stylesheet" type="text/css" href="../css/index/rodape_.css">
		<script type="text/javascript" src="../js/carrinho.js"></script>
		<meta name="content" content="Marketing Digital">
		<link rel="shortcut icon" href="../img/favicon.png" type="image/x-png"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>
	<body id="body">
		<header>
			<!-- CABEÇALHO -->
			<div id="cabeçalho_menu">
				<div class="menu">
					<a href="../index_logado.php" id="inicio" class="menu_op">
						<p>INÍCIO</p>
					</a>
					<a href="../index_logado.php" id="compras_menu" class="menu_op">
						<p>COMPRAS</p>
					</a>
					<a href="../index_logado.php" id="patro" class="menu_op">
						<p>PATROCINADORES</p>
					</a>
					<div class="img-logo">
						<a href="../index_logado.php"><img src="../img/logos/logo.png" title="ECIT CUITÉ" id="logo_cabeçalho"></a>
					</div>	
					<a href="../index_logado.php" id="rs" class="menu_op">
						<p>REDES SOCIAIS</p>
					</a>
					<a href="../index_logado.php" id="sobre" class="menu_op">
						<p>SOBRE</p>
					</a>
					<p onmouseover="carrinho_aparecer()" class="menu_op"><a class="fas fa-shopping-cart" id="carrinho"></a></p>
				</div>
			</div>


			<div class="carrinho" id="carrinho_compra" style="display: none;">
			<img src="../img/seta.png" id="seta_carrinho">
			<div id="compras">
				<button id="botao_fechar" onclick="carrinho_sumir()">X</button>
				
				<div class="meu_c">
					<p id="meu_c"><br/>&nbsp; Meu carrinho:</p>
				</div>
				<div class="descriçao">
					<?php
					if(!empty($_SESSION["shopping_cart"])) {
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values) {
						if (empty($descricao)) {
							$descricao = $values["item_name"];
							}else{
								$descricao .= " + ".$values["item_name"];
							}
					?>
					<div class="des">
						<?php
						echo 	'
							<tr>
								<td ><p class="nomepro"> '. $values["item_name"]. ' </p></td>
								<td ><p class="valor_unidade"> R$  ' .$values["item_price"]. '</p></td>
								<td ><p class="premover"><a class="remover" href="?action=delete&id='. $values["item_id"]. '">Remover</a></p></td><br>
							</tr>';
						?>
					</div>
					<?php
						$total = $total +  $values["item_price"];
						}
					}
					?>
				</div>
			</div>				
			<p id="p_preço"><br/>Valor Total: <b>R$ <?php echo number_format($total, 2); ?> </b></p>
			<button><a <?php echo "href='?action=delete&id=".$_GET["id"]."&pedido=end&descricao=".urldecode($descricao)."&preco=".urldecode($total)."'";?>> FECHAR PEDIDO </a></button>
		</div>



		</header>

		<!-- BARRA -->

		<div id="barradiv">
		</div>

		<!-- MONTANDO O PEDIDO -->
			
		<div class="titulo">
			<a><img src="../img/salgados/TITULO.png" id="titulo"></a>
		</div>
		<div class="salgados">
			<a><img src="../img/salgados/salgado.png" id="salgados"></a>	
		</div>

		<div class="pedido">	
			<div class="primeira">
				<form method="POST" action="?action=add&id=<?php echo '1';?>">
					<div class="card" id="card1">
						<div class="front">
							<img src="../img/salgados/coxinha.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Coxinha">
								<h2>Coxinha<br><span>Sabor</span></h2>
								<div class="social-icons">
									<a href="#">Frango</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="2.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 2,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="?action=add&id=<?php echo '2';?>">
					<div class="card" id="card2">
						<div class="front">
							<img src="../img/salgados/pastel_frango.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Pastel de Frango">
								<h2>Pastel<br><span>Sabor</span></h2>
								<div class="social-icons">
									<a href="#">Frango</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="2.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 2,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '3';?>">
					<div class="card" id="card3">
						<div class="front">
							<img src="../img/salgados/pastel_carne.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Pastel de Carne">
								<h2>Pastel<br><span>Sabor</span></h2>
								<div class="social-icons">
									<a href="#">Carne</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="2.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 2,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '4';?>">
					<div class="card" id="card4">
						<div class="front">
							<img src="../img/salgados/enroladinho.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Enroladinho">
								<h2>Enroladinho<br><span>Sabor</span></h2>
								<div class="social-icons">
									<a href="#">Salsicha</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="2.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 2,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="segunda">				
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '5';?>">
					<div class="card" id="card5">
						<div class="front">
							<img src="../img/salgados/torta.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Torta de Frango">
								<h2>Torta Salgada<br><span>Sabor</span></h2>
								<div class="social-icons">
									<a href="#">Frango</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="2.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 2,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '6';?>">
					<div class="card" id="card6">
						<div class="front">
							<img src="../img/salgados/Empada.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Empada de frango">
								<h2>Empada<br><span>Sabor</span></h2>
								<div class="social-icons">
									<a href="#">Frango</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="2.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 2,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '7';?>">
					<div class="card" id="card7">
						<div class="front">
							<img src="../img/salgados/empadadoce.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Empada Doce">
								<h2>Empada Doce<br><span>Sabor</span></h2>
								<div class="social-icons">
									<a href="#">Chocolate</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="2.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 2,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '8';?>">
					<div class="card" id="card8">
						<div class="front">
							<img src="../img/salgados/cone.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Cone de Coxinha">
								<h2>Cone de Coxinha<br><span>Sabor</span></h2>
								<div class="social-icons">
									<a href="#">Frango</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="5.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 5,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="segunda2">				
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '5';?>">
					<div class="card" id="card9">
						<div class="front">
							<img src="../img/salgados/pizza_frango.jpg">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Mini Pizza de Frango">
								<h2>Mini Pizza<br><span>Sabor</span></h2>
								<div class="social-icons">
									<a href="#">Frango</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="2.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 2,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '6';?>">
					<div class="card" id="card10">
						<div class="front">
							<img src="../img/salgados/pizza_presunto.jpg">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Mini Pizza de Presunto">
								<h2>Mini Pizza<br><span>Sabor</span></h2>
								<div class="social-icons">
									<a href="#">Presunto</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="2.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 2,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="bebida">
				<a><img src="../img/salgados/bebida.png" id="bebida"></a>
			</div>	

			<div class="terceira">
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '9';?>">
					<div class="card" id="bebida1">
						<div class="front">
							<img src="../img/salgados/goiaba.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Suco de Goiaba">
								<h2>Suco na Água<br><span>Descrição</span></h2>
								<div class="social-icons">
									<a href="#">Sabor: Goiaba;<br>Copo de 200ml.</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="1.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 1,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '10';?>">
					<div class="card" id="bebida2">
						<div class="front">
							<img src="../img/salgados/maracuja.jpg">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Suco de Maracujá">
								<h2>Suco na Água<br><span>Descrição</span></h2>
								<div class="social-icons">
									<a href="#">Sabor: Maracujá;<br>Copo de 200ml.</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="1.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 1,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '11';?>">
					<div class="card" id="bebida3">
						<div class="front">
							<img src="../img/salgados/goiaba_l.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Suco de Goiaba ao Leite, ">
								<h2>Suco no Leite <br><span>Descrição</span></h2>
								<div class="social-icons">
									<a href="#">Sabor: Goiaba;<br>Copo de 200ml.</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="1.50">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 1,50</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '12';?>">
					<div class="card" id="bebida4">
						<div class="front">
							<img src="../img/salgados/manga_l.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Suco de Maracujá + Leite">
								<h2>Suco no Leite<br><span>Descrição</span></h2>
								<div class="social-icons">
									<a href="#">Sabor: Maracujá;<br>Copo de 200ml.</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="1.50">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 1,50</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="quarta">
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '13';?>">
					<div class="card" id="bebida5">
						<div class="front">
							<img src="../img/salgados/coca.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Coca-Cola">
								<h2>Refrigerante<br><span>Descrição</span></h2>
								<div class="social-icons">
									<a href="#">Sabor: Coca-Cola; Copo de 200ml;</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="1.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 1,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '14';?>">
					<div class="card" id="bebida6">
						<div class="front">
							<img src="../img/salgados/guarana.png">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Guaraná">
								<h2>Refrigerante<br><span>Descrição</span></h2>
								<div class="social-icons">
									<a href="#">Sabor: Guaraná; Copo de 200ml.</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="1.00">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 1,00</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>	
				<form method="POST" action="quickfood.php?action=add&id=<?php echo '14';?>">
					<div class="card" id="bebida6">
						<div class="front">
							<img src="../img/salgados/agua.jpg">
						</div>
						<div class="back">
							<div class="details">
								<input type="hidden" name="hidden_name" value="Água">
								<h2>Água<br><span>Descrição</span></h2>
								<div class="social-icons">
									<a href="#">Água Mineral - 500ml</i></a>
								</div>
								<input type="hidden" name="hidden_price" value="1.50">
								<div class="s-i">
									<a>Valor: </a>
									<a>R$ 1,50</a>
								</div>
								<input value="COMPRAR" type="submit" name="add_to_cart" class="btn">
							</div>
						</div>
					</div>
				</form>	
			</div>
		</div> 		


		


		<!-- RODAPÉ -->
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
				<img src="../img/logos/logobordas.png">
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
		</header>
	</body>
</html>