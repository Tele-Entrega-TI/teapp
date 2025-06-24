<?php

namespace Core;

class Enviroment {
    public function __construct(){

    }

    public static function load($dir) {

    	if (!file_exists($dir.'/.env')) {
    		return false;
    	}
    	
    	$linhas = file($dir.'/.env');

    	foreach($linhas as $linha){
    		putenv(trim($linha));
    	}

    }
}