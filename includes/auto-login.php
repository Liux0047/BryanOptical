<?php
if(session_id() == '') {
    session_start(); 
}
if (!isset($_COOKIE["valid_member_id"])){
    //set the cookie for 100 days
    if (isset($_GET['remember_me'])){
        setcookie("valid_member_id", $_SESSION['member_id'], time()+60*60*24*100);
        setcookie("valid_email", $_SESSION['email'], time()+60*60*24*100);
    }    
}
else{
    //query db to set email
    require ('./db-conn.php');
    
    $sql = "select * from member where member_id =".$_COOKIE["valid_member_id"]." and email='".$_COOKIE["valid_email"]."'";
    $result = $db->query($sql);
    $num_results = $result->num_rows;
    $db->close();
    
    if ($num_results){   
        $row = $result->fetch_assoc();
        $_SESSION['member_id'] = $_COOKIE["valid_member_id"];
        $_SESSION['email'] = $_COOKIE["valid_email"];    
    }
}
?>
