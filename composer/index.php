<?php

require_once("vendor/autoload.php");

use Rain\Tpl;

$config = array(
	"tpl_dir"	=> "tpl/",
	"cache_dir"	=> "cache/"
);

Tpl::configure( $config );

$tpl = new Tpl;

// assign a variable
$tpl->assign( "name", "Obi Wan Kenoby" );

// assign an array
//$tpl->assign( "week", array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ) );

$tpl->draw( "index" );

?>