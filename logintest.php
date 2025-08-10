<?php
    include("db_connect/db-connect.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = trim($_POST["name"] ?? '');
        $pass = $_POST["pass"] ?? '';

        try {
            $stmt = $conn->prepare("SELECT * FROM users WHERE name = ?");
            $stmt->execute([$name]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($pass, $user["password"])) {
                // Successful login
                session_start();
                $_SESSION["user_id"] = $user["id"];
                header("Location: user_login/logout.php");
                exit;
            } else {
                echo "❌ Invalid credentials.";
            }

        } catch (PDOException $e) {
            echo "❌ Database Error: " . $e->getMessage();
        } finally {
            $stmt = null; // Close the statement
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/test.css">
</head>
<body>
    <main class="container">
        <section class="container">
        <div class="container col-12 col-lg-8">
            <div class="card-bg-img">
                <div class="card col-12 col-lg-10">
                    <div class="container card-title">
                        <header>Login</header>
                    </div>
                    <form method="post" action="" class="form">
                        <label>First Name: </label><br>
                        <input type="text" name="name" required placeholder="enter your username">
                        <br>                        
                        <label>Password: </label><br>
                        <input type="password" name="pass" required placeholder="enter your password">
                        <br>                                                                    
                        <button type="submit" class="btn">Login</button>
                    </form><br>
                    <p>Don't have an Account?</p>
                    <a href="user_login/register.php">Register</a>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="footer"><i class="fa fa-copyright" aria-hidden="true">Copyright @twitter.com </i></footer>

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