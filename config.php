<?php
// OCV Resort - Global Database Connection
// InfinityFree Database Configuration
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "sql100.infinityfree.com";
$user = "if0_41675318";
$pass = "Hyzb2lydGJQIA";
$db   = "if0_41675318_ocv_resort";

// Initialize connection variable
$conn = null;

// DISABLE DATABASE CONNECTION FOR NOW
// The database server is blocking connections from this IP
// This allows the site to function without database features
$conn = null;

// When you're ready to enable database, uncomment the code below:
/*
try {
    // First attempt: Connect with database name
    $conn = mysqli_connect($host, $user, $pass, $db);
    
    if (!$conn) {
        throw new Exception("Database connection failed: " . mysqli_connect_error());
    }
    
    // Test the connection
    $test_query = mysqli_query($conn, "SELECT 1");
    if (!$test_query) {
        throw new Exception("Database test query failed: " . mysqli_error($conn));
    }
    
} catch (Exception $e) {
    // Log the error but don't expose sensitive details
    error_log("Database connection error: " . $e->getMessage());
    $conn = null;
}
*/

// Function to safely execute queries
function safe_mysqli_query($conn, $query) {
    if ($conn && mysqli_ping($conn)) {
        return mysqli_query($conn, $query);
    }
    return false;
}

// Function to safely escape strings
function safe_mysqli_escape($conn, $string) {
    if ($conn && mysqli_ping($conn)) {
        return mysqli_real_escape_string($conn, $string);
    }
    return addslashes($string);
}


// Auto-initialize tables and seed data only if database is connected
if ($conn && mysqli_ping($conn)) {
    // Check if tables exist and create them if needed
    $checkTable = safe_mysqli_query($conn, "SHOW TABLES LIKE 'users'");
    if (!$checkTable || mysqli_num_rows($checkTable) == 0) {
        $sqlFile = __DIR__ . "/core/ocv_resort.sql";
        if (file_exists($sqlFile)) {
            $sqlContent = file_get_contents($sqlFile);
            // Execute multi-query (removing the CREATE/USE lines as we already did that)
            $cleanSql = preg_replace('/CREATE DATABASE.*?;/s', '', $sqlContent);
            $cleanSql = preg_replace('/USE.*?;/s', '', $cleanSql);
            
            if (mysqli_multi_query($conn, $cleanSql)) {
                // Wait for multi-query to finish
                do { 
                    if ($res = mysqli_store_result($conn)) { 
                        mysqli_free_result($res); 
                    } 
                } while (mysqli_next_result($conn));
            }
        }
    }

    // Ensure Seed Accounts exist (Double Check)
    $q_admin = safe_mysqli_query($conn, "SELECT id FROM users WHERE username='admin'");
    if (!$q_admin || mysqli_num_rows($q_admin) == 0) {
        safe_mysqli_query($conn, "INSERT INTO users (name, username, password, role, tier) VALUES 
            ('Admin Manager', 'admin', 'admin', 'admin', 'N/A'),
            ('Reception Staff', 'rec', 'rec', 'reception', 'N/A'),
            ('Eliza Vance', 'guest', 'guest', 'guest', 'Platinum Member')");
    }
}
?>

