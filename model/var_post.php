<?php
class var_post extends common_object_class{
    
    private const VAR_TABLE_NAME = "var_post";
    private const VAR_TABLE_COLUMN = array(
        ["key"=>"id", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"dev_date", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"var_state", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"var_user", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"title", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"content", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"name", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"type", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"guild", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"sort_order", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"date_added", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"var_ip", "key_dt"=>DB_CON::PARAM_STR],
        ["key"=>"price", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"var_country", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"var_province", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"var_district", "key_dt"=>DB_CON::PARAM_INT],
        ["key"=>"var_city", "key_dt"=>DB_CON::PARAM_INT],
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
?>