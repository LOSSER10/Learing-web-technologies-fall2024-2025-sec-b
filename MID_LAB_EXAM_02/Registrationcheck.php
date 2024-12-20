<?php
session_start();
if (isset($_POST['submit_r'])) {
    $id = trim($_POST['id_r']);
    $password = trim($_POST['pass_r']);
    $confirm_password = trim($_POST['cpass_r']);
    $name = trim($_POST['name_r']);
    $user_type = trim($_POST['user_type_r']);

    // Store name in session for later use (optional)
    $_SESSION['name_r'] = $name;

    // Validate passwords
    if ($password !== $confirm_password) {
        echo "<p style='color: red;'>Passwords do not match. Please try again.</p>";
    } else {
        // Prepare user data
        $userData = "$id|$password|$name|$user_type\n";
        $file = 'users.txt';

        // Ensure the file exists
        if (!file_exists($file)) {
            file_put_contents($file, '');
        }
      else{
        // Write data to the file
        file_put_contents($file, $userData, FILE_APPEND);

        // Redirect to login page
        echo "<p style='color: green;'>Registration successful. Go back to <a href='login_me.php'>Sign in</a></p>";
      }
    }
}
?>









