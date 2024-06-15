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
    http_response_code(200);
    exit();
}

if ($request_method == "GET") {
    if (isset($_GET['sensor_id'])) {
        $sensorId = $_GET['sensor_id'];
        $query = "SELECT * FROM $_INTERNAL_DB_TABLE WHERE sensor_id = $sensorId AND data_time < '$current_time_upper' AND data_time >= '$current_time_lower';";
        $result = mysqli_query($mysqli, $query);
        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        http_response_code(400); // Bad Request
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Missing sensor_id parameter'));
    }
} else if ($request_method == "POST") {
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data);

    if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400); // Bad Request
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Invalid JSON'));
    } else {
        if (isset($data->sensor_id)) {
            $sensorId = $data->sensor_id;
            $query = "SELECT * FROM $_INTERNAL_DB_TABLE WHERE sensor_id = $sensorId AND data_time < '$data->timeUpper' AND data_time >= '$data->timeLower';";
            $result = mysqli_query($mysqli, $query);
            $res = [];

            while ($row = mysqli_fetch_assoc($result)) {
                $res[] = $row;
            }

            header('Content-Type: application/json');
            echo json_encode($res);
        } else {
            http_response_code(400); // Bad Request
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Missing sensor_id parameter'));
        }
    }
} else {
    header("HTTP/1.0 405 Method Not Allowed");
}