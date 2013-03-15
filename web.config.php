<?php
//  web.config.php
//  Created by : Bikal Basnet, 2013-March-13
//  All the configration related  to the website is defined in this file 
//

define("LOCAL_MACHIENE", false);

//IMP :  this siteroot constant is crucial. Is used across all site files to define the root path
define("SITE_ROOT",dirname(__FILE__));

//define constants such as Directory Location Path here
require_once(SITE_ROOT."/App_config/SiteConstants.php")

?>



