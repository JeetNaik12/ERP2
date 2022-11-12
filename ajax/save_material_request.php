<?php
include("../function/function.php");
require("../DB/db.php");
$response = array('success' => false);

// ddd($_POST);

$company = (isset($_POST['company']) ? $_POST['company'] : null);
$project_id = (isset($_POST['project_name']) ? $_POST['project_name'] : null);
$date = (isset($_POST['date']) ? $_POST['date'] : null);
$request_type = (isset($_POST['request_type']) ? $_POST['request_type'] : null);
$department = (isset($_POST['department']) ? $_POST['department'] : null);
$request_name = (isset($_POST['request_name']) ? $_POST['request_name'] : null);
$request_code = (isset($_POST['request_code']) ? $_POST['request_code'] : null);

if(!empty($date )){
    $date = date( 'Y-m-d',strtotime( $date ) );
}

$items = (isset($_POST['item']) ? $_POST['item'] : null);
$quantity = (isset($_POST['quantity']) ? $_POST['quantity'] : null);
$units2 = (isset($_POST['units2']) ? $_POST['units2'] : null);
$qty2 = (isset($_POST['qty2']) ? $_POST['qty2'] : null);

$total_quentity = (isset($_POST['total_quentity']) ? $_POST['total_quentity'] : null); // total quentity

$qry="Insert into tbl_material_request(cmp_id,project_id,date,req_type,req_code,department,req_name,status) values({$company},{$project_id},'{$date}','{$request_type}','{$request_code}','{$department}','{$request_name}',1)";
$last_id = null;
if(mysqli_query($con,$qry)){
    $last_id = mysqli_insert_id($con);
    echo $last_id;
}else{
    // ddd(mysqli_error($con));
    $response['message'] = 'Something Went Wrong!';
    send_json_response($response);
}
if(!empty($items)){
    foreach($items as $key => $item){
        $item_qry="Insert into tbl_material_request_detail(m_req_id,item_id,unit_id,qnt,status) values({$last_id},{$item},'{$units2[$key]}',{$quantity[$key]},1)";
        if(!mysqli_query($con,$item_qry)){
            // ddd(mysqli_error($con));
        }
    }
}

$response['message'] = 'Added Successfully!';
$response['success'] = true;
send_json_response($response);