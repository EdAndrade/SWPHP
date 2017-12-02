<?php 

	/**
	 * 
	 */

	class Error404Controller extends \SWPHP\System\Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/**
		 * 
		 */

		public function indexAction()
		{
			echo "erro404";
		}
	}