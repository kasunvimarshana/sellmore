<?php
$base_dir = dirname(__FILE__);
require_once($base_dir.DIRECTORY_SEPARATOR."var_common_include.php");
?>
<?php ob_start();?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<!-- html manifest="kv.appcache" -->
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title><?php echo META_CON::VAR_SITE_NAME_1;?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
        <!-- meta og -->
        <meta property="og:url" content="<?php echo META_CON::VAR_BASE_URL;?>"/>
        <meta property="og:site_name" content="<?php echo META_CON::VAR_BASE_URL;?>"/>
        <meta property="og:title" content="<?php echo META_CON::VAR_SITE_NAME_1;?>"/>
        <meta property="og:description" content="Buy and sell everything"/>
        <meta property="og:image" content="<?php echo META_CON::VAR_BASE_URL;?>"/>
        <!-- favicon -->
        <link rel="icon" type="image/png" sizes="" href="<?php echo META_CON::VAR_BASE_URL;?>"/>
        <!-- stylesheet --> 
        <?php include_once(META_CON::VAR_BASE_DIR.DIRECTORY_SEPARATOR."view_template".DIRECTORY_SEPARATOR."css_include.php");?>
        <!-- /.stylesheet -->   
        <!-- javascript -->
        <?php include_once(META_CON::VAR_BASE_DIR.DIRECTORY_SEPARATOR."view_template".DIRECTORY_SEPARATOR."js_include.php");?>
        <!-- /.javascript -->
    </head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black-light fixed"><!-- style="overflow-x:auto;" -->
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    <?php include_once(META_CON::VAR_BASE_DIR.DIRECTORY_SEPARATOR."view_template".DIRECTORY_SEPARATOR."header_temp.php");?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <?php include_once(META_CON::VAR_BASE_DIR.DIRECTORY_SEPARATOR."view_template".DIRECTORY_SEPARATOR."navigation_temp.php");?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

  <!-- view template loader -->
  <div id="view_template_loader_temp_1" class="content-wrapper mx-auto">
  <?php include_once(META_CON::VAR_BASE_DIR.DIRECTORY_SEPARATOR."view_template".DIRECTORY_SEPARATOR."view_template_loader_temp.php");?>
  </div>
  <!-- /.view template loader -->
    
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <?php include_once(META_CON::VAR_BASE_DIR.DIRECTORY_SEPARATOR."view_template".DIRECTORY_SEPARATOR."footer_temp.php");?>
  </footer>

  <!-- Control Sidebar -->
    
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
<?php ob_end_flush();?>