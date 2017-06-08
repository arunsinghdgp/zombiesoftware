 <style>
	.adv-srch .form-group {
		padding-right: 30px;
	}
	.multiselect-container {
        width: 100% !important;
    }
 </style>
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('sidebar.php')?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      <?php echo $this->lang->line('LIST_SUBMITTAL')?>
                    </h1>
                   
                </section>

                <!-- Main content -->
                <div class="content">
					<div class="row">
						<div class="col-lg-12">
						  <div class="well">
						  <h3 align="center">Search - Document Register</h3>
							<form class="form-horizontal adv-srch">
								<div class="row">
								  <div class="form-group col-lg-4 col-md-6 col-sm-12">
									<label for="dwg-number" class="control-label">Document No</label>
									<input type="text" class="form-control filterQueryInput" name="dwg-number" id="dwg-number">
								  </div>
								  <div class="form-group col-lg-4 col-md-6 col-sm-12">
									<label for="Description" class="control-label">Title</label>
									<input type="text" class="form-control filterQueryInput" name="Description" id="Description">
								  </div>
								  <div class="form-group col-lg-4 col-md-6 col-sm-12">
									<label for="Type" class="control-label">Type</label>
									<select class="form-control filterQueryInput" name="Type" id="Type">
									  <option value="">Any</option>
									  <option value="Work Inspection Request">Work Inspection Request</option>
									  <option value="Design Drawing">Design Drawing</option>
									  <option value="Material Submittal">Material Submittal</option>
									  <option value="Shop Drawing">Shop Drawing</option>
									  <option value="Material Submittal">Material Submittal</option>
									  <option value="Daily Report">Daily Report</option>
									  <option value="Method Statement">Method Statement</option>
									  <option value="Report">Report</option>
									</select>
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
										  <option value="Health & Safety">Health & Safety</option>
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
										<label for="Revision" class="control-label">Revision</label>
										<input type="text" class="form-control filterQueryInput" name="Revision" id="Revision">
									  </div>
									  <div class="form-group col-lg-4 col-md-6 col-sm-12">
										<label for="Zone_Floor" class="control-label">Building</label>
										<input type="text" class="form-control filterQueryInput" name="Zone_Floor" id="Zone_Floor">
									  </div>
								  </div>
								<a data-toggle="collapse" href="#advancedOptions" class="showMoreLink">Show more</a>
								<div class="row">
									<label for="sort_by" class="col-md-1 control-label">Sort By</label>
									<div class="col-md-2">
										<select class="form-control" name="sort_by" id="sort_by">
										  <option value="dwg-number">Document No</option>
										  <option value="Description">Title</option>
										  <option value="Type">Type</option>
										  <option value="Discipline">Discipline</option>
										  <option value="Status">Status</option>
										  <option value="Revision">Revision</option>
										  <option value="Zone_Floor">Building</option>
										</select>
									</div>
									<label for="column_control" class="col-md-2 control-label">Columns Configuration</label>
									<div class="col-md-4">
										<select id="column_control" name="column_control[]" class="multiselect-ui form-control" multiple="multiple">
											<option value="dwg-number" selected>Document No</option>
											<option value="Description" selected>Title</option>
											<option value="Type" selected>Type</option>
											<option value="Discipline" selected>Discipline</option>
											<option value="Status" selected>Status</option>
											<option value="Revision" selected>Revision</option>
											<option value="Zone_Floor" selected>Building</option>
										</select>
									</div>
									<label for="rows" class="col-md-1 control-label">Rows</label>
									<div class="col-md-2">
										<select id="rows" name="rows" class="form-control">
											<option value="10" selected>10</option>
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
								<br />
								<div class="row">
									<p class="text-center">
										<button type="submit" class="btn btn-danger">Search <i class="glyphicon glyphicon-search"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
										<button type="reset" class="btn btn-disabled">Reset</button>
									</p>
								</div>
							</form>
						  </div>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-md-12">
							<p>Your search returned <span id="totalRecords">0</span> records</p>
						</div>
					</div>
					<div class="row">
					<!-- left column -->
                        <div class="col-md-12">
							<!-- general form elements -->
							<div class="box box-primary table-responsive">
								<table class="table">
									<thead id="table_heading">
									  <tr>
										<th>Document No</th>
										<th>Title</th>
										<th>Type</th>
										<th>Discipline</th>
										<th>Status</th>
										<th>Revision</th>
										<th>Building</th>
									  </tr>
									</thead>
									<tbody id="search-results">
										<tr id="no-results">
											<td colspan="7" align="center">No records to display</td>
										</tr>
									</tbody>
								</table>
							   
							</div><!-- /.box -->
						</div>
						<div class="col-md-12 text-center">
							<ul id="pagination" class="pagination"></ul>
						</div>
					</div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
       
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>assets/js/plugins/bootstrap-multiselect/bootstrap-multiselect.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>assets/js/plugins/twbs-pagination-1.4.1/jquery.twbsPagination.min.js" type="text/javascript"></script>
        
        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
		<script type="text/javascript">
			var pageNumber = 1,
				rowPerPage,
				solrSearchUrl = "http://139.162.176.174:8983/solr/zombie/select";
			$(document).ready(function(){
				$('.multiselect-ui').multiselect({
					includeSelectAllOption: true,
					buttonWidth: '100%'
				});
				console.log("document ready block");
				$('form.adv-srch').submit(function(e){
					e && e.preventDefault();
					var searchQueryData = prepareFilterQuery($(this).find(".filterQueryInput").serialize());
					if(!searchQueryData.isValid){
						alert("Please enter search criteria");
						return false;
					}else if($("#column_control option:selected").length == 0){
						alert("Please select at least 1 column to display");
						return false;
					}
					rowPerPage = parseInt($("#rows").val());
					var columnsArr = $("#column_control").val(),
						start = ((pageNumber*rowPerPage)-rowPerPage),
						requestUrl = solrSearchUrl+"?q=*:*&start="+start+"&rows="+$("#rows").val()+"&wt=json&json.wrf=callback&fl="+columnsArr.join(',')+searchQueryData.fq;
					console.log("searching ...", requestUrl);
					getSearchResults(requestUrl).done(renderSearchResults);
					return;
				});
				
				function getSearchResults(url, data){
					if(data === undefined){
						data = {};
					}
					return $.ajax({
						url: url,
						data: data,
						type: 'GET',
						crossDomain: true,
						dataType: 'jsonp',
						jsonpCallback: 'callback'
					});
				}
				
				function renderSearchResults(data) {
					if(data.response.numFound > 0){
						$("#search-results #no-results").addClass("hide");
						$("#totalRecords").text(data.response.numFound);
						var $pagination = $('#pagination'),
							totalPages = Math.ceil((data.response.numFound/rowPerPage));
						var defaultOpts = {
							totalPages: totalPages
						};
						$pagination.twbsPagination('destroy');
						$pagination.twbsPagination($.extend({}, defaultOpts, {
							startPage: pageNumber,
							totalPages: totalPages,
							onPageClick: function (evt, page) {
								var pageRequestParams = $.extend({}, data.responseHeader.params, {start:((page*rowPerPage)-rowPerPage)});
								console.log("pageRequestParams: ", pageRequestParams);
								getSearchResults(solrSearchUrl, pageRequestParams).done(renderDataRow);
							}
						}));
					}else{
						$("#search-results tr:not(#no-results)").remove();
						$("#search-results #no-results").removeClass("hide");
						$("#totalRecords").text(0);
					}
				}
				
				function renderDataRow(data){
					var content = '',
						columnsArr = $("#column_control").val();
					for(var i=0; i<data.response.docs.length; i++){
						content += '<tr>';
						for(var j=0; j<columnsArr.length; j++){
							content += '<td>'+formatFieldValue(data.response.docs[i][columnsArr[j]])+'</td>';
						}
						content += '</tr>';
					}
					$("#table_heading").html(getTableHeadingHtml());
					$("#search-results tr:not(#no-results)").remove();
					$("#search-results").prepend(content);
				}
				$('form.adv-srch').on('reset', function(){
					// Reset search results
					$("#search-results tr:not(#no-results)").remove();
					$("#search-results #no-results td").attr('colspan', $("#column_control option:selected").length);
					$("#search-results #no-results").removeClass("hide");
					$("#totalRecords").text(0);
					pageNumber = 1;
					$('#pagination').twbsPagination('destroy');
				});
				
				function getTableHeadingHtml(){
					var th = '';
					$.each($("#column_control").val(), function(index, val){
						th += "<th>"+$("#column_control option[value="+val+"]").text()+"</th>"
					});
					return th;
				}
				
				function formatFieldValue(value){
					if(value === undefined){
						value = "N/A";
					}
					return value;
				}
				
				function prepareFilterQuery(data){
					var dataArr = data.split('&'),
						fq="",
						fieldsEntered = 0;
					for(var i=0; i<dataArr.length; i++){
						console.log(dataArr[i]);
						var srchData = dataArr[i].split("=");
						if(srchData[1] != '' && srchData[0]){
							fq += "&fq="+srchData[0]+":*"+srchData[1]+"*";	
							fieldsEntered++;
						}
					}
					return {fq:fq, isValid: (fieldsEntered>0)};
				}
				
				$('.showMoreLink').click(function(){
					var $this = $(this);
					$this.toggleClass('opened');
					if($this.hasClass('opened')){
						$this.text('Show Less');			
					} else {
						$this.text('Show More');
					}
				});
			});
		</script>
    </body>
</html>