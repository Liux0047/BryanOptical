<?php
function display_glasses($results, $color_names, $material_names, $start = 0, $items = 20){
    for ($i=0; $i < $start; $i++) {
        $row = $results->fetch_assoc();
    }
    $num_results = $results->num_rows;
    if ($start + $items > $num_results){
        $end = $num_results;
    }
    else{
        $end = $start + $items;
    }    
    for ($i=$start; $i < $end ; $i++) {
        $row = $results->fetch_assoc();
        echo "<div class='span3 featured_item'>";
        echo "<img src='./img/gallery/".$row['img_path']."/small-display.jpg' class='glasses-img-small'><br>";
        echo "<h4>".$row['product_name'];
        echo " <small>|".$color_names[$row['color']]."</small>";
        echo " <small>|".$material_names[$row['material']]."</small></h4>";
        echo "<p>".PRICE.": ".CURRENCY.$row['price']."</p>";
                      
        echo add_to_cart_button($row['product_id']);        
        //Button to trigger modal
        echo "<a class='btn btn-inverse' href='#modal_id_".$row['product_id']."' role='button' data-toggle='modal'>".VIEW_INFO."</a>";        
        echo "</div>";        
        
        //Product modal
        echo "<div id='modal_id_".$row['product_id']."' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
        echo "<div class='modal-header'>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>";
        echo "<h3 id='modal_label'>".$row['product_name']."</h3>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p class='align-middle'><img src='./img/gallery/".$row['img_path']."/medium-display.jpg' class='glasses-img-medium'><br>";
        echo "<a href='glass-image.php?product_id=".$row['product_id']."'>".VIEW_IMAGE_GALLERY."</a></p>";
        echo "<h4>".PRICE.": ".CURRENCY.$row['price']."</h4>";
        echo OUR_RATING.":".rating_star($row['rating']); 
        echo "<p>".$row['description']."</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button class='btn' data-dismiss='modal' aria-hidden='true'>".CLOSE."</button>";
        echo add_to_cart_button($row['product_id']);
        echo "</div></div>";
    } 
}

function render_filtered_sql($filter_names, $filter_values, $sort_order){//get the sort_order and items per page variable
    //initial sql
    $sql_filtered = "select * from product";
    //append conditions based on post variables
    //the first is withou 'and'
    $first_condition = true;
    
    foreach ($filter_names as $filter_name){
        if (isset ($filter_values[$filter_name])){
            if ($first_condition){
                $first_condition = false;
                //the first is without 'or'
                $sql_filtered .= " where (".$filter_name."=".$filter_values[$filter_name][0];
            }
            else {
                $sql_filtered .= " and (".$filter_name."=".$filter_values[$filter_name][0];
            }

            $num_rows = count($filter_values[$filter_name]);
            for ( $i = 1; $i < $num_rows; $i++){
                $sql_filtered .= " or $filter_name=".$filter_values[$filter_name][$i]." ";                        
            }
            $sql_filtered .= ") ";
        }
    }    
    return render_sort_order($sql_filtered, $sort_order);
}

function render_search_sql($product_name, $sort_order){
    //initial sql to query the products with the name
    $sql_search = "select * from product where product_name like '%".$product_name."%'";
    return render_sort_order($sql_search, $sort_order);    
}

function render_sort_order($sql, $sort_order){
    //reflect the sort order
    switch($sort_order){
        case 0:
            $sql .=" order by items_sold desc";
            break;
        case 1:
            $sql .=" order by rating desc";
            break;
        case 2:
            $sql .=" order by price desc";
            break;
        case 3:
            $sql .=" order by price";
            break;
    }
    return $sql;    
}



function display_selected_glasses($row){    
    echo "<div class='row'><div class='span3'>";
    echo "<img src='./img/gallery/".$row['img_path']."/small-display.jpg'>";
    echo "</div>";
    echo "<div class='span9'>";
    echo "<h4>".$row['product_name']."</h4>";
    echo "<p>Price: ".$row['price']."</p>";
    echo OUR_RATING.": ";
    echo rating_star($row['rating'])."<br>";
    echo $row['description'];
    echo "</div></div>";
}

function calculate_price($cart) {
// sum total price for all items in shopping cart
    $price = 0.0;
    if(is_array($cart)) {
        foreach($cart as $item) {            
            $item_price = $item['price'];
            $quantity = $item['quantity'];
            $price += $item_price * $quantity;            
        }
    }
    return $price;
}

function calculate_items($cart) {
// sum total items in shopping cart
    $items = 0;
        if(is_array($cart)) {
            foreach($cart as $item) {
                $items += $item['quantity'];
        }
    }
    return $items;
}

function add_to_cart_button($product_id){
    //does not allow user to shop while not logged in  
    $logged = 0;
    if (isset($_SESSION['member_id'])){
        $logged = 1;
    }    
    return  "<a class='btn btn-primary' href='javascript:check_logged_in(".$logged.",".$product_id.")'>".ADD_TO_CART."</a>&nbsp";
}

function rating_star($rating){
    return " <i class='rating-star".(round($rating*2))."'></i> ".(number_format($rating,1));
}

function get_color_name_arr($db){
    $color_names = array();
    $sql = "select * from glass_color";
    $result = $db->query($sql);
    $num_rows = $result->num_rows; 
    if ($num_rows){
        for($i = 0; $i<$num_rows; $i++){
            $row = $result->fetch_assoc();
            $color_names[$row['color_id']] = $row['color_name_'.$_SESSION['language']];
        }
        return $color_names;
    }
    else{
        return 0;
    }     
}

function get_material_name_arr($db){
    $material_names = array();
    $sql = "select * from glass_material";
    $result = $db->query($sql);
    $num_rows = $result->num_rows; 
    if ($num_rows){
        for($i = 0; $i<$num_rows; $i++){
            $row = $result->fetch_assoc();
            $material_names[$row['material_id']] = $row['material_name_'.$_SESSION['language']];
        }
        return $material_names;
    }
    else{
        return 0;
    }     
}

?>
