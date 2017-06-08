 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      <?php echo $this->lang->line('LIST_USER')?>
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary" style="z-index:99999">
                               <table class="table">
									<tr>
										<th><?php echo $this->lang->line('NAME')?></th>
										<th><?php echo $this->lang->line('EMAIL')?></th>
										<th><?php echo $this->lang->line('DEPARTMENT')?></th>
										<th><?php echo $this->lang->line('USER_GROUP')?></th>
										<th><?php echo $this->lang->line('ACTION')?></th>
									</tr>
									<?php
									if(count($users)>0){
									foreach($users as $f){?>
									<tr>
										<td><?php echo $f['user_name']?></td>
										<td><?php echo $f['user_email']?></td>
										<td></td>
										<td></td>
										<td>
											<a href='' class="btn btn-success"><?php echo $this->lang->line('EDIT')?></a>
											<a href='' class="btn btn-danger">Delete</a>
										</td>

									</tr>
									<?php
										}
									}
									?>
							   </table>
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
        <!-- AdminLTE App -->
        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>
