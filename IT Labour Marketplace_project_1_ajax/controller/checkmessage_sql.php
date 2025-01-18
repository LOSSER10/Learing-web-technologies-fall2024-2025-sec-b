<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../model/userModel.php');
    $message = $_POST['message'];
    $attachment = $_FILES['attachment'];

    if (!empty($message) || !empty($attachment['name'])) {
        // Save the attachment if exists
        $attachmentPath = null;
        if (!empty($attachment['name'])) {
            $uploadDir = '../uploads/';
            $attachmentPath = $uploadDir . basename($attachment['name']);
            if (!move_uploaded_file($attachment['tmp_name'], $attachmentPath)) {
                echo "Failed to upload the file.";
                exit;
            }
        }

        // Save the message in the database
        $userId = 1; // Example: Replace with session user ID
        if (saveMessage($userId, $message, $attachmentPath)) {
            echo "Message sent successfully.";
        } else {
            echo "Failed to send the message.";
        }
    } else {
        echo "Please enter a message or attach a file.";
    }
} else {
    echo "Invalid request.";
}
?>
