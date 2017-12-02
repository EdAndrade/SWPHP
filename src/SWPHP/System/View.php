<?php 
	
	namespace SWPHP\System;

	/**
	 * View mae
	 * Controlo de toda a informacao para o usuario
	 */

	class View 
	{
		/**
		 * Atributos com info base para views
		 * @var string 
		 */

		protected $title;
		protected $filesJs;
		protected $filesCss;
		protected $description;
		protected $data;  // Dados dos Models para views 

		/**
		 * Atributos de arquivos para views
		 * @var string 
		 */

		protected $application;
		protected $header      = false;
		protected $footer      = false;

		/**
		 * Base views
		 * @var string
		 */

		private $view; 

		function __construct()
		{
			//echo "eu view Fui instanciada <br>";
		}

		/**
		 * Renderiza as views
		 */

		public function render( string $view,  string $application = BASE_APP, $header = false, $footer = false )
		{
			$viewsDir = DIR_APP . 'views' . DS;

			/**
			 * Set data
			 */

			$this->setView($view);    $this->setHeader($header);           
			$this->setFooter($footer); $this->setApplication($application);

			/**
			 * File dirs
			 */

			$applicationDir = $viewsDir . $this->getApplication();
			$viewFile       = $viewsDir . $this->getApplication() . DS . $this->getView() .".phtml";
			$headerFile		= $viewsDir . $this->getHeader() .".phtml";
			$footerFile		= $viewsDir . $this->getFooter() .".phtml";

			// Verificando a App
			if(!file_exists($applicationDir)){
				die("<h4> { ERRO de VIEW } <> Aplicação: ". $this->getApplication() ." -> Não instalada! </h4>");
			}

			// Chamando header
			if(file_exists($headerFile)){
				require($headerFile);
			}

			// Chamando a view principal
			if(file_exists($viewFile)){
				require($viewFile);
			}else{
				die("<h4> { ERRO de VIEW } <> Arquivo: ". $viewFile .".phtml -> Não encontrado! </h4>");
			}

			// Chamando footer
			if(file_exists($footerFile)){
				require($footerFile);
			}


		}

		/**
		 * Inclui views pequenas como, menus, slide, sides etc
		 * Todos os includes devem estar na pasta include por padrao
		 */

		public function include( string $file, array $dados = [] )
		{
			$fileDir = DIR_APP . 'views' .DS. '_includes' .DS. $file . '.phtml';  

			if( file_exists($fileDir) ){
				include($fileDir);
			}else{
				die("<h4> { ERRO de INCLUDE } Arquivo: ".$fileDir.".phtml -> Não existe! </h4>");
			}
		}

		/**
		 * Arquivos JS
		 */

		public function setArquivosJs( array $files )
		{
			$this->filesJs = $files;
		}

		public function getArquivosJs( string $url )
		{
			if($this->filesJs){
				foreach( $this->filesJs as $file ){
					echo '<script type="text/javascript" src="'.$url.'/'.$file.'.js"></script>' . "\n\r";
				}
			}
		}

		/**
		 * Arquivos CSS
		 */

		public function setArquivosCss( array $files )
		{
			$this->filesCss = $files;
		}

		public function getArquivosCss( string $url )
		{
			if($this->filesCss){
				foreach( $this->filesCss as $file ){
					echo '<link rel="stylesheet" type="text/css" href="'.$url.'/'.$file.'.css">' . "\n\r";
				}
			}
		}

		/**
		 * Setters e getters 
		 */

		public function setTitulo( string $title ) 
		{
			$this->title = $title;
		}

		public function getTitulo(): string
		{
			return $this->title;
		}



		/**
		 * Descricao da pagina
		 */

		public function setDescricao( string $description )
		{
			$this->description = $description;
		}

		public function getDescricao(): string
		{
			return $this->description;
		}

		/**
		 *  Application
		 */

		public function setApplication( string $application )
		{
			$this->application = $application;
		}

		public function getApplication(): string
		{
			return $this->application;
		}

		/**
		 *  header
		 */

		public function setHeader( string $header )
		{
			$this->header = $header;
		}

		public function getHeader(): string 
		{
			return $this->header;
		}

		/**
		 *  View
		 */

		public function setView( string $view )
		{
			$this->view = $view;
		}

		public function getView(): string 
		{
			return $this->view;
		}

		/**
		 *  footer
		 */

		public function setFooter( string $footer )
		{
			$this->footer = $footer;
		}

		public function getFooter(): string 
		{
			return $this->footer;
		}

		/**
		 * Dados dos models para views
		 */

		public function setData( $data )
		{
			$this->data = $data;
		}

		public function getData()
		{
			return $this->data;
		}

	}
	