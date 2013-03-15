<?php /* Smarty version Smarty-3.1.13, created on 2013-03-15 12:19:14
         compiled from "C:\wamp\www\assignment\Views\Home\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166405142405b6a9da8-10501561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fbf52b351cb57e24648fdafc0f2d0957f2e1299' => 
    array (
      0 => 'C:\\wamp\\www\\assignment\\Views\\Home\\index.tpl',
      1 => 1363349925,
      2 => 'file',
    ),
    'cc98d25df9365d30bacfa56b6a03c880d0f5ecf3' => 
    array (
      0 => 'C:\\wamp\\www\\assignment\\Views\\Shared\\_Layout.tpl',
      1 => 1363349701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166405142405b6a9da8-10501561',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5142405b9e3a00_28579000',
  'variables' => 
  array (
    'site_root' => 0,
    'enable_log_out' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5142405b9e3a00_28579000')) {function content_5142405b9e3a00_28579000($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->tpl_vars['site_root'] = new Smarty_variable("/assignment", null, 0);?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/Content/base.css" type="text/css" />
<!--[if IE]><script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/Content/javascript/modernizr.beekal.js"></script><![endif]-->
	<title>Home Page </title>
 

	<style type="text/css">
    #left_content{	
        float:left;
        width: 200px;
        padding: 5px;
        margin: 2px;
    }
    #right_content{	
        float:left;
        width: 300px;
        padding:5px;
        margin:2px;
    }
    </style>

 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/Content/jquery_script/jquery.validate.regexp.js"></script>
    <script type="text/javascript">
	
     $(document).ready(function(){		 
      $("#sign_in").validate({
             debug: false,
       rules: {
        email: {
         required: true,     
         email:true,
        },
		/* password: "required password"

        */
		password: {
         required: true,
		 minlength: 6, 
		 regex : /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})$/,		 
            
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
		
email is <?php echo $_smarty_tpl->tpl_vars['email']->value;?>

	<?php if (isset($_smarty_tpl->tpl_vars['email']->value)){?>    
        <?php $_smarty_tpl->tpl_vars['email_form_value'] = new Smarty_variable($_smarty_tpl->tpl_vars['email']->value, null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['email_form_value'] = new Smarty_variable('', null, 0);?>
    <?php }?>
    
	 <h2><a href="index.html" title="">Home</a></h2>
     <?php if (isset($_smarty_tpl->tpl_vars['user_doesnot_exist']->value)){?>
     <div id = "errors_in_form">                 
             The user with the email and thepassword does not exist. Please try again or sign up if you are a new user.
             
     </div>
     <?php }?>
     <?php if (isset($_GET['sign_up_sucessful'])&&$_GET['sign_up_sucessful']==true){?> 
		<div id="sucess_message">
        	 You have been sucessfully registered. Please login using  your email and password.
        </div>
      <?php }?>  
    <div id ="left_content">
        <h3>Sign Up</h3>
        <p> If you are a new user please <a href="<?php echo $_smarty_tpl->tpl_vars['sign_up_link']->value;?>
"> click here to sign up</a> </p>
    </div>
    <div id ="right_content">
    	 <form action="<?php echo $_smarty_tpl->tpl_vars['sign_in_form_action']->value;?>
" method="post" id="sign_in">
        
        <h3>Sign In</h3>
        <p>
        If you are already registered with us,  then please log in
           <?php if (isset($_smarty_tpl->tpl_vars['sign_in_validation_errors']->value)){?>
             <div id = "errors_in_form">                 
                     Please fix the following errors and try again.              
                     <ul>
                         <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sign_in_validation_errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
                             <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>                          
                         <?php } ?>
                     </ul>
                    
             </div>
             <?php }?>
        <br />


       <br />
       
        <label for="email">Email</label>
		<input name="email" type="email" placeholder="Enter your email" value="<?php echo $_smarty_tpl->tpl_vars['email_form_value']->value;?>
" />
        <br />
        <label for="password">Password</label>
        <input name="password" id="password" type="password" placeholder="Enter your password" />
	
       </p>
        <p><input class="button" type="submit" value="Log In" /></p>
       </form>
    </div>
		
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