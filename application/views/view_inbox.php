<style>
.form-horizontal .form-group {
    margin-right: 0px;
    margin-left: 0px;
}
</style>
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->


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
            <div class="col-sm-12">
                <section class="panel">
                    <!--<header class="panel-heading wht-bg">
                       <h4 class="gen-case">
                        <form action="#" class="pull-right mail-src-position">
                            <div class="input-append">
                                <input type="text" id='searchBox' class="form-control " placeholder="Search Mail">
                            </div>
                        </form>
                       </h4>
                    </header>-->
                    <div class="panel-body minimal">
                      <div class="col-lg-12">
						  <div class="well">
						  <h3 align="center">Search Mail Inbox</h3>
							<form class="form-horizontal adv-srch">
								<div class="row">
								  <div class="form-group col-lg-2 col-md-3 col-sm-12">
									<label for="dwg-number" class="control-label">Mail No</label>
									<input type="text" class="form-control filterQueryInput" name="dwg-number" id="dwg-number">
								  </div>
								  <div class="form-group col-lg-3 col-md-5 col-sm-12">
									<label for="Description" class="control-label">Subject</label>
									<input type="text" class="form-control filterQueryInput" name="Description" id="Description">
								  </div>
								  <div class="form-group col-lg-2 col-md-3 col-sm-12">
									<label for="Type" class="control-label">Type</label>
									<select class="form-control filterQueryInput" name="Type" id="Type">
                    <option value="">Select</option>
                    <option>All</option>
                     <option>CVI</option>
 <option>Email</option>
 <option>Letter</option>
 <option>Memo</option>
 <option>MOM</option>
 <option value="Transmittal Form">Transmittal Form</option>
 <option>RFI</option>
 <option>Confidential</option>
									</select>
								  </div>
                  <div class="form-group col-lg-2 col-md-3  col-sm-12">
									<label for="Description" class="control-label">To</label>
									<input type="text" class="form-control filterQueryInput" name="Description" id="Description">
								  </div>
                  <div class="form-group col-lg-2 col-md-3 col-sm-12">
									<label for="Description" class="control-label">From</label>
									<input type="text" class="form-control filterQueryInput" name="Description" id="Description">
								  </div>
								</div>
								<div id="advancedOptions" class="row panel-collapse collapse">
									  <div class="form-group col-lg-4 col-md-6 col-sm-12">
										<label for="Discipline" class="control-label">Discipline</label>
										<select class="form-control filterQueryInput" name="Discipline" id="Discipline">
										  <option value="">Any</option>
										  <option value="Architectural">Architectural</option>
										  <option value="Design Drawing">Design Drawing</option>
										  <option value="Civil">Civil</option>
										  <option value="Electrical">Electrical</option>
										  <option value="Health &amp; Safety">Health &amp; Safety</option>
										  <option value="Infrastructure">Infrastructure</option>
										  <option value="Mechanical">Mechanical</option>
										  <option value="Others">Others</option>
										  <option value="Signage">Signage</option>
										  <option value="Structural">Structural</option>
										</select>
									  </div>
									  <div class="form-group col-lg-4 col-md-6 col-sm-12">
										<label for="Status" class="control-label">Status</label>
										<select class="form-control filterQueryInput" name="Status" id="Status">
										  <option value="">Any</option>
										  <option value="A - Approved">A - Approved</option>
										  <option value="B - Approved with Comment">B - Approved with Comment</option>
										  <option value="C - Revised and Re-submit">C - Revised and Re-submit</option>
										  <option value="D - Rejected">D - Rejected</option>
										  <option value="F-Information Only">F-Information Only</option>
										  <option value="S - Superseded">S - Superseded</option>
										  <option value="X - Not Yet Completed">X - Not Yet Completed</option>
										</select>
									  </div>
									  <div class="form-group col-lg-4 col-md-6 col-sm-12">
										<label for="Revision" class="control-label">Area</label>
										<input type="text" class="form-control filterQueryInput" name="Revision" id="Revision">
									  </div>
									  <div class="form-group col-lg-4 col-md-6 col-sm-12">
										<label for="Zone_Floor" class="control-label">Sub Area</label>
										<input type="text" class="form-control filterQueryInput" name="Zone_Floor" id="Zone_Floor">
									  </div>
								  </div>
								<a data-toggle="collapse" href="#advancedOptions" class="showMoreLink">Advance Search</a>
								<div class="row">
									<label for="sort_by" class="col-md-1 control-label">Sort By</label>
									<div class="col-md-2">
										<select class="form-control" name="sort_by" id="sort_by">
                      <option value="Discipline">Mail Number</option>
                      <option value="dwg-number">Date</option>
										  <option value="Description">Subject</option>
										  <option value="Type">Type</option>
                      <option value="Status">Status</option>

										</select>
									</div>
									<!--<label for="column_control" class="col-md-2 control-label">Columns Configuration</label>
									<div class="col-md-4">
										<span class="multiselect-native-select"><select id="column_control" name="column_control[]" class="multiselect-ui form-control" multiple="multiple">
											<option value="dwg-number" selected="">Document No</option>
											<option value="Description" selected="">Title</option>
											<option value="Type" selected="">Type</option>
											<option value="Discipline" selected="">Discipline</option>
											<option value="Status" selected="">Status</option>
											<option value="Revision" selected="">Revision</option>
											<option value="Zone_Floor" selected="">Building</option>
										</select><div class="btn-group" style="width: 100%;"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Document No, Title, Type, Discipline, Status, Revision, Building" style="width: 100%; overflow: hidden; text-overflow: ellipsis;"><span class="multiselect-selected-text">All selected (7)</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"><li class="multiselect-item multiselect-all active"><a tabindex="0" class="multiselect-all"><label class="checkbox"><input type="checkbox" value="multiselect-all">  Select all</label></a></li><li class="active"><a tabindex="0"><label class="checkbox"><input type="checkbox" value="dwg-number"> Document No</label></a></li><li class="active"><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Description"> Title</label></a></li><li class="active"><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Type"> Type</label></a></li><li class="active"><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Discipline"> Discipline</label></a></li><li class="active"><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Status"> Status</label></a></li><li class="active"><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Revision"> Revision</label></a></li><li class="active"><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Zone_Floor"> Building</label></a></li></ul></div></span>
									</div>-->
									<label for="rows" class="col-md-1 control-label">Rows</label>
									<div class="col-md-2">
										<select id="rows" name="rows" class="form-control">
											<option value="10" selected="">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="40">40</option>
											<option value="50">50</option>
											<option value="60">60</option>
											<option value="70">70</option>
											<option value="80">80</option>
											<option value="90">90</option>
											<option value="100">100</option>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<p class="text-center">
										<button type="submit" class="btn btn-danger">Search <i class="glyphicon glyphicon-search"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
										<button type="reset" class="btn btn-disabled">Reset</button>
									</p>
								</div>
							</form>
						  </div>
						</div>
                        <!--<div class="mail-option">
                            <div class="chk-all">
                                <div class="pull-left mail-checkbox">
                                    <input type="checkbox" class="">
                                </div>

                                <div class="btn-group">
                                    <a data-toggle="dropdown" href="#" class="btn mini all">
                                        All
                                        <i class="fa fa-angle-down "></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"> None</a></li>
                                        <li><a href="#"> Read</a></li>
                                        <li><a href="#"> Unread</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="btn-group">
                                <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                    <i class=" fa fa-refresh"></i>
                                </a>
                            </div>
                            <div class="btn-group hidden-phone">
                                <a data-toggle="dropdown" href="#" class="btn mini blue">
                                    More
                                    <i class="fa fa-angle-down "></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                    <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                </ul>
                            </div>
                            <div class="btn-group">
                                <a data-toggle="dropdown" href="#" class="btn mini blue">
                                    Move to
                                    <i class="fa fa-angle-down "></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                    <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                </ul>
                            </div>

                            <ul class="unstyled inbox-pagination">
                                <li><span>1-50 of 99</span></li>
                                <li>
                                    <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                                </li>
                                <li>
                                    <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                                </li>
                            </ul>
                        </div>  -->
                        <div class="table-inbox-wrap ">
                            <table class="table table-inbox table-hover">
                              <thead>
                                <tr class="unread">
                                  <th >
                                    Mail No
                                  </th>
                                    <th >
                                      Subject
                                    </th>
                                    <th >
                                      Date
                                    </th>
                                    <th >
                                      From
                                    </th>
                                    <th >
                                      To
                                    </th>
                                    <th >
                                      Type
                                    </th>
                                    <th >
                                      Status
                                    </th>
                                      </tr>
                              </thead>
                        <tbody>
                        <?php foreach($mail as $m){?>
                        <tr class="unread">

                            <td class="inbox-small-cells">KEO-<?php echo $m['mailtype'].'-'.$m['message_id']?></td>
                            <td class="view-message  dont-show"><a href="<?php echo base_url()?>workflow/detail/<?php echo $m['message_id']?>">
                              <?php echo $m['subject']?></a>
                              <?php if($m['attachment_count']>0){?>
                                  <i class="fa fa-paperclip"></i>
                              <?php } ?>
                            </td>
                            <td class="view-message  "><?php echo date("d/m/Y",strtotime($m['timestamp']))?></td>
                            <!--<td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>-->
                            <td class="view-message  "><?php echo $m['user_name'];?></td>
                            <td class="view-message  ">&nbsp;</td>
                            <td class="view-message  "><?php echo $m['mailtype']?></td>
                            <td class="view-message  ">Overdue</td>
                            <td></td>

                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>

                        </div>
                    </div>
                </section>

                <div class="cd-panel from-right">
		<header class="cd-panel-header">
			<h1>Search Mail</h1>
			<a href="#0" class="cd-panel-close">Close</a>
		</header>

		<div class="cd-panel-container">
			<div class="cd-panel-content">
				  <form class="">
            <div class="formEle col-md-12">
                <input type="text" class="form-control"/>
            </div>
            <div class="formEle col-md-12">
              <br/>
                <input type="submit" class="btn btn-primary" name='search' value="Search"/>
            </div>
        </form>
			</div> <!-- cd-panel-content -->
		</div> <!-- cd-panel-container -->
	</div>








            </div>
        </div>
                    </div>   <!-- /.row -->
					</div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <script>
        //open the lateral panel
	$('#searchBox').on('focus', function(event){
		event.preventDefault();
		$('.cd-panel').addClass('is-visible');
	});
	//clode the lateral panel
	$('.cd-panel').on('click', function(event){
		if( $(event.target).is('.cd-panel') || $(event.target).is('.cd-panel-close') ) {
			$('.cd-panel').removeClass('is-visible');
			event.preventDefault();
		}
	});
        </script>
    </body>
</html>
