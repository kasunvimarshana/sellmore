<?php
interface bll_class{
	
    public function f_query($param_1, $param_2);
	public function f_insert($param);
    public function f_update($param);
    public function f_delete($param);
    public function f_search($param);
    public function f_list($param);
    public function f_searc_with_params($param);
    public function f_call_function($param);
    public function f_query1($param);
    public function manage_where_param_1($param_1, $param_2, $param_3);
    public function array_filter_1($param_1, $param_2, $param_3, $param_4);
	
}
?>