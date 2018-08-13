<?php
namespace{
    //META CONSTANT
    /*base directory*/
    $var_base_dir = dirname(__DIR__);
    !defined('VAR_BASE_DIR') ? define( 'VAR_BASE_DIR', $var_base_dir ) : NULL;
    /*check protocol http or https*/
    $base_url_protocol = "http";
    if ( (isset($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] != 'off') ) {
        $base_url_protocol  = "https";
    }else{
        $base_url_protocol  = "http";
    }
    !defined('VAR_BASE_URLPROTOCOL') ? define('VAR_BASE_URLPROTOCOL', $base_url_protocol) : NULL;
    /*define base url*/
    $base_url = VAR_BASE_URLPROTOCOL."://".$_SERVER['HTTP_HOST']."/site01";
    !defined('VAR_BASE_URL') ? define('VAR_BASE_URL', $base_url) : NULL;
    /*system log directory location*/
    $system_log_dir = VAR_BASE_DIR.DIRECTORY_SEPARATOR."logs";
    !defined('VAR_SYSTEMLOG_DIR') ? define('VAR_SYSTEMLOG_DIR', $system_log_dir) : NULL;
    /*system log file location*/
    $system_log_file = VAR_SYSTEMLOG_DIR.DIRECTORY_SEPARATOR."system_log.json";
    !defined('VAR_SYSTEMLOG_FILE') ? define('VAR_SYSTEMLOG_FILE', $system_log_file) : NULL;
    
    interface META_CON{
        const DS = DIRECTORY_SEPARATOR;
        const VAR_BASE_DIR = VAR_BASE_DIR;
        const VAR_BASE_URLPROTOCOL = VAR_BASE_URLPROTOCOL;
        const VAR_BASE_URL = VAR_BASE_URL;
        const VAR_SYSTEMLOG_DIR = VAR_SYSTEMLOG_DIR;
        const VAR_SYSTEMLOG_FILE = VAR_SYSTEMLOG_FILE;
    }
}
?>