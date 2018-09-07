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
    <form action="#" method="get" class="sidebar-form">
        <!-- form group -->
        <div class="form-group">
            <div class="input-group col-xs-12">
                <input type="text" name="search" class="form-control" placeholder="Search..." autocomplete="off" autofocus/>
                <span class="input-group-btn">
                    <button type="submit" name="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
        <!-- /.form group -->
        <!-- form group -->
        <div class="form-group">
            <div class="input-group col-xs-12">
                <input type="date" name="q" class="form-control" placeholder="Search..."/>
            </div>
        </div>
        <!-- /.form group -->
        <!-- form group -->
        <div class="form-group">
            <div class="input-group col-xs-12">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
            </div>
        </div>
        <!-- /.form group -->
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        <!-- test -->
        <!-- group -->
        <li class="header">Admin Area</li>
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
        <!-- test -->
    </ul>
    <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->