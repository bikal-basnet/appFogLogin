<?php
// error_page.php
// Created By : Bikal Basnet, 2013 - March-13
//  Summary : user friendly error page


require_once("web.config.php");
// load ViewTemplate class
require_once(SMARTY_TEMPLATE_CLASS_PHP);



	// intantiate smarty view engine
	$smarty = new View(TEMPLATE_FILES_LOC_PATH_FOR_SHARED);	
	$viewEngine = $smarty->GetView();

	$viewEngine->display("error.tpl");
	

?>

