<style>

</style>
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->


                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6 ">
						 <section class="content-header">
                    <h3>
                      <?php echo $this->lang->line('ADD_USER')?>
                    </h3>

                </section>
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
                                        <label for="username">First Name<sup>*</sup></label>
                                        <input type="text" required class="form-control" name='firstname' id='firstname' required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Middle Name</label>
                                        <input type="text" required class="form-control" name='middlename' id='middlename' >
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Last Name<sup>*</sup></label>
                                        <input type="text" required class="form-control" name='lastname' id='lastname' required>
                                    </div>
									<div class="form-group">
                                        <label for="useremail"><?php echo $this->lang->line('USER_EMAIL')?><sup>*</sup></label>
                                        <input type="email" required class="form-control" name='useremail' id='useremail' >
                                    </div>
									<div class="form-group">
                                        <label for="userid">Login Name<sup>*</sup></label>
                                        <input type="text" required class="form-control" name='userid' id='userid' >
                                    </div>
									<div class="form-group">
                                        <label for="userpassword"><?php echo $this->lang->line('USER_PASSWORD')?><sup>*</sup></label>
                                        <input type="password" required class="form-control" name='userpassword' id='userpassword' >
                                    </div>
									<!--<div class="form-group">
                                        <label for="usercontact"><?php echo $this->lang->line('USER_CONTACT')?></label>
                                        <input type="text" required class="form-control" name='usercontact' id='usercontact' >
                                    </div>
									<div class="form-group">
                                        <label for="userdesignation"><?php echo $this->lang->line('DESIGNATION')?></label>
                                        <input type="text" required class="form-control" name='userdesignation' id='userdesignation' >
                                    </div>-->
									<div class="form-group">
                                        <label for="userorganisation"><?php echo $this->lang->line('ORGANISATION')?><sup>*</sup></label>
                                        <select required class="form-control" name='userorganisation' id='userorganisation' >
											<option value=''>Select Organisation</option>
											<?php foreach($organisation_list as $l){?>
												<option value='<?php echo $l['organisation_id']?>'>
													<?php echo $l['organisation_name']?>
												</option>
											<?php } ?>
										</select>
                                    </div>
									<div class="form-group">
                                        <label for="userdivision"><?php echo $this->lang->line('DIVISION')?><sup>*</sup></label>
                                        <select  class="form-control" name='userdivision' id='userdivision' >
										                    </select>
                                    </div>
									<div class="form-group">
                                        <label for="userdivision"><?php echo $this->lang->line('PROJECTS')?><sup>*</sup></label>
                                        <select  class="form-control" name='projects' id='projects' multiple>
										</select>
                                    </div>

									<div class="form-group">
                                        <label for="userdivision">&nbsp;</label>
                                        <input type="checkbox" name='send_email' value="1" />Send login detail on email to user
                                    </div>

                                    </div><!-- /.box-body -->
									<div class="box-footer">
                                        <button type="submit" name='saveUser' value="save" class="btn btn-primary">Add User</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->



                        </div><!--/.col (left) -->

						<!-- left column -->
                        <div class="col-md-6 ">
						 <section class="content-header">
                    <h3>
                      Bulk Upload User
                    </h3>

                </section>
                            <!-- general form elements -->
                            <div class="box box-primary" style="z-index:99999">
								  <?php
								 if($uploadmsg){ ?>
									<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Sucess!</b> <?php echo $uploadmsg?>
                                    </div>

								<?php	} ?>
                                <form role="form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="box-body">


									<div class="form-group">
                                        <label for="userdivision">Upload Excel File
										(<a href="<?php echo base_url()?>uploads/sample/userexcel.xls" target="_new">click</a> here for format)</label>
                                        <input type="file" name='excelfile' id='excelfile' />
                                    </div>

                                    </div><!-- /.box-body -->
									<div class="box-footer">
                                        <button type="submit" name='uploaduser' value="save" class="btn btn-primary">Bulk Add User</button>
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
        $('body').on('change', '#userorganisation', function (){
          $.ajax({
                   url: '<?php echo base_url()?>ajax/getOrganisationDivision',
                   type: "POST",
                   data: {organisation:$(this).val()},
                   dataType: "json"

                })
                   .done(function (response) {
                     optionStr='';
                     $.each(response,function(i,val){
                       optionStr=optionStr+'<option value="'+val.id+'">'+val.division_name+'</option>';
                     });
                     $('#userdivision').html(optionStr);
                   });
        });
        </script>
    </body>
</html>
