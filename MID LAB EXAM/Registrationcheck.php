<?php
// Start session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an array to store errors
    $errors = [];

    // Sanitize input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $day = trim($_POST['day']);
    $month = trim($_POST['month']);
    $year = trim($_POST['year']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $password = $_POST['pass'];
    $confirmPassword = $_POST['Cpass'];

    // Validate fields
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($day) || empty($month) || empty($year)) {
        $errors[] = "Date of birth is required.";
    } elseif (!checkdate((int)$month, (int)$day, (int)$year)) {
        $errors[] = "Invalid date of birth.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($confirmPassword)) {
        $errors[] = "Confirm Password is required.";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    // Check for errors
    if (count($errors) > 0) {
        // Store errors in session
        $_SESSION['errors'] = $errors;

        // Redirect back to the form
        header("Location: RegistrationForm.html");
        exit();
    } else {
        // If no errors, store success message in session
        $_SESSION['success'] = "Registration successful!";

        // Redirect to a success page or display success message
        header("Location: SuccessPage.php");
        exit();
    }
}
?>