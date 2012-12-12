<?php
if(session_id() == '') {
    session_start(); 
}

if (    isset($_POST['product_id']) && isset($_POST['O_S_SPH']) && isset($_POST['lens_type']) &&
        isset($_POST['O_S_CYL']) && isset($_POST['O_S_AXIS']) && isset($_POST['O_S_ADD']) &&
        isset($_POST['O_D_SPH']) && isset($_POST['O_D_CYL']) && isset($_POST['O_D_AXIS'])&&
        isset($_POST['O_D_ADD']) && isset($_POST['PD']) && isset($_POST['quantity']))
{
    $product_id = $_POST['product_id'];
    $lens_type = $_POST['lens_type'];
    $O_S_SPH = $_POST['O_S_SPH'];
    $O_S_CYL = $_POST['O_S_CYL'];
    $O_S_AXIS = $_POST['O_S_AXIS'];
    $O_S_ADD = $_POST['O_S_ADD'];
    $O_D_SPH = $_POST['O_D_SPH'];
    $O_D_CYL = $_POST['O_D_CYL'];
    $O_D_AXIS = $_POST['O_D_AXIS'];
    $O_D_ADD = $_POST['O_D_ADD'];
    $PD = $_POST['PD'];    
    $quantity = $_POST['quantity'];    
}
else {
    echo "Information Incomplete";
    exit();
}


//if shopping cart empty
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
    $_SESSION['total_items'] = 0;
    $_SESSION['total_price'] ='0.00';
}

//query db to get the price
require ('./db-conn.php');
$sql = "select * from product where product_id = ".$product_id;
$result = $db->query($sql);
$row = $result->fetch_assoc();
$price = $row['price'];
$product_name = $row['product_name'];

//if the item is selected for the first time
if (!isset($_SESSION['cart'][$product_id])){
    $_SESSION['cart'][$product_id] = array(
        'price' => $price,
        'product_name' => $product_name,
        'quantity' => $quantity,
        'lens_type' => $lens_type,
        'O_S_SPH' => $O_S_SPH,
        'O_S_CYL' => $O_S_CYL,
        'O_S_AXIS' => $O_S_AXIS,
        'O_S_ADD' => $O_S_ADD,
        'O_D_SPH' => $O_D_SPH,
        'O_D_CYL' => $O_D_CYL,
        'O_D_AXIS' => $O_D_AXIS,
        'O_D_ADD' => $O_D_ADD,
        'PD' => $PD
    );
}

//otherwise update all prescription info
else{
    $_SESSION['cart'][$product_id]['quantity'] = $quantity;
    $_SESSION['cart'][$product_id]['price'] = $price;
    $_SESSION['cart'][$product_id]['product_name'] = $product_name;
    $_SESSION['cart'][$product_id]['lens_type'] = $lens_type;
    $_SESSION['cart'][$product_id]['O_S_SPH'] = $O_S_SPH;
    $_SESSION['cart'][$product_id]['O_S_CYL'] = $O_S_CYL;
    $_SESSION['cart'][$product_id]['O_S_AXIS'] = $O_S_AXIS;
    $_SESSION['cart'][$product_id]['O_S_ADD'] = $O_S_ADD;
    $_SESSION['cart'][$product_id]['O_D_SPH'] = $O_D_SPH;
    $_SESSION['cart'][$product_id]['O_D_CYL'] = $O_D_CYL;
    $_SESSION['cart'][$product_id]['O_D_AXIS'] = $O_D_AXIS;
    $_SESSION['cart'][$product_id]['O_D_ADD'] = $O_D_ADD;
    $_SESSION['cart'][$product_id]['PD'] = $PD;    

}
$_SESSION['total_price'] = calculate_price($_SESSION['cart']);
$_SESSION['total_items'] = calculate_items($_SESSION['cart']);

?>
