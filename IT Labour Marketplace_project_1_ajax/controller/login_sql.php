<?php
header('Content-Type: application/json'); // Set response type to JSON
session_start();
require_once('../model/userModel.php');

// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);

if ($input && isset($input['username']) && isset($input['password'])) {
    $username = trim($input['username']);
    $password = trim($input['password']);

    if ($username == null || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Username and Password are required."]);
    } else {
        $_SESSION['username'] = $username;
        $status = login($username, $password);
        if ($status) {
            echo json_encode(["status" => "success", "message" => "Login successful."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid Username or Password."]);
        }
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
