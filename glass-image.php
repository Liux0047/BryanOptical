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
    require ('./includes/navbar.php');        
    //get the posted product_id
    $product_id = $_REQUEST['product_id'];
    //query database for the img_path
    require ('./db-conn.php');
    $sql = "select * from product where product_id=".$product_id;
    $result = $db->query($sql);
    $num_rows = $result->num_rows;    
    ?>

    <div class="container">
        <div class="row">         
            <br>
            <div class="span10" >
                <?php
                if ($num_rows){
                    $row = $result->fetch_assoc();        
                }
                else{
                    echo "No such product exists in directory";
                    exit();
                }    
                ?>
                
                <div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tabs-1" data-toggle="tab">
                                <?php
                                echo "<img src='./img/gallery/".$row['img_path']."/small-view-1.jpg' class='glasses-small-view'>";
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="#tabs-2" data-toggle="tab">
                                <?php
                                echo "<img src='./img/gallery/".$row['img_path']."/small-view-2.jpg' class='glasses-small-view'>";
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="#tabs-3" data-toggle="tab">
                                <?php
                                echo "<img src='./img/gallery/".$row['img_path']."/small-view-3.jpg' class='glasses-small-view'>";
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="#tabs-4" data-toggle="tab">
                                <?php
                                echo "<img src='./img/gallery/".$row['img_path']."/small-view-4.jpg' class='glasses-small-view'>";
                                ?>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1">
                            <p>
                                <?php
                                echo "<img src='./img/gallery/".$row['img_path']."/large-view-1.jpg' class='glasses-large-view'>";
                                ?>
                            </p>
                        </div>
                        <div class="tab-pane" id="tabs-2">
                            <p>
                                <?php
                                echo "<img src='./img/gallery/".$row['img_path']."/large-view-2.jpg' class='glasses-large-view'>";
                                ?>
                            </p>
                        </div>
                        <div class="tab-pane" id="tabs-3">
                            <p>
                                <?php
                                echo "<img src='./img/gallery/".$row['img_path']."/large-view-3.jpg' class='glasses-large-view'>";
                                ?>
                            </p>
                        </div>
                        <div class="tab-pane" id="tabs-4">
                            <p>
                                <?php
                                echo "<img src='./img/gallery/".$row['img_path']."/large-view-4.jpg' class='glasses-large-view'>";
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="span2">
                <?php
                echo "<h4>".PRICE.": ".CURRENCY.$row['price']."</h4>";
                //echo "<h5>".OUR_RATING."</h5>";
                //echo rating_star($row['rating'])."<br>";
                echo add_to_cart_button($row['product_id']);
                ?>
            </div>
        </div>
    </div>
    
    <?php 
    require('./includes/scripts.php');
    ?>
    
    <script type="text/javascript">
        $(document).ready( function() {
            //carousel slides
            $('.carousel').carousel();
      
        });
    </script>

    <?php
    require('./includes/footer.php');
    ?>

</body></html>

