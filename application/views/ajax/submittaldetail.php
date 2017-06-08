<table class="table">
<tr>
	<td>Change Status</td>
	<td><div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status 
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url()?>submittals/supersede/<?php echo $result[0]['id']?>">Supersede</a></li>
   
  </ul>
</div></td>
</tr>
<?php 

$resultArray=$result[0];
foreach($resultArray as $rKey=>$Value){?>
<tr>
	<td>
     <?php echo $rKey?>
    </td>
   <td>
   <?php echo $Value?>
   </td>
</tr>
<?php } ?>

</table>
