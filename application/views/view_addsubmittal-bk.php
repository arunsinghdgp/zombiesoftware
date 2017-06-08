<link href="<?php echo base_url()?>assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
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
                                        <label for="organisationcontact">
                    										Document Number
                    										</label>
                                        <input type="text" required class="form-control " name='documentnumber' id='documentnumber' >
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="organisationcontact">
                                        Revision
                                        </label>
                                      <input type="text" required class="form-control " name='organisationcontact' id='organisationcontact' >
                                      </div>

                                    <div class="form-group col-md-6">
                                        <label for="organisationname"><?php echo $this->lang->line('TITLE')?></label>
                                        <input type="text" required class="form-control " name='organisationname' id='organisationname' >
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                      Type
                                      </label>
                                      <select id='type' name='type'  class="form-control">
                                          <option value="">-- Select --</option>
<?php 
$typeArray=array('As Built Drawing'
,'Calculations'
,'Chart'
,'Daily Report'
,'Design Drawing'
,'Document Submittal'
,'Drawings'
,'Engineer Instruction'
,'Health and Safety/Environmental'
,'Inspection Test Plan'
,'Material Delivered to Site'
,'Material Submittal'
,'Method Statement'
,'Monthly Reports'
,'Plan'
,'Prequalification'
,'Programme'
,'Project Quality Plan'
,'Report'
,'Request for Inspection Approval'
,'Sample Submittals'
,'Schedule'
,'Shop Drawing'
,'Specification'
,'Technical Submittal'
,'Technical Test Report'
,'Weekly Reports'
,'Work Inspection Request');

									foreach($typeArray as $t){
										echo "<option value='".$t."'>".$t."</option>";
									} ?>

                                      </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                      Status
                                      </label>
                                      <select id='status' name='status' class="form-control">

                                        <option value="">-- Select --</option>
<?php
$statusArray=array(
'A-No objection',
'B-No objection with comments',
'C-Closed',
'C-Revise and Re-submit',
'D-Rejected',
'F-Information',
'O-Open',
'S-Superseded',
'U-Under Review'
);
									foreach($statusArray as $s){
										echo "<option value='".$s."'>".$s."</option>";
									} ?>                                     
									  
                                      </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                      Discipline
                                      </label>
                                      <select id='discipline' name='discipline' class="form-control">

                                      <option value="">-- Select --</option>
                            <?php 
							$disciplineArray=array(
'Architectural',
'Civil',
'Electrical',
'General',
'Health & Safety',
'Infrastructure',
'Mechanical',
'Others',
'Signage',
'Structural'
);						foreach($disciplineArray as $d){
										echo "<option value='".$d."'>".$d."</option>";
									}
							?>          
                                      </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                      Contract Package
                                      </label>
                                      <select id='contract_package' name='contract_package' class="form-control">

                                      <option value="">-- Select --</option>
                                      <option value="Blockwork Package">Blockwork Package</option>
                                      <option value="Enabling Works Package">Enabling Works Package</option>
                                      <option value="External Power Package">External Power Package</option>
                                      <option value="Main Works Package">Main Works Package</option>
                                      <option value="OS&amp;E Package">OS&amp;E Package</option>
                                      <option value="Structural Works Package">Structural Works Package</option>
                                      </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                      Contract Document<br/>
                                      </label>
                                      <select id='contract_document' name='contract_document' class="form-control">

                                      <option value="">-- Select --</option>
                                      <option value="Yes">Yes</option>

                                      </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                    Required for Handover<br/>
                                      </label>
                                      <select id='required_for_handover' name='required_for_handover' class="form-control">

                                      <option value="">-- Select --</option>
                                      <option value="Yes">Yes</option>

                                      </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="organisationcontact">
                                      Confidential
                                      </label>
                                      <input type="checkbox" required class="form-control" name='confidential' id='confidential' value="Yes">Yes
                                      </div>
                                    <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                    Area<br/>
                                      </label>
                                      <select multiple id='area' name='area' class="form-control">
