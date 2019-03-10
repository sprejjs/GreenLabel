<?php
include_once 'api/objects/competition.php';
include_once 'api/config/database.php';

$database = new Database();
$db = $database->getConnection();
$competitions = new Competition($db);
$stmt = $competitions->read();
$num = $stmt->rowCount();

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
}

echo "<h1>Project Green Label by Vlad Spreys</h1>";
echo "<h3>Currently running competitions:</h3>";
echo "<table border=1>";
echo "<tr><th>Name</th><th>Description</th></tr>";

foreach ($competitions_arr as $value) {
    echo "<tr>";
    echo "<td>" . $name . "</td><td>" . $description . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
