<?php /* Smarty version Smarty-3.1.13, created on 2013-03-15 00:03:02
         compiled from "C:\wamp\www\assignment\Views\User\profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:285265142405dbb7c87-25586802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cb5561cf060a89f315929db7b443b88b95f9a20' => 
    array (
      0 => 'C:\\wamp\\www\\assignment\\Views\\User\\profile.tpl',
      1 => 1363283650,
      2 => 'file',
    ),
    'cc98d25df9365d30bacfa56b6a03c880d0f5ecf3' => 
    array (
      0 => 'C:\\wamp\\www\\assignment\\Views\\Shared\\_Layout.tpl',
      1 => 1363305746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '285265142405dbb7c87-25586802',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5142405ddee1d7_33282998',
  'variables' => 
  array (
    'site_root' => 0,
    'enable_log_out' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5142405ddee1d7_33282998')) {function content_5142405ddee1d7_33282998($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp\\www\\assignment\\Plugins\\Smarty\\libs\\plugins\\function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\assignment\\Plugins\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->tpl_vars['site_root'] = new Smarty_variable("/assignment", null, 0);?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/Content/base.css" type="text/css" />
	<title>User Profile </title>
 
    

</head>
<body>
<!-- wrap start -->
<div id = "wrap">
	<div id = "top-bg"></div>
    
    <!-- header starts -->
    
  <header>
    
    	<h1 id="logo-text"><a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/index.php" title="">Web<span></span></a></h1>               
    <!--//--- header ends ---  -->  
  </header>
    
    <!-- navigation starts ----->
    
  <nav>
    	<ul>
	
    	
        
        <?php if (strpos(dirname($_smarty_tpl->source->filepath),"Home")){?>
        	<li id="current">
		<?php }else{ ?>
        	<li>
        <?php }?>
<a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/index.php">Home</a></li>
			<?php if (strpos(dirname($_smarty_tpl->source->filepath),"Students")){?>
        	<li id="current">
		<?php }else{ ?>
        	<li>
        <?php }?>			
        </ul>
    <!-- navigation ends-->    
  </nav>
    
   <!-- content wrap starts-->
  <div id="content-wrap">
    <aside id="aside" >
            <h3>Sidebar Menu</h3>
			<ul class="sidemenu">				
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/index.php">Home</a></li>				
                 <?php if (isset($_smarty_tpl->tpl_vars['enable_log_out']->value)){?>
        		<li><a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/user.php?action=log_out">Log Out</a></li>		
    			<?php }?>
			</ul>
            
         <!--sidebar ends ---->    
    </aside>
    
    <section id="main">
		

<?php $_smarty_tpl->tpl_vars['serial_no'] = new Smarty_variable(1, null, 0);?>


	 <h2>Profile</h2>
   
       
     
     <p>Last 5 Login Details for the user </p>
     
     <table>
				<tr>					
					<th>Login: Date and Time</th>
										
				</tr>

                 <?php if (empty($_smarty_tpl->tpl_vars['arrLoginDetails']->value)){?>
                <tr class="no_records">
					<td  colspan="4">No Previous login records found</td>					
				</tr>                
                <?php }else{ ?>
                    <?php  $_smarty_tpl->tpl_vars['arrLoginInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arrLoginInfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrLoginDetails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arrLoginInfo']->key => $_smarty_tpl->tpl_vars['arrLoginInfo']->value){
$_smarty_tpl->tpl_vars['arrLoginInfo']->_loop = true;
?>
    
                        <tr class="<?php echo smarty_function_cycle(array('values'=>"row-a,row-b"),$_smarty_tpl);?>
">
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['arrLoginInfo']->value["logged_in_time"],"%A, %B %e, %Y, %H:%M:%S");?>
</td>                            
                        </tr>     			
                    <?php } ?>	           
                <?php }?>            
				
</table>
<p><br />
     
</p>
		
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
</html><?php }} ?>