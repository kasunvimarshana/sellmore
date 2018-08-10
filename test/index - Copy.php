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
        ["key"=>"id", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"dev_date", "key_dt"=>DB_CON::PARAM_STR]
    );
    private const VAR_PRIMARY_KEY = "id";
    
    function __construct($attributes = Array()){
        parent::__construct( $attributes );
        $this->__set("var_table_name", self::VAR_TABLE_NAME);
        $this->__set("var_table_column", self::VAR_TABLE_COLUMN);
        $this->__set("var_table_column_ignore", self::VAR_TABLE_COLUMN_IGNORE);
        $this->__set("var_primary_key", self::VAR_PRIMARY_KEY);
    }

}
$a = new var_category();
$var_table_column = $a->__get("var_table_column");
//echo array_column($var_table_column, 'id');
//var_dump($var_table_column);
var_dump(array_column($var_table_column, 'id'));
echo "<br/>";
//echo array_column($var_table_column, 1);
var_dump(array_column($var_table_column, 'key'));
echo "<br/>";
//echo array_column($var_table_column, 0);
var_dump(array_column($var_table_column, 0));
echo "<br/>";
if (in_array('key', $var_table_column)) {
    echo "'ph' was found\n";
}
echo "<br/>";
var_dump(in_array($var_table_column, array_keys($var_table_column)));

?>
<?php
$test_array = array('test', '1234abcd');
if (in_array(12345, $test_array)) {
    echo '1234 is a match!';
}
?>
<?php 
function in_array_recursive($needle, $haystack) { 
    $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($haystack)); 
    foreach($it AS $element) { 
        if($element == $needle) { 
            return true; 
        } 
    } 
    return false; 
} 
?>
<?php
$needle = array('fruit'=>'banana', 'vegetable'=>'carrot');
$haystack = array(
    array('vegetable'=>'carrot', 'fruit'=>'banana'),
    array('fruit'=>'apple', 'vegetable'=>'celery')
    );
echo in_array($needle, $haystack, true) ? 'true' : 'false';
// Output is 'false'
echo in_array($needle, $haystack) ? 'true' : 'false';
// Output is 'true'
?>
<?php
$array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');
$key = array_search('green', $array); // $key = 2;
$key = array_search('red', $array);   // $key = 1;
?>
<?php
$userdb=Array
(
    (0) => Array
        (
            ('uid') => '100',
            ('name') => 'Sandra Shush',
            ('url') => 'urlof100'
        ),

    (1) => Array
        (
            ('uid') => '5465',
            ('name') => 'Stefanie Mcmohn',
            ('pic_square') => 'urlof100'
        ),

    (2) => Array
        (
            ('uid') => '40489',
            ('name') => 'Michael',
            ('pic_square') => 'urlof40489'
        )
);
$key = array_search(40489, array_column($userdb, 'uid'));
?>
<?php array_search($needle, array_column($array, 'key')); ?>
<?php
$people = array(
  2 => array(
    'name' => 'John',
    'fav_color' => 'green'
  ),
  5=> array(
    'name' => 'Samuel',
    'fav_color' => 'blue'
  )
);

$found_key = array_search('blue', array_column($people, 'fav_color'));
?>
<?php
if( array_key_exists( 'home',$_GET ) ) {
    echo "Home - its where the heart is.";
} else if( array_key_exists( 'login',$_GET ) ) {
    echo "Login code here!";
} else if( array_key_exists( 'register',$_GET ) ) {
    echo "Register code here!";
} else {
    echo "Home - its where the heart is.";
}
?>
<?php
$userdb=Array
(
'0' => Array
    (
        'uid' => '100',
        'name' => 'Sandra Shush',
        'url' => 'urlof100'
    ),

'1' => Array
    (
        'uid' => '5465',
        'name' => 'Stefanie Mcmohn',
        'pic_square' => 'urlof100'
    ),

'2' => Array
    (
        'uid' => '40489',
        'name' => 'Michael',
        'pic_square' => 'urlof40489'
    )
);
print_r(array_column($userdb, 'uid')); 
if(in_array(100, array_column($userdb, 'uid'))) { // search value in the array
    echo "FOUND";
}
?>



































