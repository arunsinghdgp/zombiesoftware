<div class="form-group">
    <label for="userid">
      Field Label
    </label>
    <input type="text" required class="form-control" name='label' id='label' value="<?php echo $result[0]['label']?>">
</div>
<div class="form-group">
    <label class="col-md-6">
        <input <?php if($result[0]['type']=='text') echo 'checked'; ?> type="radio" value="text" class="minimal-red" name='type'/>
    Text
    </label>
    <label class="col-md-6">
        <input <?php if($result[0]['type']=='select') echo 'checked'; ?> type="radio" class="minimal-red"  value="select" class="minimal" name='type'/>
        Select
    </label>
</div>
<input type="hidden" name='fieldkey' value='<?php echo $result[0]['fieldname']?>'/>
