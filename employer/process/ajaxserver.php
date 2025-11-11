<?php

require_once "../../classes/Employer.php";
$emp = new Employer;
$loop = $_POST;
if(empty($loop)){
    $response = [
        "success" => false,
        "message"=> "Select a valid state"
    ];
    echo json_encode($response);
    die();
}
foreach ($loop as $key => $value) {
   
    $looped = $emp->get_lga_by_state($key);
    echo json_encode($looped);
}
