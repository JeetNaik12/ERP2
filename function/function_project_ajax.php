<?php

include("config/connection.php");

function Project($val)
{

    global $mysqli;

    $q = mysqli_query($mysqli,"SELECT * from tbl_phase where project_id = ".$val."");
    $r = mysqli_num_rows($q);
    if($r>0){
        $output = "<div class='col-md-3 col-xs-12'><div class='form-group'><label for='phase_id'>Phase</label>";
        $output .= "<select name='phase_id' id='phase_id' onchange='Next(this.value,2);' class='form-control select2'>";
        $output .= "<option value=''>--Select Phase--</option>";
        while ($res = mysqli_fetch_array($q)) {
            $output .= "<option value='" . $res['id'] . "'>" . $res['phase_name'] . "</option>";
        }
        $output .= "</select></div></div>";
    }else{
        $q = mysqli_query($mysqli,"SELECT * from tbl_cluster where project_id = ".$val."");
        $r = mysqli_num_rows($q);
        if($r>0){
            $output = "<div class='col-md-4 col-xs-12'><div class='form-group'><label for='cluster_id'>Cluster</label><select name='cluster_id' id='cluster_id' onchange='Next(this.value,3);' class='form-control select2'>";
            $output .= "<option value=''>--Select Cluster--</option>";
            while ($res = mysqli_fetch_array($q)) {
                $output .= "<option value='" . $res['id'] . "'>" . $res['cluster_name'] . "</option>";
            }
            $output .= "</select></div></div>";
        }else{
            $q = mysqli_query($mysqli,"SELECT * from tbl_tower where project_id = ".$val."");
            $r = mysqli_num_rows($q);
            if($r>0){
                $output = "<div class='col-md-3 col-xs-12'><div class='form-group'><label for='tower_id'>Tower</label><select name='tower_id' id='tower_id' onchange='Next(this.value,4);' class='form-control select2'>";
                $output .= "<option value=''>--Select Tower--</option>";
                while ($res = mysqli_fetch_array($q)) {
                    $output .= "<option value='" . $res['id'] . "'>" . $res['building_name'] . "</option>";
                }
                $output .= "</select></div></div>";
            }else{
                // $output = "there exists no phase,cluster or tower for this project kindly update the project!";
                $output = "";
            }
        }
    }
    return $output;
}

function Phase($val)
{
    global $mysqli;

    $q = mysqli_query($mysqli,"SELECT * from tbl_cluster where phase_id = ".$val."");
    $r = mysqli_num_rows($q);
    if($r>0){
        $output = "<div class='col-md-3 col-xs-12'><div class='form-group'><label for='cluster_id'>Cluster</label><select name='cluster_id' id='cluster_id' onchange='Next(this.value,3);' class='form-control select2'>";
            $output .= "<option value=''>--Select Cluster--</option>";
            while ($res = mysqli_fetch_array($q)) {
                $output .= "<option value='" . $res['id'] . "'>" . $res['cluster_name'] . "</option>";
            }
            $output .= "</select></div></div>";
    }else{
        $q = mysqli_query($mysqli,"SELECT * from tbl_tower where phase_id = ".$val."");
        $r = mysqli_num_rows($q);
        if($r>0){
            $output = "<div class='col-md-3 col-xs-12'><div class='form-group'><label for='tower_id'>Tower</label><select name='tower_id' id='tower_id' onchange='Next(this.value,4);' class='form-control select2'>";
                $output .= "<option value=''>--Select Tower--</option>";
                while ($res = mysqli_fetch_array($q)) {
                    $output .= "<option value='" . $res['id'] . "'>" . $res['building_name'] . "</option>";
                }
                $output .= "</select></div></div>";
        }else{
            // $output = "there exists no cluster or tower for this project kindly update the project!";
            $output = "";
        }
    }
    return $output;
} 

function Cluster($val)
{
    global $mysqli;
	$output ="SELECT * from tbl_tower where cluster_id = ".$val."";
    $q = mysqli_query($mysqli,"SELECT * from tbl_tower where cluster_id = ".$val."");
    $r = mysqli_num_rows($q);
    if($r>0){
        $output = "<div class='col-md-3 col-xs-12'><div class='form-group'><label for='tower_id'>Tower</label><select name='tower_id' id='tower_id' onchange='Next(this.value,4);' class='form-control select2'>";
        $output .= "<option value=''>--Select Tower--</option>";
        while ($res = mysqli_fetch_array($q)) {
            $output .= "<option value='" . $res['id'] . "'>" . $res['building_name'] . "</option>";
        }
        $output .= "</select></div></div>";
    }else{
         $output .= "there exists no tower for this project kindly update the project!";
        //$output = "";
    }
    return $output;
}

function Tower($val)
{
    global $mysqli;

    $qry = mysqli_query($mysqli, "SELECT project_id,wing,floor FROM tbl_tower WHERE id= " . $val . " ");
    $r = mysqli_fetch_array($qry);
    $pro_id = $r['project_id'];

    if ($r['wing'] > 0) {
        $q = mysqli_query($mysqli, "select * from tbl_wing where project_id = " . $pro_id . "");

        $output = "<select name='wing_id' id='wing_id' onchange='Next4(this.value);' class='form-control select2'>";
        $output .= "<option value=''>--Select Wing--</option>";
        while ($res = mysqli_fetch_array($q)) {
            $output .= "<option value='" . $res['id'] . "'>" . $res['wing_name'] . "</option>";
        }
        $output .= "</select>";
    } else if ($r['floor'] > 0) {
        $q = mysqli_query($mysqli, "select * from tbl_floor where project_id = " . $pro_id . "");

        $output = "<select name='floor_id' id='floor_id' onchange='Next4(this.value);' class='form-control select2'>";
        $output .= "<option value=''>--Select Floor--</option>";
        while ($res = mysqli_fetch_array($q)) {
            $output .= "<option value='1/" . $res['id'] . "'>" . $res['floor_number'] . "</option>";
        }
        $output .= "</select>";
    }

    return $output;
}

function Wing($val)
{
    global $mysqli;

    $qry = mysqli_query($mysqli, "SELECT project_id,floor FROM tbl_wing WHERE id= " . $val . " ");
    $r = mysqli_fetch_array($qry);
    $pro_id = $r['project_id'];

    if ($r['floor'] > 0) {
        $q = mysqli_query($mysqli, "select * from tbl_floor where project_id = " . $pro_id . "");

        $output = "<select name='floor_id' id='floor_id' onchange='Next5(this.value);' class='form-control select2'>";
        $output .= "<option value=''>--Select Floor--</option>";
        while ($res = mysqli_fetch_array($q)) {
            $output .= "<option value='1/" . $res['id'] . "'>" . $res['floor_number'] . "</option>";
        }
        $output .= "</select>";
    }

    return $output;
}
