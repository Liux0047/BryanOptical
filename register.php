<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="HandheldFriendly" content="true">

<?php
    require ('./includes/language.php');
    require ('./includes/header.php');
?> 
<title><?php echo REGISTER_MEMBER; ?></title>
<link href="css/style.css" rel="stylesheet">
</head>
 
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<?php
    require ('./includes/navbar.php');
?>

<div class='container'>
    <div class ="row">
        <div class='span3' ></div>
        <div class='span6'>
            <div >
                <h3><?php echo SIGN_UP_NEW_MEMBER;?></h3>
                <p><?php echo ENJOY_MEMBERSHIP; ?></p>
            </div>
            <hr />
            <div class="prettyprint well">          
           
                <form accept-charset="UTF-8" action="./processreg.php" id="register_form" method="post" novalidate="novalidate">

                    <div class="inline"><b><?php echo GENDER; ?>: </b></div>
                    <label for="gender" class="radio inline">                        
                        <input type="radio" name="gender" value=0 checked="checked"><?php echo MALE; ?>
                    </label>
                    <label for="gender" class="radio inline">
                        <input type="radio" name="gender" value=1 ><?php echo FEMALE; ?>
                    </label>
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    <br><br>
                    
                    
                    <label for="firstname"><b><?php echo YOUR_FIRST_NAME; ?>: </b></label>
                    <input class="span4" id="firstname" name="firstname" type="text" />   
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    

                    <label for="lastname"><b><?php echo YOUR_LAST_NAME; ?>:</b></label>
                    <input class="span4" id="lastname" name="lastname" type="text" />
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    
                    <label for="email"><b><?php echo YOUR_EMAIL_ADDRESS; ?>:</b></label>
                    <input class="span4" id="email" name="email"  type="email" />  
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    
                    <label for="phone"><b><?php echo YOUR_PHONE_NUMBER; ?>:</b></label>
                    <input class="span4" id="phone" name="phone" type="text" />                    
                    
                    <label for="password"><b><?php echo PASSWORD; ?>: </b></label>
                    <input class="span4" id="password" name="password" type="password" />
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    
                    <label for="confirm_password"><b><?php echo CONFIRM_PASSWORD; ?>: </b></label>
                    <input class="span4" id="confirm_password" name="confirm_password" type="password" />  
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>

                    <br>
                    <hr>
                    
                    <label for="address"><b>Your Address:</b></label>
                    
                    <label for="address_line_1"><?php echo ADDRESS_LINE_1 ; ?>:
                        <span class='help-inline'> (<?php echo ADDRESS_LINE_1_DESCRIPTION; ?>)</span>
                    </label> 
                    <input class="span4" id="address_line_1" name="address_line_1" type="text" />
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    
                    <label for="address_line_2"> <?php echo ADDRESS_LINE_2; ?>:
                        <span class='help-inline'> (<?php echo ADDRESS_LINE_2_DESCRIPTION ?>)</span>
                    </label>
                    <input class="span4" id="address_line_2" name="address_line_2" type="text" />
                    
                    <label for="city"><?php echo CITY; ?>:</label>
                    <input class="span4" id="city" name="city" type="text" />
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    
                    <label for="state"><?php echo STATE_PROVINCE_REGION; ?>:</label>
                    <input class="span4" id="state" name="state" type="text" />
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    
                    <label for="country"><?php echo SELECT_COUNTRY; ?>:</label>
                    <select name="country" id="country" >
                        <option value="US">United States</option><option value="AF">Afghanistan</option><option value="AX">&#xC5;land Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">C&#xF4;te d&#x27;Ivoire</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="CD">Democratic Republic of the Congo</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option value="FO">Faroe Islands</option><option value="FM">Federated States of Micronesia</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option value="VA">Holy See (Vatican City State)</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="XKV">Kosovo</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="KP">North Korea</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territory</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="MK">Republic of Macedonia</option><option value="RE">R&#xE9;union</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="BL">Saint Barth&#xE9;lemy</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin (French part)</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome and Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG" selected>Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia and the South Sandwich Islands</option><option value="KR">South Korea</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="VI">U.S. Virgin Islands</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option>
                    </select>
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    
                    <label for="postal_code"><?php echo POSTAL_CODE; ?>:</label>
                    <input class="span4" id="postal_code" name="postal_code" type="text" />
                    <span class='help-inline'> (<?php echo REQUIRED; ?>)</span>
                    
                    <br>
                    
                    <div class='form-actions'>
                        <div class='alert alert-info'>
                           <?php echo BY_SIGNING_UP; ?>
                        </div>

                        <div class='row-fluid'>
                            <div class='span7'>
                                <input class="btn btn-primary btn-large" data-disable-with="Just a moment..." name="commit" type="submit" 
                                       value="<?php echo CREATE_ACCOUNT; ?>" />
                            </div>
                        </div>
                    </div>
                    <!--
                    <p class='ar'>
                        
                    <i class='icon-user'></i>
                    Already have an account?
                    <a href="https://secure.fleetio.com/login">Log in here &rarr;</a>
                    </p>
                    -->
    
                </form>
            </div>
            </div>
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
    // validate signup form on keyup and submit
    $("#register_form").validate({
        rules: {
            gender:"required",
            firstname: "required",
            lastname: "required",
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
                equalTo: "#password"
            },
            address_line_1:'required',
            city:'required',
            state:'required',
            country:'required',
            postal_code:'required'
        },
        messages: {
            gender:"*Please choose your gender",
            firstname: "*Please enter your firstname",
            lastname: "*Please enter your lastname",
            password: {
                required: "*Please provide a password",
                minlength: "*Your password must be at least 5 characters long"
            },

            confirm_password: {
                required: "*Repeat your password",
                equalTo: "*Enter the same password as above"
            },

            email: "*Please enter a valid email address",
            city:'*Please enter the city you live in',
            state:'*Please enter the state you live in',
            country:'*Please select the country you live in',
            postal_code:'*Please enter your zip code'
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

</script>
</body></html>
