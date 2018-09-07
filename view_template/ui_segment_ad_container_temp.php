<?php
$base_dir = dirname(__DIR__);
require_once($base_dir.DIRECTORY_SEPARATOR."var_common_include.php");
?>
<div class="segment content container-fluid no-padding">
    <!-- row -->
    <div class="row content no-padding">
        <!-- col ad -->
        <?php
            for($i = 0; $i < 10; $i++){
                $base_dir = dirname(__DIR__);
                include($base_dir.DIRECTORY_SEPARATOR."view_template".DIRECTORY_SEPARATOR."ui_segment_ad_temp.php");
            }
        ?>
        <!-- /.col ad -->
    </div>
    <!-- /.row -->
</div>