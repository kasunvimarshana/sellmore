<?php
$base_dir = dirname(__DIR__);
require_once($base_dir.DIRECTORY_SEPARATOR."var_common_include.php");
?>    
<!-- To the right -->
<div class="pull-right hidden-xs">
    Anything you want
</div>
<!-- Default to the left -->
<strong>Copyright &copy; <?php echo date('Y', time()); ?> <a href="<?php echo $_SERVER["PHP_SELF"];?>"><?php echo META_CON::VAR_SITE_NAME_1;?></a>.</strong> All rights reserved.