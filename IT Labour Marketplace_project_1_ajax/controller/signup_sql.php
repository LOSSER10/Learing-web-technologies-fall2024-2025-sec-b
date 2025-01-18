<?php
header('Content-Type: application/json'); // Set content type for JSON response
require_once('../model/userModel.php');

// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);

if ($input && isset($input['username']) && isset($input['password'])) {
    $username = trim($input['username']);
    $email = trim($input['email']);
    $password = trim($input['password']);
    $cpassword = trim($input['retype-password']);
    $type = $input['looking-for'];
    $number = trim($input['number']);
    $gender = trim($input['g']);
    $dob = trim($input['dob']);

    if (empty($username) || empty($password) || empty($cpassword) || empty($email) || empty($type) || empty($number) || empty($gender) || empty($dob)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
    } elseif ($password !== $cpassword) {
        echo json_encode(["status" => "error", "message" => "Passwords do not match."]);
    } else {
        $status = adduser($username, $email, $password, $type, $number, $gender, $dob);
        if ($status) {
            echo json_encode(["status" => "success", "message" => "Signup successful. You can now log in."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Signup failed. Please try again."]);
        }
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
