<?php
namespace{
    /*database backup location*/
    $db_backup_dir = META_CON::VAR_BASE_DIR.DIRECTORY_SEPARATOR."databasebackup";
    !defined('DB_BACKUP_DIR') ? define('DB_BACKUP_DIR', $db_backup_dir) : NULL;
    //PDO Data Types PDO::PARAM_*
    interface DB_CON{
        const DB_HOST = "localhost";
        const DB_USER = "root";
        const DB_PASSWORD = "root";
        const DB_NAME = "db_1";
        const DB_PORT = "3306";
        const DB_BACKUP_DIR = DB_BACKUP_DIR;
        const QUERY_CUSTOM = "QUERY_CUSTOM";
        const QUERY_SELECT = "QUERY_SELECT";
        const QUERY_UPDATE = "QUERY_UPDATE";
        const QUERY_DELETE = "QUERY_DELETE";
        const PARAM_BOOL = PDO::PARAM_BOOL;
        const PARAM_NULL = PDO::PARAM_NULL;
        const PARAM_INT = PDO::PARAM_INT;
        const PARAM_STR = PDO::PARAM_STR;
        const PARAM_STR_NATL = PDO::PARAM_STR_NATL;
        const PARAM_STR_CHAR = PDO::PARAM_STR_CHAR;
        const PARAM_LOB = PDO::PARAM_LOB;
        const PARAM_STMT = PDO::PARAM_STMT;
        const PARAM_INPUT_OUTPUT = PDO::PARAM_INPUT_OUTPUT;
        const FETCH_LAZY = PDO::FETCH_LAZY;
        const FETCH_ASSOC = PDO::FETCH_ASSOC;
        const FETCH_NAMED = PDO::FETCH_NAMED;
        const FETCH_NUM = PDO::FETCH_NUM;
        const FETCH_BOTH = PDO::FETCH_BOTH;
        const FETCH_OBJ = PDO::FETCH_OBJ;
        const FETCH_BOUND = PDO::FETCH_BOUND;
        const FETCH_COLUMN = PDO::FETCH_COLUMN;
        const FETCH_CLASS = PDO::FETCH_CLASS;
        const FETCH_INTO = PDO::FETCH_INTO;
        const FETCH_FUNC = PDO::FETCH_FUNC;
        const FETCH_GROUP = PDO::FETCH_GROUP;
        const FETCH_UNIQUE = PDO::FETCH_UNIQUE;
        const FETCH_KEY_PAIR = PDO::FETCH_KEY_PAIR;
        const FETCH_CLASSTYPE = PDO::FETCH_CLASSTYPE;
        const FETCH_SERIALIZE = PDO::FETCH_SERIALIZE;
        const FETCH_PROPS_LATE = PDO::FETCH_PROPS_LATE;
        const ATTR_AUTOCOMMIT = PDO::ATTR_AUTOCOMMIT;
        const ATTR_PREFETCH = PDO::ATTR_PREFETCH;
        const ATTR_TIMEOUT = PDO::ATTR_TIMEOUT;
        const ATTR_ERRMODE = PDO::ATTR_ERRMODE;
        const ATTR_SERVER_VERSION = PDO::ATTR_SERVER_VERSION;
        const ATTR_CLIENT_VERSION = PDO::ATTR_CLIENT_VERSION;
        const ATTR_SERVER_INFO = PDO::ATTR_SERVER_INFO;
        const ATTR_CONNECTION_STATUS = PDO::ATTR_CONNECTION_STATUS;
        const ATTR_CASE = PDO::ATTR_CASE;
        const ATTR_CURSOR_NAME = PDO::ATTR_CURSOR_NAME;
        const ATTR_CURSOR = PDO::ATTR_CURSOR;
        const ATTR_DRIVER_NAME = PDO::ATTR_DRIVER_NAME;
        const ATTR_ORACLE_NULLS = PDO::ATTR_ORACLE_NULLS;
        const ATTR_PERSISTENT = PDO::ATTR_PERSISTENT;
        const ATTR_STATEMENT_CLASS = PDO::ATTR_STATEMENT_CLASS;
        const ATTR_FETCH_CATALOG_NAMES = PDO::ATTR_FETCH_CATALOG_NAMES;
        const ATTR_FETCH_TABLE_NAMES = PDO::ATTR_FETCH_TABLE_NAMES;
        const ATTR_STRINGIFY_FETCHES = PDO::ATTR_STRINGIFY_FETCHES;
        const ATTR_MAX_COLUMN_LEN = PDO::ATTR_MAX_COLUMN_LEN;
        const ATTR_DEFAULT_FETCH_MODE = PDO::ATTR_DEFAULT_FETCH_MODE;
        const ATTR_EMULATE_PREPARES = PDO::ATTR_EMULATE_PREPARES;
        const ATTR_DEFAULT_STR_PARAM = PDO::ATTR_DEFAULT_STR_PARAM;
        const ERRMODE_SILENT = PDO::ERRMODE_SILENT;
        const ERRMODE_WARNING = PDO::ERRMODE_WARNING;
        const ERRMODE_EXCEPTION = PDO::ERRMODE_EXCEPTION;
        const CASE_NATURAL = PDO::CASE_NATURAL;
        const CASE_LOWER = PDO::CASE_LOWER;
        const CASE_UPPER = PDO::CASE_UPPER;
        const NULL_NATURAL = PDO::NULL_NATURAL;
        const NULL_EMPTY_STRING = PDO::NULL_EMPTY_STRING;
        const NULL_TO_STRING = PDO::NULL_TO_STRING;
        const FETCH_ORI_NEXT = PDO::FETCH_ORI_NEXT;
        const FETCH_ORI_PRIOR = PDO::FETCH_ORI_PRIOR;
        const FETCH_ORI_FIRST = PDO::FETCH_ORI_FIRST;
        const FETCH_ORI_LAST = PDO::FETCH_ORI_LAST;
        const FETCH_ORI_ABS = PDO::FETCH_ORI_ABS;
        const FETCH_ORI_REL = PDO::FETCH_ORI_REL;
        const CURSOR_FWDONLY = PDO::CURSOR_FWDONLY;
        const CURSOR_SCROLL = PDO::CURSOR_SCROLL;
        const ERR_NONE = PDO::ERR_NONE;
        const PARAM_EVT_ALLOC = PDO::PARAM_EVT_ALLOC;
        const PARAM_EVT_FREE = PDO::PARAM_EVT_FREE;
        const PARAM_EVT_EXEC_PRE = PDO::PARAM_EVT_EXEC_PRE;
        const PARAM_EVT_EXEC_POST = PDO::PARAM_EVT_EXEC_POST;
        const PARAM_EVT_FETCH_PRE = PDO::PARAM_EVT_FETCH_PRE;
        const PARAM_EVT_FETCH_POST = PDO::PARAM_EVT_FETCH_POST;
        const PARAM_EVT_NORMALIZE = PDO::PARAM_EVT_NORMALIZE;
        const SQLITE_DETERMINISTIC = PDO::SQLITE_DETERMINISTIC;
    }
}
?>