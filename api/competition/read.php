<?php

header ("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/competition.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$competitions = new Competition($db);

// query products
$stmt = $competitions->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // products array
    $competitions_arr=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $competition_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
        );

        array_push($competitions_arr, $competition_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($competitions_arr);
} else {

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}

// no products found will be here
