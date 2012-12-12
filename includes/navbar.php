<?php
    require ('./db-conn.php');
    require ('./includes/variables.php');    
    $language = $_SESSION['lang'];   
    
?>
<div class="container"> 
    <img src="./img/main-logo.jpg" class="main-logo">   
    <div class="pull-right">
        <?php echo LANGUAGE; ?>:
        <select id ="select_lang" onchange ="window.location='index.php?lang='+ this.value">
            <option value=""><?php echo CHOOSE_LANGUAGE; ?></option>
            <option value="en">English</option>
            <option value="cn">简体中文</option>
        </select>
        <br>
        <div class="pull-right">
            <?php 
            if (isset ($_SESSION['member_id']) && isset($_SESSION['email'])){
                $member_id = $_SESSION['member_id'];
                $user_email = $_SESSION['email'];
                echo "<a href='./show-cart.php'><span class='label'><img src='./img/cart-icon.png' width='30px' height='30px' >  ";
                if ( isset($_SESSION['total_price']) && $_SESSION['total_items']){
                    echo $_SESSION['total_items']." ".ITEMS." | ".CURRENCY.number_format($_SESSION['total_price'],2)."</span></a>"; 
                    //round to 2 decimal places                    
                }
                else{
                    echo "0 ".ITEMS." | ".CURRENCY."0.00</span></a>";
                }
            }
            else{            
                echo NOT_A_MEMBER."? ";
                echo "<a href='./register.php'>";
                echo SIGN_UP;
                echo "</a> ".NOW;        
            }
            ?>
        </div>
    </div>
    
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="./index.php"><?php echo HOME_PAGE; ?></a>
                <div class="nav-collapse collapse">       
                                   
                    <?php 
                    if (isset ($_SESSION['member_id']) && isset($_SESSION['email'])){
                        echo "<ul class='nav pull-right inline'><li><a>".WELCOME.", ";
                        echo $user_email."</a></li>";
                        echo "<a class='btn btn-small' href='./logout.php'>".LOG_OUT."</a></ul>";
                    }
                    else{
                        echo "<div class='pull-right inline'>"   ;  
                        echo "<a href='#login_panel' role='button' class='btn btn-primary' data-toggle='modal'>";
                        echo SIGN_IN."</a></div>";                       
                    }
                        ?>
                    

                    <!--log in modal panel -->
                    <div id="login_panel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="login_header" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="login_header"><?php echo SIGN_IN_AS_MEMBER; ?></h3>
                        </div>                            
                        <div class="modal-body" id="login_input">                 
                            <div class="alert alert-block alert-error fade hide" id="login_fail_alert">                                
                                <h4 class="alert-heading"><?php echo SORRY_LOGIN_FAILED; ?>.</h4>
                                <p><?php echo INVALID_EMAIL_OR_PASSWORD; ?></p>
                                <p>
                                  <a class="btn btn-danger" href="#"><?php echo FORGET_PASSWORD; ?>?</a> 
                                </p>
                            </div>                            
                            <img src="./img/membership.jpg" width="200px" height="150px" >   
                            <div class="pull-right">
                                <label for="user_name_email" >   
                                    <input class="span3" id="user_name_email" name="user_name_email" type="text" placeholder="<?php echo EMAIL_ADDRESS; ?>"/>
                                </label>                                
                                <label for="password">           
                                    <input class="span3" id="password" name="password" type="password" placeholder="<?php echo PASSWORD; ?>"/>
                                </label>   
                                (<?php echo OR_; ?>
                                <a href="./register.php">
                                    <?php echo CREATE_AN_ACCOUNT; ?>)
                                </a>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo CLOSE; ?></button>
                        <button class="btn btn-primary inline" onclick="auth_login()">
                            <?php echo SIGN_IN; ?>
                        </button>
                        </div>
                    </div>

                    <ul class="nav">                            
                        
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php echo SHOP_GLASSES; ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" id="glasses_menu">
                            <?php 
                            //get the filter list
                            foreach ($filter_names as $filter_name){
                                echo "<li class='dropdown-submenu'>";
                                echo "<a tabindex='-1' href='#'>By ";
                                echo $filter_names_display[$filter_name];
                                echo "</a>";
                                echo "<ul class='dropdown-menu'>";

                                //query database for the options
                                $sql = "select * from glass_".$filter_name;
                                $result = $db->query($sql);
                                $num_result = $result->num_rows;
                                for ($i=0; $i <$num_result; $i++) {
                                    $row = $result->fetch_assoc();
                                    echo "<li><a href='./glass-gallery.php?".$filter_name."[]=".$row[$filter_name.'_id']."'>";
                                    echo $row[$filter_name.'_name_'.$language];
                                    echo "</a></li>";
                                }
                                echo "</ul></li>";
                            }
                            ?>

                            <li class="divider"></li>
                            <li><a  href="./glass-gallery.php"><?php echo VIEW_ALL; ?></a></li>
                        </ul>
                        </li>

                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo PROMOTION; ?>
                        <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" id="events">
                            <?php
                                for ($i=0; $i <$num_results_event; $i++) {
                                    $row = $result_event->fetch_assoc();
                                    echo "<li><a href='./eventregistration.php?eventID=".$row['eventID']."'>".$row['title']."</a></li>";
                                }
                            ?>
                            <li class="divider"></li>
                            <li><a  href="#">Separated link</a></li>
                        </ul>
                        </li>

                        <li><a href="./about.php"><?php echo ABOUT; ?></a></li>
                        <li><a href="./contact.php"><?php echo CONTACT; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

      

<?php
    $db->close();
?>
<script type="text/javascript">
    $(document).ready(function () {  
        $('#select_lang').change(function () {
            window.location.href = "./index.php?lang="+ $(this).val();
        });
    });  
    
    function select_lang(value){
        window.location.href = "http://localhost/bryanoptical/index.php?lang="+value;
    }
    
    function auth_login(){
        var email = document.getElementById("user_name_email").value;
        var password = document.getElementById("password").value;
        $.ajax({
            type: "POST",
            url: "./includes/functions/auth-login.php",
            data: { email: email, password: password },
            success :(function( data ) {
                //if successfully logged in
                if (data == 1){
                    window.location.href = "http://localhost/bryanoptical/glass-gallery.php";
                }
                else{
                    $("#login_fail_alert").removeClass('hide').addClass('in');
                }
            })
        }).fail(function (){
            //if the connection to database failed
            alert("connection to database has failed");
        });
    }
</script>
