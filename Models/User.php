<?php
// Student.php
// Created By : Bikal Basnet, 2013-Feb-15
// This class represents the user model
require_once(LOGIN_INFORMATION_CLASS);


class User {
	
		private $id;
		private $email;
		private $password;
		private $first_name;
		private $last_name;
		private $userDAO;
	
		/// <summary>
		///  constructor   
        /// </summary>
        /// <param name = "dao">accepts User Data acess object as param</param>        
        /// <returns></returns>
	
		
	public function __construct($dao = ""){		
		if($dao != "" ) $this->SetUserDAO($dao);	
		if(!session_id()) session_start();
		if(isset($_SESSION["id"])) $this->SetId($_SESSION["id"]);	
	}
	
	
		/// <summary>
		///	checks for the validity of the users account
		///  Checks the email and password against the database to chcek if th eser hasaccount or not 
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
	
	public function HasValidAccount(){				
		$user_dbrecords = $this->userDAO->SelectByEmailNPassword($this);
		
		if($user_dbrecords){
			$this->SetPropertiesFromArray($user_dbrecords);
			return true;			
		}		
		return false;
	}
	
	
		/// <summary>
		///	set the properties from the array into object properties  
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
	
	public function SetPropertiesFromArray($userArray){		
		if(isset($userArray["id"]) && !empty($userArray["id"])) $this->SetId($userArray["id"]);
		$this->SetEmail($userArray["email"]);
		$this->SetPassword($userArray["password"]);
		// if optional properties such as first_name last_name has not beed defined then define them with empty values------
		if(!isset($userArray["first_name"])) $userArray["first_name"] = "";
		if(!isset($userArray["last_name"])) $userArray["last_name"] = "";

		$this->SetFirstName($userArray["first_name"]);
		$this->SetLastName($userArray["last_name"]);				

	}
	
		/// <summary>
		///	handles all necessary activites to be done when the user logs in
		///	actions being storing id in session
		/// recording login details  
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
	
	public function ProcessLogIn(){		
			$this->SetIdInSession();
			$this->RecordLoginDetails();
	}
	
	public function LogOut(){
		session_start();		
		session_destroy();	
		$_SESSION = array();		
	}
		
		/// <summary>
		///	record the login details into the database
		///	</summary>
        /// <param name = ""></param>        
        /// <returns></returns>
	
	private function RecordLoginDetails(){
		$log_in_information = new LoginInformation($this->GetId(),time());
		$this->userDAO->InsertObjectLoginInformation($log_in_information);
	}
	
		/// <summary>
		///	extracts the number of login details from the database
		///	</summary>
        /// <param name = "numOfrecords">number of records to extractt from databse. if  not set exracts all </param>        
        /// <returns>login details in the array format</returns>
	
	
	public function GetLoginDetails($numOfRecords = ""){		
		return $this->userDAO->GetLoginRecords($this, $numOfRecords);		
	}
		/// <summary>
		///	sets the id in session variable  
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
	
	private function SetIdInSession(){		
			if(!session_id()) session_start();			
			$_SESSION["id"]=$this->GetId();
	}

	

	
		/// <summary>
		///  converts the data array into user object
        /// </summary>
        /// <param name = "userArray"> array containing all the user object properties</param>        
        /// <returns>user object</returns>
	
	private static function ExchangeArrayToObject($userArray)
	{

		$user = new User();
		$user->SetPropertiesFromArray($userArray);
/*		if(isset($userArray["id"]) && !empty($userArray["id"])) $user->SetId($userArray["id"]);
		$user->SetEmail($userArray["email"]);
		$user->SetPassword($userArray["password"]);
		// if optional properties such as first_name last_name has not beed defined then define them with empty values------
		if(!isset($userArray["first_name"])) $userArray["first_name"] = "";
		if(!isset($userArray["last_name"])) $userArray["last_name"] = "";

		$user->SetFirstName($userArray["first_name"]);
		$user->SetLastName($userArray["last_name"]);				
*/		return $user;	
		
				
	}
	
	public static function IsLoggedIn(){
		if(!session_id()) session_start();
		if(isset($_SESSION['id']))
			return true;
		return false;
	}
	
		/// <summary>
		///  prepares the object  to be inserted, queried against database. adds security layer to prevent sql injection  and other security measures
        /// </summary>
        /// <param name = "userObject"> object of user class</param>        
        /// <returns>user object</returns>
	
	private static function ExchangeObjectToDbReadyState($user){
		require_once(DATA_SECURITY_CLASS);
		$user->SetEmail(DataSecurity::Sanitise($user->GetEmail(),30));
		$user->SetPassword(DataSecurity::Sanitise(md5($user->GetPassword()),30));
		$user->SetFirstName(DataSecurity::Sanitise($user->GetFirstName(),30));
		$user->SetLastName(DataSecurity::Sanitise($user->GetLastName(),30));
		return $user;
	}
	
		/// <summary>
		///  takes the array and  prepares it as object that has been readied for db operations. security layers for db attacks will be added to the data
        /// </summary>
        /// <param name = "userArray">  array that is to be converted into object</param>        
        /// <returns>user object</returns>
	
	public static function ExchangeArrayToDbReadyObject($userArray){

		$user = self::ExchangeArrayToObject($userArray);
		$user = self::ExchangeObjectToDbReadyState($user);
		return $user;
	}
	
		/// <summary>
		///  inserts the array to the database. first transforms the array to object then add security layer to the object and then insert to the data
        /// </summary>
        /// <param name = "userArray"> array containing properties, that is to be inserted in the user class</param>        
        /// <param name = "userDAO">user data acces object that is  then used  to insert the user object into the database</param>        
        /// <returns>true if user sucessfuly added, false, if email already exists</returns>
		
	public static function InsertToDb($userArray,$userDAO){
		$user = self::ExchangeArrayToDbReadyObject($userArray);		
		$user_dbrecords = $userDAO->SelectByEmail($user);		
		if(!$user_dbrecords){
			$userDAO->Insert($user);
			return true;			
		}		
		return false;
	}
	
	//----------------------------------------------- setter and getter functions starts------------------------
	
	public function SetUserDAO($dao){ $this->userDAO = $dao;	}

	public function GetUserDAO(){	return $this->userDAO;	}

	public function SetFirstName($first_name){ $this->first_name = $first_name;	}

	public function GetFirstName(){	return $this->first_name ;	}
			
	public function SetId($id){	$this->id = $id;	}

	public function GetId(){	return $this->id ;	}
	
	public function SetLastName($last_name){	$this->last_name = $last_name;		}

	public function GetLastName(){	return $this->last_name ;		}

	public function SetEmail($email){	$this->email = $email;		}

	public function GetEmail(){	return $this->email ;		}
	
	public function SetPassword($password){	$this->password = $password;		}

	public function GetPassword(){	return $this->password ;		}

	//************************************************ setter and getter function closes ************************ 

}
