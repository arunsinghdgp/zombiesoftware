<?php 
if(isset($result[0]['id']) && $result[0]['id'] > 0){ 
    ?>
<input type="hidden" name='id' value='<?php echo $result[0]['id']?>'/>
<input type="hidden" name='fieldname' value='<?php echo $result[0]['fieldname']?>'/>
<input type="hidden" name='type' value='<?php echo $result[0]['type']?>'/>
<div class="form-group clearfix">
    <label for="fieldname">
      Field Key
    </label>
    <?php echo $result[0]['fieldname'];?>
</div>
<div class="form-group clearfix">
    <label for="type">
      Field type
    </label>
    <?php 
    switch ($result[0]['type']) {
        case 'text':
            echo "Text";
            break;
        case 'date':
            echo "Date";
            break;
        case 'select':
            echo "Select";
            break;
        case 'multiselect':
            echo "Multi Select";
            break;
         case 'file':
            echo "File";
            break;
    }?>
</div>
<?php }else{ ?>
<div class="form-group clearfix">
    <label for="fieldname">
      Field Key
    </label>
    <input type="text" required class="form-control" name='fieldname' id='fieldname' value="<?php if (isset($result[0]['fieldname'])){ echo $result[0]['fieldname']; }?>" pattern="[a-zA-z_\-0-9]">
</div>
<div class="form-group clearfix">
    <label class="col-md-2">
        <input <?php if(isset($result[0]['type']) && $result[0]['type']=='text') echo 'checked'; ?> type="radio" value="text" class="minimal-red" name='type' />
    Text
    </label>
    <label class="col-md-2">
        <input <?php if(isset($result[0]['type']) && $result[0]['type']=='textarea') echo 'checked'; ?> type="radio" value="textarea" class="minimal-red" name='type'/>
    Text Area
    </label>
    <label class="col-md-2">
        <input <?php if(isset($result[0]['type']) && $result[0]['type']=='date') echo 'checked'; ?> type="radio" class="minimal-red"  value="date" class="minimal" name='type'/>
        Date
    </label>
    <label class="col-md-2">
        <input <?php if(isset($result[0]['type']) && $result[0]['type']=='select') echo 'checked'; ?> type="radio" class="minimal-red"  value="select" class="minimal" name='type'/>
        Select
    </label>
    <label class="col-md-2">
        <input <?php if(isset($result[0]['type']) && $result[0]['type']=='multiselect') echo 'checked'; ?> type="radio" class="minimal-red"  value="multiselect" class="minimal" name='type'/>
        Multi Select
    </label>
    <label class="col-md-2">
        <input <?php if(isset($result[0]['type']) && $result[0]['type']=='file') echo 'checked'; ?> type="radio" class="minimal-red"  value="file" class="minimal" name='type'/>
        File
    </label>
</div>
<?php } ?>
<?php $hasOptions = (isset($result[0]['type']) && ($result[0]['type']=='select' || $result[0]['type']=='multiselect')) && (isset($result[0]['options']) && count($result[0]['options']) > 0); ?>
<div class="panel clearfix <?php if(!$hasOptions){ echo 'hide'; } ?> fieldOptionsDiv">
    <legend align="left">Add Options</legend>
    <div class="row controls">
        <?php if($hasOptions){ 
            foreach ($result[0]['options'] as $optionIndex => $option) {
        ?>
        <div class="inputMainContainer col-md-6">
                <input autocomplete="off" class="input" name="options[]" type="text" value="<?php echo $option['option_value']?>" style="padding: 4px 0px 4px 0px;"/>
                <?php if($optionIndex == count($result[0]['options'])-1){ ?>
                    <button class="btn btn-success add-more" type="button">+</button>
                <?php }else{ ?>
                <button class="btn btn-danger remove-me" type="button">-</button>
                <?php } ?>
        </div>
        <?php } } ?>
    </div>
    <div class="row" style="margin-left: 0px;">
        <small>Press + to add another form field</small>
    </div> 
</div>
<div class="form-group clearfix">
    <label for="label">
      Field Label
    </label>
    <input type="text" required class="form-control" name='label' id='label' value="<?php if (isset($result[0]['label'])){ echo $result[0]['label'];}?>">
</div>
<div class="form-group clearfix">
	<label class="col-md-4">
        <input <?php if(isset($result[0]['use_in_submittal']) && $result[0]['use_in_submittal']==true) echo 'checked'; ?> type="checkbox" class="minimal-red"  value="true" class="minimal" name='use_in_submittal'/>
        Use In Submittal
    </label>
    <label class="col-md-4">
        <input <?php if(isset($result[0]['show_in_search_result']) && $result[0]['show_in_search_result']==true) echo 'checked'; ?> type="checkbox" class="minimal-red"  value="true" class="minimal" name='show_in_search_result'/>
        Show In Search Column
    </label>
    
	<label class="col-md-4">
        <input <?php if(isset($result[0]['is_mandatory']) && $result[0]['is_mandatory']==true) echo 'checked'; ?> type="checkbox" class="minimal-red"  value="true" class="minimal" name='is_mandatory'/>
        Mandatory
    </label>
    <label class="col-md-4" for="field_order">
        Display Order
        <input type="text" class="form-control"  value="<?php if(isset($result[0]['field_order'])) {echo $result[0]['field_order']; }else{ echo "0";}?> " class="minimal" name='field_order' id="field_order" style="width: 68px; float: right;"/>
    </label>
    
</div>
<div class="form-group clearfix">
	<label class="col-md-6">
        <input <?php if(isset($result[0]['is_searchable']) && $result[0]['is_searchable']==true) echo 'checked'; ?> type="checkbox" class="minimal-red"  value="true" class="minimal" name='is_searchable'/>
        Searchable
    </label>
	<label class="col-md-6">
        <input <?php if(isset($result[0]['is_sortable']) && $result[0]['is_sortable']==true) echo 'checked'; ?> type="checkbox" class="minimal-red"  value="true" class="minimal" name='is_sortable'/>
        Sortable
    </label>
</div>
