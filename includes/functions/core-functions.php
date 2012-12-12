<?php
function display_glasses($results, $start=0, $items=20 ){
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
        echo "<h4>".$row['product_name']."</h4>";
        echo "<p>".PRICE.": ".CURRENCY.$row['price']."</p>";
        echo "<a class='btn btn-primary' href='./prescription.php?product_id=".$row['product_id']."'>".ADD_TO_CART."</a>&nbsp";
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
        echo "<p>".$row['description']."</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>";
        echo "<a class='btn btn-primary' href='./prescription.php?product_id=".$row['product_id']."'>".ADD_TO_CART."</a>";
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
    //reflect the sort order
    switch($sort_order){
        case 0:
            $sql_filtered .=" order by items_sold desc";
            break;
        case 1:
            $sql_filtered .=" order by rating desc";
            break;
        case 2:
            $sql_filtered .=" order by price desc";
            break;
        case 3:
            $sql_filtered .=" order by price";
            break;
    }
    return $sql_filtered;    
}

function display_selected_glasses($row){    
    echo "<div class='row'><div class='span3'>";
    echo "<img src='./img/gallery/".$row['img_path']."/small-display.jpg'>";
    echo "</div>";
    echo "<div class='span9'>";
    echo "<h4>".$row['product_name']."</h4>";
    echo "<p>Price: ".$row['price']."</p>";
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


?>
