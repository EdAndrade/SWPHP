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
			echo "Action";
		}
	}