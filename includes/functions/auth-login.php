<?php
if(session_id() == '') {
    session_start(); 
}
if (isset($_POST['email']) && isset($_POST['password'])){
    $return = array('valid_user' => '', 'remember_me' => false);
    // if the user has just tried to log in
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    require ('../../db-conn.php');
    
    $sql = "select * from member"
    ." where email='".$email
    ."' and password='".sha1($password)."'";
    $result = $db->query($sql);
    $num_results = $result->num_rows;
    $db->close();
    
    //if there is such an email and password
    if ($num_results){   
        $row = $result->fetch_assoc();
        //set valid_user return value to this member's id
        $return['valid_user'] = "".$row['member_id'];
        //set all nessesary sesstions
        $_SESSION['member_id'] = $row['member_id'];        
        $_SESSION['email'] = $row['email'];
        
        /*
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['address_line_1'] = $row['address_line_1'];
        $_SESSION['address_line_2'] = $row['address_line_2'];
        $_SESSION['city'] = $row['city'];
        $_SESSION['country'] = $row['country'];
        $_SESSION['province_state'] = $row['province_state'];
        $_SESSION['postal_code'] = $row['postal_code'];         
        */
        
        //if user wishes to auto-login
        if (isset($_POST['remember_me'])){
            if ($_POST['remember_me'] == 1){
                $return['remember_me'] = true;    
            }
        }
    }
}
echo json_encode($return);
?>

