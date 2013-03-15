<?php
// StudentDAO.php
// Created By : Bikal Basnet, 2013-March-14
// This class handles all db actions related with the users

require_once(GENERIC_DAO_CLASS);


class UserDAO extends GenericDAO{

		private $table = "user";
		
		/// <summary>
		///  inserts the user object into the database
        /// </summary>
        /// <param name = "student_obj"></param>        
        /// <returns>
		///		true if user record inserted sucessfully
		///		false otherwise
		///	</returns>
	//@ abstract method implementation
	public function Insert($user)
		{			
			$sql = "INSERT INTO ".$this->table." 
					SET email = '".$user->GetEmail()."'  ,
					password = '".$user->GetPassword()."' ,
					first_name = '".$user->GetFirstName()."' , 	
					last_name = '".$user->GetLastName()."'";/**/							
			return $this->ExecuteSql($sql);
		}
		
		/// <summary>
		///  inserts the object contatining login information into database
 		///  data to be inserted to db is in complete internal control.hence has been exempted from sanitisation operations
        /// </summary>
        /// <param name = "log_in_information"> object containing login information</param>        
        /// <returns>	</returns>


	public function InsertObjectLoginInformation($log_in_information)
		{			
			$sql = "INSERT INTO login_information 
					SET user_id = '".$log_in_information->GetUserID()."'  ,
					logged_in_time = '".$log_in_information->GetLoggedInTime()."'";/**/							
			return $this->ExecuteSql($sql);
		}
	
	
	//returns the db row in the form of array. if $row is return val then  $row["email"],$row["password"],.... would be its elements
	// return false if no record found	
	
	public function SelectByEmail($user){
		$sql = "SELECT * FROM ".$this->table." WHERE email='".$user->GetEmail()."' LIMIT 1";				
		return $this->ExecuteAndReturnResult($sql);		
	}
	
	//returns the db row in the form of array. if $row is return val then  $row["email"],$row["password"],.... would be its elements	
	
	public function SelectByEmailNPassword($user){

		$sql = "SELECT * FROM ".$this->table." WHERE email='".$user->GetEmail()."' AND password='".$user->GetPassword()."' LIMIT 1";		
		return $this->ExecuteAndReturnResult($sql);		
	}
	
	// return results in the array format i.e $res["email"],$res["password"]
	private function ExecuteAndReturnResult($sql){
		$query_result = $this->ExecuteSql($sql);
		return $this->GetQueryResult($query_result);			
		
	}
	
	public function GetLoginRecords($user,$num){		
		$sql = "SELECT * FROM login_information WHERE user_id='".$user->GetID()."'";
		$sql .= ($num == "") ? "" : " LIMIT ".$num;				
		$query_result = $this->ExecuteSql($sql);
		$login_details_array_list = array();
		
		while($row = $this->GetQueryResult($query_result))
			{			
				array_push($login_details_array_list, $row);
				//preserve the order in which the data is extracted by reversing the array
				 array_reverse($login_details_array_list);
			}
			
		return $login_details_array_list;
			
	} 
		
	//@ abstract method implementation	
	protected function Delete($obj){
		//to do later	
	}
		
	/// <summary>
		///  Protected method : get the id of the last inserted record 
        /// </summary>
        /// <param name = ""></param>        
        /// <returns> int : id of the last inserted record </returns>
	
	public function GetIdForLastInsertedUser()
	{
		return $this->GetIdForLastInsertedRecord();
	}	
	
	//@ abstract method implementation
	public function Update($user)
		{
		}
	//@ abstract method implementation		
	public function DeleteById($id){ /* to do */ }	
	protected function GetAll(){ /* to do */ }
	protected function GetById($id){ /* to do */ }
		
	
			
		
}



?>