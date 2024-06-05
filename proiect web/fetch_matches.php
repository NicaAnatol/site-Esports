<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM league_data";
$result = $conn->query($sql);

$matches = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $matches[] = $row;
    }
}

echo json_encode($matches);

$conn->close();
?>
