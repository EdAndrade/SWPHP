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
		
		/*
		 * Roda o sistema todo
		 */

		public function runSystem()
		{
		
			echo "Rodando o Sistema";
			echo "<br>Aplicacao: ".$this->request->application;
			echo "<br>Controller: ".$this->request->controller;
			echo "<br>Action:     ".$this->request->action;
		}
	}