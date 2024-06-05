<?php
$con = mysqli_connect("localhost", "root", "", "test");

if ($con == false) {
    die("Connection Error: " . mysqli_connect_error());
}
?>