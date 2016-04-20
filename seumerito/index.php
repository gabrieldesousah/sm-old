<?php
    
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    
    define( 'URL' , 'http://projects-gabrieldesousah.c9.io/');
    
    define( 'ROOT' , '/seumerito/'); //Alterar o caminho
    
    define( '_GET' , URL . ROOT . '_get.php'); //Alterar o caminho
    
    define( 'TEMPLATE', 'spot/'); //Alterar o nome do template
    
    define( 'PATH_DOCUMENT', $_SERVER['DOCUMENT_ROOT']. ROOT );
    
    define( 'CONTROLLERS', 'app/controllers/' );
    
    define( 'VIEWS', 'app/views/'.TEMPLATE );
    define( 'MODELS', 'app/models/' );
    define( 'HELPERS', 'system/helpers/' );
    
    define( 'PATH_STYLE' , ROOT.'app/views/'.TEMPLATE);

    require_once('system/system.php');
    require_once('system/controller.php');
    require_once('system/model.php');
    
    
    
    function __autoload( $file ){
        if( file_exists(MODELS . $file . '.php') ){
            require_once(MODELS . $file . '.php');
        } else if( file_exists( HELPERS . $file . '.php') ){
            require_once( HELPERS . $file . '.php');
        } else {
            die("Model ou Helper não encontrado");
        }
    }
    
    $start = new System;
    $start->run();