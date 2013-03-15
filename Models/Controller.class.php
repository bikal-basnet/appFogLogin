<?php
// Controller.class.php
// Created By : Bikal Basnet, 2013-March-14
// This class  contains the controller related functions

class Controller{
	
	 /// <summary>
		///  checks if action variable has been set during the controller call. If the action was set, when the controller page was called,  then invokes the function with the action variable name
        /// </summary>
        /// <param name = "request">array of the request variable</param>        /// <returns></returns>
	
	
	public static function InvokeFunctionAsSetInActionVariable($request)
	{
		
		$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
		$action = ucfirst($action);
		if(is_callable($action))
			$action();
	
	}
}
?>