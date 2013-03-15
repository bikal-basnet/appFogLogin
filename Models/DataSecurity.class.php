<?php
// DataSecurity.class.php
// Created By : Bikal Basnet, 2013-March-14
// This class handles security aspects related with data. e.g sanitise data for db inserstion, normalise the data from db to display ready datd



class DataSecurity{
	
	
		/// <summary>
		///  SanitiseDataForDb
		///	 the data is added wtih slashes to reduce SQL injection posibility
        /// </summary>
        /// <param name = "$data"> data that is to be sanitised </param>        
        /// <returns> </returns>
		
	public static function Sanitise($data,$length)
	{
		// myfog does not support mysql_real_escape_string henc replacing it with addslashes
//		return mysql_real_escape_string(substr($data,0,$length));	
		
		return addslashes(substr($data,0,$length));	
	}
	
	
		/// <summary>
		///  the data is added wtih slashes to reduce SQL injection posibility.
		///		hence when the data is extracted the unrolling of the operations carried ot in the SanitiseDataForDb should be performed
        /// </summary>
        /// <param name = "$data"> data that is to be sanitised </param>        
        /// <returns> </returns>
		
	public static function UnparseDbDataForOutput($data)
	{
		return stripslashes($data);	
	}
	
	

}
