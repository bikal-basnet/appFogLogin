{extends file = '_Layout.tpl'}

{block name=title}Sign Up : New Users{/block}

{block name=stylesheet}

	<style type="text/css">
    label{	        
        width: 125px;        
    }
    </style>
{/block}
{block name=javascript}
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{$site_root}/Content/jquery_script/jquery.validate.regexp.js"></script>
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
		 regex : /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{ldelim}6,20{rdelim})$/,		             
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
{/block}


{block name=body}


{* these values are used to set the form fields to the original values, when the server validation fails *}
    {if isset($arrUserData.first_name)}    
        {assign var = first_name value = $arrUserData.first_name}
    {else}
        {assign var = first_name value = ""}
    {/if}
    {if isset($arrUserData.last_name)}
        {assign var = last_name value = $arrUserData.last_name}
    {else}
        {assign var = last_name value = ""}
    {/if}
        {if isset($arrUserData.email)}
        {assign var = email value = $arrUserData.email}
    {else}
        {assign var = email value = ""}
    {/if}

	 <h2>Sign Up</h2>
     {if isset($sign_up_validation_errors) }
     <div id = "errors_in_form">
         <p>
            Please fix the errors and try again.
         </p>
        
             <ul>
                 {foreach from = $sign_up_validation_errors item = error}
                     <li>{$error}</li>                          
                 {/foreach}
             </ul>
            
     </div>
     {/if}


			<form id = "sign_up_form" action="{$sign_up_form_action}" method="post">			
			<p>	
			<label for="email">Email*</label>
			<input name="email"  type="text"  placeholder="Your email here" value="{$email}" />
            <br />
			<label for="password">Password*</label>
			<input name="password" id="password" placeholder="Your password here" type="password"  />
			<br />            
   			<label for="confirm_password">Confirm Password*</label>
			<input name="confirm_password" placeholder="Retype password here" type="password"  />
			<br />            
            <label for="first_name">First Name</label>
			<input name="first_name"  type="text"  placeholder="Your First Name" value="{$first_name}" />
            <br />
			<label for="last_name">Last Name</label>
			<input name="last_name" placeholder="Your Last Name" type="text" value="{$last_name}" />
			<br />	
            </p>
            <p>
			<input class="button" type="submit" />		
				</p>	
			</form>
            
            
{/block}