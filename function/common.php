<?php
require("../DB/db.php");
function get_item(){
    $item_array = array();
    $qry="Select * from tbl_item";
    $res=mysqli_query($con,$qry);
    print_r($res);
    die;
    while($row=mysqli_fetch_array($res)){
        print_r($res);die;
    $tmp_arr = array(
                'id' => $row['id'],
                'item_name' => $row['item_name']
            );
            array_push( $item_array,  $tmp_arr);
        }
        print_r($tmp_arr);die;
        print_r($item_array);die;
        return $item_array;
}
?>