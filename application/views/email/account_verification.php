<?php require('view_header.php') ?>
		<tr>
			<td colspan="2" >
			<table width="100%" bgcolor="#ffffff" cellpadding="10">
			<tr>	
			<td>	
				<font color="#C11C24" size="5">Account Verification </font>
			</td>
			
		</tr>
		<tr>
			<td colspan="2" >
				Dear <?php echo $name?>,<br/>
				

			</td>
			
		</tr>
		<tr>
			<td colspan="2" >
				<table width="100%">
					<tr>
						<td width="100%">
							To complete your registration,<br/>
							Please Click on the link button<br/><br/><a style='text-decoration:none;' href="<?php echo base_url().'users/verify/'.base64_encode($lastid+786);?>">
<div style='background: none repeat scroll 0 0 #b74540;
    border-radius: 5px 5px 5px 5px;
    color: #FFFFFF;
    font-family: arial;
    font-weight: bold;
    padding: 10px 6px;
    text-align: center;
    width:90px;'>VERIFY</div></a><br/><br/> to verify your account
​If above button is not clickable, then please enter following ​URL in your browser address bar. <br/>
<?php echo base_url()?>users/verify/<?php echo base64_encode($lastid+786)?>
						</td>
						
					</tr>
				</table>

			</td>
			
		</tr>
		
		<?php require('view_footer.php') ?>