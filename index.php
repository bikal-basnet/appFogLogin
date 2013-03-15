<?php
// index.php
// Created By : Bikal Basnet, 2013 - March - 14
//  Summary : login page of the site 


require_once("web.config.php");
require_once(CONTROLLER_CLASS_PHP);

// load ViewTemplate class
require_once(SMARTY_TEMPLATE_CLASS_PHP);


// determines the function, to be invoked, when the controller page is loaded
Controller::InvokeFunctionAsSetInActionVariable($_REQUEST);


function Index(){
	
	// intantiate smarty view engine
	$smarty = new View(TEMPLATE_CLASS_PATH_FOR_HOME_PG);
	
	$viewEngine = $smarty->GetView();
		
// based upon this select_nav_element 
	$viewEngine->assign("select_head_nav_element","home");
	$viewEngine->assign("sign_in_form_action","user.php?action=sign_in");
	$viewEngine->assign("sign_up_link","user.php?action=sign_up");
	$viewEngine->display("index.tpl");
}




?>

