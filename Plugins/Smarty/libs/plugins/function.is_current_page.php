<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.is_current_page.php
 * Type:     function
 * Name:     is_current_page
 * Purpose:  check if the param pg is the currently viewed page
 * Author : Bikal Basnet, 2013-Feb-15 
 *
 * Example: usage
     {is_current_page dir=$smarty.current_dir page = "Home" assign = "current_page"}
	
 -------------------------------------------------------------
 */
function smarty_function_is_current_page($page, Smarty_Internal_Template $template)
{
	if (empty($page["page"])) {
        trigger_error("assign: missing 'page' parameter");
        return;
    }
	
	
 $is_current_page = (stripos($page["dir"],$page["page"])) ? true : false;
 
 $template->assign($page['assign'], $is_current_page);
 
//		 return(stripos($page["dir"],$page["page"])) ? true : false;
	
	
}
?>