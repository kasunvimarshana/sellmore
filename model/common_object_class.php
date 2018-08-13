<?php
/*
namespace site;
$base_dir = dirname(__DIR__);
require_once($base_dir.DIRECTORY_SEPARATOR."var_common_include.php");
*/
class common_object_class{

    protected $var_table_name;
    protected $var_table_column;
    protected $var_table_column_ignore;
    protected $var_primary_key;
    
    function __construct($attributes = Array()){
        // Apply provided attribute values
        foreach($attributes as $key=>$value){
          //$this->$key = $value;
          $this->__set($key, $value);
        }
    }   
    public function __toString(){
        return get_class($this);
    }
    public function __set( $key, $value ){
        if( method_exists( $this, $key ) ){
            $this->$key( $value );
        }
        else{
          // Getter/Setter not defined so set as property of object
          $this->$key = $value;
        }
    }
    public function __get( $key ){
        if( method_exists( $this, $key ) ){
          return $this->$key();
        }
        elseif(property_exists( $this, $key )){
          // Getter/Setter not defined so return property if it exists
          return $this->$key;
        }
        return NULL;
    }
	public function get_public_vars(){
        return call_user_func('get_object_vars', $this);
    }

}
?>