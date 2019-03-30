<?php
header ("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/competition.php';

$database = new Database();
$db = $database->getConnection();

$competitions = new Competition($db);

$stmt = $competitions->read();
$num = $stmt->rowCount();

if($num>0){
    $competitions_arr=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $competition_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
        );

        array_push($competitions_arr, $competition_item);
    }

    http_response_code(200);
    echo json_encode($competitions_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No products found.")
    );
}
