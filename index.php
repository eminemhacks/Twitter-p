<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Load functions BEFORE calling them
require_once __DIR__ . '/user_login/login-func.php';
require_once __DIR__ . '/db_connect/db-connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/main.css">
</head>
<body>

<?php
// If already logged in, show logout view
if (!empty($_SESSION['logged-in']) && !empty($_SESSION['username'])) {
    include_once __DIR__ . '/user_login/logout.php';
    exit;
}

// If form posted and login() succeeds, redirect to fresh page (clears POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (login()) {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    // If login() returned false, fall through to show the login form
}

// Show login form
include __DIR__ . '/user_login/login-form.php';
?>

</body>
</html>
