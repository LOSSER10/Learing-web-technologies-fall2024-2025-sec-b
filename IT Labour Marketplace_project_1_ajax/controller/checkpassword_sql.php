<?php
session_start();
require_once('../model/userModel.php');

if (isset($_POST['submit'])) {
    $currentPassword = trim($_POST['cu_pass']);
    $newPassword = trim($_POST['pass']);
    $retypePassword = trim($_POST['re_pass']);
    $username = $_SESSION['username']; // Assuming username is stored in the session after login

    if (empty($currentPassword) || empty($newPassword) || empty($retypePassword)) {
        echo "All fields are required.";
        exit;
    }

    if ($newPassword !== $retypePassword) {
        echo "New password and retyped password do not match.";
        exit;
    }

    // Validate current password
    $user = getUserDetails($username); // Fetch user details based on session username
    if (!$user || $user['Password'] !== $currentPassword) {
        echo "Current password is incorrect.";
        exit;
    }

    // Update the password
    $status = changepassword($username, $newPassword);
    if ($status) {
        echo "Password updated successfully!";
        header('location: ../view/login.html');
    } else {
        echo "Failed to update password. Please try again.";
    }
} else {
    echo "Form not submitted.";
}
?>
