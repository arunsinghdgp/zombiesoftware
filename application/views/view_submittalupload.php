<style>
#progressPercent{height:10px;background-color:#367fa9;width:0%;}
</style>
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        
                        <?php echo $this->lang->line('UPLOAD_SUBMITTAL')?>
                    </h1>
                   
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary" style="z-index:99999">
                               
                                <form role="form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="box-body">
                                       
                                        <div class="form-group">
                                            <label for="sortpicture">File input</label>
                                            <input type="file" name='file' id="sortpicture">
                                            <p class="help-block">Please upload the excel file</p>
                                        </div>
                                       
                                    </div><!-- /.box-body -->
									<div id='progressPercent' style=''></div>
                                    <div class="box-footer">
                                        <button type="submit" id='upload' class="btn btn-primary"> <?php echo $this->lang->line('UPLOAD')?></button>
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
		<script>
		$('#upload').on('click', function() {
			var file_data = $('#sortpicture').prop('files')[0];   
			var form_data = new FormData();                  
			form_data.append('file', file_data);
			                            
			$.ajax({
						url: '<?php echo base_url()?>submittals/uploadsubmittal', // point to server-side PHP script 
						dataType: 'text',  // what to expect back from the PHP script, if anything
						xhr: function() {
								var myXhr = $.ajaxSettings.xhr();
								if(myXhr.upload){
									myXhr.upload.addEventListener('progress',progress, false);
								}
								return myXhr;
						},
						cache: false,
						contentType: false,
						processData: false,
						data: form_data,                         
						type: 'post',
						success: function(php_script_response){
							//alert(php_script_response); // display response from the PHP script, if any
							window.location.href='<?php echo base_url()?>submittals/listsubmittalfields';
						}
			 });
			 
			 return false;
});

function progress(e){

    if(e.lengthComputable){
        var max = e.total;
        var current = e.loaded;

        var Percentage = parseInt((current * 100)/max);
        console.log(Percentage);
		$('#progressPercent').html('<br/><br/>'+Percentage+'%').css('width',Percentage+'%');

        if(Percentage >= 100)
        {
           $('#progressPercent').html('Upload Complete');
        }
    }  
 }
		</script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>