<?php
// LoginInformation.php
// Created By : Bikal Basnet, 2013-March-14
// This class represents the login information 

class LoginInformation {
	
		private $user_id;
		private $logged_in_time;
	
		/// <summary>
		///  constructor   
        /// </summary>
        /// <param name = "user_id">id of the user who has logged in</param>        
        /// <param name = "logged_in_time">timestamp: date and time at which the user logged in</param>        
		/// <returns></returns>
	
		
	public function __construct($user_id = "",$logged_in_time = ""){
		if($user_id != "" ) $this->SetUserId($user_id);
		if($user_id != "" ) $this->SetLoggedInTime($logged_in_time);		
	}
		
		//----------------------------------------------- setter and getter functions starts------------------------
	
	public function SetUserId($user_id){ $this->user_id = $user_id;	}

	public function GetUserId(){	return $this->user_id;	}

	public function SetLoggedInTime($logged_in_time){ $this->logged_in_time = $logged_in_time;	}

	public function GetLoggedInTime(){	return $this->logged_in_time ;	}

	//************************************************ setter and getter function closes ************************ 

}
