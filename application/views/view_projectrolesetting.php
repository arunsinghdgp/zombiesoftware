<style>
.midNav{float:left;list-style:none;margin-top:20px;}
.midNav li{    float: left;
    display: inline;
    list-style: none;
    padding: 10px;
    background: #eee;
    }
.midNav li a{color: #000;}
.midNav .selected{background:#333;color:#fff}
.midNav .selected a{background:#333;color:#fff}
</style>
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Project Role Setting
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

								<ul class="midNav">
								<?php $url=$this->uri->segment(3);?>
									<li class="<?php if($url=='' || $url=='user_organisation') echo 'selected'?>">
										<a href='<?php echo base_url()?>users/projectrolesetting/user_organisation'>User & Organizational Information</a>
									</li>
									<li class="<?php if($url=='project') echo 'selected'?>">
										<a href='<?php echo base_url()?>users/projectrolesetting/project'>Project Information</a>
									</li>
									<li class="<?php if($url=='submittalsearch') echo 'selected'?>">
										<a href='<?php echo base_url()?>users/projectrolesetting/submittalsearch'>Submittal & Search Settings</a>
									</li>
									<li class="<?php if($url=='documentfield') echo 'selected'?>">
										<a href='<?php echo base_url()?>users/projectrolesetting/documentfield'>Document Field Settings</a>
									</li>
									<li class="<?php if($url=='documentstatus') echo 'selected'?>">
										<a href='<?php echo base_url()?>users/projectrolesetting/documentstatus'>Document Status & Type</a>
									</li>
								</ul>
								
								
								<div class="col-md-12">
									<a href='<?php echo base_url()?>users/addgroup' class="btn btn-primary">Add Fields/Group</a>
									<a href='<?php echo base_url()?>users/assignaccess/project' class="btn btn-primary">Manage Organization Roles</a>
								</div>

                               <table class="table">
									<thead>
										<tr>
											<th>&nbsp;</th>
											<?php
											$headCount=count($group);
											foreach($group as $g){?>
												<th><?php
												$groupArray[]=$g['group_id'];
												echo $g['group_name']?></th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>

										<?php foreach($resource as $r){?>
										<tr>
											<td>
												<?php echo $r['resource_name']?>
											</td>
											<?php
												for($i=1;$i<=$headCount;$i++){ ?>
												<td>
													<input type="checkbox" class='cBox' name='access[]'
													data="<?php echo $groupArray[$i-1].'_'.$r['id']?>"/>
												</td>
												<?php }
											?>
										</tr>
											<?php

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
      <div id='resultDiv' style='width: 300px;
    height: 40px;
    margin: -25px auto 0px -150px;
    background: rgb(0, 0, 0);
    left: 50%;
    top: 50%;
    opacity: 0.9;
    position: fixed;
    z-index: 99999;
    color: #fff;
    padding: 13px 50px 38px 50px;
    font-size: 16px;display:none;'>
      </div>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
		<script>
		$('input.cBox').on('ifChanged', function (event) {
			if ($(this).prop('checked')) {
				$.ajax({
				   url: '<?php echo base_url()?>ajax/assignresourcetouser',
				   type: "POST",
				   data: {info:$(this).attr('data'),action:'insert'},
				   dataType: "json"
        })
				   .done(function (response) {
              if(response.msg){
                $('#resultDiv').html(response.msg);
                  $('#resultDiv').show(200);
                setTimeout(function () {
                    $('#resultDiv').hide(200);
                }, 3000);
              }
				   });
			} else {
        $.ajax({
           url: '<?php echo base_url()?>ajax/assignresourcetouser',
           type: "POST",
           data: {info:$(this).attr('data'),action:'delete'},
           dataType: "json"
         })
           .done(function (response) {
             if(response.msg){
               $('#resultDiv').html(response.msg);
               $('#resultDiv').show(200);
             setTimeout(function () {
                 $('#resultDiv').hide(200);
             }, 3000);
             }
           });
			}
		});
		</script>
    </body>
</html>
