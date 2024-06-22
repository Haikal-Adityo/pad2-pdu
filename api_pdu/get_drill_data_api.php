<?php
require_once "config2.php";
require_once "env.php";
require_once "time_manager.php";


error_reporting(E_ALL);
ini_set('display_errors', 1);


global $mysqli;
global $_EXTERNAL_API_HOST, $_EXTERNAL_API_PORT, $_EXTERNAL_API_EP, $_EXTERNAL_API_TABLE;
global $_INTERNAL_DB_TABLE;
global $_TABLE_COLUMNS;
global $current_date_upper, $current_date_lower;
global $current_time_upper, $current_time_lower;

$dest = "$_EXTERNAL_API_HOST:$_EXTERNAL_API_PORT/$_EXTERNAL_API_EP";

$data = [
    "current_date_upper" => $current_date_upper,
    "current_time_upper" => $current_time_upper,
    "current_date_lower" => $current_date_lower,
    "current_time_lower" => $current_time_lower
];

$jsonPackage = json_encode($data);

$ch = curl_init($dest);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPackage);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonPackage)
]);


$response = curl_exec($ch);

if($response == false) {
    $error = curl_error($ch);
    curl_close($ch);
    die("curl error: $error");
}

curl_close($ch);

$responseData = json_decode($response, true);
if($responseData == null) {
    echo "Error: Failed to decode JSON data";
} 

if(empty($responseData)) {
    echo "No data found";
}

foreach($responseData as $drill) {
    $data_date = $drill[$_TABLE_COLUMNS[1]];
    $data_time = $drill[$_TABLE_COLUMNS[2]];


    $checkQuery = "SELECT {$_TABLE_COLUMNS[1]}, {$_TABLE_COLUMNS[2]} from $_EXTERNAL_API_TABLE
    WHERE {$_TABLE_COLUMNS[1]} = '$data_date' AND {$_TABLE_COLUMNS[2]} = '$data_time';";

    $checkResult = null;
    try {
        $checkResult = $mysqli->query($checkQuery);
    } catch (mysqli_sql_exception $e) {
        echo "Error: $e <br>";
    }

    if(mysqli_num_rows($checkResult) > 0) {
        // echo "Data already exists, on date $data_date and time $data_time <br>";
        continue;
    }
    $well_sensor_id = $drill[$_TABLE_COLUMNS[0]];

    $bit_depth_m = $drill[$_TABLE_COLUMNS[3]];
    $scfm = $drill[$_TABLE_COLUMNS[4]];
    $mud_cond_in_mmho = $drill[$_TABLE_COLUMNS[5]];
    $block_pos_m = $drill[$_TABLE_COLUMNS[6]];
    $wob_klb = $drill[$_TABLE_COLUMNS[7]];
    $bvdepth_m = $drill[$_TABLE_COLUMNS[8]];
    $mud_cond_out_mmho = $drill[$_TABLE_COLUMNS[9]];
    $torque_klbft = $drill[$_TABLE_COLUMNS[10]];
    $rpm = $drill[$_TABLE_COLUMNS[11]];
    $totspm = $drill[$_TABLE_COLUMNS[12]];
    $sp_press_psi = $drill[$_TABLE_COLUMNS[13]];
    $mud_flow_in_gpm = $drill[$_TABLE_COLUMNS[14]];
    $co2_1_perct = $drill[$_TABLE_COLUMNS[15]];
    $gas_perct = $drill[$_TABLE_COLUMNS[16]];
    $mud_temp_out_c = $drill[$_TABLE_COLUMNS[17]];
    $mud_temp_in_c = $drill[$_TABLE_COLUMNS[18]];
    $tank_vol_tot_bbl = $drill[$_TABLE_COLUMNS[19]];
    $ropi_m_hr = $drill[$_TABLE_COLUMNS[20]];
    $hkld_klb = $drill[$_TABLE_COLUMNS[21]];
    $log_depth_m = $drill[$_TABLE_COLUMNS[22]];
    $h2s_1_ppm = $drill[$_TABLE_COLUMNS[23]];
    $mud_flow_outp = $drill[$_TABLE_COLUMNS[24]];

    $sql = "INSERT INTO $_INTERNAL_DB_TABLE ({$_TABLE_COLUMNS[0]}, {$_TABLE_COLUMNS[1]}, {$_TABLE_COLUMNS[2]}, {$_TABLE_COLUMNS[3]}, {$_TABLE_COLUMNS[4]}, {$_TABLE_COLUMNS[5]}, 
    {$_TABLE_COLUMNS[6]}, {$_TABLE_COLUMNS[7]}, {$_TABLE_COLUMNS[8]}, {$_TABLE_COLUMNS[9]}, {$_TABLE_COLUMNS[10]}, {$_TABLE_COLUMNS[11]},
    {$_TABLE_COLUMNS[12]}, {$_TABLE_COLUMNS[13]}, {$_TABLE_COLUMNS[14]}, {$_TABLE_COLUMNS[15]}, {$_TABLE_COLUMNS[16]}, {$_TABLE_COLUMNS[17]},
    {$_TABLE_COLUMNS[18]}, {$_TABLE_COLUMNS[19]}, {$_TABLE_COLUMNS[20]}, {$_TABLE_COLUMNS[21]}, {$_TABLE_COLUMNS[22]}, {$_TABLE_COLUMNS[23]}, {$_TABLE_COLUMNS[24]}) 
    VALUES ('$well_sensor_id', '$data_date', '$data_time', '$bit_depth_m', '$scfm', '$mud_cond_in_mmho', 
    '$block_pos_m', '$wob_klb', '$bvdepth_m', '$mud_cond_out_mmho', '$torque_klbft', '$rpm', 
    '$hkld_klb', '$log_depth_m', '$h2s_1_ppm', '$mud_flow_outp', '$totspm', '$sp_press_psi', 
    '$mud_flow_in_gpm', '$co2_1_perct', '$gas_perct', '$mud_temp_out_c', '$mud_temp_in_c', 
    '$tank_vol_tot_bbl', '$ropi_m_hr')";

    try {
        $mysqli->query($sql);
        echo "success on adding data $data_date:$data_time well_sensor_id: $well_sensor_id \n";
    } catch (mysqli_sql_exception $e) {
        echo "Error: $e <br>";
    }
}
?>