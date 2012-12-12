<?php
session_start();

//if lang is not selected
if ( !isset ($_REQUEST['lang'])){
    //when there is no session
    if ( !isset($_SESSION['lang']) ){
        $_SESSION['lang'] = 'en';
    }
    //use previous session if exists
    $lang = $_SESSION['lang'];
}
else {
    //when user selects a language
    $lang = $_REQUEST['lang'];
    $_SESSION['lang'] = $lang;
}


switch ($lang){
    case 'en':
        $lang_file = 'english.php';
        break;
    case 'cn':
        $lang_file = 'chinese.php';
        break;
    default:
        $lang_file = 'english.php';
}
include_once './includes/languages/'.$lang_file;
?>
