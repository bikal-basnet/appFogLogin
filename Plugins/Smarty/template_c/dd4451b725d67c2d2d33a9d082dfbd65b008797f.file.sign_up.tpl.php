<?php /* Smarty version Smarty-3.1.13, created on 2013-03-15 12:15:44
         compiled from "C:\wamp\www\assignment\Views\User\sign_up.tpl" */ ?>
<?php /*%%SmartyHeaderCode:702751425f4be5a4f6-22655374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd4451b725d67c2d2d33a9d082dfbd65b008797f' => 
    array (
      0 => 'C:\\wamp\\www\\assignment\\Views\\User\\sign_up.tpl',
      1 => 1363349732,
      2 => 'file',
    ),
    'cc98d25df9365d30bacfa56b6a03c880d0f5ecf3' => 
    array (
      0 => 'C:\\wamp\\www\\assignment\\Views\\Shared\\_Layout.tpl',
      1 => 1363349701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '702751425f4be5a4f6-22655374',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51425f4c2309b4_98801159',
  'variables' => 
  array (
    'site_root' => 0,
    'enable_log_out' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51425f4c2309b4_98801159')) {function content_51425f4c2309b4_98801159($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->tpl_vars['site_root'] = new Smarty_variable("/assignment", null, 0);?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/Content/base.css" type="text/css" />
<!--[if IE]><script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/Content/javascript/modernizr.beekal.js"></script><![endif]-->
	<title>Sign Up : New Users</title>
 

	<style type="text/css">
    label{	        
        width: 125px;        
    }
    </style>

 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/Content/jquery_script/jquery.validate.regexp.js"></script>
    <script type="text/javascript">
	
     $(document).ready(function(){		 
      $("#sign_up_form").validate({
             debug: false,
       rules: {
        email: {
         required: true,     
         email:true,
        },
		password: {
         required: true,
		 minlength: 6, 
		 regex : /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})$/,		             
        },
		confirm_password: { 
                required: true, equalTo: "#password",
         } 
		
       },
       messages: {
        email: {
            required: "Please enter your email here",
            email: "Please enter a valid email",
        },   
        password: {
            required: "Please enter your password here",
			minlength: "Your password should have minimum 6 charcters ",
			regex : "Password should have at least one uppercase , one lowercase and one digit character",
            
        },
		confirm_password: {
            required: "Please retype your password here",
			equalTo: "Password does not match. Please check password ",           
        },
       }
      });
     });
    </script>
   

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
		



    <?php if (isset($_smarty_tpl->tpl_vars['arrUserData']->value['first_name'])){?>    
        <?php $_smarty_tpl->tpl_vars['first_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['arrUserData']->value['first_name'], null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['first_name'] = new Smarty_variable('', null, 0);?>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['arrUserData']->value['last_name'])){?>
        <?php $_smarty_tpl->tpl_vars['last_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['arrUserData']->value['last_name'], null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['last_name'] = new Smarty_variable('', null, 0);?>
    <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['arrUserData']->value['email'])){?>
        <?php $_smarty_tpl->tpl_vars['email'] = new Smarty_variable($_smarty_tpl->tpl_vars['arrUserData']->value['email'], null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['email'] = new Smarty_variable('', null, 0);?>
    <?php }?>

	 <h2>Sign Up</h2>
     <?php if (isset($_smarty_tpl->tpl_vars['sign_up_validation_errors']->value)){?>
     <div id = "errors_in_form">
         <p>
            Please fix the errors and try again.
         </p>
        
             <ul>
                 <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sign_up_validation_errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
                     <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>                          
                 <?php } ?>
             </ul>
            
     </div>
     <?php }?>
	email is <?php echo $_smarty_tpl->tpl_vars['email']->value;?>



			<form id = "sign_up_form" action="<?php echo $_smarty_tpl->tpl_vars['sign_up_form_action']->value;?>
" method="post">			
			<p>	
			<label for="email">Email*</label>
			<input name="email"  type="text"  placeholder="Your email here" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" />
            <br />
			<label for="password">Password*</label>
			<input name="password" id="password" placeholder="Your password here" type="password"  />
			<br />            
   			<label for="confirm_password">Confirm Password*</label>
			<input name="confirm_password" placeholder="Retype password here" type="password"  />
			<br />            
            <label for="first_name">First Name</label>
			<input name="first_name"  type="text"  placeholder="Your First Name" value="<?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
" />
            <br />
			<label for="last_name">Last Name</label>
			<input name="last_name" placeholder="Your Last Name" type="text" value="<?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>
" />
			<br />	
            </p>
            <p>
			<input class="button" type="submit" />		
				</p>	
			</form>
            
            
		
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