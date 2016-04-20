<?php

$website = 'http://projects-gabrieldesousah.c9.io/';

    if(isset($_GET["code"])){
    	
    	$code = $_GET["code"];
    	header('location: '.$website.'auth/loginSocial/code/'.$code);
    
    }elseif(isset($_GET["search"])){
    	
    	$key = $_GET["search"];
    	header('location: '.$website.'search/material/key/'.$key);
    
    }
    