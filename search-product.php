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
        require ('./db-conn.php');
        
     ?>

    <div class="container">
        <div class="row">            
            <form accept-charset="UTF-8" action="./search-product.php" id="search_product_form" method="get" novalidate="novalidate">
                <!-- left filter area -->
                <div class="span2" >    
                </div>            
            
                <div class="span10">           
                    <?php
                    if (isset($_GET['product_name']) && $_GET['product_name']){
                        $product_name = $_GET['product_name'];
                        
                        if (isset ($_GET['sort_order'])){
                            $sort_order = $_GET['sort_order'];
                        }
                        else{
                            $sort_order = 0;
                        }    

                        echo "<img src='./img/banner-glass-gallery.jpg' width='1000px' height='15px' >";

                        //section for the filtered result
                        $sql_search = render_search_sql($product_name, $sort_order);    
                        //render the glass gallery
                        $results_filtered = $db ->query($sql_search);
                        $num_result_filtered = $results_filtered ->num_rows;
                        echo "<h3>".YOU_HAVE_SEARCHED_FOR." \"".$product_name."\"</h3>";
                        if ($num_result_filtered == 0){
                            echo "<h5>".NO_SEARCH_RESULT."</h5>";
                        }
                        else{
                            //render pagination
                            require ('./includes/pagination-display.php');
                        }
                        echo "<input type='hidden' name ='product_name' value='".$product_name."'>";
                    }
                    else{
                        echo "<h3>".NO_PRODUCT_NAME_ENTERED."</h3>";                        
                    }
                    $db->close();
                    ?>
                </div>
                
            </form>            
        </div>
    </div>
    
    <?php 
    require ('./includes/scripts.php');
    ?>
    <script type="text/javascript">
        $(document).ready( function() {
            $(".collapse").collapse();
        });
            
        function submit_page_id(id){
            $('#pagination').append("<input type='hidden' name='page_id' value="+ id +">");   
            document.getElementById("search_product_form").submit();
        }

    </script>

    <?php
    require('./includes/footer.php');
    ?>
    

</body></html>