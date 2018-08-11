<?php
class var_user extends common_object_class{
    
    private const VAR_TABLE_NAME = "var_user";
    private const VAR_TABLE_COLUMN = array(
        ["key"=>"id", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"dev_date", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"var_state", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"var_user_group", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"user_name", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"user_password", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"salt", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"first_name", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"last_name", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"email", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"image", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"code", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"var_ip", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"display_name", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"date_added", "key_dt"=>DB_CON::PARAM_STR]
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