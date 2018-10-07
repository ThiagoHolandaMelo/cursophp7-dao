<?php

require_once("config.php");

//$user = new Usuario();
//$user->loadById(2);
//echo $user

//$users = Usuario::getList();
//echo json_encode($users);

//$usuarioBuscado = Usuario::search("jose");
//echo json_encode($usuarioBuscado);

//$usuario = new Usuario();
//$usuario->login("thiago", "!@#$%");
//echo $usuario;

//$userNovo = new Usuario("Thiago Novo","123456");
//$userNovo->insert();

/*
$userAlterado = new Usuario();
$userAlterado->loadById(6);
$userAlterado->update("Thiago Vei", "123456");
*/

/*
$userAlterado = new Usuario();
$userAlterado->loadById(6);
$userAlterado->delete();
*/

?>


<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<style type="text/css">
	fieldset { 
		display: block;
		margin-left: 2px;
		margin-right: 2px;
		padding-top: 0.35em;
		padding-bottom: 0.625em;
		padding-left: 0.75em;
		padding-right: 0.75em;
		border: 2px solid #ccc;		
	}	
	fieldset legend { 
		padding: 0 10px 5px 0;   /*padding: 0 20px;*/
		width: auto;
		
	}
  </style>
</head>

<div class="jumbotron text-center">
	<h1>Gerador de Boleto by Thiago Melo</h1>
	<p>Boleto AlSharad</p> 
</div>
	
<div class="container">	

	<form action="./boletoPHP/boleto_itau.php" method="post">
		
		<!--DADOS DO SEU CLIENTE-->
		<fieldset>
			<legend>Dados do seu cliente</legend>
			
			<div class="form-group row">
				<label for="inputNomeDoCliente" class="col-2 col-form-label">Nome do cliente</label>
				<div class="col-10">
					<input id="inputNomeDoCliente" name="inputNomeDoCliente" class="form-control" type="text" aria-describedby="nomeDoClienteHelp" placeholder="Inserir nome do cliente" value="" >
					<small id="nomeDoClienteHelp" class="form-text text-muted">Help do campo</small>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputEnderecoDoCliente" class="col-2 col-form-label">Endereço do cliente</label>
				<div class="col-10">
					<input id="inputEnderecoDoCliente" name="inputEnderecoDoCliente" class="form-control" type="text" aria-describedby="enderecoDoClienteHelp" placeholder="Inserir endereço completo do cliente" value="" >
					<small id="enderecoDoClienteHelp" class="form-text text-muted">Help do campo</small>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputCidade" class="col-2 col-form-label">Cidade/Estado</label>
				<div class="col-10">
					<select id="inlineCidadeEstadoSelect" name="inlineCidadeEstadoSelect" class="custom-select mb-2 mr-sm-2 mb-sm-0" >
						<option value="Fortaleza - CE" selected>Fortaleza - CE</option>
						<option value="Caucaia - CE">Caucaia - CE</option>					
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputCEP" class="col-2 col-form-label">CEP</label>
				<div class="col-10">
					<input id="inputCEP" name="inputCEP" class="form-control" type="text" aria-describedby="CEPHelp" placeholder="Inserir CEP do cliente" value="" >
					<small id="CEPHelp" class="form-text text-muted">Help do campo</small>
				</div>
			</div>	
			
		</fieldset>

		<br>		
		
		<!--DADOS DO BOLETO PARA O SEU CLIENTE-->
		<fieldset>
			<legend>Dados do boleto para o seu cliente</legend>
			
			<div class="form-group row">
				<label for="inputDiasDePrazoParaPagamento" class="col-2 col-form-label">Dias de prazo para pagamento</label>
				<div class="col-10">
					<select id="inputDiasDePrazoParaPagamento" name="inputDiasDePrazoParaPagamento" class="custom-select mb-2 mr-sm-2 mb-sm-0" >
						<option value="1" selected>1</option>
						<option value="2">2</option>
						<option value="3">3</option>						
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputTaxaBoleto" class="col-2 col-form-label">Taxa do boleto</label>
				<div class="col-10">
					<input id="inputTaxaBoleto" name="inputTaxaBoleto" class="form-control" type="number" value="2.95" >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputValorCobrado" class="col-2 col-form-label">Valor cobrado</label>
				<div class="col-10">
					<input id="inputValorCobrado" name="inputValorCobrado" class="form-control" type="number" value="2950.00" >
				</div>
			</div>	
			
			<div class="form-group row">
				<label for="inputNossoNumero" class="col-2 col-form-label">Nosso número</label>
				<div class="col-10">
					<input id="inputNossoNumero" name="inputNossoNumero" class="form-control" type="number" value="" >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputNumeroDocumento" class="col-2 col-form-label">Número documento</label>
				<div class="col-10">
					<input id="inputNumeroDocumento" name="inputNumeroDocumento" class="form-control" type="number" value="" >
				</div>
			</div>
			
		</fieldset>
		
		<br>
		
		<!--INFORMAÇÕES PARA O CLIENTE-->
		<fieldset>
			<legend>Informações para o cliente</legend>
			
			<div class="form-group row">
				<label for="inputDemonstrativo1" class="col-2 col-form-label">Demonstrativo 1</label>
				<div class="col-10">
					<input id="inputDemonstrativo1" name="inputDemonstrativo1" class="form-control" type="text" placeholder="Pagamento de Compra na Loja ..." value="Pagamento de Compra na Loja ..." >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputDemonstrativo2" class="col-2 col-form-label">Demonstrativo 2</label>
				<div class="col-10">
					<input id="inputDemonstrativo2" name="inputDemonstrativo2" class="form-control" type="text" placeholder="Mensalidade referente a ..." value="Mensalidade referente a ..." >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputInstrucoes1" class="col-2 col-form-label">Instruções 1</label>
				<div class="col-10">
					<input id="inputInstrucoes1" name="inputInstrucoes1" class="form-control" type="text" placeholder="- Sr. Caixa, cobrar multa de 2% após o vencimento" value="- Sr. Caixa, cobrar multa de 2% após o vencimento" >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputDemonstrativo2" class="col-2 col-form-label">Instruções 2</label>
				<div class="col-10">
					<input id="inputDemonstrativo2" name="inputDemonstrativo2" class="form-control" type="text" placeholder="- Receber até 10 dias após o vencimento" value="- Receber até 10 dias após o vencimento" >
				</div>
			</div>
			
		</fieldset>
		
		<br>
		
		<!--DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE-->
		<fieldset>
			<legend>Dados opcionais de acordo com o banco ou cliente</legend>
		
			<div class="form-group row">
				<label for="inputQuantidade" class="col-2 col-form-label">Quantidade</label>
				<div class="col-10">
					<input id="inputQuantidade" name="inputQuantidade" class="form-control" type="number" value="" >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputValorUnitario" class="col-2 col-form-label">Valor unitário</label>
				<div class="col-10">
					<input id="inputValorUnitario" name="inputValorUnitario" class="form-control" type="number" value="" >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputAceite" class="col-2 col-form-label">Aceite</label>
				<div class="col-10">
					<input id="inputAceite" name="inputAceite" class="form-control" type="number" value="" >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputEspecie" class="col-2 col-form-label">Especie</label>
				<div class="col-10">
					<input id="inputAceite" name="inputAceite" class="form-control" type="number" placeholder="R$" value="R$" >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="inputEspecieDoc" class="col-2 col-form-label">Especie Doc</label>
				<div class="col-10">
					<input id="inputEspecieDoc" name="inputEspecieDoc" class="form-control" type="number" value="" >
				</div>
			</div>
			
		</fieldset>
		
		<br>
	 
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
</html>