<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];
    $result = '';

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $insert_stmt = $conn->prepare("INSERT INTO contact_us (email, name, message) VALUES (?, ?, ?)");
        $insert_stmt->bind_param("sss", $email, $name, $message);

        if ($insert_stmt->execute()) {
            $result = 'success';
        } else {
            $result = 'error';
        }

        $insert_stmt->close();
    } else {
        $result = 'invalid';
    }

    $conn->close();

    header("Location: contact_us.php?result=$result");
    exit();
}
?>