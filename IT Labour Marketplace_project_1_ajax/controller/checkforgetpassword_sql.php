<?php
//session_start();
// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    //  $username=$_SESSION['username'];

    if (!empty($email)) {
        require_once('../model/userModel.php');
        
        // Fetch user by email
        $user = getUserByEmail($email);

        if ($user) {
            $password = $user['Password']; // User's password

            // PHPMailer setup
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Use Gmail's SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'mdarafatalamleon10@gmail.com'; // Your Gmail address
                $mail->Password = 'ugymzjexypmwovee'; // Your Gmail password (or App Password)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Email content
                $mail->setFrom('mdarafatalamleon10@gmail.com', 'Password Recovery');
                $mail->addAddress($email); // Recipient's email
                $mail->isHTML(false); // Plain text email

                $mail->Subject = "Your Password Recovery";
                $mail->Body = "Hello " . $user['Name'] . ",\n\nYour password is: " . $password . "\n\nPlease keep your password secure.";

                // Send email
                $mail->send();
                echo "Password has been sent to your email.";
            } catch (Exception $e) {
                echo "Failed to send the email. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Email not found in our database.";
        }
    } else {
        echo "Please enter your email.";
    }
} else {
    echo "Form not submitted.";
}
?>
