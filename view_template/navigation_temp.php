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
        <div class="form-group ui form fields">
            <div class="input-group col-xs-12 field">
                <input type="text" name="search" class="form-control" placeholder="Search..." autocomplete="off" autofocus/>
                <span class="input-group-btn">
                    <button type="submit" name="submit" value="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
        <!-- /.form group -->
        <!-- form group -->
        <div class="form-group">
            <div class="input-group col-xs-12">
                <label>Province</label>
                <input name="var_province[]" class="form-control select2" style="width: 100%;" multiple="multiple">
                    <!-- option> option </option -->
                </input>
            </div>
        </div>
        <!-- /.form group -->
        <!-- form group -->
        <div class="form-group fields">
            <div class="input-group col-xs-12 field">
                <label>District</label>
                <select name="var_district[]" class="form-control form-control-md select2" style="width: 100%;" multiple="multiple">
                    <!-- option> option </option -->
                </select>
            </div>
        </div>
        <!-- /.form group -->
        <!-- form group -->
        <div class="form-group fields">
            <div class="input-group col-xs-12 field">
                <label>City</label>
                <select name="var_city[]" class="form-control form-control-md select2" style="width: 100%;" multiple="multiple">
                    <!-- option> option </option -->
                </select>
            </div>
        </div>
        <!-- /.form group -->
        <!-- form group -->
        <div class="form-group fields">
            <div class="input-group col-xs-12 field">
                <label>Main Category</label>
                <select name="var_category_main[]" class="form-control form-control-md select2" style="width: 100%;" multiple="multiple">
                    <!-- option> option </option -->
                </select>
            </div>
        </div>
        <!-- /.form group -->
        <!-- form group -->
        <div class="form-group fields">
            <div class="input-group col-xs-12 field">
                <label>Sub Category</label>
                <select name="var_category_sub[]" class="form-control form-control-md select2" style="width: 100%;" multiple="multiple">
                    <!-- option> option </option -->
                </select>
            </div>
        </div>
        <!-- /.form group -->
        <!-- form group -->
        <div class="form-group ui form fields">
            <div class="input-group col-xs-12 field">
                <label>Min Price</label>
                <input type="number" name="price_min" placeholder="Min Price"/>
            </div>
        </div>
        <!-- /.form group -->
        <!-- form group -->
        <div class="form-group ui form fields">
            <div class="input-group col-xs-12 field">
                <label>Max Price</label>
                <input type="number" name="price_max" placeholder="Max Price"/>
            </div>
        </div>
        <!-- /.form group -->
        <!-- form group -->
        <div class="form-group ui form fields">
            <div class="input-group col-xs-12 ui buttons">
                <button type="submit" name="submit" value="submit" class="ui button positive">Submit</button>
                <div class="or" data-text="OR"></div>
                <button type="reset" name="reset" value="reset" class="ui button active">Reset</button>
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
                <li class="<?php echo (false)?"active":null;?>"><a href="<?php echo META_CON::VAR_BASE_URL;?>"><i class="fa fa-circle-o"></i> <span>User</span></a></li>
                <li class="<?php echo (false)?"active":null;?>"><a href="<?php echo META_CON::VAR_BASE_URL;?>"><i class="fa fa-circle-o"></i> <span>User Group</span></a></li>
            </ul>
        </li>
        <!-- /.group -->
        <!-- test -->
    </ul>
    <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->

<!-- script -->
<script>
$(function(){
    $('.select2').select2({});
});
</script>
<!-- /*script -->