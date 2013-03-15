<?php
// user.php
// Created By : Bikal Basnet, 2013 - March - 14
//  Summary : controller page for the users. handles all user related activities such as sign in, sign up for user 


require_once("web.config.php");
require_once(CONTROLLER_CLASS_PHP);

// load ViewTemplate class
require_once(SMARTY_TEMPLATE_CLASS_PHP);
require_once(INPUT_UTILITY_CLASS_PHP);

// determines the function, to be invoked, when the controller page is loaded
Controller::InvokeFunctionAsSetInActionVariable($_REQUEST);


function Sign_In(){
	//------------server side validation of form inputs starts-----------------------
	$input	= Input::getInstance();
	$input->IsEmailValid($_POST["email"]);
	$input->IsPasswordValid($_POST["password"]);	
	//------------server side validation of form inputs ends-----------------------
	
	// intantiate smarty view engine
	$smarty = new View(TEMPLATE_CLASS_PATH_FOR_HOME_PG);	
	$viewEngine = $smarty->GetView();	
	
	if(!$input->IsValid())
	{
		$viewEngine->assign("sign_in_validation_errors",$input->GetErrorMessages());
		$viewEngine->assign("email",$_POST["email"]);		
	}else{			
		// ----------- error handling has been delegated to CriticalError function in the error.class.php---------
		//------------ it logs the error and redirects the users to user friendly error page----------------------	
		require_once(ERROR_CLASS_PHP);
		set_error_handler("CriticalError");
		//----------------- ends setting up the error handling mechanism --------------------------------------
		
		require_once(USER_CLASS);
		$user = User::ExchangeArrayToDbReadyObject($_POST);

		require_once(USER_DAO_CLASS);	
		$userDAO = new UserDAO();
		$user->SetUserDAO($userDAO);
		if($user->HasValidAccount()){
			$user->ProcessLogIn();			
			header("Location:user.php?action=profile");			
		}else{			
			$viewEngine->assign("email",$_POST["email"]);
			$viewEngine->assign("user_doesnot_exist",true);					
		}		
		// smarty looks for template file in multiple places. for the places where the template is not fond it raises error. since we donot want the error thus raised to be logged we are using the void to set the error to no action 
		set_error_handler("void");
	}
	
	// intantiate smarty view engine
	$viewEngine->assign("sign_in_form_action","user.php?action=sign_in");
	$viewEngine->assign("sign_up_link","user.php?action=sign_up");
	AssignTemplateVarForValidUser($viewEngine);
	$viewEngine->display("index.tpl");	
}

		/// <summary>
		///  handles the sign up action method.  			
		/// </summary>
        /// <param> </param>
		/// <returns></returns>

function Sign_Up(){	

	(isset($_POST) && count($_POST) > 0 ) ?  Sign_Up_Post() : Sign_Up_Get(); 		
	
}

		/// <summary>
		// get action for the sign up action
		// displays the sign up form
		/// </summary>
        /// <param> </param>
		/// <returns></returns>

function Sign_Up_Get(){
	$smarty = new View(TEMPLATE_FILES_LOC_PATH_FOR_USER);	
	$viewEngine = $smarty->GetView();	
	$viewEngine->assign("sign_up_form_action","user.php?action=sign_up");
	AssignTemplateVarForValidUser($viewEngine);
	$viewEngine->display("sign_up.tpl");
	
}

		/// <summary>
		/// handles the events after the data has been submitted from the sign up form
		/// perform  server side validation of the data posted back for consistency
		/// if data posted back was valid, then create the user
		/// </summary>
        /// <param> </param>
		/// <returns></returns>

function Sign_Up_Post(){
	
	//------------server side validation of form inputs starts-----------------------
	$input	= Input::getInstance();
	$input->IsEmailValid($_POST["email"]);
	$input->IsPasswordValid($_POST["password"]);	
	$input->DoesPasswordMatch($_POST["password"],$_POST["confirm_password"]);
	//------------server side validation of form inputs ends-----------------------
	
	// intantiate smarty view engine
	$smarty = new View(TEMPLATE_FILES_LOC_PATH_FOR_USER);	
	$viewEngine = $smarty->GetView();	
	
	
	if($input->IsValid())
	{	
		// ----------- error handling has been delegated to CriticalError function in the error.class.php---------
		//------------ it logs the error and redirects the users to user friendly error page-------------------------	
		require_once(ERROR_CLASS_PHP);
		set_error_handler("CriticalError");
		//----------------- ends setting up the error handling mechanism --------------------------------------
		
		require_once(USER_CLASS);
		require_once(USER_DAO_CLASS);	
		$userDAO = new UserDAO();
		if(User::InsertToDb($_POST,$userDAO)) {		
			header ( "Location:index.php?sign_up_sucessful=true");
		}else{
			$error_message["user_exists"] = "The user with the email already exits. Please try signing up with new email address.";
			$viewEngine->assign("sign_up_validation_errors",$error_message);
		}
		// redirect to stuent home page where all the students are listed with message sucess
		set_error_handler("void");
		
	}else{		
		$viewEngine->assign("sign_up_validation_errors",$input->GetErrorMessages());
		$viewEngine->assign("arrUserData",$_POST);
	}
	$viewEngine->assign("sign_up_form_action","user.php?action=sign_up");
	AssignTemplateVarForValidUser($viewEngine);
	$viewEngine->display("sign_up.tpl");	
}

		/// <summary>
		/// handles the log out event of the user
		/// </summary>
        /// <param> </param>
		/// <returns></returns>

function Log_Out(){
	require_once(USER_CLASS);	
	User::LogOut();
	header("Location:index.php");	
}


		/// <summary>
		/// displays the profile page. lists the last five logins to the user
		/// </summary>
        /// <param> </param>
		/// <returns></returns>

function Profile(){		
	require_once(USER_CLASS);
	if(!User::IsLoggedIn()){
		header("Location:index.php");
	}else
	{		
		// ----------- error handling has been delegated to CriticalError function in the error.class.php---------
		//------------ it logs the error and redirects the users to user friendly error page----------------------	
		require_once(ERROR_CLASS_PHP);
		set_error_handler("CriticalError");
		//----------------- ends setting up the error handling mechanism --------------------------------------
		
		require_once(USER_DAO_CLASS);	
		$userDAO = new UserDAO();
	
		$user = new User($userDAO);
		$arrLoginInfo = $user->GetLoginDetails(5); 
		
		set_error_handler("void");
		// intantiate smarty view engine
		$smarty = new View(TEMPLATE_FILES_LOC_PATH_FOR_USER);	
		$viewEngine = $smarty->GetView();										
		$viewEngine->assign("arrLoginDetails",$arrLoginInfo);			
		AssignTemplateVarForValidUser($viewEngine);
		$viewEngine->display("profile.tpl");	
	}


}

function AssignTemplateVarForValidUser($viewEngine){
	require_once(USER_CLASS);
	if(User::IsLoggedIn()){
		$viewEngine->assign("enable_log_out","true");
	}
}

?>

