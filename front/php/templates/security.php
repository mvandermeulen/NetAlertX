<?php

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$isLogonPage = FALSE;

$CookieSaveLoginName = "NetAlertX_SaveLogin";


if (strpos($url,'index.php') !== false) {
    $isLogonPage = TRUE;
} 

session_start();

if(array_search('action', $_REQUEST) != FALSE)
{
  if ($_REQUEST['action'] == 'logout') {
    session_destroy();
    setcookie($CookieSaveLoginName, "", time() - 3600);
    header('Location: index.php');
  }    
}

// ##################################################
// ## Login Processing start
// ##################################################
$config_file = "../config/app.conf";
$config_file_lines = file($config_file);
$CookieSaveLoginName = "NetAlertX_SaveLogin";

// ###################################
// ## SETPWD_enable_password FALSE
// ###################################

$config_file_lines_bypass = array_values(preg_grep('/^SETPWD_enable_password.*=/', $config_file_lines));
$protection_line = explode("=", $config_file_lines_bypass[0]);
$Pia_WebProtection = strtolower(trim($protection_line[1]));

// ###################################
// ## SETPWD_enable_password TRUE
// ###################################

$config_file_lines = array_values(preg_grep('/^SETPWD_password.*=/', $config_file_lines));
$password_line = explode("'", $config_file_lines[0]);
$Pia_Password = $password_line[1];

// active Session or valid cookie (cookie not extends)
if($Pia_WebProtection == 'true')
{
    if(isset ($_SESSION["login"]) == FALSE )
    {
        $_SESSION["login"] = 0;
    }     

    if ( ($_SESSION["login"] == 1) || $isLogonPage ||  (( isset($_COOKIE[$CookieSaveLoginName]) && $Pia_Password == $_COOKIE[$CookieSaveLoginName ])))
    {
        //Logged in or stay on this page if we are on the index.php already   
        
    } else 
    {
        // we need to redirect        
        header('Location: index.php');
    } 

}

?>