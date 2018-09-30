<?php

spl_autoload_register(function($nameClass){
    
    $dirClass = "class";
    $dirDAO = "DAO";
    
    $filename = $nameClass . ".php";
    $filenameClass = $dirClass . DIRECTORY_SEPARATOR . $nameClass . ".php";
    
    if( file_exists($filename) ){
        
        require_once($filename);
        return;
    }
    
    if( file_exists($filenameClass) ){
        
        require_once($filenameClass);
        return;
    }
        
});

?>