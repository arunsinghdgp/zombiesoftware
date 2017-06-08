<div class="form-group clearfix">
    <label for="userid">
      Field Label
    </label>
    <input type="text" required class="form-control" name='label' id='label' value="<?php echo $result[0]['label']?>">
</div>
<div class="form-group clearfix">
    <label class="col-md-6">
        <input <?php if($result[0]['type']=='text') echo 'checked'; ?> type="radio" value="text" class="minimal-red" name='type'/>
    Text
    </label>
    <label class="col-md-6">
        <input <?php if($result[0]['type']=='select') echo 'checked'; ?> type="radio" class="minimal-red"  value="select" class="minimal" name='type'/>
        Select
    </label>
</div>
<div class="form-group clearfix">
	<label class="col-md-4">
        <input <?php if(isset($result[0]['use_in_submittal']) && $result[0]['use_in_submittal']==true) echo 'checked'; ?> type="checkbox" class="minimal-red"  value="true" class="minimal" name='use_in_submittal'/>
        Use In Submittal
    </label>
	<label class="col-md-4">
        <input <?php if(isset($result[0]['required']) && $result[0]['required']==true) echo 'checked'; ?> type="checkbox" class="minimal-red"  value="true" class="minimal" name='required'/>
        Mandatory
    </label>
    <label class="col-md-4" for="field_order">
        Field Order
        <input type="text" class="form-control"  value="<?php if(isset($result[0]['field_order'])) {echo $result[0]['field_order']; }else{ echo "0";}?> " class="minimal" name='field_order' id="field_order" style="width: 68px; float: right;"/>
    </label>
    
</div>
<div class="form-group clearfix">
	<label class="col-md-6">
        <input <?php if(isset($result[0]['searchable']) && $result[0]['searchable']==true) echo 'checked'; ?> type="checkbox" class="minimal-red"  value="true" class="minimal" name='searchable'/>
        Searchable
    </label>
	<label class="col-md-6">
        <input <?php if(isset($result[0]['sortable']) && $result[0]['sortable']==true) echo 'checked'; ?> type="checkbox" class="minimal-red"  value="true" class="minimal" name='sortable'/>
        Sortable
    </label>
</div>
<input type="hidden" name='fieldkey' value='<?php echo $result[0]['fieldname']?>'/>
