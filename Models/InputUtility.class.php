<?php
// Input.php
// Created By : Bikal Basnet, 2013-March-14
// This class is used for the server side validation of the user Inputs


class Input {
	
		private static $instance;
		private $is_valid = true;
		private $error_messages;	

	  private function __construct(){}

	  public static function getInstance()
	  {
		if ( is_null( self::$instance ) )
		{
		  self::$instance = new self();
		}
		return self::$instance;
	  }

  
		
		/// <summary>
		/// server side validation for the email input. check if the input is valid email or not 
        /// </summary>
        /// <param name = "email">email that is to be validated</param>        
        /// <param name = "error_message">array containing custom error messages
		///					e.g $error_message['required'] = "custome email required message"
		///					e.g $error_message['invalid_email'] = "invalid email entered"
		///					</param>        
        /// <returns> void </returns>

	
	
	public function IsEmailValid($email,$error_message = ""){		
		if(trim($email) == "")
		{			
			$this->error_messages["email"] = isset($error_message['required']) ? $error_message['required'] : "Please enter your email" ;
			$this->is_valid = false;
			//// contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/ from jquery
		}elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/",$email)){			
			$this->error_messages["email"] = isset($error_message['invalid_email']) ? $error_message['invalid_email'] : "Please enter a valid email address" ;
			$this->is_valid = false;			
		}	
		
	}
	
		/// <summary>
		/// server side validation for the password. Password should contain at least one uppoercase, one lowecase and one digit  and should have min length of 6 and max length of 20
        /// </summary>
        /// <param name = "password">password that is to be validated</param>        
        /// <param name = "error_message">array containing custom error messages
		///					e.g $error_message['required'] = "custome password required message"
		///					e.g $error_message['invalid_password'] = "invalid pasword entered"
		///					</param>        
        /// <returns> void </returns>

	
	
	public function IsPasswordValid($password,$error_message = ""){		
		if(trim($password) == "")
		{			
			$this->error_messages["password"] = isset($error_message['required']) ? $error_message['required'] : "Please enter your password" ;
			$this->is_valid = false;
		}elseif(!preg_match("/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})$/",$password)){			
			$this->error_messages["password"] = isset($error_message['invalid_password']) ? $error_message['invalid_password'] : "Please enter a valid password containing at least one uppercase, one lowercase and a digit with minimum 6  and maximum 20 characters." ;
			$this->is_valid = false;			
		}	
		
	}
	
		/// <summary>
		/// checks if the password provided mathces with each other or not
        /// </summary>
        /// <param name = "password">password that is to be compared for equality </param>
		/// <param name = "confirm_password">password that is to be compared for equality </param>        
        /// <param name = "error_message">STRING : custom error message to be displayed when passsword does not mathc each other
		///					</param>        
        /// <returns> void </returns>
	
	public function DoesPasswordMatch($password, $confirm_password,$error_message=""){
		if($password != $confirm_password)
		{			
			$this->error_messages["password"] = ($error_message != "") ? $error_message : "The password and confirm password doesnot match." ;
			$this->is_valid = false;
		}
	}
	
		/// returns all the error messages in an array
        /// </summary>
        /// <param ></param>        
        /// <returns>array of validation errors</returns>
	
	public function GetErrorMessages(){
		return $this->error_messages;
	}
	
		/// returns the status of server sie validtions performed
        /// </summary>
        /// <param ></param>        
        /// <returns>bool true if  there is no error
		///				false when error is encountered
		/// </returns>
		
	public function IsValid(){
		return $this->is_valid;
	}
	


		/// <summary>
		///  removes the slashes added when inserting student object into db 
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
	
	public function TransformDbDataToDisplayReadyData()
	{
		$this->SetFirstName(stripslashes($this->GetFirstName()));
		
		$this->SetLastName(stripslashes($this->GetLastName()));
	}
	

		/// <summary>
		///  converts the Object into array
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
	
	public function ToArray()
	{
		$arrStudent = array();
		$arrStudent["id"] = $this->GetId();
		$arrStudent["first_name"] = $this->GetFirstName();	
		$arrStudent["last_name"] = $this->GetLastName();	
	
		return $arrStudent;
	}
	
		/// <summary>
		///  converts the data array into user object
        /// </summary>
        /// <param name = ""></param>        
        /// <returns>user object</returns>
	
	public static function ExchangeDataToUserObject()
	{
		$user = new User();
		if(isset($_POST["id"]) && $_POST["id"] != "") 
			$student->SetId($_POST["id"]);
		$student->SetFirstName($_POST["first_name"]);
		$student->SetLastName($_POST["last_name"]);
		return $student;	
	}
}
