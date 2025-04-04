<?php
// config.php

$host = 'localhost';
$dbname = 'projectUserLog';
$username = 'root';
$password = 'sopiriye2000';


// Use PDO for secure and flexible database access
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Set error mode to throw exceptions (useful for debugging)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Set default fetch mode
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Optional: Uncomment for debugging
    // echo "Database connected successfully!";
    
} catch (PDOException $e) {
    // Handle connection error
    die("Database connection failed: " . $e->getMessage());
}
?>
