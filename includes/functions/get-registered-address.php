<?php

if (isset($_POST['member_id'])){
   
    require ('../../db-conn.php');
    
    $sql = "select * from member where member_id=".$_POST['member_id'];
    $result = $db->query($sql);
    $num_results = $result->num_rows;
    $db->close();
    
    if ($num_results){
        $row = $result->fetch_assoc();
        $row['success'] = true;
    }
    else{
        $row['success'] = false;
    }  
}
else{
    $row['success'] = false;    
}
echo json_encode($row);

?>
