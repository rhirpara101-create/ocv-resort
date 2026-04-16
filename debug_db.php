<?php
// Database Debug Script for InfinityFree
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>InfinityFree Database Debug</h2>";

// Test different connection methods
$hosts = [
    "sql100.infinityfree.com",
    "localhost", // Some hosts use localhost
    "127.0.0.1"
];

$user = "if0_41675318";
$pass = "Hyzb2lydGJQIA";
$db   = "if0_41675318_ocv_resort";

foreach ($hosts as $host) {
    echo "<h3>Testing host: $host</h3>";
    
    // Test 1: Basic connection
    echo "<p>Testing basic connection...</p>";
    $conn = @mysqli_connect($host, $user, $pass);
    
    if ($conn) {
        echo "<p style='color: green;'>Basic connection successful!</p>";
        
        // Test 2: Database selection
        echo "<p>Testing database selection...</p>";
        if (mysqli_select_db($conn, $db)) {
            echo "<p style='color: green;'>Database '$db' selected!</p>";
            
            // Test 3: Simple query
            echo "<p>Testing simple query...</p>";
            $result = mysqli_query($conn, "SELECT 1");
            if ($result) {
                echo "<p style='color: green;'>Query test successful!</p>";
            } else {
                echo "<p style='color: red;'>Query test failed: " . mysqli_error($conn) . "</p>";
            }
            
            // Test 4: Check tables
            echo "<p>Checking existing tables...</p>";
            $tables = mysqli_query($conn, "SHOW TABLES");
            if ($tables) {
                echo "<p style='color: green;'>Tables found:</p>";
                echo "<ul>";
                while ($table = mysqli_fetch_array($tables)) {
                    echo "<li>" . $table[0] . "</li>";
                }
                echo "</ul>";
            }
            
        } else {
            echo "<p style='color: red;'>Database selection failed: " . mysqli_error($conn) . "</p>";
        }
        
        mysqli_close($conn);
        
    } else {
        echo "<p style='color: red;'>Basic connection failed: " . mysqli_connect_error() . "</p>";
    }
    
    echo "<hr>";
}

// Show current PHP configuration
echo "<h3>PHP Configuration</h3>";
echo "<p><strong>MySQLi Support:</strong> " . (extension_loaded('mysqli') ? 'Yes' : 'No') . "</p>";
echo "<p><strong>PHP Version:</strong> " . PHP_VERSION . "</p>";

echo "<hr>";
echo "<p><a href='/'>Back to Home</a> | <a href='/user/login.php'>Login</a></p>";
?>
