<?php
include("../function/function.php");
require("../DB/db.php");
$base_path = $_SERVER['DOCUMENT_ROOT'];
$response = array('success' => false);
// ddd($_POST);
$save_path = '';
if(isset($_FILES["bill_image"]["tmp_name"]) && !empty($_FILES["bill_image"]["tmp_name"])){
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["bill_image"]["name"]);
    $save_path = "/uploads/".basename($_FILES["bill_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["bill_image"]["tmp_name"]);
    if($check !== false) {
        move_uploaded_file($_FILES["bill_image"]["tmp_name"], $target_file);
    } else {
        $response['message'] = "Please Upload Image File Only";
        send_json_response($response);
    }
}

$company = (isset($_POST['company']) ? $_POST['company'] : null);
$project_id = (isset($_POST['project_name']) ? $_POST['project_name'] : null);
$date = (isset($_POST['date']) ? $_POST['date'] : null);
$create_form = (isset($_POST['create_form']) ? $_POST['create_form'] : null);
$supplier_name = (isset($_POST['supplier']) ? $_POST['supplier'] : null);
$r_no = (isset($_POST['r_no']) ? $_POST['r_no'] : null);
$grand_total = (isset($_POST['grand_total']) ? $_POST['grand_total'] : null);
$salesman = (isset($_POST['salesman']) ? $_POST['salesman'] : null);
$terms = (isset($_POST['terms']) ? $_POST['terms'] : null);
$remark = (isset($_POST['remark']) ? $_POST['remark'] : null);
$receiver_name = (isset($_POST['receiver_name']) ? $_POST['receiver_name'] : null);
$contact_no = (isset($_POST['contact_no']) ? $_POST['contact_no'] : null);
$basic_amt_tot = (isset($_POST['basic_amt_tot']) ? $_POST['basic_amt_tot'] : null);

$bill_img = $save_path;
$total_bill_amt = (isset($_POST['amount']) ? $_POST['amount'] : null);
$other_charges = (isset($_POST['other_charges']) ? $_POST['other_charges'] : null);
$other_charges_remark = (isset($_POST['other_charges_remark']) ? $_POST['other_charges_remark'] : null);
$other_charge_total= (isset($_POST['other_charge_total']) ? $_POST['other_charge_total'] : null);
$on_value = (isset($_POST['on-value']) ? $_POST['on-value'] : null);
//$request_code = (isset($_POST['request_code']) ? $_POST['request_code'] : null);

if(!empty($date )){
    $date = date( 'Y-m-d',strtotime( $date ) );
}

$items = (isset($_POST['item']) ? $_POST['item'] : null);
$quantity = (isset($_POST['quantity']) ? $_POST['quantity'] : null);
// $units2 = (isset($_POST['units2']) ? $_POST['units2'] : null);
$units2 = (isset($_POST['unit']) ? $_POST['unit'] : null);
$qty2 = (isset($_POST['qty2']) ? $_POST['qty2'] : null);
$rate = (isset($_POST['rate']) ? $_POST['rate'] : null);
$per = (isset($_POST['per']) ? $_POST['per'] : null);
$basic_amt = (isset($_POST['basic_amt']) ? $_POST['basic_amt'] : null);
$gst = (isset($_POST['gst']) ? $_POST['gst'] : null);
$gst_amt = (isset($_POST['gst_amt']) ? $_POST['gst_amt'] : null);
$total = (isset($_POST['total']) ? $_POST['total'] : null);

// print_r($units2);die;

$total_quentity = (isset($_POST['total_quentity']) ? $_POST['total_quentity'] : null); // total quentity
$qry="Insert into tbl_purchase_bill_entry(cmp_id,project_id,date,p_o_no,create_from,supplier,salesman,terms,bill_img,other_charges_remark,on_value,other_charge_total,total_bill_amt,grand_total,remark,status) 
values({$company},{$project_id},'{$date}','{$r_no}','{$create_form}',{$supplier_name},'{$salesman}','{$terms}','{$bill_img}','{$other_charges_remark}','{$on_value}','{$other_charge_total}',{$total_bill_amt},{$grand_total},'{$remark}',1)";

$last_id = null;
if(mysqli_query($con,$qry)){
    $last_id = mysqli_insert_id($con);
    // echo $last_id;
}else{
    ddd(mysqli_error($con));
    $response['message'] = 'Something Went Wrong!';
    send_json_response($response);
}
if(!empty($items)){
    foreach($items as $key => $item){
        // echo $units2[$key];die;
        $item_qry="Insert into tbl_purchase_bill_entry_detail(purchase_bii_id,item_id,unit_id,qnt,rate,per,basic_amt,gst,gst_amt,grand_total,status) 
        values({$last_id},{$item},'{$units2[$key]}',{$quantity[$key]},{$rate[$key]},{$per[$key]},{$basic_amt[$key]},{$gst[$key]},{$gst_amt[$key]},{$total[$key]},1)";
        // print_r($item_qry);die;
        if(!mysqli_query($con,$item_qry)){
            ddd(mysqli_error($con));
        }
    }
}

$response['message'] = 'Added Successfully!';
$response['success'] = true;
send_json_response($response);