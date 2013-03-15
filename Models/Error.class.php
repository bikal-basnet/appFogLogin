<?php
// Error.class.php
// Created By : Bikal Basnet, 2013-March-14
// This file conttains error hanlding function and exception handler.

//require_once("../App_Config/config.php");
//require_once "Log.php";

		/// <summary>
		///  this function handles the errors. Errors being ones which are less severe and may have recovery mechanism, without letting users know about the failure
        /// </summary>
        /// <param name = ""> </param>        
        /// <returns> </returns>

function CriticalError($errno = E_ERROR , $errstr= "")
  {
		// logging currently disable due to the pear log repository unavailability on appFog
		// TO DO Extension : find logging on appFog and restore error logging 
		echo 'Critical_Errors.log', 'Critical : '.$errno." : ".$errstr;

//		$file = Log::factory('file', 'Critical_Errors.log', 'Critical : '.$errno." : ".$errstr);	
//		$file->log($errstr,PEAR_LOG_EMERG);
		
	/*	header('Location: error_page.php');
		exit;
  /**/
  }
  
  function void(){};



class Error 
{
	
		/// <summary>
		///  all the exeptions that requires termination of script and displaying erro page is handles with this static function
        /// </summary>
        /// <param > </param>        
        /// <returns> </returns>
		
	public static function Handle_Exception(Exception $ex){
		echo $ex;
		exit;
		$file = Log::factory('file', 'Critical_Exceptions.log', 'Critical');			
		$file->log($ex,PEAR_LOG_EMERG);
		
		header('Location: error_page.php');
		exit;
  
	}
}

?>