<?php
require_once "config.php";
require_once "env.php";
require_once "time_manager.php";

global $mysqli, $_INTERNAL_DB_TABLE;
global $current_time_upper, $current_time_lower;

$request_method = $_SERVER["REQUEST_METHOD"];

if($request_method == "GET") {
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $query = "SELECT * FROM $_INTERNAL_DB_TABLE WHERE data_time < '$current_time_upper' AND data_time >= '$current_time_lower';";

    $result = mysqli_query($mysqli, $query);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);

}

else {
    header("HTTP/1.0 405 Method Not Allowed");
}
