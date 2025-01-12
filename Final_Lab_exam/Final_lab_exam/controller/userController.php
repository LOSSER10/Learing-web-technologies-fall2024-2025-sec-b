<?php
require_once '../model/database.php';

$action = $_POST['action'];

$db = new Database();

if ($action === 'signup') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (!$username || !$password) {
        echo "All fields are required!";
        exit;
    }

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = $db->query($sql);

    echo $result ? "Signup successful!" : "Error during signup!";
} elseif ($action === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo "Login successful!";
        } else {
            echo "Invalid credentials!";
        }
    } else {
        echo "User not found!";
    }
}

$db->close();
?>
