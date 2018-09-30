<?php

require_once("config.php");

//$user = new Usuario();
//$user->loadById(2);
//echo $user

//$users = Usuario::getList();
//echo json_encode($users);

//$usuarioBuscado = Usuario::search("jose");
//echo json_encode($usuarioBuscado);

$usuario = new Usuario();
$usuario->login("thiago", "!@#$%");
echo $usuario;

?>