<!DOCTYPE html>
<html lang="en"><head>
    <?php
        require ('./includes/header.php');       
    ?>
<link href="./css/style.css" rel="stylesheet">
<title><?php echo BRYAN_OPTICAL ?></title>
</head>
 
<body data-spy="scroll" data-target=".bs-docs-sidebar">
    <?php
    require ('./includes/navbar.php');        
    ?>

    <div class="container">
        <div class="row">            
            <div class="span2" >
                <ul class="nav nav-list">
                    <li class="nav-header"><?php echo TOP_SELL; ?></li>
                    <li><a href="#">A glass</a></li>
                    <li><a href="#">Another</a></li>

                    <li class="nav-header"><?php echo MANUFACTURER; ?></li>
                    <li><a href="#">Some one</a></li>
                    <li><a href="#">Another one</a></li>

                </ul>
            </div>

            <div class="span10">
                <div id="myCarousel" class="carousel slide">
                    <!-- Carousel items -->
                        <div class="carousel-inner">
                            <?php 
                            $index = 1;
                            foreach ($carousel_item_arr as $picture_title => $picture_desc){
                                echo "<div class='";
                                if ($index == 1){
                                    echo "active ";
                                }
                                echo "item'>";
                                echo "<img src='./img/carousel/index-carousel-".$language."-".$index.".jpg'>";
                                echo "<div class='carousel-caption'>";
                                echo "<h4>".$picture_title."</h4>";
                                echo "<p>".$picture_desc."</p>";
                                echo "</div></div>";
                                $index++;
                            }
                            ?>                            
                        </div>
                  <!-- Carousel nav -->

                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>

                <div class="featured">
                    <h2>
                        <?php echo FEATURED_PRODUCT; ?>
                        <small><?php echo FEATURED_PRODUCT_DESC; ?> </small>
                    </h2>
                    <hr>

                    <?php
                        require ('./db-conn.php');
                        $query_featured = "select * from product where featured = 1";
                        $result_featured = $db->query($query_featured);
                        $color_names = get_color_name_arr($db);
                        $material_names = get_material_name_arr($db);
                        display_glasses($result_featured, $color_names, $material_names);
                        $db->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
    require ('./includes/scripts.php');
    ?>

    <script type="text/javascript">
        $(document).ready( function() {
            //carousel slides
            $('.carousel').carousel();
            //on change when selecting language
        });
    </script>

    <?php
    require('./includes/footer.php');
    ?>

</body></html>