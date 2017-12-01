<?php 

	/**
	 * Aplicação Base, defina a aplicação a ser 
	 * chamada primeiro Ex: suaempresa.com/
	 */

	define( 'BASE_APP', 'swphp' );

	/**
	 * Definições de URLs do sistema
	 */

	if(!isset($DOMAIN)){
		$DOMAIN = "/swphp";
	}

	define( 'URL', $DOMAIN );

	/**
	 * Dedinição de Constantes para
	 * Base de Dados
	 */

	define(       'SGBD', 'mysql');
	define(    'DB_HOST', 'localhost' );
	define(    'DB_USER', 'root' );
	define(    'DB_NAME', 'swphp');
	define( 'DB_CHARSET', 'utf8' );
	
	