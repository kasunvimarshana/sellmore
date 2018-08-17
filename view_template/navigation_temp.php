<?php
$base_dir = dirname(__DIR__);
require_once($base_dir.DIRECTORY_SEPARATOR."var_common_include.php");
?>    
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo META_CON::VAR_BASE_URL;?>/view_res/dist/img/avatar5.png" class="img-circle" alt="User Image"/>
        </div>
        <div class="pull-left info">
            <p>User</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <!-- search form (Optional) -->

    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <!-- test -->
        <!-- group -->
        <li class="header">Configuration</li>
        <li class="treeview <?php echo (in_array(array(), ""))?"active":null;?>">
            <a href="#">
                <i class="fa fa-link"></i>
                <span>Configuration</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo (false)?"active":null;?>"><a href="<?php echo META_CON::VAR_BASE_URL;?>"><i class="fa fa-circle-o"></i> <span>System User</span></a></li>
                <li class="<?php echo (false)?"active":null;?>"><a href="<?php echo META_CON::VAR_BASE_URL;?>"><i class="fa fa-circle-o"></i> <span>Device</span></a></li>
            </ul>
        </li>
        <!-- /.group -->
        <!-- group -->
        <li class="header">Device Data</li>
        <li class="treeview <?php echo (in_array(array(), ""))?"active":null;?>">
            <a href="#">
                <i class="fa fa-link"></i>
                <span>Device Data</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo (false)?"active":null;?>"><a href="<?php echo META_CON::VAR_BASE_URL;?>"><i class="fa fa-circle-o"></i> <span>Device Data</span></a></li>
            </ul>
        </li>
        <!-- /.group -->
        <!-- group -->
        <li class="header">Report</li>
        <li class="treeview <?php echo (in_array(array(), ""))?"active":null;?>">
            <a href="#">
                <i class="fa fa-link"></i>
                <span>Report</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo (false)?"active":null;?>"><a href="<?php echo META_CON::VAR_BASE_URL;?>"><i class="fa fa-circle-o"></i> <span>Report 01</span></a></li>
                <li class="<?php echo (false)?"active":null;?>"><a href="<?php echo META_CON::VAR_BASE_URL;?>"><i class="fa fa-circle-o"></i> <span>Report 02</span></a></li>
            </ul>
        </li>
        <!-- /.group -->
        <!-- test -->
    </ul>
    <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->