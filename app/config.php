<?php 

	/**
	 * Aplicação Base, defina a aplicação a ser 
	 * chamada primeiro Ex: suaempresa.com/
	 */

	define( 'BASE_APP', 'swphp' );

	/**
	 * Definições de URLs do sistema
	 */

	# Caso o arquivo de configuracao local n exista

	if(!isset($DOMAIN)){
		$DOMAIN = "/swphp";
	}

	# URL base

	define( 'URL', $DOMAIN );

	# Arquivos Publicos 

	define( 'URL_PUBLIC', URL        . '/public' );
	define(    'URL_CSS', URL_PUBLIC . '/css'    );
	define(     'URL_JS', URL_PUBLIC . '/js'     );

	/**
	 * Dedinição de Constantes para
	 * Base de Dados
	 */

	define(       'SGBD', 'mysql');
	define(    'DB_HOST', 'localhost' );
	define(    'DB_USER', 'root' );
	define(    'DB_NAME', 'swphp');
	define( 'DB_CHARSET', 'utf8' );
	
	