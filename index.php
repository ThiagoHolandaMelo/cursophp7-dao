<?php

require_once("config.php");

//$user = new Usuario();
//$user->loadById(2);
//echo $user
//testestestestes
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

$userAlterado = new Usuario();
$userAlterado->loadById(6);
$userAlterado->delete();

?>
