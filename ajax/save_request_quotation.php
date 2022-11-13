<?php
include("../function/function.php");
require("../DB/db.php");
$response = array('success' => false);

// ddd($_POST);

$company = (isset($_POST['company']) ? $_POST['company'] : null);
$project_id = (isset($_POST['project_name']) ? $_POST['project_name'] : null);
$date = (isset($_POST['date']) ? $_POST['date'] : null);
$create_form = (isset($_POST['create_form']) ? $_POST['create_form'] : null);
$supplier_name = (isset($_POST['supplier_name']) ? $_POST['supplier_name'] : null);
$r_no = (isset($_POST['r_no']) ? $_POST['r_no'] : null);
$grand_total = (isset($_POST['total_quentity']) ? $_POST['total_quentity'] : null);
$remark = (isset($_POST['remark']) ? $_POST['remark'] : null);


//$request_code = (isset($_POST['request_code']) ? $_POST['request_code'] : null);

if(!empty($date )){
    $date = date( 'Y-m-d',strtotime( $date ) );
}

$items = (isset($_POST['item']) ? $_POST['item'] : null);
$quantity = (isset($_POST['quantity']) ? $_POST['quantity'] : null);
// $units2 = (isset($_POST['units2']) ? $_POST['units2'] : null);
$units2 = (isset($_POST['unit']) ? $_POST['unit'] : null);
$qty2 = (isset($_POST['qty2']) ? $_POST['qty2'] : null);

// print_r($units2);die;

$total_quentity = (isset($_POST['total_quentity']) ? $_POST['total_quentity'] : null); // total quentity
//Insert into tbl_request_quotation(cmp_id,project_id,date,r_no,create_form,supplier,grand_total,status) values(1,1,'2022-11-14','63707c8269a64','test',1,'6',1)
$qry="Insert into tbl_request_quotation(cmp_id,project_id,date,r_no,create_form,supplier,grand_total,status,remark) values({$company},{$project_id},'{$date}','{$r_no}','{$create_form}',{$supplier_name},'{$grand_total}',1,'{$remark}')";
// print_r($qry);die;
$last_id = null;
if(mysqli_query($con,$qry)){
    $last_id = mysqli_insert_id($con);
    // echo $last_id;
}else{
    // ddd(mysqli_error($con));
    $response['message'] = 'Something Went Wrong!';
    send_json_response($response);
}
if(!empty($items)){
    foreach($items as $key => $item){
        // echo $units2[$key];die;
        $item_qry="Insert into tbl_request_quotation_detail(req_q_id,item_id,unit_id,qnt,status) values({$last_id},{$item},'{$units2[$key]}',{$quantity[$key]},1)";
        // print_r($item_qry);die;
        if(!mysqli_query($con,$item_qry)){
            // ddd(mysqli_error($con));
        }
    }
}

$response['message'] = 'Added Successfully!';
$response['success'] = true;
send_json_response($response);