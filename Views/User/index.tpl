{extends file = '_Layout.tpl'}

{block name=title}Student Page {/block}

{block name=javascript}

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
    $("#delete_record").click(function(){
		
		var deleteStatus = confirm("Do you really want to delete ?");
		
		if(deleteStatus)
		{		
			$("#delete_form").submit();
		}
		
	});	
	$(".show_only_when_js_enabled").css(
		{
			"display":"inline"		    
		}
	);
});


</script>
{/block}

{block name=body}

{assign var = serial_no value = 1}


	 <h2>Student</h2>
   
     
    {if isset($smarty.get.newStudentAdded) && $smarty.get.newStudentAdded  == true} 
		<div id="sucess_message">
        	 New Student has been added sucesfully.
        </div>
     {else if isset($smarty.get.studentEdited) && $smarty.get.studentEdited  == true}   
     	<div id="sucess_message">
        	 Student Record has been updated sucesfully.
        </div>
       {else if isset($smarty.get.studentDeleted) && $smarty.get.studentDeleted  == true}   
     	<div id="sucess_message">
        	 Student Record has been deleted sucesfully.
        </div>
	{/if} 
    
    
     
     <p><a href="{$smarty.server.PHP_SELF}?action=create">Create New Student Record</a>
     </p>
     <h3>List of Students </h3>
     <table>
				<tr>
					<th class="first"><strong>S.N</strong></th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Actions</th>
				</tr>

                 {if empty($arrOfArrStudent)}
                <tr class="no_records">
					<td  colspan="4">No Records Found</td>					
				</tr>                
                {else}
                {foreach from=$arrOfArrStudent item=arrStudent}

                <tr class="{cycle values="row-a,row-b"}">
					<td class="first">
{$serial_no++}</td>
					<td>{$arrStudent["first_name"]}</td>
					<td>{$arrStudent["last_name"]}</td>
					<td><a href="{$smarty.server.PHP_SELF}?action=edit&id={$arrStudent['id']}">Edit</a>
                    <form name="delete_form" id="delete_form" action="{$smarty.server.PHP_SELF}?action=delete" method="post">   
                    <input type="hidden" name="id" value="{$arrStudent['id']}">       
	<div class="show_only_when_js_enabled">
                    <a href="#" id = "delete_record" > Delete</a>
     </div>
<noscript>     
    <input id ="inline_button" type="submit" value="Delete">
</noscript>
                    </form>
                    </td>
				</tr>     			{/foreach}	           
                {/if}            
				
</table>
<p><br />
     
</p>
{/block}