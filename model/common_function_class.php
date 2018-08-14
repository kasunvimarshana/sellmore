<?php
namespace{
    class common_function_class{
        
        //date & time units
        public const VAR_DT_UNIT = ["day"=>"day", "month"=>"month", "year"=>"year"];
        public const VAR_URL_PARAM = ["P1"=>"URL", "P2"=>"ABS_PATH"];
        public static $var_systemlog_dir;
        public static $var_systemlog_file;
        public static $OBJ;
        public static function init(){
            if (self::$OBJ == NULL){
                self::$OBJ = new self();
            }
            return self::$OBJ;
        }
        function __construct($param = NULL){
            self::$var_systemlog_dir = META_CON::VAR_SYSTEMLOG_DIR;
            self::$var_systemlog_file = META_CON::VAR_SYSTEMLOG_FILE;
        }   
        public function __toString(){
            return get_class($this);
        }
        /*
        check valid date
        @param $param date
               format (Y-m-d)
               format (m/d/Y)
        @return boolean
        @throws Exception
        */
        public static function f_check_date_1($param){
            $is_date_1 = FALSE;
            $is_date_2 = FALSE;
            $temp_date_1 = DateTime::createFromFormat("Y-m-d", $param);
            $is_date_1 = isset($temp_date_1) && ($temp_date_1->format("Y-m-d") === $param);
            //$temp_date_2 = DateTime::createFromFormat("m/d/Y", $param);
            //$is_date_2 = isset($temp_date_2) && ($temp_date_2->format("m/d/Y") === $param);
            return $is_date_1 || $is_date_2;
        }
        /*.*/
        /*
        get date range
        @param $param_1 date begin
               format (Y-m-d)
        @param $param_2 date end
               format (Y-m-d)
        @return $return_val array()
        @throws Exception
        */
        public static function f_get_date_range($param_1, $param_2){
            $return_val = array();
            //$begin = new DateTime('Y-m-d');
            $begin = new DateTime($param_1);
            $end = new DateTime($param_2);
            $modify_string = "+1 ".self::VAR_DT_UNIT["day"];
            $end = $end->modify($modify_string);
            $interval = new DateInterval('P1D');
            $return_val = new DatePeriod($begin, $interval, $end); 
            return $return_val;
        }
        /*.*/
        /*create date
        ($date=param_1, $unit=param_2, $number=param_3, $operator=param_4)
        @param $param_1 date
               format (Y-m-d)
        @param $param_2 string
               (day, month, year)
        @param $param_3 integer
        @param $param_4 char
               (+, -)
        @return date
        @throws Exception
        */
        public static function f_get_date($param_1=NULL, $param_2=NULL, $param_3=NULL, $param_4=NULL){
            $return_val = NULL;
            if((!self::f_check_date_1($param_1))){
                $param_1 = date('Y-m-d', time());
            }
            $param_2 = array_key_exists($param_2, self::VAR_DT_UNIT)?self::VAR_DT_UNIT[$param_2]:"day";
            $param_3 = is_numeric($param_3) ? $param_3 : 0;
            $return_val = new DateTime($param_1);
            switch($param_4){
                case "+" :
                    $modify_string = "+".$param_3." ".$param_4;
                    $return_val->modify($modify_string);
                    break;
                case "-" :
                    $modify_string = "-".$param_3." ".$param_4;
                    $return_val->modify($modify_string);
                    break;
                default :
                    break;
            }
            return $return_val;
        }
        /*.*/
        /*
        get file extension
        @param $param string
        @return string
        @throws Exception
        */
        public static function f_get_file_extension($param){
            $extension = explode(".", $param);
            $extension = strtolower(end($extension));
            return $extension;
        }
        /*.*/
        /*
        removeFile function
        remove given file or directory
        @param $param string
        @return boolean
        @throws Exception
        */
        public static function f_delete_content($param){
            $return_val = FALSE;
            try{
                if(is_file($param)){
                    @unlink($param);
                }else{
                    $iterator = new DirectoryIterator($param);
                    foreach( $iterator as $fileinfo ){
                      if($fileinfo->isDot()){
                          continue;
                      }
                      if($fileinfo->isDir()){
                        if(f_delete_content($fileinfo->getPathname())){
                            @rmdir($fileinfo->getPathname());
                        } 
                      }
                      if($fileinfo->isFile()){
                        @unlink($fileinfo->getPathname());
                      }
                    }
                }
                $return_val = TRUE;
            }catch( Exception $e ){
                // write log
                $return_val = FALSE;
            }
            return $return_val;
        }
        /*.*/
        /*
        check the string is valid json or not
        @param $param string json
        @return boolean
        @throws Exception
        */
        public static function is_JSON( $param ){
           return (is_string($param) && is_array(json_decode($param, TRUE)) && (json_last_error() == JSON_ERROR_NONE)) ? TRUE : FALSE;
        }
        /*.*/
        /*
        convert object to array
        @param $param data stdClass Object
        @return array
        @throws Exception
        */
        public static function object_to_array( $param ) {
            if (is_object( $param )) {
                // Gets the properties of the given object
                // with get_object_vars function
                $param = get_object_vars( $param );
            }
            if (is_array( $param )) {
                /*
                * Return array converted to object
                * Using __FUNCTION__ (Magic constant)
                * for recursive call
                */
                $param = array_map(__FUNCTION__, $param);
            }
            // Return array
            return $param;
        }
        /*.*/
        /*
        convert array to object
        @param $param data array
        @return stdClass Object
        @throws Exception
        */
        public static function array_to_object( $param ) {
            if (is_array( $param )) {
                /*
                * Return array converted to object
                * Using __FUNCTION__ (Magic constant)
                * for recursive call
                */
                return (object) array_map(__FUNCTION__, $param);
            }
            else {
                // Return object
                return $param;
            }
        }
        /*.*/
        /*
        create log function
        create a log using given data
        @param $param_1 array
        @param $param_2 filename
        @return boolean
        @throws Exception
        */
        public static function f_create_log($param_1, $param_2 = NULL){
            $return_val = FALSE;
            if( empty($param_2) ){
                $param_2 = self::$var_systemlog_file;
            }
            try{
                if(!is_array($param)){
                   $param = array("log"=>$param); 
                }
                $param_json = json_encode($param, JSON_PRETTY_PRINT);
                file_put_contents($param_2, $param_json, FILE_APPEND | LOCK_EX);
                $return_val = TRUE;
            }catch(Exception $e){
                $return_val = FALSE;
            }
            return $return_val;
        }
        /*.*/
        /*
        create file url
        @param $param_1 url string
        @param $param_2 boolean
        @return string
        @throws Exception
        */
        public static function f_create_file_url_1($param_1, $param_2=self::VAR_URL_PARAM["P1"]){
            $return_val = NULL;
            $temp_base_dir = META_CON::VAR_BASE_DIR;
            $temp_base_url = META_CON::VAR_BASE_URL;
            $temp_directory_separator = META_CON::DS;
            $temp_url_separator = META_CON::URL_SEPARATOR;
            switch($param_2){
                case self::VAR_URL_PARAM["P1"]:
                    {
                        $temp_serch = array($temp_base_dir, $temp_directory_separator);
                        $temp_replace = array($temp_base_url, $temp_url_separator);
                        $return_val = str_replace($temp_serch, $temp_replace, $param_1);
                        break;
                    }
                case self::VAR_URL_PARAM["P2"]:
                    {
                        $temp_serch = array($temp_base_url, $temp_url_separator);
                        $temp_replace = array($temp_base_dir, $temp_directory_separator);
                        $return_val = str_replace($temp_serch, $temp_replace, $param_1);
                        break;
                    }
                default :
                    $return_val = NULL;
                    break;
            }
            return $return_val;
        }
        /*.*/
        
    }
    //call
    common_function_class::init();
}
?>
<?php
/*
if(!is_dir('examples')){
    mkdir('examples');
}
*/
?>