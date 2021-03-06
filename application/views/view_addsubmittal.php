 <link href="<?php echo base_url()?>assets/css/chosen.css" rel="stylesheet" />
<div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>
			<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      <?php echo $this->lang->line('ADD_SUBMITTAL')?>
                    </h1>
                </section>
				<!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary" style="z-index:99999;float:left">
                               <?php 
								 if(isset($msg)){ ?>
									<div class="alert <?php echo $msg['type'];?> alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b><?php echo $msg['msg']?></b>
                                    </div>		
								
								<?php	} ?>
							   
                                <form role="form" action="/submittals/submitsubmital" method="POST" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <?php foreach($fields as $f){?>
                                        <div class="form-group col-md-6">
                                            <label for="field_<?php echo $f['id']?>">
                                            <?php echo $f['label']?>
                                            </label>
                                            <?php if($f['type'] == "text"){ ?>
                                            <input type="text" <?php if($f['is_mandatory'] == true){echo "required";}?> class="form-control" name="<?php echo $f['fieldname']?>" id="<?php echo $f['fieldname']?>">
                                            <?php }else if($f['type'] == "textarea"){ ?>
                                            <textarea class="textarea" <?php if($f['is_mandatory'] == true){echo "required";}?> name="<?php echo $f['fieldname']?>" id="<?php echo $f['fieldname']?>"></textarea>
                                            <?php }else if($f['type'] == "date"){ ?>
                                            <input type="text" <?php if($f['is_mandatory'] == true){echo "required";}?> class="form-control datepicker" name="<?php echo $f['fieldname']?>" id="<?php echo $f['fieldname']?>">
                                            <?php }else if($f['type'] == "select" || $f['type'] == "multiselect"){ ?>
                                            <select <?php if($f['is_mandatory'] == true){echo "required";}?> class="form-control <?php if($f['type'] == 'multiselect'){echo 'chosen-select';}?>" <?php if($f['type'] == "multiselect"){ ?>multiple="multiple"<?php } ?> name="<?php echo $f['fieldname']?><?php if($f['type'] == 'multiselect'){echo '[]';}?>" id="<?php echo $f['fieldname']?>">
                                                 <?php if($f['type'] != 'multiselect'){?><option value=''>Select <?php echo $f['label']?></option><?php } ?>
                                                 <?php foreach ($f['options'] as $optionIndex => $option) { ?>
                                                 <option value="<?php echo $option['option_value']; ?>"><?php echo $option['option_value']; ?></option>
                                                 <?php } ?>
                                            </select>
                                            <?php }else if($f['type'] == "file"){ ?>
                                            <input type="file" <?php if($f['is_mandatory'] == true){echo "required";}?> class="form-control" name="<?php echo $f['fieldname']?>" id="<?php echo $f['fieldname']?>">
                                            <?php } ?>
                                        </div>
                                        <?php  }?>
                                    </div><!-- /.box-body -->
									<div class="box-footer " style="float:left">
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
		<script src="<?php echo base_url()?>assets/js/plugins/bootstrap-multiselect/bootstrap-multiselect.js" type="text/javascript"></script>
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- fullCalendar -->
        <script src="<?php echo base_url()?>assets/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
		
        <!-- Sparkline -->
        <script src="<?php echo base_url()?>assets/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url()?>assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
		   <script src="<?php echo base_url()?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url()?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url()?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/chosen.jquery.js"></script>
		 <script>
		  $( function() {
			$(".datepicker").datepicker();
			$(".chosen-select").chosen();
		  });
		  </script>
		
    </body>
</html>