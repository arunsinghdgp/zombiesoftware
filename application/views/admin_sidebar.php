<!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>assets/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                   
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo base_url()?>submittals/dashboard">
                                <i class="fa fa-dashboard"></i> <span>
								<?php echo $this->lang->line('DASHBOARD')?></span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo base_url()?>submittals">
                                <i class="fa fa-dashboard"></i> <span>Submittal Structure</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo base_url()?>submittals/listsubmittalfields">
                                <i class="fa fa-dashboard"></i> <span>List Submittal Fields</span>
                            </a>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span><?php echo $this->lang->line('SUBMITTAL')?></span>
                                <i class="fa pull-right fa-angle-left"></i>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href="<?php echo base_url()?>submittals/listsubmittal" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_SUBMITTAL')?></a></li>
                                <li><a href="<?php echo base_url()?>submittals/addsubmittal" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_SUBMITTAL')?></a></li>
								
								
                                
                            </ul>
                        </li>
						
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span><?php echo $this->lang->line('USER')?></span>
                                <i class="fa pull-right fa-angle-left"></i>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href="<?php echo base_url()?>users/listuser" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_USER')?></a></li>
                                <li><a href="<?php echo base_url()?>users/adduser" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_USER')?></a></li>
								
								 <li><a href="<?php echo base_url()?>users/listgroup" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_GROUP')?></a></li>
                                <li><a href="<?php echo base_url()?>users/addgroup" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_GROUP')?></a></li>
								
								<li><a href="<?php echo base_url()?>users/listrolegroup" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_ROLE_GROUP')?></a></li>
                                <li><a href="<?php echo base_url()?>users/addrolegroup" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_ROLE_GROUP')?></a></li>
								
								<li><a href="<?php echo base_url()?>users/listroleresource" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_ROLE_RESOURCES')?></a></li>
                                <li><a href="<?php echo base_url()?>users/addroleresource" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_ROLE_RESOURCES')?></a></li>
								
								 <li><a href="<?php echo base_url()?>users/assigngroupaccess" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ASSIGN_GROUP_ACCESS')?></a></li>
								
								 <li><a href="<?php echo base_url()?>users/listcontractor" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_CONTRACTOR')?></a></li>
                                <li><a href="<?php echo base_url()?>users/addcontractor" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_CONTRACTOR')?></a></li>
                                
                            </ul>
                        </li>
						
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span><?php echo $this->lang->line('ORGANISATION')?></span>
                                <i class="fa pull-right fa-angle-left"></i>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href="<?php echo base_url()?>users/listorganisation" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_ORGANISATION')?></a></li>
                                <li><a href="<?php echo base_url()?>users/addorganisation" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_ORGANISATION')?></a></li>
                                
                            </ul>
                        </li>
						<li>
                            <a href="<?php echo base_url()?>users/addproject">
                                <i class="fa fa-dashboard"></i> <span>Add Project</span>
                            </a>
							<!-- <a href="<?php echo base_url()?>users/addproject">
                                <i class="fa fa-dashboard"></i> <span>List Project</span>
                            </a>-->
                        </li>
						<li>
                            <a href="<?php echo base_url()?>users/settings">
                                <i class="fa fa-dashboard"></i> <span>Settings</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo base_url()?>users/assignaccess/user_organisation">
                                <i class="fa fa-dashboard"></i> <span>Access Settings</span>
                            </a>
                        </li>
						 
                        
                    </ul>
                </section>
                
            </aside>