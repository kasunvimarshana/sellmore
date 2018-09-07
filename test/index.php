<?php
include(dirname(__DIR__).DIRECTORY_SEPARATOR."var_common_include.php");
?>
<?php
$base_url = META_CON::VAR_BASE_URL;
$coc = new common_function_class();
$f1 = $coc->f_get_url_1(__DIR__.DIRECTORY_SEPARATOR."image.jpg", common_function_class::VAR_URL_PARAM["P1"]);
echo "<br/>";
$f2 = $coc->f_get_url_1($f1, common_function_class::VAR_URL_PARAM["P2"]);
?>

<img src="<?php echo $base_url;?>/resizer.php?file=<?php echo $f1;?>&width=175&height=175&action=resize"/>
<img src="<?php echo $base_url;?>/resizer.php?file=<?php echo $f2;?>&width=175&height=175&action=resize&quality=50"/>
