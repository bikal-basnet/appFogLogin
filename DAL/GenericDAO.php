<?php
// GenericDAO.php
// Created By : Bikal Basnet, 2013-March-13
// This class handles generic db operations and acts as base class for all specific implementations later
// Backward Trace :  SITE_ROOT."/App_config/Db.Config.php"  Db constants defined in the file are being used in the class

require_once(DB_CONFIG_PHP);

abstract class GenericDAO{

		
		
	private $db_connection;
	private $query_execution_result;
		
	abstract protected function GetAll();
	abstract protected function GetById($id);
	abstract protected function Insert($obj);
	abstract protected function Update($obj);
	abstract protected function Delete($obj);
	
		
		/// <summary>
		///  connects to Db, selects db
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
		///  Exception: General Exception(Non-Specific) thrown on failre to connect to db
		///				General Exception(Non-Specific) thrown on failure to select DB

	public function __construct(){
		$this->ConnectToDb();
		$this->SelectDB();
		 				
	}

		/// <summary>
		///  Private method : connects to Db
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
		///  Exception: General Exception(Non-Specific) thrown on failre to connect to db

	
	private function ConnectToDb(){
		// generate new mysql connection settings each time and hence the configuration has to be loaded each time the connecction is made
	/*	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
		$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
		$username = $mysql_config["username"];
		$password = $mysql_config["password"];
		$hostname = $mysql_config["hostname"];
		$port = $mysql_config["port"];
		$db = $mysql_config["name"];
		
		$this->db_connection = mysql_connect("$hostname:$port",$username,$password,$db) OR die (mysql_connect_error() );
*/
		$this->db_connection = 	mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die("connect to db".mysql_error());
		if(!$this->db_connection)  throw new Exception("Error connecting to Db".mysql_error());
		
	} 

		/// <summary>
		///  Private method : selects Db
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
		///  Exception: General Exception(Non-Specific) thrown on failre to select the given db

	
	private function SelectDb(){
		if(!mysql_select_db(DATABASE,$this->db_connection))
			throw new Exception("Error Selecting Db :".mysql_error());
		
	} 

		/// <summary>
		///  Protected method : execute the sql query supplied
        /// </summary>
        /// <param name = ""></param>        
        /// <returns> query execution result
		///		false if the query could not be excuted, de to some error
		/// </returns>
		///  Error: Error triggered if query exeution fails. Assuming in some cases the failure might be less critical, it is not marked as Exception. Exception only used  when critical errors are encountered which will need immediate attention. 

	
	protected function ExecuteSql($sql)
	{

		$this->query_execution_result = mysql_query($sql, $this->db_connection ) ;
		if(!$this->query_execution_result)
		{			
			trigger_Error("Error Execting Query".mysql_error(),E_USER_ERROR);			
			return false;
		}else{
			return $this->query_execution_result;
		}
	}

		/// <summary>
		///  Protected method : fetches the result from db and returns the result as array
        /// </summary>
        /// <param name = ""></param>        
        /// <returns> array of the results </returns>
	

	protected function GetQueryResult()
	{
		return mysql_fetch_array($this->query_execution_result);
	}

		/// <summary>
		///  Protected method : returns the  number of records present in the result set
        /// </summary>
        /// <param name = ""></param>        
        /// <returns> int: number of records </returns>
	
	protected function GetRowCount()
	{
	return mysql_num_rows($this->query_execution_result);
	}

		/// <summary>
		///  Protected method : get the id of the last inserted record 
        /// </summary>
        /// <param name = ""></param>        
        /// <returns> int : id of the last inserted record </returns>
	
	protected function GetIdForLastInsertedRecord()
	{
	return mysql_insert_id($this->db_connection);
	}

		/// <summary>
		///  Protected method : closes the db connection
        /// </summary>
        /// <param name = ""></param>        
        /// <returns></returns>
	
	protected function CloseDbConnection()
	{
		mysql_close($this->connection);
	}
		
}
?>