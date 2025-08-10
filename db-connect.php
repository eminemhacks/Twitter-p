<?php
$localhost = 'localhost';       // Correct hostname
$dbname = 'testname';           // Your database name
$username = 'testname';         // Your database username
$password = 'pass1234';         // Your database password

try {
    // Connect
    $conn = new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Connected successfully<br>";

    // Query
$sql = "ALTER TABLE testetable ADD email VARCHAR(255) UNIQUE NOT NULL DEFAULT ''";


    // $sql = "SHOW TABLES";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch results
    $result = $stmt->fetchAll();

    echo "<pre>";
    print_r($result);
    echo "</pre>";

} catch (PDOException $error) {
    echo "Connection/query failed: " . $error->getMessage();
}
