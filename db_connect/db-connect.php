<?php

$localhost = 'localhost';       // Correct hostname
$dbname = 'twitter_pr';           // Your database name
$username = 'testname';         // Your database username
$password = 'pass1234';         // Your database password

try {
    // Connect
    $conn = new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
}

?>