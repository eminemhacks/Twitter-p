<?php
require_once "db_connect/db-connect.php"; // This should contain your PDO $conn

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name            = trim($_POST["name"] ?? '');
    $surname         = trim($_POST["surname"] ?? '');
    $email           = trim($_POST["email"] ?? '');
    $password        = $_POST["password"] ?? '';
    $confirmPassword = $_POST["cpassword"] ?? '';

    if ($password === $confirmPassword) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $conn->prepare(
                "INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)"
            );

            if ($stmt->execute([$name, $surname, $email, $hashedPassword])) {
                header('Location: logintest.php');
                exit;
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "❌ Error: " . $errorInfo[2];
            }

        } catch (PDOException $e) {
            echo "❌ Database Error: " . $e->getMessage();
        } finally {
            $stmt = null; // Close the statement
        }
    } else {
        echo "❌ Passwords do not match.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/test.css">
</head>
<body>
<main class="container">
    <section class="container">
        <div class="container col-12 col-lg-8">
            <div class="card-bg-img">
                <div class="card col-12 col-lg-10">
                    <div class="container card-title">
                        <header>Register</header>
                    </div>
                    <form method="post" action="" class="form" id="gmailForm">
                        <label for="name">First Name: </label>
                        <input type="text" name="name" required placeholder="first name">
                        <br>
                        <label for="surname">Surname: </label>
                        <input type="text" name="surname" required placeholder="surname">
                        <br>
                        <label for="email">Email: </label>
                        <input type="email" name="email" required placeholder="email">
                        <br>
                        <label for="password">Password: </label>
                        <input type="password" name="password" required placeholder="create a password">
                        <br>                    
                        <label for="cpassword">Confirm Password: </label>
                        <input type="password" name="cpassword" required placeholder="confirm your password">
                        <br>    
                        <button type="submit" class="btn">Register</button>     
                    </form><br>
                    <p>Already have an Account?</p>
                    <a href="login-form.php">Log in</a>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="footer">
    <i class="fa fa-copyright" aria-hidden="true"></i> Copyright @twitter.com
</footer>

<script>
document.getElementById('gmailForm').addEventListener('submit', function(e) {
    let email = document.querySelector('[name="email"]').value.trim();
    if (!email.match(/^[a-zA-Z0-9._%+-]+@gmail\.com$/)) {
        alert("Please enter a valid Gmail address ending with @gmail.com");
        e.preventDefault();
    }
});
</script>
</body>
</html>
