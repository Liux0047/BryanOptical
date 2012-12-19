<table class='cart-table table-hover'>
    <thead>
        <tr class="alert alert-info">
            <th ><span class="span2"><h4><?php echo CART_ITEM ?></h4></span></th>
            <th ><span class="span2"><h4><?php echo QUANTITY ?></h4></span></th>
            <th ><span class="span2"><h4><?php echo ITEM_PRICE ?></h4></span></th>
            <th ><span class="span2"><h4><?php echo ITEM_TOTAL ?></h4></span></th>
        </tr>
    </thead>

    <tbody>
        <?php
        $cart = $_SESSION['cart'];
        //get the picture
        //query db to get the price
        require ('./db-conn.php');    
        if(is_array($cart)) {
            foreach($cart as $product_id => $item){
                $sql = "select * from product where product_id = ".$product_id;
                $result = $db->query($sql);
                $row = $result->fetch_assoc();          

                echo "<tr>";
                echo "<td><h4>".$item['product_name']."</h4></td>";
                echo "<td><h4>".$item['quantity']."</h4></td>";
                echo "<td><h4>".CURRENCY.number_format($item['price'],2)."</h4></td>";            
                echo "<td><h4>".CURRENCY.number_format($item['price']*$item['quantity'],2)."</h4></td>";            
                echo "</tr>";
                
                echo "<tr><td colspan='4'><table class='item-table'>";

                echo "<tr>";
                echo "<td rowspan='5'><span class='span3'><img src='./img/gallery/".$row['img_path']."/small-display.jpg' class='glasses-img-small'>";
                echo "<br><strong>".LENS_TYPE."</strong>: ".$item['lens_type']."</span></td>";
                echo "<td><span class='span1'></span></td>";
                echo "<td rowspan='5'>";                
                echo "<table class='prescription-info-table'>";           
                
                echo "<thead><tr>";
                echo "<th colspan='2'><h4>".PRESCRIPTION_INFO."</h4></th>";
                echo "</tr></thead>";

                echo "<tbody><tr>";
                echo "<td><span class='span1'></span></td>";
                echo "<td><strong><span class='span1'>".SPH."</span></strong></td>";
                echo "<td><strong><span class='span1'>".CYL."</span></strong></td>";
                echo "<td><strong><span class='span1'>".AXIS."</span></strong></td>";
                echo "<td><strong><span class='span1'>".ADD."</span></strong></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><strong>".O_S_LFET."</strong></td>";
                echo "<td>".number_format($item['O_S_SPH'],2)."</td>";
                echo "<td>".number_format($item['O_S_CYL'],2)."</td>";
                echo "<td>".number_format($item['O_S_AXIS'],2)."</td>";
                echo "<td>".number_format($item['O_S_ADD'],2)."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><strong>".O_D_RIGHT."</strong></td>";
                echo "<td>".number_format($item['O_D_SPH'],2)."</td>";
                echo "<td>".number_format($item['O_D_CYL'],2)."</td>";
                echo "<td>".number_format($item['O_D_AXIS'],2)."</td>";
                echo "<td>".number_format($item['O_D_ADD'],2)."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td><strong><span class='span1'>".PD."</span></strong></td>";
                echo "<td><span class='span1'>".number_format($item['PD'],2)."</span></td>";
                echo "</tr>";

                echo "</tbody></table></td></tr>";                
                echo "</table></td></tr>";
                
                //modify and delete button
                echo "<tr><td colspan='4'>";
                echo "<div class='btn-group pull-right'>";
                echo "<a href='./prescription.php?product_id=".$product_id."' class='btn btn-primary'>";
                echo "<i class='icon-pencil icon-white'></i> ";
                echo EDIT_THIS_ORDER."</a>";
                echo "<button onclick='delete_item(".$product_id.")' class='btn'>";
                echo "<i class='icon-trash'></i> ";
                echo REMOVE."</button>";
                echo "</div>";
                echo "</td></tr>";
                
                //start a new line
                echo "<tr><td colspan='4'><hr></td></tr>";
            }
        }
        ?>
        <tr>
            <td colspan="4">
                <span class="pull-right">
                    <h4>
                        <?php echo SHOPPING_CART_TOTAL.": ";?>
                        <?php echo CURRENCY." ".number_format($_SESSION['total_price'],2); ?>
                    </h4>
                </span>                
            </td>
        </tr>
    </tbody>
</table>



