<?php
// +----------------------------------------------------------------------+
// | BoletoPhp by Thiago Melo                                             |
// +----------------------------------------------------------------------+

// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÂO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = $_POST["inputDiasDePrazoParaPagamento"]; 		//5;
$taxa_boleto = $_POST["inputTaxaBoleto"]; 										//2.95;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  	// Prazo de X dias OU informe data: "13/04/2006"; 
$valor_cobrado = $_POST["inputValorCobrado"]; 									//"2950,00"; Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = $_POST["inputNossoNumero"];       	//'12345678' Nosso numero - REGRA: Máximo de 8 caracteres!
$dadosboleto["numero_documento"] = $_POST["inputNumeroDocumento"]; 	//'0123' Num do pedido ou nosso numero
$dadosboleto["data_vencimento"] = $data_venc; 						// Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); 					// Data de emissâo do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); 				// Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 						// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $_POST["inputNomeDoCliente"];												//"Nome do seu Cliente";
$dadosboleto["endereco1"] = $_POST["inputEnderecoDoCliente"];										//"Endereço do seu Cliente";
$dadosboleto["endereco2"] = $_POST["inlineCidadeEstadoSelect"] . "- CEP: " . $_POST["inputCEP"]; 	//"Cidade - Estado -  CEP: 00000-000";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = $_POST["inputDemonstrativo1"]; //"Pagamento de Compra na Loja Nonononono";
$dadosboleto["demonstrativo2"] = $_POST["inputDemonstrativo2"] . "<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "Boleto AlSharad - http://alsharad.000webhostapp.com";
$dadosboleto["instrucoes1"] = $_POST["inputDemonstrativo1"];
$dadosboleto["instrucoes2"] = $_POST["inputDemonstrativo2"];
$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: thiagomelo@edu.unifor.br";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Boleto AlSharad -  http://alsharad.000webhostapp.com";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - ITAÚ
$dadosboleto["agencia"] = "1565"; 	// Num da agencia, sem digito
$dadosboleto["conta"] = "13877";	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "4"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - ITAÚ
$dadosboleto["carteira"] = "175";  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157

// SEUS DADOS
$dadosboleto["identificacao"] = "Boleto AlSharad";
$dadosboleto["cpf_cnpj"] = "";
$dadosboleto["endereco"] = "Coloque o endereço da sua empresa aqui";
$dadosboleto["cidade_uf"] = "Fortaleza / CE";
$dadosboleto["cedente"] = "Coloque a Razão Social da sua empresa aqui";

// NÃO ALTERAR!
include("include/funcoes_itau.php"); 
include("include/layout_itau.php");
?>
