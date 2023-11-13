<?php


// Example variables
$variable1 = "Hello, World!";
$variable2 = 42;
$variable3 = array("apple", "banana", "cherry");

// Display variable values
echo "Variable 1: " . $variable1 . "<br>";
echo "Variable 2: " . $variable2 . "<br>";

// Debugging an array
echo "Variable 3 (Array): ";
print_r($variable3);
echo "<br>";

// Handling errors
$number = 10;
$divisor = 0;

if ($divisor != 0) {
    $result = $number / $divisor;
    echo "Result: " . $result;
} else {
    echo "Error: Division by zero is not allowed.";
}

// Generating a custom error
function customError($errno, $errstr) {
    echo "<b>Error:</b> [$errno] $errstr<br>";
    echo "Ending Script";
    die();
}

// Set error handler
set_error_handler("customError");

// Trigger an error
$test = 1 / 0;



?>