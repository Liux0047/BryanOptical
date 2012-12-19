<!DOCTYPE html>
<html lang="en"><head>
    <?php
        require ('./includes/header.php');       
    ?>
<link href="./css/style.css" rel="stylesheet">
<title><?php echo BRYAN_OPTICAL ?></title>
</head>

<body>
    <?php             
    //if not logged in
    if(!isset($_SESSION['member_id']) || $_SESSION['member_id'] == null){
        header('Location: '.$site_url);
    }
    //if this section called by a modifying page
    if (isset($_POST['modify'])){ 
        require ('./includes/add-to-cart.php');
    }
    //if a delete request is send
    if (isset($_GET['delete_product_id'])){
        unset($_SESSION['cart'][$_GET['delete_product_id']]);
        //re-calculate total items and price
        $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
        $_SESSION['num_items'] = calculate_items($_SESSION['cart']);
    }
    require ('./includes/navbar.php');    
    ?>

    <div class="container">
        <div class="row">
            <div class="span9">
                <?php
                if( isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    echo "<h3>".SHOPPING_CART."</h3>";                                      
                    require ('./includes/display-cart.php');     
                } else {
                    echo "<h3>There are no items in your cart</h3><hr/>";
                }

                ?>      
                <!-- paypal area -->
                <a class="pull-right" href="javascript:PPcheckout()">
                    <img src="https://www.paypalobjects.com/en_US/i/btn/btn_xpressCheckout.gif" align="left">
                </a>
                <form method="post" action="./modules/payments/paypal/process.php" id="paypal_form"></form>
                
                <br><br>
                <button type="button" class="btn" data-toggle="collapse" data-target="#other_payment_methods">
                    <span class="span9">
                        <?php echo OTHER_PAYMENT_METHODS; ?>
                    </span>
                </button>                
                
                <div id="other_payment_methods" class="collapse in">
                    <h3><?php echo SHIPPING_ADDRESS; ?></h3>
                    <hr>
                    <form class="form-horizontal" accept-charset="UTF-8" action="./test.php" id="address_form" method="post" novalidate="novalidate"> 
                        <div class="controls">
                            <label class="checkbox">
                                <input type="checkbox" name="use_registered_address" id="use_registered_address" onchange ="get_address()">
                                <?php echo USE_MY_REGISTERED_ADDRESS; ?>
                            </label>
                        </div>
                        <br>
                        <?php 
                        require ('./includes/address-form.php');
                        ?>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-warning btn-large"><?php echo CHECKOUT; ?></button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="span2 offset1">
                
            </div>
        </div>
    </div>
    
    <?php 
    require ('./includes/scripts.php');
    require('./includes/footer.php');
    ?>
    
    <script src="./js/jquery.validate.js"></script>
    <script type="text/javascript">
        $(document).ready( function() {
            //enable collapse
            $(".collapse").collapse();
            //address_line_1, city, state, postal_code, country
            // validate address form on keyup and submit
            $("#address_form").validate({
                rules: {
                    address_line_1:{
                        required :true
                    },
                    city: {
                        required :true
                    },
                    province_state: {
                        required :true
                    },
                    postal_code: {
                        required :true
                    },
                    country:{
                        required :true
                    }
                },
                messages: {
                    address_line_1: {                        
                        required:"*<?php echo ADDRESS_LINE_1_REQUIRED; ?> "
                    },
                    city: {
                        required: "*<?php echo CITY_REQUIRED; ?> "
                    },
                    province_state: {
                        required:"*<?php echo STATE_REQUIRED; ?> "
                    },
                    postal_code:{
                        required:"*<?php echo POSTAL_CODE_REQUIRED; ?> "
                    } ,
                    country: {
                        required:"*<?php echo COUNTRY_REQUIRED; ?> "
                    }
                },

                errorPlacement: function(error, element) {
                    error.prependTo( $(element).parent() );
                },
                errorClass: "warning",
                submitHandler: function(form) {
                    //check if there is no item in cart
                    var num_items = <?php echo count($_SESSION['cart']); ?>;
                    if (num_items != 0){
                        form.submit();
                    }
                    else{
                        alert('<?php echo NO_ITEM_IN_CART ?>');
                    }            
                },
                onkeyup: false
            });
        });
        
        function delete_item(product_id){
            var user_confirm = confirm("<?php echo SURE_TO_DELETE; ?>?");
            if (user_confirm){
                window.location.href = "./shopping-cart.php?delete_product_id=" + product_id;
            }
        }
        
        function get_address(){
            var member_id = <?php echo $_SESSION['member_id']; ?>;
            
            $.ajax({
                type: "POST",
                url: "./includes/functions/get-registered-address.php",                
                data: { member_id: member_id },
                success :(function( data ) {
                    var json = data;
                    obj = JSON.parse(json);
                    //if successfully got address info
                    if (obj.success){   
                        document.getElementById('address_line_1').value = obj.address_line_1;
                        document.getElementById('address_line_2').value = obj.address_line_2;
                        document.getElementById('city').value = obj.city;
                        document.getElementById('province_state').value = obj.province_state;
                        document.getElementById('postal_code').value = obj.postal_code;                        
                        $('#country').val(obj.country);
                    }
                    else{
                        alert('<?php echo COULD_NOT_GET_ADDRESS; ?>');
                    }
                })
            }).fail(function (){
                //if the connection to database failed
                alert("connection to database has failed");
            });
            
        }
        
        function PPcheckout(){
            //need to urlencode the post data as json format
            var itemInfo = '<?php echo urlencode(json_encode($_SESSION['cart'])); ?> ';            
            $("#paypal_form").append("<input type='hidden' name='itemInfo' value='" + itemInfo + "' />");
            $("#paypal_form").append("<input type='hidden' name='numItems' value='<?php echo $_SESSION['num_items']; ?>' />");
            $("#paypal_form").append("<input type='hidden' name='totalPrice' value='<?php echo $_SESSION['total_price']; ?>' />");
           
            document.getElementById("paypal_form").submit();        
        }
    </script>
    
</body></html>