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
$salesman = (isset($_POST['salesman']) ? $_POST['salesman'] : null);
$terms = (isset($_POST['terms']) ? $_POST['terms'] : null);
$company_note = (isset($_POST['company_note']) ? $_POST['company_note'] : null);
$receiver_name = (isset($_POST['receiver_name']) ? $_POST['receiver_name'] : null);
$contact_no = (isset($_POST['contact_no']) ? $_POST['contact_no'] : null);
$basic_amt_tot = (isset($_POST['basic_amt_tot']) ? $_POST['basic_amt_tot'] : null);

//$request_code = (isset($_POST['request_code']) ? $_POST['request_code'] : null);

if(!empty($date )){
    $date = date( 'Y-m-d',strtotime( $date ) );
}

$items = (isset($_POST['item']) ? $_POST['item'] : null);
$quantity = (isset($_POST['quantity']) ? $_POST['quantity'] : null);
// $units2 = (isset($_POST['units2']) ? $_POST['units2'] : null);
$createform = (isset($_POST['create-form']) ? $_POST['create-form'] : null);
$supplier_name = (isset($_POST['supplier']) ? $_POST['supplier'] : null);
$r_no = (isset($_POST['r_no']) ? $_POST['r_no'] : null);

$units2 = (isset($_POST['unit']) ? $_POST['unit'] : null);
$quantity = (isset($_POST['quantity']) ? $_POST['quantity'] : null);
$rate = (isset($_POST['rate']) ? $_POST['rate'] : null);
// $per = (isset($_POST['per']) ? $_POST['per'] : null);
$per = 1;
$basic_amt = (isset($_POST['basic-amt-total']) ? $_POST['basic-amt-total'] : null);
$gst = (isset($_POST['gst']) ? $_POST['gst'] : null);
$gst_amt = (isset($_POST['gst_amt']) ? $_POST['gst_amt'] : null);
$total = (isset($_POST['total_amount']) ? $_POST['total_amount'] : null);

// print_r($units2);die;

$total_quentity = (isset($_POST['total_quentity']) ? $_POST['total_quentity'] : null); // total quentity
$qry="Insert into tbl_purchase_order_entry(cmp_id,project_id,date,p_o_no,create_from,supplier,salesman,terms,grand_total,note,company_note,receiver_name,contact_no,basic_amt_tot,status) 
values({$company},{$project_id},'{$date}','{$r_no}','{$createform}',{$supplier_name},'{$salesman}','{$terms}','{$total}','{$note}','{$company_note}','{$receiver_name}','{$contact_no}',{$basic_amt},1)";
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
        $item_qry="Insert into tbl_purchase_order_entry_detail(purchase_id,item_id,unit_id,qnt,rate,per,basic_amt,gst,gst_amt,total,status) 
        values({$last_id},{$item},'{$units2[$key]}',{$quantity[$key]},{$rate[$key]},{$per},{$basic_amt},{$gst[$key]},{$gst_amt[$key]},{$total},1)";
        // print_r($item_qry);die;
        if(!mysqli_query($con,$item_qry)){
            // ddd(mysqli_error($con));
        }
    }
}

$response['message'] = 'Added Successfully!';
$response['success'] = true;
send_json_response($response);