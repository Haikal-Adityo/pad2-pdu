<?php
require_once "config.php";
$request_method = $_SERVER["REQUEST_METHOD"];

if($request_method == "GET") {
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    global $mysqli;
    $query = "SELECT * FROM test_table";
    $result = mysqli_query($mysqli, $query);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);

} else {
    header("HTTP/1.0 405 Method Not Allowed");
}
