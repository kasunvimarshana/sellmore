<?php
class var_event extends common_object_class{
    
    private const VAR_TABLE_NAME = "var_event";
    private const VAR_TABLE_COLUMN = array(
        ["key"=>"id", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"dev_date", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"var_state", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"code", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"var_trigger", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"var_action", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"sort_order", "key_dt"=>DB_CON::PARAM_INT]
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
?>