<?php
	$cliente = "Priscila";
	$numero = $_GET['pedido'];
	$preco = $_GET['valor'];
	$preco = number_format($preco, '2');
	$descricao = $_GET['descricao'];
	#$descricao = "Açaí Zero com Farinha láctea, Oreo, Bis, Morango, Doce de leite";

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
		<html>
			<style>
				#post{
					height: 449px;
					width: 265px;
				}
				body{
					height: 3508px;
					widht: 2480px;
				}
				  #Cliente: {
				  font-size: 17,74 pt;
				  margin-left: 79px;
				}

				a{
					margin-bottom = -18px;
				}
				#n {
					  font-size: 17,74pt;
					  margin-left: 79px;
					  margin-botton: -40px;
					}
				#preco{
					font-size: 17,74pt;
					margin-left: 80px;
					margin-botton: 0px;
				}
				#descricao{
				text-align: justify;
				margin-left: 79px;
				widht: 10px;
			}
			</style>
			<body>
				<div >
				<!--<p id="Cliente">Cliente: '.$cliente.'</p>-->
				<div id="post">
					<a id="n">n°: '.$numero.'</a><br>
					<a id="preco">Preço: R$'.$preco.'</a><br>
					<p id="descricao">'.$descricao.'.</p>
				</div>
			</body>
		</html>
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>