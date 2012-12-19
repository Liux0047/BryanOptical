<?php
$email = $_POST['email'];
require ('../../db-conn.php');
$sql = "select email from member where email='".$email."'";
$result = $db->query($sql);
$num_results = $result->num_rows;
echo $num_results;
?>
