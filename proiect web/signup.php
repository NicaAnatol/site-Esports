<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $check_email_stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $check_email_result = $check_email_stmt->get_result();

    $check_username_stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $check_username_stmt->bind_param("s", $username);
    $check_username_stmt->execute();
    $check_username_result = $check_username_stmt->get_result();

    if ($check_email_result->num_rows > 0) {
        echo "Email already exists!";
    } elseif ($check_username_result->num_rows > 0) {
        echo "Username already exists!";
    } else {

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);


        if ($stmt->execute()) {
            $result = 'success';
        } else {
            $result = 'error';
        }


        $stmt->close();
    }

    $check_email_stmt->close();
    $check_username_stmt->close();
    $conn->close();

    header("Location: login.php?result=$result");
    exit();
}
?>
