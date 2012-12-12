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
        require ('./includes/navbar.php');        
     ?>

    <div class="container">
        <?php
        //check if a product has been posted
        if (isset($_GET['product_id'])){
            require('./db-conn.php');
            $product_id = $_GET['product_id'];
            $sql = "select * from product where product_id = ".$product_id;
            $result = $db->query($sql);
            $row = $result->fetch_assoc();
            $price = $row['price'];
            display_selected_glasses($row);
        }
        else{
            echo NO_ITEM_SELECTED;
            //exit();
        }
        
        //if this page called by modify button in show-cart.php
        if (isset($_SESSION['cart'][$product_id])){
            $lens_type = $_SESSION['cart'][$product_id]['lens_type'];
            $O_S_SPH = $_SESSION['cart'][$product_id]['O_S_SPH'];
            $O_S_CYL = $_SESSION['cart'][$product_id]['O_S_CYL'];
            $O_S_AXIS = $_SESSION['cart'][$product_id]['O_S_AXIS'];
            $O_S_ADD = $_SESSION['cart'][$product_id]['O_S_ADD'];
            $O_D_SPH = $_SESSION['cart'][$product_id]['O_D_SPH'];
            $O_D_CYL = $_SESSION['cart'][$product_id]['O_D_CYL'];
            $O_D_AXIS = $_SESSION['cart'][$product_id]['O_D_AXIS'];
            $O_D_ADD = $_SESSION['cart'][$product_id]['O_D_ADD'];
            $PD = $_SESSION['cart'][$product_id]['PD'];    
            $quantity = $_SESSION['cart'][$product_id]['quantity'];
        }
        else{
            $lens_type = "";
            $O_S_SPH = "";
            $O_S_CYL = "";
            $O_S_AXIS = "";
            $O_S_ADD = "";
            $O_D_SPH = "";
            $O_D_CYL = "";
            $O_D_AXIS = "";
            $O_D_ADD = "";
            $PD = "";    
            $quantity = 1;
        }

        ?>
        <div class="row">
            <div class="span3">
                
            </div>
            </div>        
        <h3><?php echo PLEASE_ENTER_PRESCRIPTION; ?></h3>
        <hr>
        <div class="row">
            <div class="span9">                
                <form accept-charset="UTF-8" action="./show-cart.php" id="prescription_form" method="post" novalidate="novalidate">
                    
                    
                    
                    <table cellpadding="5" >
                        <tr>
                            <td ><strong><?php echo LENS_TYPE; ?></strong></td>
                            <td>
                                <label for="lens_type"></label>
                                <select name="lens_type" id="lens_type" class="span2">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($lens_type_arr as $this_lens_type){
                                        echo "<option value='".$this_lens_type."'";
                                        if ($this_lens_type == $lens_type){
                                            echo " selected=true";
                                        }
                                        echo ">";
                                        echo $this_lens_type."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th ><div class="span1"></div></th>
                            <th><?php echo SPH; ?></th>
                            <th><?php echo CYL; ?></th>
                            <th><?php echo AXIS; ?></th>
                            <th><?php echo ADD; ?></th>
                        </tr>
                        
                        <tr>
                            <td ><strong><?php echo O_S_LFET; ?></strong></td>
                            <td>
                                <label for="O_S_SPH"></label>
                                <select name="O_S_SPH" id="O_S_SPH" class="span2">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($SPH_arr as $this_SPH){
                                        echo "<option value='".$this_SPH."'";
                                        if ($this_SPH == $O_S_SPH){                                            
                                            echo " selected=true";
                                        }
                                        echo ">";
                                        echo number_format($this_SPH,2)."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <label for="O_S_CYL"></label>
                                <select name="O_S_CYL" id="O_S_CYL" class="span2">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($CYL_arr as $this_CYL){
                                        echo "<option value='".$this_CYL."'";
                                        if ($this_CYL == $O_S_CYL){
                                            echo " selected=true";
                                        }
                                        echo ">";
                                        echo number_format($this_CYL,2)."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <label for="O_S_AXIS"></label>
                                <select name="O_S_AXIS" id="O_S_AXIS" class="span2">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($AXIS_arr as $this_AXIS){
                                        echo "<option value='".$this_AXIS."'";
                                        if ($this_AXIS == $O_S_AXIS){
                                            echo " selected=true";
                                        }
                                        echo ">";
                                        echo number_format($this_AXIS,2)."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <label for="O_S_ADD"></label>
                                <select name="O_S_ADD" id="O_S_ADD" class="span2">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($ADD_arr as $this_ADD){
                                        echo "<option value='".$this_AXIS."'";
                                        if ($this_ADD == $O_S_ADD){
                                            echo " selected=true";
                                        }
                                        echo ">";
                                        echo number_format($this_ADD,2)."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td ><strong><?php echo O_D_RIGHT; ?></strong></td>
                            <td>
                                <label for="O_D_SPH"></label>
                                <select name="O_D_SPH" id="O_D_SPH" class="span2">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($SPH_arr as $this_SPH){
                                        echo "<option value='".$this_SPH."'";
                                        if ($this_SPH == $O_D_SPH){
                                            echo " selected=true";
                                        }
                                        echo ">";
                                        echo number_format($this_SPH,2)."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <label for="O_D_CYL"></label>
                                <select name="O_D_CYL" id="O_D_CYL" class="span2">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($CYL_arr as $this_CYL){
                                        echo "<option value='".$this_CYL."'";
                                        if ($this_CYL == $O_D_CYL){
                                            echo " selected=true";
                                        }
                                        echo ">";
                                        echo number_format($this_CYL,2)."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <label for="O_D_AXIS"></label>
                                <select name="O_D_AXIS" id="O_D_AXIS" class="span2">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($AXIS_arr as $this_AXIS){
                                        echo "<option value='".$this_AXIS."'";
                                        if ($this_AXIS == $O_D_AXIS){
                                            echo " selected=true";
                                        }
                                        echo ">";
                                        echo number_format($this_AXIS,2)."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <label for="O_D_ADD"></label>
                                <select name="O_D_ADD" id="O_D_ADD" class="span2">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($ADD_arr as $this_ADD){
                                        echo "<option value='".$this_ADD."'";
                                        if ($this_ADD == $O_D_ADD){
                                            echo " selected=true";
                                        }
                                        echo ">";
                                        echo number_format($this_ADD,2)."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td ><strong><?php echo ENTER_P_D; ?></strong></td>
                            <td>
                                <label for="PD"></label>
                                <select name="PD" id="PD" class="span2">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($PD_arr as $this_PD){
                                        echo "<option value='".$this_PD."'";
                                        if ($this_PD == $PD){
                                            echo " selected=true";
                                        }
                                        echo ">";
                                        echo number_format($this_PD,2)."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><strong><?php echo QUANTITY; ?></strong></td>
                            <td>
                                <label for="quantity"></label>
                                <input type="text" name="quantity" id="quantity" class="span2" value=<?php echo $quantity; ?>>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <input type="hidden" name="modify" value="1">
                    
                    <div class="pull-right btn-group">
                        <div class="btn" onclick="reset_all()"><?php echo RESET_ALL_FILEDS; ?></div>
                        <input class="btn btn-primary" data-disable-with="Just a moment..." name="commit" type="submit" 
                               value="<?php echo CONFIRM; ?>" />                        
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <?php 
    require ('./includes/scripts.php');
    ?>

    <script src="./js/jquery.validate.js"></script>
    <script type="text/javascript">
    //validating the form
    $(document).ready(function() {
        // validate signup form on keyup and submit
        $("#prescription_form").validate({
            rules: {           
                lens_type:"required",
                O_S_SPH:"required",
                O_S_CYL:"required",
                O_S_AXIS:"required",
                O_S_ADD:"required",
                O_D_SPH:"required",
                O_D_CYL:"required",
                O_D_AXIS:"required",
                O_D_ADD:"required",
                PD:"required",
                quantity:{
                    required: true,
                    min: 1
                }
            },
            messages: {
            },

            errorPlacement: function(error, element) {
                error.insertBefore( $(element) );
            },
            errorClass: "warning",
            submitHandler: function(form) {
                form.submit();
            },
            onkeyup: false
        });
    });
    
    function reset_all(){
        $('#lens_type').prop('selectedIndex',0);
        $('#O_S_SPH').prop('selectedIndex',0);
        $('#O_S_CYL').prop('selectedIndex',0);
        $('#O_S_AXIS').prop('selectedIndex',0);
        $('#O_S_ADD').prop('selectedIndex',0);
        $('#O_D_SPH').prop('selectedIndex',0);
        $('#O_D_CYL').prop('selectedIndex',0);
        $('#O_D_AXIS').prop('selectedIndex',0);
        $('#O_D_ADD').prop('selectedIndex',0);
        $('#PD').prop('selectedIndex',0);
        document.getElementById(quantity).value=1;
    }

    </script>

    <?php
    require('./includes/footer.php');
    ?>

</body></html>
