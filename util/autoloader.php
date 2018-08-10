<?php
namespace{
    class autoloader {

        public static $loader;
        public static function init(){
            if (self::$loader == NULL){
                self::$loader = new self();
            }
            return self::$loader;
        }
        public function __construct(){
            //ini_get('include_path');
            //ini_set('include_path', '/usr/lib/pear');
            //spl_autoload_register(array($this,'helper'));
            spl_autoload_register(array($this,'model'));
            spl_autoload_register(array($this,'dal'));
            spl_autoload_register(array($this,'bll'));
            spl_autoload_register(array($this,'library'));
        }
        /*
        public function helper($param){
            $param = preg_replace('/site$/helper','',$param);
            set_include_path(get_include_path().PATH_SEPARATOR.'/helper/');
            spl_autoload_extensions('.helper.php');
            spl_autoload($param);
        }
        */
        public function model($param){
            $dir_name = dirname(__DIR__).DIRECTORY_SEPARATOR."model";
            $param = preg_replace(array('/.+\\\\/', '/.+\//'), '', $param);
            $file_name = $param.".php";
            $files = new RecursiveDirectoryIterator($dir_name);
            $files->setFlags(FileSystemIterator::SKIP_DOTS | FileSystemIterator::UNIX_PATHS);
            $files = new RecursiveIteratorIterator($files);
            foreach($files as $file){
                $temp_file = $file->getFilename();
                if($temp_file == $file_name){
                    include($file);
                    return true;
                }
            }
            return false;
        }
        public function dal($param){
            $dir_name = dirname(__DIR__).DIRECTORY_SEPARATOR."dal";
            $param = preg_replace(array('/.+\\\\/', '/.+\//'), '', $param);
            $file_name = $param.".php";
            $files = new RecursiveDirectoryIterator($dir_name);
            $files->setFlags(FileSystemIterator::SKIP_DOTS | FileSystemIterator::UNIX_PATHS);
            $files = new RecursiveIteratorIterator($files);
            foreach($files as $file){
                $temp_file = $file->getFilename();
                if($temp_file == $file_name){
                    include($file);
                    return true;
                }
            }
            return false;
        }
        public function bll($param){
            $dir_name = dirname(__DIR__).DIRECTORY_SEPARATOR."bll";
            $param = preg_replace(array('/.+\\\\/', '/.+\//'), '', $param);
            $file_name = $param.".php";
            $files = new RecursiveDirectoryIterator($dir_name);
            $files->setFlags(FileSystemIterator::SKIP_DOTS | FileSystemIterator::UNIX_PATHS);
            $files = new RecursiveIteratorIterator($files);
            foreach($files as $file){
                $temp_file = $file->getFilename();
                if($temp_file == $file_name){
                    include($file);
                    return true;
                }
            }
            return false;
        }
        public function library($param){
            $dir_name = dirname(__DIR__).DIRECTORY_SEPARATOR."php_lib";
            $param = preg_replace(array('/.+\\\\/', '/.+\//'), '', $param);
            $file_name = $param.".php";
            $files = new RecursiveDirectoryIterator($dir_name);
            $files->setFlags(FileSystemIterator::SKIP_DOTS | FileSystemIterator::UNIX_PATHS);
            $files = new RecursiveIteratorIterator($files);
            foreach($files as $file){
                $temp_file = $file->getFilename();
                if($temp_file == $file_name){
                    include($file);
                    return true;
                }
            }
            return false;
        }

    }
    //call
    autoloader::init();
}
?>