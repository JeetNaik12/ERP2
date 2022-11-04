<?php

// include("config/connection.php");

function Insert($table_name, $data)
{
    global $mysqli;
    $fields = array_keys($data);
    $values = array_map(array($mysqli, 'real_escape_string'), array_values($data));
    $qry =  mysqli_query($mysqli, "INSERT INTO $table_name(" . implode(",", $fields) . ") VALUES('" . implode("','", $values) . "');") or die(mysqli_error($mysqli));
    if ($qry) {
        return true;
    } else {
        return false;
    }
}

function Update($table_name, $data, $where_clause = '')
{
    global $mysqli;
    $whereSQL = '';
    if (!empty($where_clause)) {
        if (substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE') {
            $whereSQL = " WHERE " . $where_clause;
        } else {
            $whereSQL = " " . trim($where_clause);
        }
    }
    $sql = "UPDATE " . $table_name . " SET ";
    $sets = array();
    foreach ($data as $column => $value) {
        $sets[] = "`" . $column . "` = '" . $value . "'";
    }
    $sql .= implode(', ', $sets);
    echo $sql .= $whereSQL;
    $qry = mysqli_query($mysqli, $sql);
    if ($qry) {
        return true;
    } else {
        return false;
    }
}

function Delete($table_name, $where_clause = '')
{
    global $mysqli;
    $whereSQL = '';
    if (!empty($where_clause)) {
        if (substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE') {
            $whereSQL = " WHERE " . $where_clause;
        } else {
            $whereSQL = " " . trim($where_clause);
        }
    }
    $qry = mysqli_query($mysqli, "DELETE  FROM " . $table_name . $whereSQL . "");
    if ($qry) {
        return true;
    } else {
        return false;
    }
}

//function to fetch company name in dropdown in add account page
function fill_account_company_select()
{
    global $mysqli;
    $output = '';
    $q="SELECT * FROM tbl_company order by id DESC";
    $r = mysqli_query($mysqli,$q);
    foreach ($r as $row){
        $output .= '<option value="'.$row['id'].'">'.$row['company_name'].'</option>';
    }
    return $output;
}

/**
 * Debug
 *
 * @param [type] $array
 * @return void
 */
function ddd($array){
    echo "<pre>";
    print_r($array);
    die;
}