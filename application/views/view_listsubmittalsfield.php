 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Submittal Fields</h1>
                </section>
                <section class="content-header">
                    <a href='' data-type="0" class="btn editBtn">Add Field</a>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary" style="z-index:99">
                               <table class="table">
									<tr>
										<th>Field Name</th>
										<th>Label</th>
										<th>Type</th>
										<th>Value</th>
									</tr>
									<?php foreach($fields as $f){?>
									<tr id='<?php echo $f['fieldname']?>' class="datarow">
										<td><?php echo $f['fieldname']?></td>
										<td><?php echo $f['label']?></td>
										<td><?php 
                                        switch ($f['type']) {
                                            case 'text':
                                                echo "Text";
                                                break;
                                            case 'date':
                                                echo "Date";
                                                break;
                                            case 'select':
                                                echo "Select";
                                                break;
                                            case 'multiselect':
                                                echo "Multi Select";
                                                break;
                                        }?></td>
										<td><a href='' data-type="<?php echo $f['id']?>" class="btn editBtn">Edit</a></td>

									</tr>
									<?php  }?>
							   </table>
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
					</div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

		<!-- Modal -->
<div id="modalBox" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id='updateForm'>
	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Submittal Field</h4>
      </div>
      <div class="modal-body" style="max-height: 500px; overflow-x:hidden; overflow-y:scroll">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary updateBtn">Update</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
	</form>

  </div>
</div>
        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
        
        <!-- Bootstrap -->
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
		<script>
        $(document).ready(function(){
            $('.editBtn').click(function(){
                var self = this;
                $.ajax({
                    url: '<?php echo base_url()?>ajax/addeditfield', // getchart.php
                    type: 'POST',
                    data: {argument: $(this).attr('data-type')},
                    success: function(response) {
                      $('#modalBox .modal-body').html(response);
                      if($(self).attr('data-type') == 0){
                        $('#modalBox .updateBtn').html("Add");
                      }else{
                        $('#modalBox .updateBtn').html("Update");
                      }
                      
                      $('#modalBox').modal('show');
                    }
                });
                return false;
            });

            $('.updateBtn').click(function(){
                $.ajax({
                    url: '<?php echo base_url()?>ajax/updatefield',
                    type: 'POST',
                    dataType:'json',
                    data:$('#updateForm').serialize(),
                    success: function(response) {
                      $('#modalBox').modal('hide');
                      window.location.reload();
                    }
                });
                return false;
            });

            $('body').on('change', '#updateForm input[type="radio"]', function(){
                $('.fieldOptionsDiv .controls').html("");
                if($(this).val() == "select" || $(this).val() == "multiselect"){
                    $('.fieldOptionsDiv').removeClass('hide');
                   addBlankOptionRow();
                }else{
                    $('.fieldOptionsDiv').addClass('hide');
                }
                
            });

            function addBlankOptionRow(e){
                e && e.preventDefault();
                var numFields = $('.fieldOptionsDiv input').length,
                    optionInputHtml = '<div class="inputMainContainer col-md-6"> \
                            <input autocomplete="off" class="input" name="options[]" type="text" style="padding: 4px 0px 4px 0px;"/> \
                            <button class="btn btn-success add-more" type="button">+</button> \
                    </div>';
                $('.fieldOptionsDiv .controls').append(optionInputHtml);
                if(numFields > 0){
                    $(".inputMainContainer:eq("+parseInt(numFields-1)+") button").removeClass("btn-success add-more").addClass("btn-danger remove-me").text('-');                    
                }
            }

            function removeOptionRow(e){
                e && e.preventDefault();
                 $(this).closest(".inputMainContainer").remove();
            }

            $("body").on('click', '#modalBox .add-more', addBlankOptionRow);

            $("body").on('click','#modalBox .remove-me', removeOptionRow);

        });
			
		</script>
    </body>
</html>
