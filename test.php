<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

// Check if logged in
if (!empty($_SESSION['logged-in']) && !empty($_SESSION['username'])) {
    echo "Welcome back, " . htmlspecialchars($_SESSION['username']) . "!";
    echo '<br><a href="?logout=1">Logout</a>';
    
    // Handle logout
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
} else {
    // Show login form
    ?>
    <form method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="pass" required><br><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $password = $_POST['pass'] ?? '';

        if (!empty($name) && !empty($password)) {
            if (user_exists($name, $password)) {
                $_SESSION['logged-in'] = true;
                $_SESSION['username'] = $name;
                echo "Hello " . htmlspecialchars($name) . ", you have successfully logged in.<br>";
                echo '<a href="' . $_SERVER['PHP_SELF'] . '">Reload</a>';
            } else {
                echo "Who is " . htmlspecialchars($name) . "?";
            }
        } else {
            echo "Please enter both name and password.";
        }
    }
}

function user_exists($name, $password) {
    $usernames = [
        "jane" => "password", 
        "henrik" => "password", 
        "john" => "password", 
        "jack" => "password", 
        "Josh" => "password"
    ];

    return isset($usernames[$name]) && $usernames[$name] === $password;
}
?>
