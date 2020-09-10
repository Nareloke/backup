/*-----------------PÁGINA CURSOS----------------------------------------*/
/*Recebe o id do select que irá abrigar o novo option*/
/*Recebe o obj que foi selecionado e será duplicado*/
function criaOptionDireita(idPai,objOption){
	//Cria um elemento option na memória
	var option=document.createElement("option");

	//Atribui valores e atributos ao obj recem criado
	option.value=objOption.value;
	option.innerHTML=objOption.innerHTML;
	//Add o atributos "ondoubleclick", para que seja possível deletar o item criado
	option.setAttribute('ondblclick', 'criaOptionEsquerda(\'cursosParaSelecionar\', this)');
	option.setAttribute('data-ordem', objOption.getAttribute('data-ordem'));

	var pai=document.getElementById(idPai);
	pai.appendChild(option);	

	//Remove o item que foi duplicado

	deletaNo(objOption);
}

function criaOptionEsquerda(idPai,objOption){
	//Cria um elemento option na memória
	var option=document.createElement("option");

	//Atribui valores e atributos ao obj recem criado
	option.value=objOption.value;
	option.innerHTML=objOption.innerHTML;
	//Add o atributos "ondoubleclick", para que seja possível deletar o item criado
	option.setAttribute('ondblclick', 'criaOptionDireita(\'cursosSelecionados\', this)');
	option.setAttribute('data-ordem', objOption.getAttribute('data-ordem'));

	var pai=document.getElementById(idPai);
	var i = 0;
	var adicionou = 0;
	//Lista vazia, coloco no começo
	if(pai.children.length==0){
		pai.appendChild(option);
	}
	else{
		while (i < pai.children.length && adicionou == 0) {	
		if(pai.children[i].getAttribute('data-ordem')>objOption.getAttribute('data-ordem')){
			pai.insertBefore(option,pai.children[i]);
			//Marco que o item já foi add, para sair do loop
			adicionou = 1;
		}
		i++;		
		}
		//percorreu o vetor e não conseguiu add ninguem
		//Isso vai ocorrer qdo o último item for deletado, logo, tenho que add no final
		if(adicionou == 0){
			pai.insertBefore(option,pai.children[i-1].nextSibling);
		}
	}	
	//Remove o item que foi duplicado
	deletaNo(objOption);
}


//Função especifica para deletar um no
function deletaNo(no){
	no.parentNode.removeChild(no);
}

/*-----------------PÁGINA TABELA----------------------------------------*/

//A sacada aqui consistem em pegar todas as linhas e percorrer as mesmas
//Para cada linha percorrer todas as celulas e colocar no textarea
function exportarCSV(){
	var linhas=document.getElementsByClassName("linha");	
	console.log(linhas);
	var conteudo=document.getElementById("resultado");
	conteudo.innerHTML="";
	for (var i = 0; i < linhas.length; i++) {		
		//linhas[i].cells retorna um array de todas celulas de da linha		
		for (var j =0; j < linhas[i].cells.length; j++) {
			conteudo.innerHTML+=linhas[i].cells[j].innerHTML.trim();
			//Condicao para não colocar ; o final na linha
			if(j!=linhas[i].cells.length-1){				
				conteudo.innerHTML+=';';
			}
			
		}
		conteudo.innerHTML+='\n';
	}
}

/*-----------------PÁGINA CALCULADORA----------------------------------------*/

function calculadora(operacao){
	var num1 = document.getElementById("num1");
	num1 = parseInt(num1.value)
	var num2 = document.getElementById("num2");
	num2 = parseInt(num2.value)
	var valor = '';
	var resultado = document.getElementById("resultado");
	if(isNaN(num1) || isNaN(num2))
	{
		alert("informe dois numeros");
	}else{

		if(operacao=='+')
			valor = soma(num1,num2);

		else if(operacao=='*')
			valor = multiplicao(num1,num2);

		else if(operacao=='/')
			valor = divisao(num1,num2);

		else if(operacao=='-')
			valor = subtracao(num1,num2);;

		resultado.value = valor;
	}
	
}

function soma(num1,num2){
	return num1+num2;
}
function multiplicao(num1,num2){
	return num1*num2;
}
function divisao(num1,num2){
	return num1/num2;
}
function subtracao(num1,num2){
	return num1-num2;
}