<?php 
$areaArray=array(
'1G4-1 Vill Group',
'1G4-1M Villa Group',
'1G4-2 Villa Group',
'1G5-1M Villa Group',
'1G5-2 Villa Group',
'1G5-4 Villa Group',
'1G5-4M Villa Group',
'1G6-1 Villa Group',
'1G6-2 Villa Group',
'1G6-4 Villa Group',
'1G6-5M Villa Group',
'Aster',
'Claret',
'Coursetia',
'G3-2 Villa Group',
'G4-1 Villa Group',
'G4-1M Villa Group',
'G4-2 Villa Group',
'G4-3 Villa Group',
'G4-3M Villa Group',
'G4-4 Villa Group',
'G4-5 Villa Group',
'G4-6 Villa Group',
'G4-6M Villa Group',
'G5-1 Villa Group',
'G5-1M Villa Group',
'G5-2 Villa Group',
'G5-3 Villa Group',
'G5-4 Villa Group',
'G5-4M Villa Group',
'G6-1 Villa Group',
'G6-1M Villa Group',
'G6-2 Villa Group',
'G6-3 Villa Group',
'G6-4 Villa Group',
'G6-5 Villa Group',
'G6-5M Villa Group',
'Infrastructure',
'Odora',
'Other',
'Project Wide-PW',
'R2-EE Villa Type',
'R2EEM Villa Type',
'R2-EM Villa Type',
'R2-M Villa Type',
'R2-M1 Villa Type',
'R2Mb Villa Type',
'R3EE Villa Type',
'R3EM Villa Type',
'R3-M Villa Type',
'Sycamore',
'V2 Villa Type',
'V2M Villa Group',
'V3 Villa Group',
'V3M Villa Group',
'V5M Villa Group',
'Zinnia'
);
									foreach($areaArray as $a){
										echo "<option value='".$a."'>".$a."</option>";
									}	?>							  

                                      </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                    Sub Zone<br/>
                                      </label>
                                      <select multiple id='subarea' name='subarea' class="form-control">
<?php
$subZoneArray=array('R2-EE','R2M1','R2-M','R2M(M)','R2M1(M)','R2EM',
'R2E(M)',
'R2EE',
'R2-EE',
'R2M'
);
									foreach($subZoneArray as $sz){
										echo "<option value='".$sz."'>".$sz."</option>";
									}
?>
                                      </select>
                                    </div>
                                   
                                      <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                        Print Size
                                        </label>
                                        <input type="text" required class="form-control" name='printsize' id='printsize' >
                                      </div>
                                      <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                        Reference
                                        </label>
                                        <input type="text" required class="form-control" name='reference' id='reference' >
                                      </div>
                                      <div class="form-group col-md-6">
                                      <label for="organisationcontact">
                                        Tag Number
                                        </label>
                                        <input type="text" required class="form-control" name='tag_number' id='tag_number' >
                                      </div>

                	<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										Responsible Contractor
										</label>
                                        <select required class="form-control">
											<option value=''>Select Contractor</option>
										</select>
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										Received From
										</label>
                                        <input type="text" required class="form-control" name='organisationcontact' id='organisationcontact' >
                                    </div>

									<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										KEO Received Date
										</label>
                                        <input type="text" required class="form-control datepicker" name='organisationcontact' id='organisationcontact' >
                                    </div>

									<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										Cluster/Area
										</label>
                                        <select required class="form-control " >
										 <option value="">Select</option>
										 <option>1G4-1</option>
										  <option>1G4-2</option>
										</select>
                                    </div>

									

									<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										Issue Date
										</label>
                                        <input type="text" required class="form-control datepicker" name='organisationcontact' id='organisationcontact' >
                                    </div>

									<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										Received Date
										</label>
                                        <input type="text" required class="form-control datepicker" name='organisationcontact' id='organisationcontact' >
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										Final Due Date
										</label>
                                        <input type="text" required class="form-control datepicker" name='organisationcontact' id='organisationcontact' >
                                    </div>

									<div class="form-group col-md-12">
                                        <label for="organisationcontact">
										Description</label>
                                         <textarea class="textarea" placeholder="Write description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										Status
										</label>
                                        <select required class="form-control " >
										 <option>A - Approved</option>
										 <option>B - Approved with Comment</option>
										 <option>C - Revised and Re-submit</option>
										 <option>D - Rejected</option>
										 <option>F-Information Only</option>
										 <option>S - Superseded</option>
										 <option>X - Not Yet Completed</option>
										</select>
                                    </div>

									<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										Upload Document
										</label>
                                        <input type="file" name='document' required  class="form-control">
                                    </div>


									<div class="form-group col-md-6">
                                        <label for="organisationcontact">
										Consultant Name
										</label>
                                        <input type="text" required class="form-control " name='organisationcontact' id='organisationcontact' >
                                    </div>

									<div class="form-group col-md-12">
                                        <label for="organisationcontact">
										Remarks</label>
                                         <textarea class="textarea" placeholder="Write your remark here" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>



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



		 <script>
		  $( function() {
			$( ".datepicker" ).datepicker();
			$(".textarea").wysihtml5();
		  } );
		  </script>

    </body>
</html>
