<!DOCTYPE html>
<html>
<head>
{assign var=site_root value= ""}
<link rel="stylesheet" href="{$site_root}/Content/base.css" type="text/css" />
<!--[if IE]><script src="{$site_root}/Content/javascript/modernizr.beekal.js"></script><![endif]-->
	<title>{block name=title}Default Title{/block}</title>
 {block name = stylesheet}{/block}
 {block name = javascript}{/block}   

</head>
<body>
<!-- wrap start -->
<div id = "wrap">
	<div id = "top-bg"></div>
    
    <!-- header starts -->
    
  <header>
    
    	<h1 id="logo-text"><a href="{$site_root}/index.php" title="">Web<span></span></a></h1>               
    <!--//--- header ends ---  -->  
  </header>
    
    <!-- navigation starts ----->
    
  <nav>
    	<ul>
	
    	
        
        {if strpos($smarty.current_dir, "Home") }
        	<li id="current">
		{else}
        	<li>
        {/if}
<a href="{$site_root}/index.php">Home</a></li>
			{if strpos($smarty.current_dir, "Students")}
        	<li id="current">
		{else}
        	<li>
        {/if}			
        </ul>
    <!-- navigation ends-->    
  </nav>
    
   <!-- content wrap starts-->
  <div id="content-wrap">
    <aside id="aside" >
            <h3>Sidebar Menu</h3>
			<ul class="sidemenu">				
				<li><a href="{$site_root}/index.php">Home</a></li>				
                 {if isset($enable_log_out)}
        		<li><a href="{$site_root}/user.php?action=log_out">Log Out</a></li>		
    			{/if}
			</ul>
            
         <!--sidebar ends ---->    
    </aside>
    
    <section id="main">
		{block name = body}Main Content{/block}		
		<!--main ends-->	
    </section>
        
        
        
      <!--content-wrap ends --*/-->  
  </div>
    
    
   <!-- footer starts ---->
    <div id="footer-wrap">
      <footer>
    	<p>
				Copyright   2013</p>
    
    </footer>
   
 <!--//-- footer ends-->   
</div>
<!--//--- wrap closes-->
</div>
</body>
</html>