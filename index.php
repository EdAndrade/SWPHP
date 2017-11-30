<?php 

	// TIMEZONE
	 	
	date_default_timezone_set('Africa/Luanda');
	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

	// DIRETORIOS BASE DO SISTEMA
	define( 'DS',       DIRECTORY_SEPARATOR    );   // Separador de diretorios
	define( 'DIR_ROOT', dirname(__FILE__) . DS );   // Diretorio base da App
	define( 'DIR_APP',  DIR_ROOT . 'app' . DS  );   // Diretorio da pasta app

	// SYS VERSION
	define( 'SWPHP_VERSION', '1.0.0' );

	// PROJETO CONFIGURAÇÕES DO SISTEMA
	require('app/conf_system.php');

	// AUTOLOAD DO COMPOSER
	$fileAutoad = DIR_ROOT. 'vendor' .DS. 'autoload.php';

	if(!file_exists($fileAutoad)){
		die('Autoload não instalado!');
	}

	require($fileAutoad);

	// RODANDO O SISTEMA
	$App = new \SWPHP\System\App;

	$App->rodaSistema();