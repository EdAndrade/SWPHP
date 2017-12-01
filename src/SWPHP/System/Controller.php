<?php 

	namespace SWPHP\System;

	use \SWPHP\System\View;
	
	/**
	 * Controller mae
	 */

	class Controller
	{
		/**
		 * View 
		 * @var object
		 */

		public $view;
		
		function __construct()
		{
			$this->view = new View;
		}

	}