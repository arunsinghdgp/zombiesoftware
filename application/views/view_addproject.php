<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/2.4.8/flatpickr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/2.4.8/flatpickr.min.js"></script>

 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Add Project
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6 ">
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

                                    <div class="form-group">
                                        <label for="organisationname">Project Full Name<sup>*</sup></label>
                                        <input type="text" required class="form-control" name='project_name' id='project_name' >
                                    </div>

									<!--<div class="form-group">
                                        <label for="organisationname">Project Short Name<sup>*</sup></label>
                                        <input type="text" required class="form-control" name='project_short_name' id='project_short_name' >
                                    </div>-->

									<div class="form-group">
                                        <label for="organisationname">Project Code<sup>*</sup></label>
                                        <input type="text" required class="form-control" name='project_code' id='project_code' >
                                    </div>
                                    <div class="form-group">
                                                          <label for="organisationname">RFS Number<sup>*</sup></label>
                                                          <input type="text" required class="form-control" name='rfs_number' id='rfs_number' required>
                                                      </div>
                                                      <div class="form-group">
                                                                            <label for="organisationname">RFS Cost<sup>*</sup></label>
                                                                            <input type="text" required class="form-control" name='rfs_cost' id='rfs_cost' required>
                                                                        </div>
									<div class="form-group">
                                        <label for="organisationname">Type of Project</label>
                                        <input type="text"  class="form-control" name='project_type' id='project_type' >
                                    </div>
									<div class="form-group">
                                        <label for="organisationname">Register Type</label>
                                        <select name="register_type" class="form-control">
                                          <option value="DOC" selected="">Documents</option>
                                          <option value="ASSET">Assets</option>
                                            <option value="DEFECT">Defects</option>
                                          <option value="ISSUE">Issues</option>

                                          <option value="ITEM">Items</option>
                                          <option value="INTERFACE">Interface</option>
                                        </select>
                                    </div>

									<div class="form-group">
                                        <label for="organisationname">Default Access Level</label>
                                        <select name="access_level" id="access_level" class="form-control">
                                            <option>Normal</option>
                                            <option>Read Only</option>
                                        </select>
                                    </div>

									<div class="form-group">
                                        <label for="organisationname">Organisation Access Level</label>
                                        <select name="accesslevel" id="organisation_access_level" name="organisation_access_level" class="form-control">
										</select>
                                    </div>
									<div class="form-group">
                                        <label for="organisationname">Contact Number</label>
                                         <input type="text"  class="form-control" name='project_contact' id='project_contact' >
                                    </div>

									<div class="form-group">
                                        <label for="organisationname">Fax Number</label>
                                       <input type="text"  class="form-control" name='project_fax' id='project_fax' >
                                    </div>


									<div class="form-group">
                                        <label for="organisationname">Country</label>
                                      <select name="project_country"  id='project_country' class="form-control">
                                        <?php foreach($countryList as $s){?>
                                          <option value='<?php echo $s['Code']?>'><?php echo $s['Name']?></option>
                                        <?php } ?>
                                      </select>
                                    </div>

									<div class="form-group">
                                        <label for="organisationname">City</label>
                                      <select name="project_city" id='project_city' class="form-control">
										</select>
                                    </div>
									<div class="form-group">
                                        <label for="organisationname">Project Address<sup>*</sup></label>
                                       <input type="text" required class="form-control" name='project_address' id='project_address' >
                                    </div>

									<!--<div class="form-group">
                                        <label for="organisationname">Project Info</label>
                                       <textarea  class="form-control" name='project_information' id='project_information' ></textarea>
                                    </div> -->

									<div class="form-group">
                                        <label for="organisationname">Project Start Date<sup>*</sup></label>
                                       <input type="text" required class="form-control" name='project_start_date' id='project_start_date' >
                                    </div>

									<div class="form-group">
                                        <label for="organisationname">Estimated Completion Date <sup>*</sup></label>
                                        <input type="text" required class="form-control" name='project_estimated_completion_date' id='project_estimated_completion_date' >
                                    </div>
                                    <div class="form-group">
                                                          <label for="organisationname">Revised Completion Date<sup>*</sup></label>
                                                         <input type="text" required class="form-control" name='revised_completion_date' id='revised_completion_date' >
                                                      </div>

									<div class="form-group">
                                        <label for="organisationname">Project Cost </label>
                                        <input type="text"  class="form-control" name='project_cost' id='project_cost' >
                                    </div>
                                    <div class="form-group">
                                                          <label for="organisationname">Revised Project Cost </label>
                                                          <input type="text"  class="form-control" name='revised_project_cost' id='revised_project_cost' >
                                                      </div>
									<div class="form-group">
                                        <label for="organisationname">Project Description<sup>*</sup></label>
                                       <textarea required class="form-control" name='project_description' id='project_description' required></textarea>
                                    </div>


                                    </div><!-- /.box-body -->
									<div class="box-footer">
                                        <button type="submit" id='saveBtn' class="btn btn-primary" name='saveProject' value='save'>Save</button>
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
        $('body').on('change', '#country', function (){
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
                     $('#city').html(optionStr);
                   });
        });
$(function() {
  flatpickr('#project_estimated_completion_date');
  flatpickr('#project_start_date');
        $("#project_estimated_completion_date").flatpickr();
        $("#project_start_date").flatpickr();
        $("#revised_completion_date").flatpickr();
});
        </script>
    </body>
</html>
