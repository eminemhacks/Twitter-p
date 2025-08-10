<?php
// Creating an associative array
$person = [
    "name" => "John",
    "age" => 25,
    "email" => "john@example.com"
];

// Accessing values
echo $person["name"] . "<br>";  // John
echo $person["age"] . "<br>";   // 25

// Adding a new key-value pair
$person["city"] = "Lagos";

// Modifying an existing value
$person["age"] = 26;

// Looping through an associative array
foreach ($person as $key => $value) {
    echo "$key : $value<br>";
}
?>
