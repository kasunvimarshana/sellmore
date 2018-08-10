<?php
//data access object
class dao_implement_class{
    
	protected $dbCon;//connection object : object
    protected $var_table_name;//table name : string
    protected $var_primary_key;//primary key : array
	protected $key_name_1;//key 1 : string
	protected $key_name_2;//key 2 : string
	protected $key_name_3;//value : string
	protected $key_name_4;//data type : string
	protected $key_name_5;//key 3 : string
	private $is_and_value;//boolean for check and value : boolean
	function __construct($param = NULL){
		$this->dbCon =& DB::getConnection();
        $this->key_name_1 = "key";
        $this->key_name_2 = "key_2";
        $this->key_name_3 = "value";
        $this->key_name_4 = "key_dt";
        $this->key_name_5 = "key_3";
		$this->is_and_value = FALSE;
	}
    public function __toString(){
		return get_class($this);
	}
    /*
    basic query function
    @param $param_1 string
    @param $param_2 array
    @return statement
    @throws Exception
    */
    public function f_query($param_1, $param_2=NULL){
		$stmt = $this->dbCon->prepare($param_1);
        if(is_array($param_2)){
            foreach($param_2 as $key=>$value){
               $stmt->bindValue($key, $value); 
            }
        }
		$affected = $stmt->execute();
		//return $affected;
        return $stmt;
	}
	/*.*/
    /*
    @throws Exception
    */
	protected function f_insert($param){
		$insert_id;
        $key_name_1 = $this->key_name_1; //key
        $key_name_2 = $this->key_name_2; //key_2
        $key_name_3 = $this->key_name_3; //value
        $key_name_4 = $this->key_name_4; //key_dt
        $key_name_5 = $this->key_name_5; //key_3
        $var_table_name = $param->__get("var_table_name");
        $var_table_column = $param->__get("var_table_column");
        $var_table_column_ignore = $param->__get("var_table_column_ignore");
        $var_primary_key = $param->__get("var_primary_key");
        array_walk($var_table_column, function (&$item, $key) use ($param, $key_name_1, $key_name_2, $key_name_3){
            $temp_key_1 = array_key_exists($key_name_1, $item) ? $item[$key_name_1] : NULL;
            $item[$key_name_2] = ":{$temp_key_1}";
            $item[$key_name_3] = $param->__get($temp_key_1);
        });
        /*
        $tempArray = new ArrayObject(array());
        $tempArray = $tempArray->getArrayCopy();
        array_push($tempArray, "id");
        */
        $var_table_column_temp = $this->array_filter_1(
            $var_table_column,
            array_column($var_primary_key, $key_name_1),
            $key_name_1,
            FALSE
        );
        $temp_table_column_name = array_column($var_table_column_temp, $key_name_1);
        $query = "INSERT INTO {$var_table_name} ";
        $query = $query . " (" . implode(" , ", $temp_table_column_name) .") ";
        $temp_table_column_name = array_column($var_table_column_temp, $key_name_2);
        $query = $query . " VALUES (" . implode(" , ", $temp_table_column_name) .") ";
        $stmt = $this->dbCon->prepare($query);
        array_walk($var_table_column_temp, function (&$item, $key) use (&$stmt, $key_name_2, $key_name_3, $key_name_4){
            $temp_key_2 = array_key_exists($key_name_2, $item) ? $item[$key_name_2] : NULL;
            $temp_key_3 = array_key_exists($key_name_3, $item) ? $item[$key_name_3] : NULL;
            $temp_key_4 = array_key_exists($key_name_4, $item) ? $item[$key_name_4] : NULL;
            if($temp_key_4 != NULL){
                $stmt->bindValue($temp_key_2, $temp_key_3, $temp_key_4);
            }else{
                //$stmt->bindParam($temp_key_2, $temp_key_3);
                $stmt->bindValue($temp_key_2, $temp_key_3);
            }
        });
        $affected = $stmt->execute();
		if((isset($affected)) && ($affected > 0)){
			$insert_id = $this->dbCon->lastInsertId();
		}
		return $insert_id;
	}
    /*.*/
    /*
    @throws Exception
    */
	protected function f_update($param){
        $affected;
        $key_name_1 = $this->key_name_1; //key
        $key_name_2 = $this->key_name_2; //key_2
        $key_name_3 = $this->key_name_3; //value
        $key_name_4 = $this->key_name_4; //key_dt
        $key_name_5 = $this->key_name_5; //key_3
        $var_table_name = $param->__get("var_table_name");
        $var_table_column = $param->__get("var_table_column");
        $var_table_column_ignore = $param->__get("var_table_column_ignore");
        $var_primary_key = $param->__get("var_primary_key");
        array_walk($var_table_column, function (&$item, $key) use ($param, $key_name_1, $key_name_2, $key_name_5, $key_name_3){
            $temp_key_1 = array_key_exists($key_name_1, $item) ? $item[$key_name_1] : NULL;
            $item[$key_name_5] = "{$temp_key_1} = :{$temp_key_1}";
            $item[$key_name_2] = ":{$temp_key_1}";
            $item[$key_name_3] = $param->__get($temp_key_1);
        });
        $var_table_column_temp = $this->array_filter_1(
            $var_table_column,
            array_column($var_table_column_ignore, $key_name_1),
            $key_name_1,
            FALSE
        );
        $temp_table_column_name = array_column($var_table_column_temp, $key_name_5);
        $var_table_column_temp_1 = $this->array_filter_1(
            $var_table_column,
            array_column($var_primary_key, $key_name_1),
            $key_name_1,
            TRUE
        );
        $temp_table_column_name_1 = array_column($var_table_column_temp_1, $key_name_5);
        $query = "UPDATE {$var_table_name} ";
        $query = $query . " SET " . implode(" , ", $temp_table_column_name);
        $query = $query . " WHERE " . implode(" AND ", $temp_table_column_name_1);
        $stmt = $this->dbCon->prepare($query);
        //$var_table_column_temp = array_merge($var_table_column_temp, $var_table_column_temp_1);
        array_walk($var_table_column_temp, function (&$item, $key) use (&$stmt, $key_name_2, $key_name_3, $key_name_4){
            $temp_key_2 = array_key_exists($key_name_2, $item) ? $item[$key_name_2] : NULL;
            $temp_key_3 = array_key_exists($key_name_3, $item) ? $item[$key_name_3] : NULL;
            $temp_key_4 = array_key_exists($key_name_4, $item) ? $item[$key_name_4] : NULL;
            if($temp_key_4 != NULL){
                $stmt->bindValue($temp_key_2, $temp_key_3, $temp_key_4);
            }else{
                $stmt->bindValue($temp_key_2, $temp_key_3);
            }
        });
        $affected = $stmt->execute();
		return $affected;
    }
    /*.*/
    /*
    @throws Exception
    */
	protected function f_delete($param){
        $affected;
        $key_name_1 = $this->key_name_1; //key
        $key_name_2 = $this->key_name_2; //key_2
        $key_name_3 = $this->key_name_3; //value
        $key_name_4 = $this->key_name_4; //key_dt
        $key_name_5 = $this->key_name_5; //key_3
        $var_table_name = $this->var_table_name; //table name
        $var_primary_key = $this->var_primary_key; //primary key
        array_walk($var_primary_key, function (&$item, $key) use ($param, $key_name_1, $key_name_2, $key_name_5, $key_name_3){
            $temp_key_1 = array_key_exists($key_name_1, $item) ? $item[$key_name_1] : NULL;
            $item[$key_name_5] = "{$temp_key_1} = :{$temp_key_1}";
            $item[$key_name_2] = ":{$temp_key_1}";
            $item[$key_name_3] = $param;
        });
        $temp_table_column_name_1 = array_column($var_primary_key, $key_name_5);
        $query = "DELETE FROM {$var_table_name} ";
        $query = $query . " WHERE " . implode(" AND ", $temp_table_column_name_1);
        $stmt = $this->dbCon->prepare($query);
        array_walk($var_primary_key, function (&$item, $key) use (&$stmt, $key_name_2, $key_name_3, $key_name_4){
            $temp_key_2 = array_key_exists($key_name_2, $item) ? $item[$key_name_2] : NULL;
            $temp_key_3 = array_key_exists($key_name_3, $item) ? $item[$key_name_3] : NULL;
            $temp_key_4 = array_key_exists($key_name_4, $item) ? $item[$key_name_4] : NULL;
            if($temp_key_4 != NULL){
                $stmt->bindValue($temp_key_2, $temp_key_3, $temp_key_4);
            }else{
                $stmt->bindValue($temp_key_2, $temp_key_3);
            }
        });
        $affected = $stmt->execute();
		return $affected;
    }
    /*.*/
    /*
    @throws Exception
    */
	protected function f_search($param){
        $return_val;
        $key_name_1 = $this->key_name_1; //key
        $key_name_2 = $this->key_name_2; //key_2
        $key_name_3 = $this->key_name_3; //value
        $key_name_4 = $this->key_name_4; //key_dt
        $key_name_5 = $this->key_name_5; //key_3
        $var_table_name = $this->var_table_name; //table name
        $var_primary_key = $this->var_primary_key; //primary key
        array_walk($var_primary_key, function (&$item, $key) use ($param, $key_name_1, $key_name_2, $key_name_5, $key_name_3){
            $temp_key_1 = array_key_exists($key_name_1, $item) ? $item[$key_name_1] : NULL;
            $item[$key_name_5] = "{$temp_key_1} = :{$temp_key_1}";
            $item[$key_name_2] = ":{$temp_key_1}";
            $item[$key_name_3] = $param;
        });
        $temp_table_column_name_1 = array_column($var_primary_key, $key_name_5);
        $query = "SELECT * FROM {$var_table_name} ";
        $query = $query . " WHERE " . implode(" AND ", $temp_table_column_name_1);
        $stmt = $this->dbCon->prepare($query);
        array_walk($var_primary_key, function (&$item, $key) use (&$stmt, $key_name_2, $key_name_3, $key_name_4){
            $temp_key_2 = array_key_exists($key_name_2, $item) ? $item[$key_name_2] : NULL;
            $temp_key_3 = array_key_exists($key_name_3, $item) ? $item[$key_name_3] : NULL;
            $temp_key_4 = array_key_exists($key_name_4, $item) ? $item[$key_name_4] : NULL;
            if($temp_key_4 != NULL){
                $stmt->bindValue($temp_key_2, $temp_key_3, $temp_key_4);
            }else{
                $stmt->bindValue($temp_key_2, $temp_key_3);
            }
        });
        $affected = $stmt->execute();
        $stmt->setFetchMode(DB_CON::FETCH_CLASS|DB_CON::FETCH_PROPS_LATE, $var_table_name);
		$return_val = $stmt->fetch();
        return $return_val;
    }
    /*.*/
    /*
    @throws Exception
    */
	protected function f_list($param = NULL){
        $return_val;
        $key_name_1 = $this->key_name_1; //key
        $key_name_2 = $this->key_name_2; //key_2
        $key_name_3 = $this->key_name_3; //value
        $key_name_4 = $this->key_name_4; //key_dt
        $key_name_5 = $this->key_name_5; //key_3
        $var_table_name = $this->var_table_name; //table name
        $var_primary_key = $this->var_primary_key; //primary key
        $query = "SELECT * FROM {$var_table_name} ";
		$stmt = $this->dbCon->prepare($query);
		$stmt->execute();
        $stmt->setFetchMode(DB_CON::FETCH_CLASS|DB_CON::FETCH_PROPS_LATE, $var_table_name);
        $return_val = $stmt->fetchAll();
        return $return_val;
    }
    /*.*/
    /*
    @throws Exception
    */
	protected function f_searc_with_params($param = array()){
        /*
        if(!is_array($param)){
			throw new Exception(ERROR_CON::E1);
		}
        */
        $return_val = array();
        $key_name_1 = $this->key_name_1; //key
        $key_name_2 = $this->key_name_2; //key_2
        $key_name_3 = $this->key_name_3; //value
        $key_name_4 = $this->key_name_4; //key_dt
        $key_name_5 = $this->key_name_5; //key_3
        $var_table_name = $this->var_table_name; //table name
        $var_primary_key = $this->var_primary_key; //primary key
		$query = "SELECT * FROM {$var_table_name} ";
        $whereQ = array();
        $queryV = array();
        foreach($param as $key=>$value){
            if(is_array($value)){
                $val = $value[0];
                $op = (isset($value[1]))?$value[1]:"=";
                $whereQ[] = $key." ".$op." :".$key;
                $aKey = ":".$key;
                $queryV[$aKey] = $val;
            }
        }
        if(!empty($whereQ)){
            $query = "SELECT * FROM {$var_table_name} WHERE ".implode(" AND ", $whereQ);
        }
		$stmt = $this->dbCon->prepare($query);
        foreach($queryV as $key=>$value){
            $stmt->bindValue($key, $value);
        }
		$stmt->execute();
        $stmt->setFetchMode(DB_CON::FETCH_CLASS|DB_CON::FETCH_PROPS_LATE, $var_table_name);
        $return_val = $stmt->fetchAll();
        return $return_val;
    }
    /*.*/
    /*
    test method
    @throws Exception
    */
    public function f_call_function($param1 = NULL){}
	/*.*/
    /*
    @throws Exception
    */
    public function f_query1($param = NULL){
        /* check the param is a json object or not */
        if( !is_JSON( $param ) ){
           //return false; 
           throw new Exception(ERROR_CON::E1);
        }
        $param = json_decode( $param );
        $query;
        $bind_value = array();
        /* get the query type from param json (QUERY_CUSTOM, QUERY_SELECT, QUERY_UPDATE, QUERY_DELETE) */
        if( $param->query_type == DB_CON::QUERY_SELECT ){//select
           $query = "SELECT * FROM ".$param->query; 
        }else if( $param->query_type == DB_CON::QUERY_DELETE ){//delete
           $query = "DELETE FROM ".$param->query; 
        }else if( $param->query_type == DB_CON::QUERY_UPDATE ){//update
           $query = "UPDATE ".$param->query; 
        }else if( $param->query_type == DB_CON::QUERY_CUSTOM ){//custom
           $query = $param->query; 
        }
        /* get the set_value property data from json object */
        /* the set_value is used to update table */
        if( isset( $param->set_value ) ){
            if( (isset($param->set_value)) ){
               $temp_query = array();
               foreach($param->set_value as $key=>$value){
                    if( is_object($value) ){
                        $val = $value->value;
                        $key1 = (isset( $value->key1 )) ? $value->key1 : $key;
                        $key2 = "KU";//key update
                        $key2 = (isset( $value->key2 )) ? $value->key2 : $key2 . $key;
                        $temp_query[] = $key1." = :".$key2;
                        $aKey = ":".$key2;
                        if( (isset( $value->key_dt )) && (!empty( $value->key_dt )) ){
                            $bind_value[$aKey][0] = $val;
                            $bind_value[$aKey][1] = $value->key_dt;
                        }else{
                            $bind_value[$aKey] = $val;
                        }
                    }
                }
                if(!empty($temp_query)){
                    $query = $query . " SET ".implode(" , ", $temp_query);
                }
            }
        }
        /* get the where_value property data from json object */
        /* the set_value is used in where clause */
        if( isset( $param->where_value ) ){
			if( (!empty( $param->where_value->and_value )) || (!empty( $param->where_value->or_value )) ){
				$query = $query . " WHERE ";
			}
            if( isset( $param->where_value->and_value ) ){//and
                if( (is_object($param->where_value->and_value)) ){
                   $temp_query = array();
                   foreach($param->where_value->and_value as $key=>$value){
                        if( is_object($value) ){
                            $val = $value->value;
                            $op = (isset( $value->op )) ? $value->op : "=";
                            $key1 = (isset( $value->key1 )) ? $value->key1 : $key;
                            $key2 = "KW";//key where
                            $key2 = (isset( $value->key2 )) ? $value->key2 : $key2 . $key;
                            $temp_query[] = $key1." ".$op." :".$key2;
                            $aKey = ":".$key2;
                            if( (isset( $value->key_dt )) && (!empty( $value->key_dt )) ){
                                $bind_value[$aKey][0] = $val;
                                $bind_value[$aKey][1] = $value->key_dt;
                            }else{
                                $bind_value[$aKey] = $val;  
                            }
                        }
                    }
                    if(!empty($temp_query)){
                        $query = $query . " ".implode(" AND ", $temp_query);
						$this->is_and_value = TRUE;
                    }else{
						$this->is_and_value = FALSE;
					}
                }   
            }
            if( isset( $param->where_value->or_value ) ){//or
                if( (is_object($param->where_value->or_value)) ){
                   $temp_query = array();
                   foreach($param->where_value->or_value as $key=>$value){
                        if( is_object($value) ){
                            $val = $value->value;
                            $op = (isset( $value->op )) ? $value->op : "=";
                            $key1 = (isset( $value->key1 )) ? $value->key1 : $key;
                            $key2 = "KW";//key where
                            $key2 = (isset( $value->key2 )) ? $value->key2 : $key2 . $key;
                            $temp_query[] = $key1." ".$op." :".$key2;
                            $aKey = ":".$key2;
                            if( (isset( $value->key_dt )) && (!empty( $value->key_dt )) ){
                                $bind_value[$aKey][0] = $val;
                                $bind_value[$aKey][1] = $value->key_dt;
                            }else{
                                $bind_value[$aKey] = $val;
                            }
                        }
                    }
                    if(!empty($temp_query)){
						if( $this->is_and_value ){
							$query = $query . " AND ( ".implode(" OR ", $temp_query)." ) ";
						}else{
							$query = $query . " ( ".implode(" OR ", $temp_query)." ) ";
						}
                    }
                }   
            }
        }
        /* get the group_by property data from json object */
        if( isset( $param->group_by ) ){
            if( (is_array($param->group_by)) ){
                if(!empty($param->group_by)){
                    $query = $query . " GROUP BY ".implode(" , ", $param->group_by);
                }
            }
        }
        /* get the order_by property data from json object */
        if( isset( $param->order_by ) ){
            if( (is_object($param->order_by)) ){
               $temp_query = array();
               foreach($param->order_by as $key=>$value){
                    if( is_object($value) ){
                        $column = (isset( $value->column )) ? $value->column : $key;
                        $order = (isset( $value->order )) ? $value->order : "DESC";
                        $temp_query[] = $column." ".$order;
                    }
                }
                if(!empty($temp_query)){
                    $query = $query . " ORDER BY ".implode(" , ", $temp_query);
                }
            }
        }
		/*
        The SQL query below says "return only 10 records, start on record 16 (OFFSET 15)":
        $sql = "SELECT * FROM table_name LIMIT 10 OFFSET 15";
        You could also use a shorter syntax to achieve the same result:
        $sql = "SELECT * FROM table_name LIMIT 15, 10";
        */
        /* get the limit property data from json object */
        if( isset( $param->limit ) ){
            $aKey = ":limit";   
            $query = $query . " LIMIT " . $aKey;   
            $bind_value[$aKey][0] = intval( $param->limit );
            $bind_value[$aKey][1] = DB_CON::PARAM_INT;
        }
        /* get the offset property data from json object */
        if( isset( $param->offset ) ){
            $aKey = ":offset";
            $query = $query . " OFFSET " . $aKey;   
            $bind_value[$aKey][0] = intval( $param->offset );
            $bind_value[$aKey][1] = DB_CON::PARAM_INT;
        }
        /* get the query_value property data from json object */
        /* the query_value is used to set custom query value */
        if( isset( $param->query_value ) ){
            if( (is_array($param->query_value)) ){
               foreach($param->query_value as $key=>$value){
                    $key = ":".$key;
                    if( is_object($value) ){
                       $bind_value[$key][0] = $value->value;//value 
                       $bind_value[$key][1] = $value->key_dt;//value's data type
                    }else{
                       $bind_value[$key] = $value; 
                    }  
               }
            }
        }
        /*execute the query*/
        if( !empty($query) ){
			$query = trim( $query );
            $stmt = $this->dbCon->prepare($query);
            foreach($bind_value as $key=>$value){
                if( is_array($value) ){
                   $temp_value = $value[0]; 
                   $temp_datatype = $value[1]; 
                   $stmt->bindValue($key, $temp_value, $temp_datatype);
                }else{
                   $stmt->bindValue($key, $value); 
                } 
            }
            $affected = $stmt->execute();
            return $stmt;
        }
        return NULL;   
    }
    /*.*/
	/*
    basic query function
    @param1 $param1 array array
    @param2 $param2 array and
    @param3 $param3 array or
    @return array
    @throws Exception
    */
	public function manage_where_param_1($param1 = array(), $param2 = array(), $param3 = array()){
		$where_value = array();
		if( (isset($param1["where_value"])) && (is_array($param1["where_value"])) ){
			$where_value = $param1["where_value"];
			//and values
			if( (isset($where_value["and_value"])) && (is_array($where_value["and_value"])) ){
				$temp = $where_value["and_value"];
				$param2 = array_merge( $temp, $param2 );
				$where_value["and_value"] = $param2;
			}else{
				$where_value["and_value"] = $param2;
			}
			//or values
			if( (isset($where_value["or_value"])) && (is_array($where_value["or_value"])) ){
				$temp = $where_value["or_value"];
				$param3 = array_merge( $temp, $param3 );
				$where_value["or_value"] = $param3;
			}else{
				$where_value["or_value"] = $param3;
			}
		}else{
			$where_value = array_merge( $where_value, array( "and_value" => $param2 ) );
			$where_value = array_merge( $where_value, array( "or_value" => $param3 ) );
		}
		$param1["where_value"] = $where_value;
		return $param1;
	}
	/*.*/
    /*
    array filter function
    @param $param1 array //value array
    @param $param2 array //value array ignore
    @param $param3 string //search key
    @param $param4 boolean //return array property (FALSE:NEQ, TRUE:EQ)
    @return array
    @throws Exception
    */
    public function array_filter_1($param1=array(), $param2=array(), $param3="key", $param4=TRUE){
        if((!is_array($param1)) || (!is_array($param2))){
            throw new Exception(ERROR_CON::E1);
        }
        $temp_array = array();
        $param2 = array_flip($param2);
        $temp_array = array_filter($param1, function($data) use ($param2, $param3, $param4){
            $temp_key = array_key_exists($param3, $data)?$data[$param3]:NULL;
            $return_val = array_key_exists($temp_key, $param2);
            if((!$param4)){
                $return_val = !$return_val;
            }
            return $return_val;
        });
        return $temp_array;
    }
    /*.*/
    /*
        rename_function('my_function', 'renamed_my_function');
        override_function('my_function', '$param', 'return override_my_function($param);');
    */
    
}
?>