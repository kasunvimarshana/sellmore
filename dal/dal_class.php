<?php
interface dal_class{
	
	public function f_insert($param);
    public function f_update($param);
    public function f_delete($param);
    public function f_search($param);
    public function f_list($param);
	
}
?>