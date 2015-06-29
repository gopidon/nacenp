<nav class="navbar navbar-default">
    
        <div class="col-md-1">
            <img src="images/cbec.jpg" class="img-responsive" style="position:relative;top:10px">                        
        </div>
        <div class="col-md-11">
            <div class="row">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" style="padding-right: 20px">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i> Hello <?php echo $this->session->userdata('user_display_name');?> <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <?php if ($this->session->userdata('user_access') == 'A'): ?>
                              <li><a href="admin/prefs/showPrefs"><i class="fa fa-gear fa-fw"></i> Preferences</a></li>
                          <?php endif ?>
                          <li><a href="ot/showOTDetails"><i class="fa fa-file fa-fw"></i> My Details</a></li>
                          <li><a href="admin/user/showChangePasswd"><i class="fa fa-edit fa-fw"></i> Change Password</a></li>
                        <li><a href="admin/user/logout"><i class="fa fa-power-off fa-fw"></i> Logout</a></li>
                      </ul>
                    </li>
                </ul>
                
            </div>

            <div class="row">
                <div class="col-md-12">
                    <ul id="MainMenuList" class="nav navbar-nav">
                        <li><a href='admin/user/home'><i class="fa fa-home fa-fw"></i> Home</a></li>
                        <li><a href='ot/calendar'><i class="fa fa-calendar fa-fw"></i> My Calendar</a></li>
                        <li><a href='ot/fback'><i class="fa fa-pencil fa-fw"></i> Class Feedback</a></li>
                        <li><a href='ot/leaves'><i class="fa fa-plane fa-fw"></i> My Leaves</a></li>
                        <!--<li><a href='ot/qpapers'><i class="fa fa-home fa-fw"></i> Question papers</a></li>-->
                        <?php if ($this->session->userdata('user_access') == 'A'): ?>
                            <li id="admin" class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gears fa-fw"></i> Admin <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href='admin/batch/batches'>Batches</a></li>
                                    <li><a href='admin/user/users'>Users</a></li>
                                    <li><a href='admin/session/sessions'>Class Sessions</a></li>
                                    <li><a href='admin/announcement/announcements'>Announcements</a></li>
                                    <li><a href='admin/fbreports/showFbReports'>Feedback Reports</a></li>
                                    <li><a href='admin/leaves/showApproveLeaves'>Approve Leaves</a></li>
                                </ul>
                            </li>
                        <?php endif ?>

                    </ul>
                </div>
            </div>
        </div>
    
</nav>
