<?php
// make sure session already started in main script

function login(): bool {
    // Only handle POST attempts
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return false;
    }

    $name = trim($_POST['name'] ?? '');
    $pass = trim($_POST['pass'] ?? '');

    if ($name === '' || $pass === '') {
        // Optionally set a global / session error message here
        return false;
    }

    // Example user store (replace with DB lookup in real app)
    $users = [
        'jane'   => 'password',
        'henrik' => 'password',
        'john'   => 'password',
        'jack'   => 'password',
        'Josh'   => 'password'
    ];

    if (isset($users[$name]) && $users[$name] === $pass) {
        // Set session and return true (no output here)
        $_SESSION['logged-in'] = true;
        $_SESSION['username']  = $name;
        return true;
    } else{
        echo "Invalid login credentials ";
    }

    // invalid credentials
    return false;
}
