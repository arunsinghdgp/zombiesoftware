
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Assign Resource
                    </h1>
                   
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
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
							   
                               <table class="table">
									<thead>
										<tr>
											<th>&nbsp;</th>
											<?php 
											$headCount=count($group);
											foreach($group as $g){?>
												<th><?php echo $g['group_name']?></th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										
											<?php foreach($resource as $r){
											  if($r['group_role_name']!=$roleName){ ?>
												<tr>
													<td colspan="<?php echo $headCount+1?>">
														<b><?php echo $r['group_role_name'];?></b>
													</td>
												</tr>	
											<?php  } ?>
											
										<tr>
											<td>
												<?php echo $r['resource_name']?>
											</td>
											<?php 
												for($i=1;$i<=$headCount;$i++){ ?>
												<td>
													<input type="checkbox" name='' />
												</td>
												<?php }
											?>
										</tr>
											<?php 
												$roleName=$r['group_role_name'];
											} ?>
										
									</tbody>
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
		
        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>