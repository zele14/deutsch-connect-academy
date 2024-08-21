<?php
session_start();

// Example of a simple login check (this should be replaced with a real authentication system)
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>
