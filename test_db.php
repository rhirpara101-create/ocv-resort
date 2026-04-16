<?php
// Database Connection Test for InfinityFree
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>InfinityFree Database Connection Test</h2>";

$host = "sql100.infinityfree.com";
$user = "if0_41675318";
$pass = "Hyzb2lydGJQIA";
$db   = "if0_41675318_ocv_resort";

echo "<p><strong>Host:</strong> $host</p>";
echo "<p><strong>Database:</strong> $db</p>";

// Test connection
$conn = @mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "<p style='color: red;'><strong>Connection Failed:</strong> " . mysqli_connect_error() . "</p>";
    
    // Try connecting without database
    echo "<p>Trying to connect without database...</p>";
    $conn = @mysqli_connect($host, $user, $pass);
    if (!$conn) {
        echo "<p style='color: red;'><strong>Basic Connection Failed:</strong> " . mysqli_connect_error() . "</p>";
    } else {
        echo "<p style='color: green;'>Basic connection successful!</p>";
        
        // Try to create database
        $create_db = "CREATE DATABASE IF NOT EXISTS $db";
        if (mysqli_query($conn, $create_db)) {
            echo "<p style='color: green;'>Database created/verified!</p>";
        } else {
            echo "<p style='color: red;'>Database creation failed: " . mysqli_error($conn) . "</p>";
        }
        
        // Try to select database
        if (mysqli_select_db($conn, $db)) {
            echo "<p style='color: green;'>Database selected successfully!</p>";
            
            // Check if tables exist
            $tables = ['users', 'rooms', 'bookings', 'contact'];
            foreach ($tables as $table) {
                $check = mysqli_query($conn, "SHOW TABLES LIKE '$table'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<p style='color: green;'>Table '$table' exists!</p>";
                } else {
                    echo "<p style='color: orange;'>Table '$table' does not exist!</p>";
                }
            }
        } else {
            echo "<p style='color: red;'>Database selection failed: " . mysqli_error($conn) . "</p>";
        }
    }
} else {
    echo "<p style='color: green;'><strong>Connection Successful!</strong></p>";
    
    // Check tables
    $tables = ['users', 'rooms', 'bookings', 'contact'];
    foreach ($tables as $table) {
        $check = mysqli_query($conn, "SHOW TABLES LIKE '$table'");
        if (mysqli_num_rows($check) > 0) {
            echo "<p style='color: green;'>Table '$table' exists!</p>";
        } else {
            echo "<p style='color: orange;'>Table '$table' does not exist!</p>";
        }
    }
}

echo "<hr>";
echo "<p><a href='/'>Back to Home</a> | <a href='/user/login.php'>Login</a></p>";
?>
