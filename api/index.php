<?php

echo "<h1>Project Green Label by Vlad Spreys</h1>";
echo "<h3>Currently running competitions:</h3>";
echo "<table border=1>";
echo "<tr><th>Name</th><th>Description</th></tr>";

// Create connection
$database = new Database();
$conn = $database->getConnection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, description FROM competitions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td><td>" . $row["description"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
echo "</table>";
?>
