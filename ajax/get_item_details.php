<?php
include("../function/constants.php");
include("../function/function.php");
include("../DB/db.php");
    $item_id = ( isset($_POST['item_id']) ? $_POST['item_id'] : null);
    $qry1 = "Select i.id,i.item_name,i.qnt,i.unit_id,u.unit_name from tbl_item as i inner join tbl_unit as u on i.unit_id = u.id where i.id = $item_id";
    $result = mysqli_query($con,$qry1);

    $new_array = array();
    while ($row = mysqli_fetch_array($result)) 
    { 
        $new_array[$row['id']]['item_name'] = $row['item_name'];
        $new_array[$row['id']]['unit_id'] = $row['unit_id'];
        $new_array[$row['id']]['unit_name'] = $row['unit_name'];
        $new_array[$row['id']]['qnt'] = $row['qnt'];
    }
    $new_array = array_values($new_array);
    send_json_response($new_array[0]);
?>