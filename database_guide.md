# InfinityFree Database Setup Guide

## Current Issue
Database connection is being blocked with error: `Access denied for user 'if0_41675318'@'192.168.0.5'`

## Steps to Fix Database Connection

### 1. Check InfinityFree cPanel
Log into your InfinityFree cPanel and verify:

**Database Details:**
- Hostname: Might be different from `sql100.infinityfree.com`
- Database Name: `if0_41675318_ocv_resort`
- Username: `if0_41675318`
- Password: `Hyzb2lydGJQIA`

### 2. Remote MySQL Access
In cPanel, find "Remote MySQL" or "Remote Database Access":
1. Add the server IP `192.168.0.5` to allowed hosts
2. Or add `%` to allow all hosts (less secure)

### 3. Alternative Hostnames
Try these database hostnames in config.php:
- `localhost`
- `127.0.0.1`
- The hostname shown in your cPanel MySQL section

### 4. Recreate Database User
If permissions are corrupted:
1. Delete the database user in cPanel
2. Recreate the user with the same password
3. Reassign the user to the database

### 5. Test Connection
After making changes:
1. Uncomment the database connection code in config.php
2. Visit `debug_db.php` to test the connection
3. Check if tables exist and create them if needed

## Current Status
- Database connection: DISABLED (site works without database)
- Website functionality: Basic pages load correctly
- Login system: Shows "Database unavailable" message

## When Database is Fixed
1. Uncomment the database connection code in config.php
2. Import the SQL file via cPanel > phpMyAdmin
3. Test login functionality
4. Remove debug files (test_db.php, debug_db.php)

## Support
If issues persist, contact InfinityFree support with:
- Your account username
- The exact error message
- Database hostname you're using
