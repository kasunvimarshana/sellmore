<?php
class var_country_description_bo_impl implements bll_class{
    
    private $dev_date;
    private $dao_implement_obj;
	function __construct(){
		$this->dao_implement_obj = new var_country_description_dao_impl();
        $this->dev_date = date('Y-m-d G:i:s', time());
	}
    /*
    @throws Exception
    */
    public function f_query($param_1, $param_2=NULL){
        return $this->dao_implement_obj->f_query($param_1, $param_2);
    }
    /*
    @throws Exception
    */
	public function f_insert($param){
        if (!($param instanceof var_country_description)){
			throw new Exception(ERROR_CON::E1);
		}
        $param->__set("dev_date", $this->dev_date);
		return $this->dao_implement_obj->f_insert($param);
    }
    /*
    @throws Exception
    */
    public function f_update($param){
        if (!($param instanceof var_country_description)){
			throw new Exception(ERROR_CON::E1);
		}
		return $this->dao_implement_obj->f_update($param);
    }
    /*
    @throws Exception
    */
    public function f_delete($param){
        /*
        if(!(is_numeric($param))){
			throw new Exception(ERROR_CON::E1);
		}
        */
		return $this->dao_implement_obj->f_delete($param);
    }
    /*
    @throws Exception
    */
    public function f_search($param){
        /*
        if(!(is_numeric($param))){
			throw new Exception(ERROR_CON::E1);
		}
        */
		return $this->dao_implement_obj->f_search($param);
    }
    /*
    @throws Exception
    */
    public function f_list($param = NULL){
        return $this->dao_implement_obj->f_list($param);
    }
    /*
    @throws Exception
    */
    public function f_searc_with_params($param = array()){
        return $this->dao_implement_obj->f_searc_with_params($param);
    }
    /*
    @throws Exception
    */
    public function f_call_function($param1 = NULL){
        $this->dao_implement_obj->f_call_function($param);
    }
    /*
    @throws Exception
    */
    public function f_query1($param = NULL){
        return $this->dao_implement_obj->f_query1($param);
    }
    /*
    @throws Exception
    */
    public function manage_where_param_1($param1 = array(), $param2 = array(), $param3 = array()){
        return $this->dao_implement_obj->manage_where_param_1($param1, $param2, $param3);
    }
    /*
    @throws Exception
    */
    public function array_filter_1($param1=array(), $param2=array(), $param3="key", $param4=TRUE){
        return $this->dao_implement_obj->array_filter_1($param1, $param2, $param3, $param4);
    }

}
?>