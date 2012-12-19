<?php
session_start();
require ('./includes/variables.php');
session_unset();
setcookie ("valid_member_id", "", time() - 3600);
setcookie ("valid_email", "", time() - 3600);
header('Location: '.$site_url);
?>
