<?php
namespace{
    //PAGE CONSTANT
    /*main page url*/
    $main_page_url = META_CON::VAR_BASE_URL."/index.php";
    !defined('VAR_MAINPAGE_URL') ? define('VAR_MAINPAGE_URL', $main_page_url) : NULL;
    /*loging page url*/
    $login_page_url = META_CON::VAR_BASE_URL."/login.php";
    !defined('VAR_LOGINPAGE_URL') ? define('VAR_LOGINPAGE_URL', $login_page_url) : NULL;
    
    interface PAGE_CON{
        const VAR_MAINPAGE_URL = VAR_MAINPAGE_URL;
        const VAR_LOGINPAGE_URL = VAR_LOGINPAGE_URL;
    }
}
?>