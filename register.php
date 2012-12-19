<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="HandheldFriendly" content="true">

<?php
    require ('./includes/header.php');
?> 
<title><?php echo REGISTER_MEMBER; ?></title>
<link href="css/style.css" rel="stylesheet">
</head>
 
<body>
<?php
    require ('./includes/navbar.php');
?>

<div class='container'>
    <div class ="row">
        
        <div class='span3' >
            <img src="./img/registration/side-ad.png">
        </div>
        
        <div class='span9'>
            <div >
                <h3><?php echo SIGN_UP_NEW_MEMBER;?></h3>
                <p><?php echo ENJOY_MEMBERSHIP; ?></p>
            </div>
            <hr />
            <form class="form-horizontal" accept-charset="UTF-8" action="./processreg.php" id="register_form" method="post" novalidate="novalidate">
                
                <div class="control-group">
                    <label class="control-label" for="email"><strong><?php echo YOUR_EMAIL_ADDRESS; ?>:</strong></label>
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                            <input type="email" id="email" name="email" placeholder="<?php echo EMAIL ?>" onchange="check_registered_email()">
                        </div> 
                            <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>                        
                    </div>                    
                </div>
                                    
                <div class="control-group">
                    <label class="control-label" for="password"><strong><?php echo PASSWORD; ?>: </strong></label>
                    <div class="controls">
                        <input type="password" id="pwd" name="password" placeholder="<?php echo PASSWORD; ?>">
                        <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="confirm_password"><strong><?php echo CONFIRM_PASSWORD; ?>: </strong></label>
                    <div class="controls">
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="<?php echo CONFIRM_PASSWORD; ?>">
                        <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    </div>
                </div>
                
                <button type="button" class="btn" data-toggle="collapse" data-target="#optional_fields">
                    <span class="span6">
                        <?php echo OPTIONAL_FIELDS; ?>
                    </span>
                </button>
                <br><br>
                
                <div id="optional_fields" class="collapse in">
                    
                    <div class="control-group">
                        <label class="control-label" for="gender"><strong><?php echo GENDER; ?>: </strong></label>
                        <div class="controls">
                            <select name="gender">
                                <option value='0'><?php echo MALE; ?></option>
                                <option value='1'><?php echo FEMALE; ?></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="firstname"><strong><?php echo YOUR_FIRST_NAME; ?>: </strong></label>
                        <div class="controls">
                            <input type="text" id="firstname" name="firstname" placeholder="<?php echo YOUR_FIRST_NAME; ?>">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="lastname"><strong><?php echo YOUR_LAST_NAME; ?>: </strong></label>
                        <div class="controls">
                            <input type="text" id="lastname" name="lastname" placeholder="<?php echo YOUR_LAST_NAME; ?>">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="phone"><strong><?php echo YOUR_PHONE_NUMBER; ?>: </strong></label>
                        <div class="controls">
                            <input type="text" id="phone" name="phone" placeholder="<?php echo YOUR_PHONE_NUMBER; ?>">
                        </div>
                    </div>
                    
                    <h3><?php echo YOUR_ADDRESS; ?></h3>
                    <hr>
                    <?php 
                    require ('./includes/address-form.php');
                    ?>
                                        
                </div>
                
                <div class="control-group ">
                    <div class="controls  alert alert-info span4">
                        <label class="checkbox">
                            <input type="checkbox" name="agreement" id="agreement">
                            <?php echo BY_SIGNING_UP; ?>
                        </label>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-large"><?php echo CREATE_ACCOUNT; ?></button>
                </div>
            </form>                       
        </div>
    </div>
</div>    
<?php
require('./includes/scripts.php');
require('./includes/footer.php');
?>
<script src="./js/jquery.validate.js"></script>
<script type="text/javascript">
//validating the form
$(document).ready(function() {
    //enable collapse
    $(".collapse").collapse();
    // validate signup form on keyup and submit
    $("#register_form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password:{
                required: true,
                minlength: 5,
                equalTo: "#pwd"
            }
        },
        messages: {
            password: {
                required: "*Please provide a password",
                minlength: "*Your password must be at least 5 characters long"
            },

            confirm_password: {
                required: "*Repeat your password",
                equalTo: "*Enter the same password as above"
            },
            email: "*Please enter a valid email address"
        },
        
        errorPlacement: function(error, element) {
            error.prependTo( $(element).parent() );
        },
        errorClass: "warning",
        submitHandler: function(form) {
            if (valid_email){
                form.submit();
            }
            else{
                alert('<?php echo EMAIL_ALREADY_REGISTERED ?>');
            }            
        },
        onkeyup: false
    });
});

//use boolean var to record whether input email is true. Becomes true if email is valid
var valid_email = false;

//check if this email has been registered before
function check_registered_email(){
    var email = document.getElementById("email").value;
    $.ajax({        
        type: "POST",
        url: "./includes/functions/check-registered-email.php",
        data: { email: email},
        success :(function( data ) {
            //if email clashes
            if (data != "0"){
                $("<span class='warning' id='duplicate-email-warning'>*This email has already been registered</span><br>")
                .prependTo($('#email').parent());
                valid_email = false;
            }
            else{
                //remove the warrning
                $("#duplicate-email-warning").remove();
                valid_email = true
            }
        })
    }).fail(function (){
        //if the connection to database failed
        alert("connection to database has failed");
    });
}

</script>
</body></html>
