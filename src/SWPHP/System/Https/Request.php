<?php 
	
	namespace SWPHP\System\Https;
 
	use \SWPHP\System\Tools\Strings;
	
	/**
	*  Faz a requizição da url e a trata!
	*/

	class Request
	{
		/**
	     * Atributos principais
	     * @var null
	     */

		public  $application = BASE_APP;
		public  $controller  = 'IndexController';
		public  $action      = 'indexAction';
		public  $params      = [];

		function __construct()
		{
			$this->runRequest();
		}

		/**
		 * Faz o tratamento da url e atribui os valores aos parametros
		 */

		public function runRequest()
		{
			$url = ($_GET['url']) ? $_GET['url'] : null;

			$url = array_values(array_filter(explode( '/' , $url )));

			/**
			 * 
			 */

			$applicationDir = DIR_APP . 'apps' . DS . $url[0];

			if( file_exists($applicationDir) and !empty($url) ){ // Dir da Aplicacao

				$this->application = $url[0];

				if(isset($url[1])){ // Pegando o Controller
					$this->controller = ucfirst(Strings::urlStrReplace($url[1])) . 'Controller';
				}
				if(isset($url[2])){ // Pegando a Action
					$this->action     = lcfirst(Strings::urlStrReplace($url[2])) . 'Action';
				}

				unset( $url[0], $url[1], $url[2] );
			}

			$this->params = array_values($url);

		}

	}