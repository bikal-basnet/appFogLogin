{extends file = '_Layout.tpl'}

{block name=title}User Profile {/block}

{block name=body}

{assign var = serial_no value = 1}


	 <h2>Profile</h2>
   
       
     
     <p>Last 5 Login Details for the user </p>
     
     <table>
				<tr>					
					<th>Login: Date and Time</th>
										
				</tr>

                 {if empty($arrLoginDetails)}
                <tr class="no_records">
					<td  colspan="4">No Previous login records found</td>					
				</tr>                
                {else}
                    {foreach from=$arrLoginDetails item=arrLoginInfo}
    
                        <tr class="{cycle values="row-a,row-b"}">
                            <td>{$arrLoginInfo["logged_in_time"]|date_format:"%A, %B %e, %Y, %H:%M:%S"}</td>                            
                        </tr>     			
                    {/foreach}	           
                {/if}            
				
</table>
<p><br />
     
</p>
{/block}