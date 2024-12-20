<?php
session_start();

if (isset($_POST['submit_l'])) {
    $userid = $_POST['id_l'];
    $password = $_POST['pass_l'];
  //  $storedname=$_SESSION['name_r'];

    // Read user data from file
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);

    foreach ($users as $user) {
        list($id, $stored_password, $name, $user_type) = explode('|', $user);

        // Verify credentials
        if ($userid === $id && $password === $stored_password) {
            // Save user information in session
          
           $_SESSION['name']=$name;
           $_SESSION['id']= $id;

            // Redirect based on user type
            if ($user_type === 'admin') {
                header('Location: admin_me.php');
                exit;
            } else {
                header('Location: user_me.php');
                exit;
            }
        }
    }

    // If no match, show error
    echo "Invalid username or password.";
} else {
    header('Location: login.php');
}
?>
