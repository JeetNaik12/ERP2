<?php
include("../function/function.php");
require("../DB/db.php");
$response = array('success' => false);

// ddd($_POST);

$company = (isset($_POST['company']) ? $_POST['company'] : null);
$project_id = (isset($_POST['project_name']) ? $_POST['project_name'] : null);
$date = (isset($_POST['date']) ? $_POST['date'] : null);
$m_r_no = (isset($_POST['m_r_no']) ? $_POST['m_r_no'] : null);
$create_from = (isset($_POST['create_from']) ? $_POST['create_from'] : null);
$supplier = (isset($_POST['supplier']) ? $_POST['supplier'] : null);
$salesman = (isset($_POST['salesman']) ? $_POST['salesman'] : null);
$with_bill = (isset($_POST['with_bill']) ? $_POST['with_bill'] : null);
$transport_name = (isset($_POST['transport_name']) ? $_POST['transport_name'] : null);
$g_r_no = (isset($_POST['g_r_no']) ? $_POST['g_r_no'] : null);
$motor_no = (isset($_POST['motor_no']) ? $_POST['motor_no'] : null);
$station = (isset($_POST['station']) ? $_POST['station'] : null);
$remark = (isset($_POST['remark']) ? $_POST['remark'] : null);
$challan_img = (isset($_POST['challan_img']) ? $_POST['challan_img'] : null);

if(!empty($date )){
    $date = date( 'Y-m-d',strtotime( $date ) );
}

$items = (isset($_POST['item']) ? $_POST['item'] : null);
$quantity = (isset($_POST['quantity']) ? $_POST['quantity'] : null);
$units2 = (isset($_POST['units2']) ? $_POST['units2'] : null);
$qty2 = (isset($_POST['qty2']) ? $_POST['qty2'] : null);
$type = (isset($_POST['type']) ? $_POST['type'] : null);


$total_quentity = (isset($_POST['total_quentity']) ? $_POST['total_quentity'] : null); // total quentity

$qry="Insert into tbl_material_receive(cmp_id,project_id,date,m_r_no,create_from,supplier,salesman,with_bill,transport_name,g_r_no,motor_no,station,remark,challan_img) values
({$company},{$project_id},'{$date}','{$m_r_no}','{$create_from}','{$supplier}','{$salesman}','{$with_bill}','{$transport_name}','{$g_r_no}','{$motor_no}','{$station}','{$remark}','{$challan_img}')";
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
        $item_qry="Insert into tbl_material_receive_detail(m_r_id,item_id,unit_id,qnt,type,status) values({$last_id},{$item},'{$units2[$key]}',{$quantity[$key]},'{$type}',1)";
        if(!mysqli_query($con,$item_qry)){
            // ddd(mysqli_error($con));
        }
    }
}

$response['message'] = 'Added Successfully!';
$response['success'] = true;
send_json_response($response);