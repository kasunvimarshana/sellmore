<?php
$base_dir = dirname(__DIR__);
require_once($base_dir.DIRECTORY_SEPARATOR."var_common_include.php");

class var_category extends common_object_class{
    private const VAR_TABLE_NAME = "var_category";
    private const VAR_TABLE_COLUMN = array(
        ["key"=>"id", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"dev_date", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"var_state", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"var_category", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"parent", "key_dt"=>DB_CON::PARAM_BOOL],
        ["key"=>"code", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"name", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"image", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"display", "key_dt"=>DB_CON::PARAM_BOOL]
    );
    private const VAR_TABLE_COLUMN_IGNORE = array(
        ["key"=>"dev_date", "key_dt"=>DB_CON::PARAM_STR]
    );
    private const VAR_PRIMARY_KEY = array(
        ["key"=>"id", "key_dt"=>DB_CON::PARAM_INT]
    );
    
    function __construct($attributes = Array()){
        parent::__construct( $attributes );
        $this->__set("var_table_name", self::VAR_TABLE_NAME);
        $this->__set("var_table_column", self::VAR_TABLE_COLUMN);
        $this->__set("var_table_column_ignore", self::VAR_TABLE_COLUMN_IGNORE);
        $this->__set("var_primary_key", self::VAR_PRIMARY_KEY);
    }

}
/*
array filter function
@param $param1 array //value array
@param $param2 array //value array ignore
@param $param3 string //search key
@return array
@throws Exception
*/
function array_filter_1($param1=array(), $param2=array(), $param3="key"){
    if((!is_array($param1)) || (!is_array($param2))){
        throw new Exception(NULL);
    }
    $temp_array = array();
    $param2 = array_flip($param2);
    $temp_array = array_filter($param1, function($data) use ($param2, $param3){
        $temp_key = array_key_exists($param3, $data)?$data[$param3]:NULL;
        return !array_key_exists($temp_key, $param2);
    });
    return $temp_array;
}
$a = new var_category();
$a->__set("dev_date", "2018-08-07");
$a->__set("code", "C1");
$a->__set("name", "C1");
$d = new var_category_dao_impl();
$var_table_column = $a->__get("var_table_column");
$var_table_column_ignore = $a->__get("var_table_column_ignore");
$var_primary_key = $a->__get("var_primary_key");
$col_names = array_column($var_table_column_ignore, 'key');
array_walk($var_table_column, function (&$item, $key) use ($a){
    $temp_key = array_key_exists("key", $item)?$item["key"]:NULL;
    $item["value"] = $a->__get($temp_key);
});
/*
echo "<p>array diff</p>";
echo "<pre>";
print_r(array_filter_1($var_table_column, $col_names, "key"));
echo "</pre>";
echo "<p>array</p>";
echo "<pre>";
print_r($var_table_column);
echo "</pre>";
*/
echo "<p>array</p>";
echo "<pre>";
//var_dump($d->f_list(0));
print_r($d->f_searc_with_params("vhvh"));
//echo $d->f_delete(0);
//echo $d->f_delete(0);
//print_r($d->f_update($a));
echo "</pre>";
?>





















































