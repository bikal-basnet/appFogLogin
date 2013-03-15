<?php
// SiteConstants.php
// Created By : Bikal Basnet, 2013-March-13
// This class  contains the constants used often and thoughout the site


define("USER_FRIENDLY_ERROR_PAGE", "error_page.php");

// absolute path for files and file name.
//defined in constants.php to facilitate the path and file name change easily
define("SMARTY_CONFIG_PHP",SITE_ROOT."/App_config/Smarty.Config.php"); 
 
define("DB_CONFIG_PHP",SITE_ROOT."/App_config/Db.Config.php");

define("SMARTY_TEMPLATE_CLASS_PHP",SITE_ROOT."/Models/ViewTemplate.class.php");

define("TEMPLATE_CLASS_PATH_FOR_HOME_PG","/Views/Home");

define("TEMPLATE_FILES_LOC_PATH_FOR_USER","/Views/User");

define("TEMPLATE_FILES_LOC_PATH_FOR_SHARED","/Views/Shared");


define("CONTROLLER_CLASS_PHP", SITE_ROOT."/Models/Controller.class.php");

define("LOGIN_INFORMATION_CLASS", SITE_ROOT."/Models/LoginInformation.php");

define("USER_CLASS", SITE_ROOT."/Models/User.php");

define("USER_DAO_CLASS", SITE_ROOT."/DAL/UserDAO.php");

define("GENERIC_DAO_CLASS",SITE_ROOT."/DAL/GenericDAO.php");

define("DATA_SECURITY_CLASS",SITE_ROOT."/Models/DataSecurity.class.php");

define("ERROR_CLASS_PHP",SITE_ROOT."/Models/Error.class.php");

define("INPUT_UTILITY_CLASS_PHP",SITE_ROOT."/Models/InputUtility.class.php");








?>