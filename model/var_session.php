<?php
namespace{
    class var_session{
	
        public static $OBJ;
        public static function init(){
            if (self::$OBJ == NULL){
                self::$OBJ = new self();
            }
            return self::$OBJ;
        }
        public function __construct($attributes = Array()){
            self::init_var_session();
            foreach($attributes as $key=>$value){
              self::set_data($key, $value);
            }
        }
        public static function init_var_session(){
            if( !isset($_SESSION) ){
                session_start();
            }
        }
        public function __toString(){
            return get_class($this);
        }
        //check session
        public static function is_data_exist( $key ){
            $return_val = FALSE;
            if( isset($_SESSION[$key]) ){
                $return_val = TRUE;
            }
            else{
                $return_val = FALSE;
            }
            return $return_val;
        }
        //remove session
        public static function remove_data( $key = NULL ){
            if( !empty($key) ){
                if( isset($_SESSION[$key]) ){
                    unset( $_SESSION[$key] );
                }
            }
            else{
                //unset($_SESSION);
                session_unset();
                //session_destroy();
            }
        }
        //get session data
        public static function get_data( $key ){
            $return_val = NULL;
            if( (isset($_SESSION[$key])) ){
                $return_val = $_SESSION[$key];
            }
            return $return_val;
        }
        //set session data
        public static function set_data( $key , $value ){
            //$type = gettype($value);
            $_SESSION[$key] = $value;
        }

    }
    //call
    var_session::init();
}
?>