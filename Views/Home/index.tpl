{extends file = '_Layout.tpl'}
{block name=title}Home Page {/block}
{block name=stylesheet}

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
{/block}
{block name=javascript}
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{$site_root}/Content/jquery_script/jquery.validate.regexp.js"></script>
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
		 regex : /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{ldelim}6,20{rdelim})$/,		 
            
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
{/block}

{block name=body}
	{if isset($email)}    
        {assign var = email_form_value value = $email}
    {else}
        {assign var = email_form_value value = ""}
    {/if}
    
	 <h2><a href="index.html" title="">Home</a></h2>
     {if isset($user_doesnot_exist) }
     <div id = "errors_in_form">                 
             The user with the email and thepassword does not exist. Please try again or sign up if you are a new user.
             
     </div>
     {/if}
     {if isset($smarty.get.sign_up_sucessful) && $smarty.get.sign_up_sucessful  == true} 
		<div id="sucess_message">
        	 You have been sucessfully registered. Please login using  your email and password.
        </div>
      {/if}  
    <div id ="left_content">
        <h3>Sign Up</h3>
        <p> If you are a new user please <a href="{$sign_up_link}"> click here to sign up</a> </p>
    </div>
    <div id ="right_content">
    	 <form action="{$sign_in_form_action}" method="post" id="sign_in">
        
        <h3>Sign In</h3>
        <p>
        If you are already registered with us,  then please log in
           {if isset($sign_in_validation_errors) }
             <div id = "errors_in_form">                 
                     Please fix the following errors and try again.              
                     <ul>
                         {foreach from = $sign_in_validation_errors item = error}
                             <li>{$error}</li>                          
                         {/foreach}
                     </ul>
                    
             </div>
             {/if}
        <br />


       <br />
       
        <label for="email">Email</label>
		<input name="email" type="email" placeholder="Enter your email" value="{$email_form_value}" />
        <br />
        <label for="password">Password</label>
        <input name="password" id="password" type="password" placeholder="Enter your password" />
	
       </p>
        <p><input class="button" type="submit" value="Log In" /></p>
       </form>
    </div>
{/block}