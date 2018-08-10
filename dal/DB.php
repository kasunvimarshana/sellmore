<?php
/*Database Constance*/
//!defined('DB_HOST') ? define('DB_HOST', 'localhost') : null;
namespace{
    class DB{

        private static $DSN = "mysql:host=".DB_CON::DB_HOST.";dbname=".DB_CON::DB_NAME.";port=".DB_CON::DB_PORT;
        private static $DB_CONNECTION;
        public static $OBJ;
        public static function init(){
            if (self::$OBJ == NULL){
                self::$OBJ = new self();
            }
            return self::$OBJ;
        }
        public function __construct(){
            //self::$dbConnection =& self::getConnection();
            self::connect();
        }
        public function __toString(){
            return get_class($this);
        }
        /*
        function to get PDO object
        @throws Exception
        */
        public static function &getConnection(){
            self::connect();
            return self::$DB_CONNECTION;
        }
        /*
        @throws Exception
        */
        private static function connect(){
            if(!isset(self::$DB_CONNECTION)){
                self::$DB_CONNECTION = new PDO(self::$DSN, DB_CON::DB_USER, DB_CON::DB_PASSWORD);
                //set attributes
                self::$DB_CONNECTION->setAttribute(DB_CON::ATTR_ERRMODE, DB_CON::ERRMODE_EXCEPTION);
                self::$DB_CONNECTION->setAttribute(DB_CON::ATTR_CURSOR, DB_CON::CURSOR_SCROLL);
            }
        }
        /*
        function to begin transaction
        @throws Exception
        */
        public static function beginTransaction(){
            self::$DB_CONNECTION->beginTransaction();
        }
        /*
        function to rollback transaction
        @throws Exception
        */
        public static function rollBack(){
            self::$DB_CONNECTION->rollBack();
        }
        /*
        function to commit transaction
        @throws Exception
        */
        public static function commit(){
            self::$DB_CONNECTION->commit();
        }
        /*
        quote string
        @throws Exception
        */
        public static function quote($string){
            $string = self::$DB_CONNECTION->quote($string);
            return $string;
        }
        /*
        get last insert id
        @throws Exception
        */
        public static function getLastInsertId(){
            return self::$DB_CONNECTION->lastInsertId();
        }
        /*
        backup database tables
        @throws Exception
        */
        public static function backupDatabaseTables($tables = '*', $fileName=NULL){
            $return = NULL;
            //get all of the tables
            if($tables == '*'){
                $tables = array();
                $stmt = self::$DB_CONNECTION->prepare("SHOW TABLES");
                $result = $stmt->execute();
                while($row = $stmt->fetch()){
                    $tables[] = $row[0];
                }
            }else{
                $tables = is_array($tables)?$tables:explode(',',$tables);
            }
            //loop through the tables
            foreach($tables as $table){
                $stmt = self::$DB_CONNECTION->prepare("SELECT * FROM {$table}");
                $result = $stmt->execute();
                $numColumns = $stmt->columnCount();
                $return .= "DROP TABLE {$table};";
                $stmt2 = self::$DB_CONNECTION->prepare("SHOW CREATE TABLE {$table}");
                $result2 = $stmt2->execute();
                $row2 = $stmt2->fetch();
                $return .= "\n\n".$row2[1].";\n\n";
                for($i = 0; $i < $numColumns; $i++){
                    while($row = $stmt2->fetch()){
                        $return .= "INSERT INTO {$table} VALUES(";
                        for($j=0; $j < $numColumns; $j++){
                            $row[$j] = addslashes($row[$j]);
                            $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                            if (isset($row[$j])) { $return .= '"'.$row[$j].'"' ; } else { $return .= '""'; }
                            if ($j < ($numColumns-1)) { $return.= ','; }
                        }
                        $return .= ");\n";
                    }
                }

                $return .= "\n\n\n";
            }
            //save file
            if( empty($fileName) ){
                $fileName = DB_CON::DB_BACKUP_DIR.DIRECTORY_SEPARATOR.time().".sql";
            }
            $handle = fopen($fileName, 'w+');
            fwrite($handle, $return);
            fclose($handle);
        }
        /*
        backup database
        @throws Exception
        */
        public static function backupDatabase($fileName=NULL){
            //save file
            if( empty($fileName) ){
                $fileName = DB_CON::DB_BACKUP_DIR.DIRECTORY_SEPARATOR.time().".sql";
            }
            $command = "mysqldump --user=".DB_CON::DB_USER." --password=".DB_CON::DB_PASSWORD." --host=".DB_CON::DB_HOST." ".DB_CON::DB_NAME." > {$fileName}";
            //system($command);
            exec($command);
        }

    }
/*if(!defined('DBClass')){
   DB::getConnection();
   define('DBClass', null);
}*/
//$VAR_DB_CONNECTION =& DB::getConnection();
//DB::backupDatabase();
//call
DB::init();
}
?>