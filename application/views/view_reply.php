<style>
a.submittalSelect{background: #4ECDC4;
    color: #000 !important;
    padding: 5px 10px;
    box-shadow: 0px 1px 1px 0px #3c3c3c;}
</style>
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Inbox
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row mt">
            <div class="col-sm-12">
            <section class="panel">
                        <div class="panel-body">

                            <ul class="nav nav-pills  mail-nav">
                                <li>
                                <a href="<?php echo base_url()?>workflow/compose" class="btn btn-compose">
                                    <i class="fa fa-pencil"></i>  Compose Mail Type
                                </a>
                                </li>
                                <li class="active"><a href="<?php echo base_url()?>workflow"> <i class="fa fa-inbox"></i>
                                 Incoming  <span class="label label-theme pull-right inbox-notification"><?php echo count($mail);?></span></a></li>
                                <li><a href="#"> <i class="fa fa-envelope-o"></i> Outgoing</a></li>
                                <li><a href="#"> <i class="fa fa-exclamation-circle"></i> Important</a></li>
                                <li><a href="#"> <i class="fa fa-file-text-o"></i> Drafts </a></li>
                                <li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
                            </ul>
                        </div>
                    </section>


            </div>
            <div class="col-sm-3">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                    </header>
                </section>
            </div>
            <div class="col-sm-9">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case"> Reply Mail
                           <form action="#" class="pull-right mail-src-position">
                            <div class="input-append">
                                <input type="text" class="form-control " placeholder="Search Mail">
                            </div>
                        </form>
                       </h4>
                    </header>
                    <div class="panel-body">
                        <!-- <div class="compose-btn pull-right">
                            <button class="btn btn-theme btn-sm"><i class="fa fa-check"></i> Send</button>
                            <button class="btn btn-sm"><i class="fa fa-times"></i> Discard</button>
                            <button class="btn btn-sm">Draft</button>
                        </div> -->
                        <div class="compose-mail">
                            <form role="form-horizontal" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label for="subject" class="">Access Mail Type:</label>
                                    <select class="form-control" name="mailtype" id='mailType'>
                    <option value=''>Select</option>
                    <option>CVI</option>
<option>Email</option>
<option>Letter</option>
<option>Memo</option>
<option>MOM</option>
<option value="Transmittal Form">Transmittal Form</option>
<option>RFI</option>
									</select>
                                </div>
								<div class="form-group">
                                    <label for="to" class="">To:</label>
                                    <input type="text" tabindex="1" id="toUser" name='touser' class="touser form-control">

                                    <div class="compose-options">
                                        <a onclick="$(this).hide(); $('#ccUser').parent().removeClass('hidden'); $('#ccUser').focus();" href="javascript:;">Cc</a>

                                    </div>
                                </div>

                                <div class="form-group hidden">
                                    <label for="cc" class="">Cc:</label>
                                    <input type="text" tabindex="2" id="ccUser" name='ccuser[]' class="form-control">
                                </div>


								 <div class="form-group col-md-6">
                                    <label for="subject" class="">Action Required:</label>
                                    <select required class="form-control" id='action_required' name="action_required">
                                    <option value=''>Select</option>
<?php
$actionRequired=array("Respond By",
"Approved by",
"Submit with Commnet by",
"Revise and resubmit by",
"Tender Submit by");
foreach($actionRequired as $a){
	echo "<option value='".$a."'>".$a."</option>";
}
?>


									</select>
                                </div>
								 <div class="form-group col-md-6">
                                    <label for="subject" class="">Date:</label>
                                   <input type="text" id='response_date' name="response_date" readonly tabindex="1" id="date" class="datepicker form-control">
                                </div>
<?php
$division=array("ANHE",
"CS",
"VP-1",
"VP-2",
"VP-3",
"VP-3 to 5");?>
								<div class="form-group col-md-6">
                                    <label for="subject" class="">Division:</label>
                                    <select class="form-control" name="division[]" multiple>
<?php

foreach($division as $d){
	echo "<option value='".$d."'>".$d."</option>";
}
?>


									</select>
                                </div>
								<?php
$discipline=array("Architectural",
"Civil",
"Electrical",
"General",
"Health & Safety",
"Infrastructure",
"Mechanical",
"Others",
"Signage",
"Structural");?>
								<div class="form-group col-md-6">
                                    <label for="subject" class="">Discipline:</label>
                                    <select class="form-control" name="discipline[]" multiple>
<?php

foreach($discipline as $d){
	echo "<option value='".$d."'>".$d."</option>";
}
?>


									</select>
                                </div>
				<?php
$area=array("1G4-1 Vill Group",
"1G4-1M Villa Group",
"1G4-2 Villa Group",
"1G5-1M Villa Group",
"1G5-2 Villa Group",
"1G5-3 Villa Group",
"1G5-4 Villa Group",
"1G5-4M Villa Group",
"1G6-1 Villa Group",
"1G6-2 Villa Group",
"1G6-4 Villa Group",
"1G6-5 Villa Group",
"1G6-5M Villa Group",
"Aster",
"Claret",
"Coursetia",
"G3-2 Villa Group",
"G4-1 Villa Group",
"G4-1M Villa Group",
"G4-2 Villa Group",
"G4-3 Villa Group",
"G4-3M Villa Group",
"G4-4 Villa Group",
"G4-5 Villa Group",
"G4-6 Villa Group",
"G4-6M Villa Group",
"G5-1 Villa Group",
"G5-1M Villa Group",
"G5-2 Villa Group",
"G5-3 Villa Group",
"G5-4 Villa Group",
"G5-4M Villa Group",
"G6-1 Villa Group",
"G6-1M Villa Group",
"G6-2 Villa Group",
"G6-3 Villa Group",
"G6-4 Villa Group",
"G6-5 Villa Group",
"G6-5M Villa Group",
"Infrastructure",
"Odora",
"Other",
"Project Wide-PW",
"R2-EE Villa Type",
"R2-EM Villa Type",
"R2-M Villa Type",
"R2-M1 Villa Type",
"R2EEM Villa Type",
"R2Mb Villa Type",
"R3-M Villa Type",
"R3EE Villa Type",
"R3EM Villa Type",
"Sycamore",
"V2 Villa Type",
"V2M Villa Group",
"V3 Villa Group",
"V3M Villa Group",
"V5M Villa Group",
"Zinnia");?>
								<div class="form-group col-md-6">
                                    <label for="subject" class="">Area:</label>
                                    <select class="form-control" name="area" >
<?php

foreach($area as $d){
	echo "<option value='".$d."'>".$d."</option>";
}
?>


									</select>
                                </div>
					<?php
$subarea=array("Architectural",
"Civil",
"Electrical",
"General",
"Health & Safety",
"Infrastructure",
"Mechanical",
"Others",
"Signage",
"Structural");?>
								<div class="form-group col-md-6">
                                    <label for="subject" class="">Subarea:</label>
                                    <select class="form-control" name="subarea[]" multiple>
<?php

foreach($subarea as $d){
	echo "<option value='".$d."'>".$d."</option>";
}
?>


									</select>
                                </div>
							<?php
$reasonForIssue=array("Approval",
"Construction",
"Information",
"Review",
"Tender");?>
								<div class="form-group" id='reasonForIssue' style="display:none;">
                                    <label for="subject" class="">Reason for Issue:</label>
                                    <select class="form-control" name="reason_for_issue" >
                                      <option value="">Select</option>
<?php

foreach($reasonForIssue as $d){
	echo "<option value='".$d."'>".$d."</option>";
}
?>


									</select>
                                </div>

								<?php
$contractPackage=array("Blockwork Package",
"Enabling Works package",
"External Power Package",
"Main Works Package",
"OS&E Package",
"Structural Works Package");?>
								<div class="form-group">
                                    <label for="subject" class="">Contract Package:</label>
                                    <select class="form-control" name="contract_package" >
                                      <option value=''>Select</option>
<?php

foreach($contractPackage as $d){
	echo "<option value='".$d."'>".$d."</option>";
}
?>


									</select>
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="">Subject:</label>
                                    <input type="text" name='subject' tabindex="1" id="subject" class="form-control" value="<?php echo "Re- ".$mail[0]['subject']?>">
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="">Message:</label>
                                    <textarea class="editor form-control" name="message" rows="9" ></textarea>
                                </div>
                                <div class="compose-editor">

                                    <label for="subject" class="">Select Local File:</label>
                                    <input type="file" name='attachment[]' class="default">
                                    <a href="" class="addMoreFile">Add More[+]</a>
                                    <div class="fileDiv">
                                    </div>
                                    <br/>
                                  </div>
                                  <div class="form-group">
                                      <a href="" class='submittalSelect'>Select Submittal[+]</a>
                                      <div id="submittalPreview">
                                      </div>

                                  </div>

                                <div class="compose-btn">
                                  <br/>
                                    <button class="btn btn-theme btn-sm" name="sendbtn" value="save"><i class="fa fa-check"></i> Send Reply</button>
                                    <button class="btn btn-sm"><i class="fa fa-times"></i> Discard</button>
                                    <button class="btn btn-sm">Draft</button>
                                </div>

                                <div class="form-group">
                                  <br/>
                                  <br/>
                                    <label for="subject" class=""><h4>Trail Mail</h4></label>
                                    <table class="table">
                                    <tr>
                                      <td>From</td>
                                      <td><?php echo $fromuser[0]['user_name'].' ';?></td>
                                    </tr>
                                    <tr>
                                      <td>Sent</td>
                                      <td><?php echo date("H:i:s d/m/Y",strtotime($mail[0]['timestamp']));?></td>
                                    </tr>
                                    <tr>
                                        <td>To</td>
                                        <td><?php
                                          foreach($tousers as $t){
                                            echo $t['user_name'].' ';
                                          }
                                        ?></td>
                                    </tr>
                                    <tr>
                                      <td>Mail Number</td>
                                      <td>
                                      KEO-<?php echo $mail[0]['mailtype'].'-'.$mail[0]['message_id'];?>
                                    </td>
                                    </tr>
                                    <tr>
                                      <td>Subject</td>
                                    <td><?php echo $mail[0]['subject'];?></td>
                                    </tr>
                                    <tr>
                                      <td>Message</td>
                                      <td><?php echo $mail[0]['body'];?></td>
                                    </tr>




                                    </table>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
                    </div>   <!-- /.row -->
					</div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.tokeninput/1.6.0/jquery.tokeninput.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.tokeninput/1.6.0/styles/token-input.css" />

 <script type="text/javascript">
 $(document).ready(function () {
      $('.submittalSelect').click(function(){
        var w = window.open("<?php echo base_url()?>submittals/selectsubmittal", "popupWindow", "width=1000, height=400, scrollbars=yes");
                var $w = $(w.document.body);
                //$w.html("<textarea></textarea>");
        return false;
      });
     $("#toUser,#bccUser,#ccUser").tokenInput("<?php echo base_url()?>ajax/getUserList");
 });
 </script>

     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <script>
            $( function() {


            $('#mailType').change(function(){
              if($(this).val()=='Transmittal Form')
                  $('#reasonForIssue').show();
                else
                  $('#reasonForIssue').hide();
            });

            $('#action_required').change(function(){
              if(!$(this).val()){
                $("#response_date").datepicker("disable");
                  $('#response_date').attr('readonly','readonly');
                  $('#response_date').removeClass('hasDatepicker');
                  $('#response_date').removeClass('datepicker');

                }
                else{
                  $('#response_date').removeAttr('readonly');
                  $( ".datepicker" ).datepicker();
                }
            });


              $('.editor').summernote({
                height: 150
              });


              $(document).on("click", '.addMoreFile', function(event) {
              //$('.addMoreFile').click(function(){
                  fileStr="<div class='wrapFile'><input type='file' name='attachment[]' /><a href='' class='removeFile'>Remove[X]</a></div>";
                  $('.fileDiv').append(fileStr);
                  return false;
              });

              $(document).on("click", '.removeFile', function(event) {
              //$('.removeFile').click(function(){
                  $(this).closest('.wrapFile').remove();
                  return false;
              });


            } );
            </script>
</body>
</html>
