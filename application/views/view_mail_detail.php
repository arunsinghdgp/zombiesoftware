<style>
a.submittalSelect{background: #4ECDC4;
    color: #000 !important;
    padding: 5px 10px;
    box-shadow: 0px 1px 1px 0px #3c3c3c;}
    .mailBody tr td:first-child{font-weight:bold}
</style>
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Detail
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
              <div class="box box-primary">
          <div class="box-header with-border">
            <h6 class="box-title">Mail Detail</h6>


          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              <li class="item">

                <div class="product-info">
                  <span class="label label-success pull-right">Delayed</span>
                  From:<br/>
                  To:<br/>
                      <span class="product-description">

                      </span>
                     <div class="col-md-3">
                      <i class="fa fa-user"></i> 2
                    </div>
                    <div class="col-md-3">
                      <i class="fa fa-paperclip"></i> 4
                    </div>
                    <div class="col-md-6">
                        <i class="fa fa-clock-o"></i> 23/03/2017
                    </div>
                </div>
              </li>

            </ul>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="javascript:void(0)" class="uppercase">View Detail</a>
          </div>
          <!-- /.box-footer -->
        </div>
            </div>
            <div class="col-sm-9">
                <section class="panel">

                    <div class="panel-body">
                        <div class="compose-btn pull-right col-sm-4 col-md-3">
                            <a class="btn btn-theme btn-sm btn-primary"> Forward</a>

                            <a class="btn btn-sm btn-primary" href="<?php echo base_url()?>workflow/reply/<?php echo $mail[0]['message_id'];?>">Reply</a>
                        </div>
                        <div class="compose-mail col-md-12">
                            <div class="col-md-4">
                            <b>Mail type</b><br/>
                            <?php echo $mail[0]['mailtype'];?>
                            </div>
                            <div class="col-md-4">
                              <b>Mail Number</b><br/>
                                KEO-<?php echo $mail[0]['mailtype'].'-'.$mail[0]['message_id'];?>
                            </div>
                            <div class="col-md-4">
                              <b>Reference Number</b><br/>
                                KEO-<?php echo $mail[0]['mailtype'].'-'.$mail[0]['message_id'];?>
                            </div>
                            <!--<div class="col-md-12" style="margin-top:20px">
                              <b>Subject</b><br/>
                                <?php echo $mail[0]['subject'];?>
                            </div>-->
                            <div class="col-md-12">
                              <br/><br/>
                                <table class="table mailBody">
                                  <tr>
                                      <td>Subject</td>
                                      <td><?php echo $mail[0]['subject'].' ';?></td>
                                  </tr>
                                  <tr>
                                      <td>From</td>
                                      <td><?php echo $fromuser[0]['user_name'].' ';?></td>
                                  </tr>
                                  <tr>
                                      <td>To</td>
                                      <td><?php
                                        foreach($tousers as $t){
                                          echo $t['user_name'].' ';
                                        }
                                      ?></td>
                                  </tr>
                                  <?php if($ccusers){?>
                                  <tr>
                                      <td>CC</td>
                                      <td><?php
                                        foreach($ccusers as $c){
                                          echo $c['user_name'].' ';
                                        }
                                      ?></td>
                                  </tr>
                                  <?php } ?>
                                  <tr>
                                      <td>Status</td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Sent On</td>
                                      <td><?php echo date("H:i:s d/m/Y",strtotime($mail[0]['timestamp']));?></td>
                                  </tr>
                                  <tr>
                                      <td><?php echo $mail[0]['action_required']?></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Date</td>
                                      <td><?php echo date("d/m/Y",strtotime($mail[0]['action_date']))?></td>
                                  </tr>
                                  <tr>
                                      <td>Status</td>
                                      <td>
                                        <?php if(trim($mail[0]['action_taken'])=='' && (strtotime($mail[0]['action_date']) > strtotime(date("Y-m-d"))) ) {
                                               echo 'Outstanding';
                                        }
                                        else{
                                               echo 'Overdue';
                                        }
                                        ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Contract package</td>
                                      <td><?php echo $mail[0]['contract_package']?></td>
                                  </tr>
                                  <tr>
                                      <td>Discipline</td>
                                      <td><?php echo $mail[0]['discipline']?></td>
                                  </tr>

                                  <tr>
                                      <td>Message</td>
                                      <td>  <?php echo $mail[0]['body'];?></td>
                                  </tr>
                                  <?php if(count($attachment_list)>0){?>
                                  <tr>
                                      <td>Attachments</td>
                                      <td>
                                        <?php
                                          $c=1;
                                          foreach($attachment_list as $l){?>
                                              <a href="<?php echo base_url()?>uploads/mail/<?php echo $l['attachment_name']?>" target="_new">
                                                Attachment <?php echo $c++;?> <br/>
                                              </a>
                                              <!--(<?php //echo filesize('../uploads/mail/'.$l['attachment_name'])?>-->
                                          <?php }
                                        ?>
                                      </td>
                                  </tr>
                                  <?php }
                                    if(count($submittal_list)>0){
                                  ?>
                                  <tr>
                                      <td>Submittals</td>
                                      <td>
                                        <?php
                                          $c=1;
                                          foreach($submittal_list as $l){?>
                                              <a href="<?php echo base_url()?>uploads/mail/<?php echo $l['attachment_name']?>" target="_new">
                                                Attachment <?php echo $c++;?> <br/>
                                              </a>

                                          <?php }
                                        ?>
                                      </td>
                                  </tr>
                                  <?php } ?>
                                </table>
                                <div class="compose-btn pull-right">
                                    <button class="btn btn-theme btn-sm btn-primary"> Forward</button>

                                    <button class="btn btn-sm btn-primary">Reply</button>
                                </div>
                            </div>
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
