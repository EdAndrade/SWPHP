<?php 

	/**
	 * 
	 */

	class IndexController extends \SWPHP\System\Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/**
		 * Action principal.
		 *                   Dominio -> App -> Controller -> Action
		 * chamada pela url: empresa.com/ 
		 *                   empresa.com/swphp
		 *                   empresa.com/swphp/index
		 *                   empresa.com/swphp/index/index
		 */

		public function indexAction()
		{
			/**
			 * Informações base para o <head> </head>
			 */
			$this->view->setTitulo("SWPHP");
			$this->view->setDescricao("Mini Framework MVC PHP para desenvolvimento de Websites de forma simples, rápida, com funções em português e um Painel de Administração.");

			/**
			 * Arquivos
			 */

			// CSS
			$this->view->setArquivosCss(
				array(
					'swphp/base/base'
				)
			);

			/**
			 * Renderizando view
			 * >>> render( view, applicacao = BASE_APP, header = false, footer = false )
			 */

			$this->view->render( 'index/index', 'swphp', 'swheader', 'swfooter' );
		}
	}