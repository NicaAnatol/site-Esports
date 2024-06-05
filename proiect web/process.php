<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "subscribe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['EMAIL'];
    $result = '';

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $check_stmt = $conn->prepare("SELECT * FROM subscription WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            $result = 'exists';
        } else {
            $insert_stmt = $conn->prepare("INSERT INTO subscription (email) VALUES (?)");
            $insert_stmt->bind_param("s", $email);

            if ($insert_stmt->execute()) {
                $result = 'success';
            } else {
                $result = 'error';
            }

            $insert_stmt->close();
        }

        $check_stmt->close();
    } else {
        $result = 'invalid';
    }

    $conn->close();

    exit();
}
?>