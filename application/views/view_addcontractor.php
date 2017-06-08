
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      <?php echo $this->lang->line('ADD_CONTRACTOR')?>
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
                                        <label for="organisationname"><?php echo $this->lang->line('ORGANISATION_NAME')?></label>
                                        <input type="text" required class="form-control" name='organisationname' id='organisationname' >
                                    </div>
									<div class="form-group">
                                        <label for="organisationcontact">
										<?php echo $this->lang->line('ORGANISATION_CONTACT')?></label>
                                        <input type="text" required class="form-control" name='organisationcontact' id='organisationcontact' >
                                    </div>
									<div class="form-group">
                                        <label for="organisationid"><?php echo $this->lang->line('ORGANISATION_ID')?></label>
                                        <input type="text" required class="form-control" name='organisationid' id='organisationid' >
                                    </div>
									<div class="form-group">
                                        <label for="organisationpassword"><?php echo $this->lang->line('ORGANISATION_PASSWORD')?></label>
                                        <input type="password" required class="form-control" name='organisationpassword' id='organisationpassword' >
                                    </div>
									<div class="form-group">
                                        <label for="organisationaddress"><?php echo $this->lang->line('ORGANISATION_ADDRESS')?></label>
                                        <input type="text" required class="form-control" name='organisationaddress' id='organisationaddress' >
                                    </div>
									
									<div class="form-group">
                                       
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
    </body>
</html>