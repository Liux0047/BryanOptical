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
        
        $filter_values = array();
        //get the filter variable
        foreach ($filter_names as $filter_name){
            if (isset($_GET[$filter_name])){
                $filter_values[$filter_name] = $_GET[$filter_name];
            }
            else{
                $filter_values[$filter_name] = null;
            }
        }
        
        if (isset ($_GET['sort_order'])){
            $sort_order = $_GET['sort_order'];
        }
        else{
            $sort_order = 0;
        }    

     ?>

    <div class="container">
        <div class="row">            
            <form accept-charset="UTF-8" action="./glass-gallery.php" id="glass_gallery_form" method="get" novalidate="novalidate">
                <!-- left filter area -->
                <div class="span2" >                
                    <div class="accordion" id="accordion2">  
                        <h5><?php echo REFINE_YOUR_SEARCH; ?></h5>
                        
                        <?php 
                        //display the filters
                        $filter_counter = 0;
                        //display the filter header
                        foreach($filter_names as $filter_name){
                            echo "<div class='accordion-group'>";
                            echo "<div class='accordion-heading'>";
                            echo "<a class='accordion-toggle' data-toggle='collapse'href='#collapse_".$filter_counter."'>";
                            echo $filter_names_display[$filter_name];       
                            echo "</a></div>";
                            
                            //display the filter options
                            echo "<div id='collapse_".$filter_counter."' class='accordion-body collapse out'>";
                            echo "<div class='accordion-inner'>";
                            $sql = "select * from glass_".$filter_name;
                            $results = $db->query($sql);
                            $num_results = $results->num_rows;
                            //create checkboxes to submit
                            for ($i=0; $i <$num_results; $i++) {
                                $row = $results->fetch_assoc();
                                echo "<label class='checkbox'>";
                                echo "<input type='checkbox' name='".$filter_name."[]' value='".$row[$filter_name.'_id']."'";
                                //if this option has been selected                                
                                if ($filter_values[$filter_name]){
                                    if ( in_array($row[$filter_name.'_id'], $filter_values[$filter_name]) ){
                                        echo " checked=true";
                                    }
                                }   
                                echo "> ".$row[$filter_name.'_name_'.$language];                                
                                echo "</label>";
                            }
                            echo "</div></div></div>";
                            $filter_counter++;
                        }
                                                       
                        ?>                       
                                               
                    </div>
                    
                    <input class="btn btn-primary" data-disable-with="Just a moment..." name="commit" type="submit" 
                           value="<?php echo UPDATE_RESULT; ?>" />
               
                </div>            
            
                <div class="span10">              
                    <img src="./img/banner-glass-gallery.jpg" width="1000px" height="15px" >
                    <?php
                    //section for the filtered result
                    $sql_filtered = render_filtered_sql($filter_names, $filter_values, $sort_order); 
                    //render the glass gallery
                    $results_filtered = $db ->query($sql_filtered);
                    $num_result_filtered = $results_filtered ->num_rows;
                    if ($num_result_filtered == 0){
                        echo "<br><h4>".NO_RESULT."</h4>";
                    }
                    else{
                        //render pagination
                        require ('./includes/pagination-display.php');
                        //display glasses
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
            document.getElementById("glass_gallery_form").submit();
        }

    </script>

    <?php
    require('./includes/footer.php');
    ?>
    

</body></html>