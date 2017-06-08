
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      <?php echo $this->lang->line('ADD_USER')?>
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
                                        <label for="username">Group Name</label>
                                        <select><option>
											Group Name
										</option></select>
                                    </div>   
                                    <?php foreach($fields as $f){?>
									<div class="form-group">
                                        <label for="username"><?php echo $f['label']?></label>
                                        <input type="checkbox" required class="form-control" name='username' id='username' >Add
										<input type="checkbox" required class="form-control" name='username' id='username' >Update
										<input type="checkbox" required class="form-control" name='username' id='username' >Show In Search Filter
										<input type="text" required class="form-control" name='username' id='username' style="width:30px" >Order
                                    </div>
									<?php } ?>
									
									
                                       
                                    </div><!-- /.box-body -->
									<div class="box-footer">
                                        <button type="submit" name='saveUser' value="save" class="btn btn-primary">ADD</button>
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