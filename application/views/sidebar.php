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
                            <p>Hello, <?php echo $this->session->userdata('user_name');?></p>


                        </div>
                    </div>


                    <ul class="sidebar-menu">
                        <?php

						if($this->session->userdata('user_type')=='admin'){?>
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
            <li>
                  <a href="<?php echo base_url()?>workflow">
                      <i class="fa fa-dashboard"></i> <span>Correspondence</span>
                  </a>
            </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>Document Management</span>
                                <i class="fa pull-right fa-angle-left"></i>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href="<?php echo base_url()?>submittals/addsubmittal" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Submittal Entry</a></li>
                                <li><a href="<?php echo base_url()?>submittals/listsubmittal" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Search Document</a></li>

                            </ul>
                        </li>

						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>User Management</span>
                                <i class="fa pull-right fa-angle-left"></i>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href="<?php echo base_url()?>users/listuser" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_USER')?></a></li>
                                <li><a href="<?php echo base_url()?>users/adduser" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_USER')?></a></li>
                                <!--
								 <li><a href="<?php echo base_url()?>users/listgroup" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_GROUP')?></a></li>
                                <li><a href="<?php echo base_url()?>users/addgroup" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_GROUP')?></a></li>

								<li><a href="<?php echo base_url()?>users/listrolegroup" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_ROLE_GROUP')?></a></li>
                                <li><a href="<?php echo base_url()?>users/addrolegroup" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_ROLE_GROUP')?></a></li>

								<li><a href="<?php echo base_url()?>users/listroleresource" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_ROLE_RESOURCES')?></a></li>
                                <li><a href="<?php echo base_url()?>users/addroleresource" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_ROLE_RESOURCES')?></a></li>

								 <li><a href="<?php echo base_url()?>users/assigngroupaccess" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ASSIGN_GROUP_ACCESS')?></a></li>

								 <li><a href="<?php echo base_url()?>users/listcontractor" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_CONTRACTOR')?></a></li>
                                <li><a href="<?php echo base_url()?>users/addcontractor" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_CONTRACTOR')?></a></li>
                              -->
                            </ul>
                        </li>

						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Organisation Management</span>
                                <i class="fa pull-right fa-angle-left"></i>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href="<?php echo base_url()?>users/addorganisation" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_ORGANISATION')?></a></li>
                                <li><a href="<?php echo base_url()?>users/listorganisation" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_ORGANISATION')?></a></li>


                            </ul>
                        </li>
                        <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-user"></i>
                                            <span>Project Summary</span>
                                            <i class="fa pull-right fa-angle-left"></i>
                                        </a>
                                        <ul class="treeview-menu" style="display: none;">
						              <li>
                            <a href="<?php echo base_url()?>users/addproject">
                                <i class="fa fa-dashboard"></i> <span>Add Project</span>
                            </a></li>
							              <li><a href="<?php echo base_url()?>users/listproject">
                                <i class="fa fa-dashboard"></i> <span>List Projects</span>
                            </a>
                        </li>
                      </ul>
						              </li>

                          <li class="treeview">
                                          <a href="#">
                                              <i class="fa fa-user"></i>
                                              <span>Project Access </span>
                                              <i class="fa pull-right fa-angle-left"></i>
                                          </a>
                                          <ul class="treeview-menu" style="display: none;">
                            <li>
                              <a href="<?php echo base_url()?>users/projectrolesetting">
                                  <i class="fa fa-dashboard"></i> <span>Configure Role Setting</span>
                              </a></li>
                              <li><a href="<?php echo base_url()?>users/listproject">
                                  <i class="fa fa-dashboard"></i> <span>Assign Orgarnisation Roles</span>
                              </a>
                             </li>
                             <li><a href="<?php echo base_url()?>users/addgroup">
                                 <i class="fa fa-dashboard"></i> <span>Create Orgarnisation Roles</span>
                             </a>
                            </li>
                        </ul>
                            </li>

                            <li class="treeview">
                                            <a href="#">
                                                <i class="fa fa-user"></i>
                                                <span>Organisation Access </span>
                                                <i class="fa pull-right fa-angle-left"></i>
                                            </a>
                                            <ul class="treeview-menu" style="display: none;">
                              <li>
                                <a href="<?php echo base_url()?>users/addproject">
                                    <i class="fa fa-dashboard"></i> <span>Configure Role Setting</span>
                                </a></li>
                                <li><a href="<?php echo base_url()?>users/listproject">
                                    <i class="fa fa-dashboard"></i> <span>Assign User Roles</span>
                                </a>
                               </li>
                               <li><a href="<?php echo base_url()?>users/listproject">
                                   <i class="fa fa-dashboard"></i> <span>Create User Roles</span>
                               </a>
                              </li>
                          </ul>
                              </li>
                     <!--<li>
                            <a href="<?php echo base_url()?>users/settings">
                                <i class="fa fa-dashboard"></i> <span>Settings</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo base_url()?>users/assignaccess/user_organisation">
                                <i class="fa fa-dashboard"></i> <span>Access Settings</span>
                            </a>
                        </li>-->
						<?php }else{
              $accessArray=array();
							$accessArray=$this->session->userdata('access');?>
              <li>
                    <a href="<?php echo base_url()?>workflow">
                        <i class="fa fa-dashboard"></i> <span>Correspondence</span>
                    </a>
              </li>
							<?php if(count($accessArray)>1 && is_array($accessArray) && (@in_array('Add User',$accessArray) || in_array('List User',$accessArray))){?>
							<li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span><?php echo $this->lang->line('USER')?></span>
                                <i class="fa pull-right fa-angle-left"></i>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <?php if(in_array('List User',$accessArray)){ ?>
								<li><a href="<?php echo base_url()?>users/listuser" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_USER')?></a></li>
								<?php }else if(in_array('Add User',$accessArray)){ ?>
                                <li><a href="<?php echo base_url()?>users/adduser" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_USER')?></a></li>
								<?php } ?>
              </ul>
							</li>
							<?php }
							if(@in_array('Create Project',$accessArray)){
							?>
							<li>
                            <a href="<?php echo base_url()?>users/addproject">
                                <i class="fa fa-dashboard"></i> <span>Add Project</span>
                            </a>

							</li>
							<?php } ?>

							<li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span><?php echo $this->lang->line('ORGANISATION')?></span>
                                <i class="fa pull-right fa-angle-left"></i>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <?php if(@in_array('List Organisation',$accessArray)){ ?>
								<li><a href="<?php echo base_url()?>users/listorganisation" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('LIST_ORGANISATION')?></a></li>
								<?php }
								if(@in_array('Create Organisation',$accessArray)){ ?>
                                <li><a href="<?php echo base_url()?>users/addorganisation" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ADD_ORGANISATION')?></a></li>
								<?php } ?>

                            </ul>
                        </li>

						<?php } ?>

                    </ul>
                </section>

            </aside>
