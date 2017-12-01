<?php 
	
	namespace SWPHP\System;

	use \SWPHP\System\Https\Request;

	/**
	 * 
	 */

	class App 
	{
		/**
	     * Injeção do Request
	     * @var object
	     */
	    public $request;

	    /**
	     * Injeção do Response
	     * @var object
	     */
	    public $response;

	    /**
	     * Método Construtor
	     */
	    public function __construct()
	    {
	        $this->request = new Request;
	    }
		
		/**
		 * Roda o sistema todo
		 */

		public function runSystem()
		{
		
			/**
			 * Pegando a url request
			 */

			$application         = $this->request->application;
			$controller          = $this->request->controller;
			$action              = $this->request->action;

			// Erro de request
			$applicationNotFound = 'error';
			$controllerNotFound  = 'Error404Controller';

			/**
			 * Arquivos e pastas
			 */

			$applicationDir          = DIR_APP . 'apps' .DS. $application;
			$controllerFile          = DIR_APP . 'apps' .DS. $application .DS. $controller . '.php';
			$controllerNotFoundFile  = DIR_APP . 'apps' .DS. 'error' .DS. $controllerNotFound . '.php';

			// Verificando a existencia da aplicacao
			//if(!file_exists($applicationDir)){
			//	$application = $applicationNotFound;
			//}

			// Verificando a exitencia do controler
			if(!file_exists($controllerFile)){
				$controllerFile  = $controllerNotFoundFile;
			}

			// Requisicao do controler
			require_once($controllerFile);

			// Verificando se a class existe
			if( !class_exists($controller) ){
				require_once($controllerNotFoundFile);

				$controller = $controllerNotFound;
			}

			$Controller = new $controller; // Instaciando o controller, ATT: C maiuscolo no nome da variavel $Controller

			// Verifica se a action nao existe
			if( !method_exists($Controller, $action) ){
				$action = 'indexAction';
			}

			/**
			 * Chamando a action e passando os parametros
			 */

			call_user_func_array([ $Controller, $action ], $this->request->params );
		}
	}