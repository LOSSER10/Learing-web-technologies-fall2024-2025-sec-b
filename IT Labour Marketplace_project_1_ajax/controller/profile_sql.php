<?php
session_start();
require_once('../model/userModel.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('location: ../view/login.html');
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];

// Fetch user details from the database
$user = getUserDetails($username);

// Check if the user exists
if ($user) {
    $name = $user['Name'];
    $email = $user['Email'];   
    $password = $user['Password']; 
    $type = $user['Type'];     
    $number = $user['number'];
    $gender = $user['gender'];
    $dob = $user['dob'];
    $profile_picture = $user['profile_picture']; // Fetch profile picture from the database
} else {
    echo "User not found!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h2>Your Profile</h2>
    <div>
        <img src="<?php echo $profile_picture; ?>" alt="Profile Picture" width="150" height="150" style="border-radius: 50%;">
    </div>
    <br>
    <table border="1">
        <tr>
            <th>Username</th>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?php echo $password; ?></td>
        </tr>
        <tr>
            <th>Type</th>
            <td><?php echo $type; ?></td>
        </tr>
        <tr>
            <th>Number</th>
            <td><?php echo $number; ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $gender; ?></td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td><?php echo $dob; ?></td>
        </tr>
    </table>
    <br>
    <a href="../controller/home_sql.php">Back to Home</a>
</body>
</html>
