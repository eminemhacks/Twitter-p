<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="../assets/main.css">
</head>
<body>

<div class="logout-card">
    <?php
    if (session_status() === PHP_SESSION_NONE) session_start();
    echo "<h1>Hello " . htmlspecialchars($_SESSION['username']) . "!</h1>";
    ?>
    <form method="post" action="" class="form">
        <button name="do_logout" type="submit" class="btn">Logout</button>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['do_logout'])) {
    session_unset();
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

</body>
</html>
