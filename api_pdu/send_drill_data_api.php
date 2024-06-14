<?php
require_once "config.php";
require_once "env.php";
require_once "time_manager.php";

global $mysqli, $_INTERNAL_DB_TABLE;
global $current_time_upper, $current_time_lower;

$request_method = $_SERVER["REQUEST_METHOD"];

// Set CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($request_method == "OPTIONS") {
    // Handle preflight requests
    // http_response_code(200);
    exit();
}

if ($request_method == "GET") {
    $query = "SELECT * FROM $_INTERNAL_DB_TABLE WHERE data_time < '$current_time_upper' AND data_time >= '$current_time_lower';";
    $result = mysqli_query($mysqli, $query);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);

} else if ($request_method == "POST") {
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data);

    if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400); // Bad Request
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Invalid JSON'));
    } else {
        header('Content-Type: application/json');
        $query = "SELECT * FROM $_INTERNAL_DB_TABLE WHERE data_time < '$data->timeUpper' AND data_time >= '$data->timeLower';";
        $result = mysqli_query($mysqli, $query);
        $res = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $res[] = $row;
        }

        echo json_encode($res);
    }
} else {
    header("HTTP/1.0 405 Method Not Allowed");
}
