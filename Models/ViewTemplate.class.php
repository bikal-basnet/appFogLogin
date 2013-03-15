<?php
// ViewTemplate.php
// Created By : Bikal Basnet, 2013-March-13
// This class is a wrapper class that sets the Template  configuration.
// Rational  : wrapping the configuration prevents the need to configure smarty in each and every page. 
require_once(SMARTY_CONFIG_PHP);

class View{
		
		//  view_files_dir holds the .tpl files
		private $view_files_dir =  VIEW_DIRECTORY ;
		
		private $smarty;
		
	    /// <summary>
		///  loads smarty class, assigns the template directory, cache directory, config diectory, and temp template directory for the Smarty View Engine. 
        /// </summary>
        /// <param name = ""> null| string if a template directory path other than the default is desired then it  can be provided  during the instantiation  </param>        
        /// <returns></returns>
		
	public function __construct($view_directory_path = null){
		$this->LoadSmartyLibrary();
		$this->InstantiateNInitialiseSmartyDirectory();	
		if(!is_null($view_directory_path))
			$this->SetViewDirectory($view_directory_path);
		//var_dump($this->smarty->getTemplateDir());
			
	}
	
		/// <summary>
		///  load the smarty templating engine library 
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
	
	private function LoadSmartyLibrary(){		
			require_once(SITE_ROOT.SMARTY_LIBRARY_PATH."/Smarty.class.php");
		
		}
		
	
	
		/// <summary>
		///  create smarty view object and load the Smarty directory configuration
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
	
	private function InstantiateNInitialiseSmartyDirectory(){		
		
		$this->smarty = new Smarty;
		
		// common layout is placed in the separate folder other than the general template located file. hence the location where common shared template files are located has to be added to the template directory 
		$this->AddViewDirectory(SHARED_TEMPLATE_FILE_LOCATION);
		
		
		// add the location which stores the template file to the template directory
		$this->AddViewDirectory(SITE_ROOT.$this->view_files_dir);
		
			
		$this->smarty->config_dir = SITE_ROOT.VIEW_CONFIG_DIR ;
		$this->smarty->cache_dir = SITE_ROOT.VIEW_CACHE_DIR;
		$this->smarty->compile_dir = SITE_ROOT.VIEW_COMPILE_DIR;
		
		$this->smarty->compile_check = true;
		
	
				
		}
	
	    /// <summary>
		///  return the View Engine Object 
        /// </summary>
        /// <param name = ""></param>        
        /// <returns>Smarty view Engine Object</returns>
	
	public function GetView(){		
			return $this->smarty;
		
		}
		
	    /// <summary>
		///  set the  location  of the view directory to desired location
        /// </summary>
        /// <param name = "template_directory">template directory with respect to the root directory location path</param>        /// <returns></returns>
	
	public function SetViewDirectory( $template_directory){
		$this->AddViewDirectory(SITE_ROOT.$template_directory);	
		

		}
		
		/// <summary>
		///  declare that the folder holds the smarty template files. so that when template file is to be displayed, the folder is searched for the presence of the particlar  template file
        /// </summary>
        /// <param name = "template_directory">template directory with respect to the root directory location path</param>        /// <returns></returns>
	
	public function AddViewDirectory( $template_directory){
		$this->smarty->addTemplateDir($template_directory );
		
	}
		
	
	
}




?>