<?php
$base_dir = dirname(__DIR__);
require_once($base_dir.DIRECTORY_SEPARATOR."var_common_include.php");
?>    
<!-- Logo -->
<a href="<?php echo $_SERVER["PHP_SELF"];?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b><?php echo META_CON::VAR_SITE_NAME_1;?></b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b><?php echo META_CON::VAR_SITE_NAME_1;?></b></span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- /.messages-menu -->

            <!-- Notifications Menu -->

            <!-- Tasks Menu -->

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="<?php echo META_CON::VAR_BASE_URL;?>/view_res/dist/img/avatar5.png" class="user-image" alt="User Image"/>
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">User</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header" style="height: auto;">
                        <img src="<?php echo META_CON::VAR_BASE_URL;?>/view_res/dist/img/avatar5.png" class="img-circle" alt="User Image"/>
                        <p>
                            <?php echo META_CON::VAR_SITE_NAME_1;?>
                            <!-- small>Branch : </small -->
                            <small><strong>User</strong>&emsp;<?php echo "User Name"; ?></small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        <!-- row -->
                        <div class="row">
                          <div class="col-xs-6 text-center">
                            <a href="#">Profile</a>
                          </div>
                          <div class="col-xs-6 text-center">
                            <a href="#">Watch List</a>
                          </div>
                        </div>
                        <!-- /.row -->
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <!-- div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div -->
                        <div class="pull-right">
                            <a href="<?php echo $_SERVER["PHP_SELF"];?>" class="btn btn-default btn-flat" onclick="if(!confirm('Are You Sure?')){ return false;}">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

        </ul>
    </div>
</nav>