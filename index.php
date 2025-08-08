<form method="" action="index.php">
    <label for="name">Name:</label><br>
    <input type="text" name="name"><br>
    <input type="submit" name="submit">
</form>

<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

$usernames = ["jane", "henrik", "john"];
$usernames[] = "josh";
$name = $_GET['name'];

foreach($usernames as $user) {
    if ($user == "henrik") {
        echo "<br>- $user (found)";
    } else {
        echo "<br>- $user (not found)";
    }
}

if($name == "john") {
    echo "Hello $name";
} else {
    echo "who is $name";
}

?>
