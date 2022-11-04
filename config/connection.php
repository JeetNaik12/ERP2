<?php
error_reporting(0);
ob_start();
session_start();
header("Content-Type: text/html;charset=UTF-8");

include('config.php');

if ($_SERVER['HTTP_HOST'] == "localhost" or $_SERVER['HTTP_HOST'] == "rmghomes.in") {
    //local 
    DEFINE('DB_USER', $DB_USER);
    DEFINE('DB_PASSWORD', $DB_PASSWORD);
    DEFINE('DB_HOST', $DB_HOST); //host name depends on server
    DEFINE('DB_NAME', $DB_NAME);
} else {
    //local live 
    DEFINE('DB_USER', $DB_USER);
    DEFINE('DB_PASSWORD', $DB_PASSWORD);
    DEFINE('DB_HOST', $DB_HOST); //host name depends on server
    DEFINE('DB_NAME', $DB_NAME);
}
$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli) {
    // header("location:installation.php");
    echo "Database Connection ERROR!";
}

mysqli_query($mysqli, "SET NAMES 'utf8'");

//Settings
$setting_qry = "SELECT * FROM tbl_app_setting where id=1";
$setting_result = mysqli_query($mysqli, $setting_qry);
$settings_details = mysqli_fetch_assoc($setting_result);

if ($settings_details['theme'] == '1') {
    $theme = "false";
    $input_theme = "";
} elseif ($settings_details['theme'] == '0') {
    $theme = "true";
    $input_theme = "checked";
} else {
    $theme = "false";
    $input_theme = "";
}

if ($settings_details['sidebar_collapse'] == '1') {
    $sidebar_collapse = "full";
    $input_sc = "";
} elseif ($settings_details['sidebar_collapse'] == '0') {
    $sidebar_collapse = "mini-sidebar";
    $input_sc = "checked";
} else {
    $sidebar_collapse = "full";
    $input_sc = "";
}

if ($settings_details['sidebar_fixed'] == '1') {
    $sidebar_fixed = "true";
    $input_sf = "checked";
} elseif ($settings_details['sidebar_fixed'] == '0') {
    $sidebar_fixed = "false";
    $input_sf = "";
} else {
    $sidebar_fixed = "true";
    $input_sf = "checked";
}

if ($settings_details['header_fixed'] == '1') {
    $header_fixed = "true";
    $input_hf = "checked";
} elseif ($settings_details['header_fixed'] == '0') {
    $header_fixed = "false";
    $input_hf = "";
} else {
    $header_fixed = "true";
    $input_hf = "checked";
}

if ($settings_details['boxed_layout'] == '1') {
    $boxed_layout = "false";
    $input_bl = "";
} elseif ($settings_details['boxed_layout'] == '0') {
    $boxed_layout = "true";
    $input_bl = "checked";
} else {
    $boxed_layout = "false";
    $input_bl = "";
}

define("APP_NAME", $settings_details['name']);
define("APP_LOGO", $settings_details['logo']);
define("APP_FAVIOCN", $settings_details['favicon']);
$logo_bg_color = $settings_details['logo_background_color'];
$navbar_bg_color = $settings_details['navbar_background_color'];
$sidebar_bg_color = $settings_details['sidebar_background_color'];
// define("DASHBORD_COUNT2", $settings_details['dashbord_count2_color']);
// define("DASHBORD_COUNT1", $settings_details['dashbord_count1_color']);
