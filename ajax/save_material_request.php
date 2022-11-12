<?php
include("../function/function.php");
require("DB/db.php");
// ddd($_POST);
// global $mysqli;
// $res = $_POST['data'];
// print_r($res);
// exit();
// $qry="Select * from tbl_item";
$qry="Insert into tbl_material_request(cmp_id,project_id,date,req_type,req_code,department,req_name,status) values(1,1,'2022-12-12','argent','123','testtt','test123',1)";
$res=mysqli_query($con,$qry);
if(mysqli_query($con,$qry)){
    $last_id = mysqli_insert_id($con);
    echo $last_id;
}
if($res){

}	

$fields = array_keys($data);
$values = array_map(array($mysqli, 'real_escape_string'), array_values($data));
echo $data; 
// $qry =  mysqli_query($mysqli, "INSERT INTO tbl_material_request(" . implode(",", $fields) . ") VALUES('" . implode("','", $values) . "');") or die(mysqli_error($mysqli));
// if ($qry) {
//     return true;
// } else {
//     return false;
// }
?>

<!-- INSERT into tbl_material_request(cmp_id,project_id,date,req_type,req_code,department,req_name,status)
VALUES(1,1,"2022-11-11","abc","123","account","abc",1) -->