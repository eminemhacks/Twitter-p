<?php
    include("../db_connect/db-connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/main.css">
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
                    <form method="post" action="" class="form">
                        <label>First Name: </label>
                        <input type="text" name="name" required placeholder="first name">
                        <br>
                        <label>Surname: </label>
                        <input type="text" name="surname" required placeholder="surname">
                        <br>
                        <label>Email: </label>
                        <input type="email" name="email" required placeholder="email">
                        <br>
                        <label>Password: </label>
                        <input type="password" name="pass" required placeholder="create a password">
                        <br>                    
                        <label>Confirm Password: </label>
                        <input type="password" name="cpass" required placeholder="confirm your password">
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