<?php
class var_user_post_like extends common_object_class{
    
    private const VAR_TABLE_NAME = "var_user_post_like";
    private const VAR_TABLE_COLUMN = array(
        ["key"=>"id", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"dev_date", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"var_state", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"var_user", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"var_post", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"var_ip", "key_dt"=>DB_CON::PARAM_STR]
    );
    private const VAR_TABLE_COLUMN_IGNORE = array(
        ["key"=>"dev_date", "key_dt"=>DB_CON::PARAM_STR]
    );
    private const VAR_PRIMARY_KEY = array(
        ["key"=>"id", "key_dt"=>DB_CON::PARAM_INT]
    );
    
    function __construct($attributes = Array()){
        parent::__construct( $attributes );
        $this->__set("var_table_name", VAR_TABLE_NAME);
        $this->__set("var_table_column", VAR_TABLE_COLUMN);
        $this->__set("var_table_column_ignore", VAR_TABLE_COLUMN_IGNORE);
        $this->__set("var_primary_key", VAR_PRIMARY_KEY);
    }

}
?>