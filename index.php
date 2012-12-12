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
                            <div class="active item">
                                <img src="img/1.jpg">
                                <div class="carousel-caption">
                                  <h4>First Thumbnail label</h4>
                                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/2.jpg">
                                <div class="carousel-caption">
                                  <h4>First Thumbnail label</h4>
                                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/3.jpg">
                                <div class="carousel-caption">
                                  <h4>First Thumbnail label</h4>
                                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                  <!-- Carousel nav -->

                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>

                <div class="featured">
                    <h2><?php echo FEATURED_PRODUCT; ?></h2>
                    <hr>

                    <?php
                        require ('./db-conn.php');
                        $query_featured = "select * from product where featured = 1";
                        $result_featured = $db->query($query_featured);
                        display_glasses($result_featured);
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
    </script>

    <?php
    require('./includes/footer.php');
    ?>

</body></html>