<?php

if (isset ($_GET['page_id'])){
    $page_id = $_GET['page_id'];
}
else{
    $page_id = 0;
}

if (isset ($_GET['items_per_page'])){
    $items_per_page = $_GET['items_per_page'];
}
else{
    $items_per_page = 12;
}

?>

<div class="pagination" id="pagination">
    <div class="navvbar">
        <div class="navbar-inner" >
            <?php
            echo "<strong>".$num_result_filtered." ".RESULTS."</strong>&nbsp&nbsp&nbsp&nbsp&nbsp";
            ?>
            <?php
            echo "<strong>".SORT_BY."</strong>";
            ?>
            <select id ="sort_order" name="sort_order" class="navbar-select span2" onchange="this.form.submit()">
                <option value=0 
                    <?php 
                    if ($sort_order==0){
                        echo "selected=true";
                    }
                    echo ">".BEST_SELLER; 
                    ?>
                </option>
                <option value=1
                    <?php 
                    if ($sort_order==1){
                        echo "selected=true";
                    }
                    echo ">".RATING; 
                    ?>
                </option>
                <option value=2
                    <?php 
                    if ($sort_order==2){
                        echo "selected=true";
                    }
                    echo ">".PRICE_HIGH_TO_LOW; 
                    ?>
                </option>
                <option value=3
                    <?php 
                    if ($sort_order==3){
                        echo "selected=true";
                    }
                    echo ">".PRICE_LOW_TO_HIGH; 
                    ?>
                </option>
            </select>     
            &nbsp&nbsp&nbsp&nbsp&nbsp

            <?php
            echo "<strong>".ITEMS_PER_PAGE."</strong>";
            ?>
            <select id ="items_per_page" name="items_per_page" class="navbar-select span1" onchange="this.form.submit()">
                <?php 
                //echo number of items per page
                foreach ($items_per_page_arr as $this_items_per_page){
                    echo "<option value=".$this_items_per_page;
                    if ($this_items_per_page == $items_per_page){
                        echo " selected=true";
                    }
                    echo ">".$this_items_per_page;
                    echo "</option>";
                }
                ?>                                 
            </select>

            <span class="navbar-pagination pull-right">
                <ul>
                    <?php
                    $page_id_start = ((int) ($page_id/5)) * 5;
                    $page_id_end = $page_id_start + 5;
                    //if the last page is in range
                    if ($num_result_filtered/$items_per_page < $page_id_end ){
                        $page_id_end = $num_result_filtered/$items_per_page ;
                    }
                    //if past the first page number group
                    if ($page_id_start>=5){
                        echo "<li><a href='javascript:submit_page_id(".($page_id_start-5).")'>&laquo; ".PREV." </a></li>";
                    }
                    //display the current page number
                    for ($i=$page_id_start; $i<$page_id_end; $i++){
                        echo "<li";
                        //if it's he current page
                        if ($i == $page_id){
                            echo " class='active'";
                        }
                        echo "><a href='javascript:submit_page_id(".$i.")'>".($i+1)."</a></li>";            
                    }
                    //if the last page number group has not been reached
                    if ($page_id_end < $num_result_filtered/$items_per_page){
                        echo "<li><a href='javascript:submit_page_id(".($page_id_end).")'> ".NEXT." &raquo;</a></li>";
                    }
                    ?>
                </ul>
            </span>                
            
        </div>
    </div>
</div>

<div id="display_area">
    <?php
    display_glasses($results_filtered, $page_id*$items_per_page, $items_per_page);
    ?>
</div>

