<!DOCTYPE html>
<html lang="en"><head>
    <?php
        require ('./includes/language.php');
        require ('./includes/header.php');       
        require ('./includes/variables.php');
        require ('./includes/functions/core-functions.php');
    ?>
<link href="./css/style.css" rel="stylesheet">
<title><?php echo BRYAN_OPTICAL ?></title>
</head>

<body>
     <?php             
        //if this section called by a modifying page
        if (isset($_POST['modify'])){ 
            require ('./includes/add-to-cart.php');
        }
        //if a delete request is send
        if (isset($_GET['delete_product_id'])){
            unset($_SESSION['cart'][$_GET['delete_product_id']]);
            //re-calculate total items and price
            $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
            $_SESSION['total_items'] = calculate_items($_SESSION['cart']);
        }
        require ('./includes/navbar.php');    
     ?>

    <div class="container">
        <div class="row">
            <div class="span12">
                <?php
                if( isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    echo "<h3>".SHOPPING_CART."</h3>";                                      
                    require ('./includes/display-cart.php');     
                } else {
                    echo "<h3>There are no items in your cart</h3><hr/>";
                }

                //display_button($target, "continue-shopping", "Continue Shopping");
                //display_button("checkout.php", "go-to-checkout", "Go To Checkout");
                ?>            
            </div>
        </div>
    </div>
    
    <?php 
    require ('./includes/scripts.php');
    ?>

    <script type="text/javascript">
        $(document).ready( function() {
            //on change when selecting language
    </script>

    <?php
    require('./includes/footer.php');
    ?>

</body></html>