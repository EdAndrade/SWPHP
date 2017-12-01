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

		public function render( string $application = 'SmartWeb', string $view, $header = false, $footer = false )
		{
			// Set Application and View
			$this->setApplication($application);
			$this->setView($view);

			// Take header and footer if isset
			if($header){
				$this->setHeader($header);
			}
			if($footer){
				$this->setFooter($footer);
			}

			// set view dir
			$viewDir = DIR_APP . 'views' . DS;

			if( !$this->getHeader() and !$this->getFooter() ){

				// Renderiza somente a view
				require_once( $viewDir . $this->getApplication() .DS.  $this->getView() . '.phtml' );

			}elseif( $this->getHeader() and $this->getFooter() ){

				// Renderiza a view com o header e o footer
				require_once( $viewDir . $this->getHeader() . '.phtml' );
				require_once( $viewDir . $this->getApplication() .DS.  $this->getView() . '.phtml' );
				require_once( $viewDir . $this->getFooter() . '.phtml' );

			}elseif( $this->getHeader() ){

				// Renderiza a view so com o header
				require_once( $viewDir . $this->getHeader() . '.phtml' );
				require_once( $viewDir . $this->getApplication() .DS.  $this->getView() . '.phtml' );

			}else{

				// renderiza a view so com o footer
				require_once( $viewDir . $this->getApplication() .DS.  $this->getView() . '.phtml' );
				require_once( $viewDir . $this->getFooter() . '.phtml' );

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
				die("Arquivo: ".$fileDir.".phtml <> Não existe!");
			}
		}

		/**
		 * Setters e getters 
		 * Titulo da pagina
		 */

		public function setTitle( string $title ) 
		{
			$this->title = $title;
		}

		public function getTitle(): string
		{
			return $this->title;
		}

		/**
		 * Arquivos CSS
		 */

		public function setFilesCss( array $files )
		{
			$this->filesCss = $files;
		}

		public function getFilesCss( string $url )
		{
			if($this->filesCss){
				foreach( $this->filesCss as $file ){
					echo '<link rel="stylesheet" type="text/css" href="'.$url.'/'.$file.'.css">' . "\n\r";
				}
			}
		}

		/**
		 * Descricao da pagina
		 */

		public function setDescription( string $description )
		{
			$this->description = $description;
		}

		public function getDescription(): string
		{
			return $this->description;
		}

		/**
		 * Arquivos Jscript
		 */

		public function setFilesJs( array $files )
		{
			$this->filesJs = $files;
		}

		public function getFilesJs( string $url )
		{
			if($this->filesJs){
				foreach( $this->filesJs as $file ){
					echo '<script type="text/javascript" src="'.$url.'/'.$file.'.js"></script>' . "\n\r";
				}
			}
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
	