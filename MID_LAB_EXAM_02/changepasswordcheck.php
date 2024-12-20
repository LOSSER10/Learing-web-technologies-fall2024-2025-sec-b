<?php
session_start();

if (isset($_POST['submit_cp'])) {
    $current_password = $_POST['old_pass_cp'];
    $new_password = $_POST['new_pass_cp'];
    $confirm_password = $_POST['retype_new_pass_cp'];

    $file = 'users.txt';
    $users = file($file, FILE_IGNORE_NEW_LINES); // Read all lines from the file
    $updated = false;

    foreach ($users as $index => $user) {
        list($stored_id, $stored_pass, $stored_name, $stored_type) = explode('|', $user);

        // Check if the current password matches
        if ( $stored_pass === $current_password) {      //$stored_id === $_SESSION['username'] &&   
            if ($new_password === $confirm_password) {
                // Update the password in the file
                $users[$index] = "$stored_id|$new_password|$stored_name|$stored_type";
                $_SESSION['password_for_cp'] = $new_password; // Update session password
                $updated = true;
                break;
            } else {
                echo "New password and confirmation do not match.";
                exit;
            }
        }
    }

    if ($updated) {
        // Save updated data back to the file
        file_put_contents($file, implode("\n", $users));
        echo "Password updated successfully! <a href='login_me.php'>Login Again</a>";
    } else {
        echo "Invalid current password.";
    }
}
?>
