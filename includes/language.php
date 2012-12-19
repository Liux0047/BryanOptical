<?php
if(session_id() == '') {
    session_start(); 
}
//if lang is not selected
if ( !isset ($_REQUEST['language'])){
    //when there is no session
    if ( !isset($_SESSION['language']) ){
        $_SESSION['language'] = 'en';
    }
    //use previous session if exists
    $language = $_SESSION['language'];
}
else {
    //when user selects a language
    $language = $_REQUEST['language'];
    $_SESSION['language'] = $language;
}

switch ($language){
    case 'en':
        $language_file = 'english.php';
        break;
    case 'cn':
        $language_file = 'chinese.php';
        break;
    default:
        $language_file = 'english.php';
}
include_once ('./includes/languages/'.$language_file);
?>
