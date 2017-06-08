 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    List Project
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
										<th>Project Name</th>
                    <th>Project Code</th>
                    <th>Project Start Date</th>
                    <th>Project Completion Date</th>
                    <th>Project Value</th>
										<th><?php echo $this->lang->line('ACTION')?></th>
									</tr>
									<?php
									if(count($project)>0){
									foreach($project as $l){?>
									<tr>
										<td><?php echo $l['project_name']?></td>
                    <td><?php echo $l['project_code']?></td>
                    <td><?php echo date("d-m-Y",strtotime($l['project_start_date']))?></td>
                    <td><?php echo date("d-m-Y",strtotime($l['project_estimated_completion_date']))?></td>
                    <td><?php echo $l['project_value']?></td>
										<td>
											<a href='<?php echo base_url()?>users/editproject/<?php echo $l['project_id']?>' class="btn btn-success"><?php echo $this->lang->line('EDIT')?></a>
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

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>
