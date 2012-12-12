<!DOCTYPE html>
<html lang="en"><head>
    <?php
        require ('./includes/language.php');
        require ('./includes/header.php');        
    ?>
<link href="css/style.css" rel="stylesheet">
<title><?php echo BRYAN_OPTICAL ?></title>
</head>
 
 <body >
     <?php
        require ('./includes/navbar.php');
        
        //get the data posted from previous page
        $gender =$_POST['gender'];
        $firstname =$_POST['firstname'];
        $lastname =$_POST['lastname'];
        $email =$_POST['email'];
        $phone =$_POST['phone'];    
        //encrypt password
        $password = $_POST['password'];
        $address_line_1 = $_POST['address_line_1'];
        $address_line_2 = $_POST['address_line_2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $postal_code = $_POST['postal_code'];
        
        if (!get_magic_quotes_gpc()){
            $gender =addslashes($gender);
            $firstname =addslashes($firstname);
            $lastname =addslashes($lastname);   
            $email =addslashes($email);
            $phone =addslashes($phone);    
            
            $address_line_1 = addslashes($address_line_1);
            $address_line_2 = addslashes($address_line_2);
            $city = addslashes($city);
            $state = addslashes($state);
            $country = addslashes($country);
            $postal_code = addslashes($postal_code);            
        }
            
        require ('./db-conn.php');
        
        $sql = "insert into member (gender, first_name, last_name, email, phone, 
            password, address_line_1, address_line_2, city, province_state, country, postal_code) 
            values(".$gender.
                ",'".$firstname.
                "','".$lastname.
                "','".$email.
                "','".$phone.
                "','".sha1($password).
                "','".$address_line_1.
                "','".$address_line_2.
                "','".$city.
                "','".$state.
                "','".$country.
                "','".$postal_code.
            "') ";
        $result = $db->query($sql);
        
     ?>

<div class="container">
        <?php
        if ($result){
            echo "<h2>Registration Successful, thank you</h2>";
        }
        else{
            echo "failed";
        }
        ?>
         <hr>
         <a class="btn btn-primary" href="./index.php">Back to Homepage</a>
</div>