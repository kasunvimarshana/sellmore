<?php
class var_post_category_dao_impl extends dao_implement_class implements dal_class{
    
    private const VAR_TABLE_NAME = "var_post_category";
    private const VAR_PRIMARY_KEY = array(
        ["key"=>"id", "key_dt"=>DB_CON::PARAM_INT]
    );
    function __construct($param = NULL){
        parent::__construct();
        $this->var_table_name = self::VAR_TABLE_NAME;
        $this->var_primary_key = self::VAR_PRIMARY_KEY;
    }
    /*
    @throws Exception
    */
    public function f_insert($param){
        return parent::f_insert($param);
    }
    /*
    @throws Exception
    */
    public function f_update($param){
        return parent::f_update($param);
    }
    /*
    @throws Exception
    */
    public function f_delete($param){
        return parent::f_delete($param);
    }
    /*
    @throws Exception
    */
    public function f_search($param){
        return parent::f_search($param);
    }
    /*
    @throws Exception
    */
    public function f_list($param = NULL){
        return parent::f_list($param);
    }
    /*
    @throws Exception
    */
    public function f_searc_with_params($param = array()){
        return parent::f_searc_with_params($param);
    }
    
}
?>