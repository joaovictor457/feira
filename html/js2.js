function seguir() {
	
	alert("Obrigado por seguir as nossas Redes Sociais\nAgradecemos a compreensão!!!\nVocê será encaminhado para a nossa página");

}
function aparecer_linha1(){

    document.getElementById('hr_pg').style.visibility = 'visible';

}

function sumir_linha1(){

    document.getElementById('hr_pg').style.visibility = 'hidden';

}

function aparecer_linha2(){

    document.getElementById('hr_vendas').style.visibility = 'visible';

}

function sumir_linha2(){

    document.getElementById('hr_vendas').style.visibility = 'hidden';

}

function aparecer_linha3(){

    document.getElementById('hr_patro').style.visibility = 'visible';

}

function sumir_linha3(){

    document.getElementById('hr_patro').style.visibility = 'hidden';

}

function aparecer_linha4(){

    document.getElementById('hr_rs').style.visibility = 'visible';

}

function sumir_linha4(){

    document.getElementById('hr_rs').style.visibility = 'hidden';

}

function aparecer_linha5(){

    document.getElementById('hr_sobre').style.visibility = 'visible';

}

function sumir_linha5(){

    document.getElementById('hr_sobre').style.visibility = 'hidden';

}

function aparecer_linha6(){

    document.getElementById('hr_login').style.visibility = 'visible';

}

function sumir_linha6(){

    document.getElementById('hr_login').style.visibility = 'hidden';

}

// CARRINHO DE COMPRAS

function carrinho_aparecer(){

    document.getElementById('carrinho_compra').style.display = 'block';
    document.getElementById('compras').style.display = 'block'; 
    document.getElementById('seta_carrinho').style.display = 'block'; 

}

function carrinho_sumir() {
    
    document.getElementById('carrinho_compra').style.display = 'none';  
    document.getElementById('compras').style.display = 'none'; 
    document.getElementById('seta_carrinho').style.display = 'none';

}