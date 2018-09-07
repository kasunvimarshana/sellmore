<?php
$base_dir = dirname(__DIR__);
require_once($base_dir.DIRECTORY_SEPARATOR."var_common_include.php");
?>
<!-- col -->
<div class="col-lg-6 no-padding">
    <!-- ad -->
    <div class="ui segment ad">
        <div class="ui items divided">
            <div class="item">
                <div class="image">
                    <?php
                        $base_url = META_CON::VAR_BASE_URL;
                        $img = common_function_class::f_get_url_1(META_CON::VAR_BASE_DIR."/view_res/dist/img/user4-128x128.jpg", common_function_class::VAR_URL_PARAM["P1"]);
                    ?>
                    <img src="<?php echo META_CON::VAR_BASE_URL;?>/resizer.php?file=<?php echo $img;?>&width=175&height=175&action=resize"/>
                </div>
                <div class="content">
                    <a class="header">Title</a>
                    <div class="meta">
                        <span class="cinema">Title Meta</span>
                    </div>
                    <div class="description">
                        <p>description</p>
                    </div>
                    <div class="extra">
                        <div class="ui label">Duration</div>
                        <button class="ui label"><i class="globe icon"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.ad -->
</div>
<!-- /.col -->