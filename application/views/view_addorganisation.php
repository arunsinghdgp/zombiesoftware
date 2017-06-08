
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      <?php echo $this->lang->line('ADD_ORGANISATION')?>
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12 ">
                            <!-- general form elements -->
                            <div class="box box-primary" style="z-index:99999">
                               <?php
								 if($msg){ ?>
									<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Sucess!</b> <?php echo $msg?>
                                    </div>

								<?php	} ?>

                                <form role="form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="box-body">

                                    <div class="form-group col-md-6">
                                        <label for="organisationname"><?php echo $this->lang->line('ORGANISATION_NAME')?><sup>*</sup></label>
                                        <input type="text" required class="form-control" name='organisationname' id='organisationname' >
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="organisationname"><?php echo $this->lang->line('ORGANISATION_LOGO')?></label>
                                        <input type="file" required class="form-control" name='organisation_logo' id='organisationlogo' style="width:60%;margin-right:20px">
										<div id='logoPreview' style='display:none'>
											<img src=  />
										</div>
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="organisationname"><?php echo $this->lang->line('TRADING_NAME')?><sup>*</sup></label>
                                        <input type="text" required class="form-control" name='trading_name' id='trading_name' >
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationname"><?php echo $this->lang->line('ORGANISATION_ABBREVIATION')?><sup>*</sup></label>
                                        <input type="text" required class="form-control" name='organisation_abbreviation' id='organisation_abbreviation' >
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationname"><?php echo $this->lang->line('ORGANISATION_REGISTRATION_NUMBER')?></label>
                                        <input type="text" required class="form-control" name='organisation_registrationnumber' id='organisationr_egistrationnumber' >
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										<?php echo $this->lang->line('ORGANISATION_CONTACT')?></label>
                                        <input type="text" required class="form-control" name='organisationcontact' id='organisationcontact' >
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationid"><?php echo $this->lang->line('ORGANISATION_EMAIL')?></label>
                                        <input type="text" required class="form-control" name='organisationemail' id='organisationemail' >
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationpassword"><?php echo $this->lang->line('ORGANISATION_PASSWORD')?><sup>*</sup></label>
                                        <input type="password" required class="form-control" name='organisation_password' id='organisation_password' >
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationaddress"><?php echo $this->lang->line('ORGANISATION_ADDRESS')?><sup>*</sup></label>
                                        <input type="text" required class="form-control" name='organisation_address' id='organisation_address' >
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationaddress"><?php echo $this->lang->line('WEBSITE')?></label>
                                        <input type="text" required class="form-control" name='organisation_website' id='organisation_website' >
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationaddress">Organisation Division</label>
                                        <div class='divisionWrap'>
											<div class="col-md-6 divAddMore">
											<input type="text" required class="form-control" name='division[]' >
											</div>
											<div class="col-md-3">
												<a href='' class='addMore'>Add More [+]</a>
											</div>


										</div>
                                    </div>
									<fieldset style="width:100%">
										<legend>Postal Address</legend>

										<div class="form-group col-md-6">
                                        <label for="organisationaddress"><?php echo $this->lang->line('COUNTRY')?><sup>*</sup></label>
                                        <select required class="form-control" name='organisation_postal_country' id='organisation_postal_country' >
										<?php foreach($countryList as $s){?>
											<option value='<?php echo $s['Code']?>'><?php echo $s['Name']?></option>
										<?php } ?>
										</select>
										</div>
										<div class="form-group col-md-6">
                                        <label for="organisationaddress"><?php echo $this->lang->line('CITY')?><sup>*</sup></label>
                                       <select required class="form-control" name='organisation_postal_city' id='organisation_postal_city' >
										</select>
										</div>
										<div class="form-group col-md-6">
                                        <label for="organisationaddress"><?php echo $this->lang->line('ADDRESS')?><sup>*</sup></label>
                                        <input type="text" required class="form-control" name='organisation_postal_address' id='organisation_postal_address' >
										</div>

										<div class="form-group col-md-6">
                                        <label for="organisationaddress"><?php echo $this->lang->line('POSTCODE')?></label>
                                        <input type="text" required class="form-control" name='organisation_postal_pincode' id='organisation_postal_pincode' >
										</div>
									</fieldset>
									<div class="form-group col-md-6">
                                        <label for="organisationaddress">
											<input type="checkbox" value='1' name='differentdelivery' id='differentdelivery'>Organisation has different delivery address
										</label>

										</div>
									<fieldset id='deliveryDiv' style="width:100%;display:none;">
										<legend>Delivery Address</legend>

										<div class="form-group col-md-6">
                                        <label for="organisationaddress"><?php echo $this->lang->line('COUNTRY')?></label>
                                        <select  class="form-control" name='organisation_delivery_country' id='organisation_delivery_country' >
										<?php foreach($countryList as $s){?>
											<option value='<?php echo $s['Code']?>'><?php echo $s['Name']?></option>
										<?php } ?>
										</select>
										</div>
										<div class="form-group col-md-6">
                                        <label for="organisationaddress"><?php echo $this->lang->line('CITY')?></label>
                                       <select  class="form-control" name='organisation_delivery_city' id='organisation_delivery_city' >
										</select>
										</div>
										<div class="form-group col-md-6">
                                        <label for="organisationaddress"><?php echo $this->lang->line('ADDRESS')?></label>
                                        <input type="text"  class="form-control" name='organisation_delivery_address' id='organisation_delivery_address' >
										</div>

										<div class="form-group col-md-6">
                                        <label for="organisationaddress"><?php echo $this->lang->line('POSTCODE')?></label>
                                        <input type="text"  class="form-control" name='organisation_delivery_pincode' id='organisation_delivery_pincode' >
										</div>
									</fieldset>

									<div class="form-group col-md-6">

                                        <label>
                                            <input type="radio" value="1" class="minimal-red" name='status'/>
                                        <?php echo $this->lang->line('ACTIVATE')?>
										</label>
                                        <label>
                                            <input type="radio" class="minimal-red"  value="0" class="minimal" name='status'/>
											 <?php echo $this->lang->line('DEACTIVATE')?>
                                        </label>



                                    </div>

                                    </div><!-- /.box-body -->
									<div class="box-footer">
                                        <button type="submit" id='saveBtn' class="btn btn-primary" name='saveOrganisation' value='save'><?php echo $this->lang->line('SAVE')?></button>
                                    </div>
                                </form>
                            </div><!-- /.box -->



                        </div><!--/.col (left) -->



                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
					</div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
		<script>
		$('.addMore').click(function(){
			inputStr="<input type='text'  class='form-control' name='division[]' >" ;
			$('.divAddMore').prepend(inputStr+"<br/>");
			return false;
		});

		$('input#differentdelivery').on('ifChanged', function (event) {
    if ($(this).prop('checked')) {
        $('#deliveryDiv').show();
    } else {
        $('#deliveryDiv').hide();
    }
});

$('body').on('change', '#organisation_postal_country', function (){
		$.ajax({
           url: '<?php echo base_url()?>ajax/getCityListByCountryId',
           type: "POST",
           data: {country:$(this).val()},
           dataType: "json"

        })
           .done(function (response) {
             optionStr='';
             $.each(response,function(i,val){
               optionStr=optionStr+'<option value="'+val.Name+'">'+val.Name+'</option>';
             });
             $('#organisation_postal_city').html(optionStr);
           });
});

$('body').on('change', '#organisation_delivery_country', function (){
  $.ajax({
           url: '<?php echo base_url()?>ajax/getCityListByCountryId',
           type: "POST",
           data: {country:$(this).val()},
           dataType: "json"

        })
           .done(function (response) {
             optionStr='';
             $.each(response,function(i,val){
               optionStr=optionStr+'<option value="'+val.Name+'">'+val.Name+'</option>';
             });
             $('#organisation_delivery_city').html(optionStr);
           });
});

function previewImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#logoPreview img').attr('src', e.target.result).css('width','80px');
	  $('#logoPreview').show();
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#organisationlogo").change(function() {
  previewImage(this);
});
		</script>
    </body>
</html>
