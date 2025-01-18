<?php
function getConnection() {
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    return $conn;
}

function login($username, $password){
    $conn = getConnection();
    $sql = "SELECT * FROM registration_pro WHERE Name='{$username}' AND Password='{$password}'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result)===1;
}

function adduser($username, $email, $password, $type , $number, $gender, $dob) {
    $conn = getConnection();
$sql = "INSERT INTO registration_pro (Name, Email, Password,Type,number,gender,dob) VALUES ('{$username}', '{$email}', '{$password}', '{$type}','{$number}','{$gender}','{$dob}')";
    return mysqli_query($conn, $sql);
}

function getUserDetails($username) {
    $conn = getConnection();
    $sql = "SELECT * FROM registration_pro WHERE Name='{$username}'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);//fetch first row from result set as an associative array 
}

function updateUser($name, $email, $phone, $dob, $gender, $username) {
    $conn = getConnection();
    $sql = "UPDATE registration_pro 
            SET Name = '{$name}', Email = '{$email}', number = '{$phone}', gender = '{$gender}', dob = '{$dob}'
            WHERE Name = '{$username}'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}


function changepassword($username, $newPassword) {
    $conn = getConnection();
    $sql = "UPDATE registration_pro SET Password='$newPassword' WHERE Name='$username'";
    return mysqli_query($conn, $sql);
}

function updateProfilePicture($username, $filePath) {
    $conn = getConnection();
    $sql = "UPDATE registration_pro SET profile_picture = '{$filePath}' WHERE Name = '{$username}'";
    return mysqli_query($conn, $sql);
}

function getUserByEmail($email) {
    $conn = getConnection();
    $sql = "SELECT * FROM registration_pro WHERE Email = '{$email}'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return mysqli_fetch_assoc($result); // Return the first matching user
    } else {
        return false; // No matching user found
    }
}

function paymentdetails($cardNumber, $nameOnCard,$expiryDate,$cvv, $billingAddress, $saveInfo){

 
 $conn = getConnection();

 
 $sql = "INSERT INTO payments (card_number, name_on_card, expiry_date, cvv, billing_address, save_info) 
         VALUES ('$cardNumber', '$nameOnCard', '$expiryDate', '$cvv', '$billingAddress', $saveInfo)";
 return mysqli_query($conn, $sql);

}

function saveMessage($userId, $message, $attachmentPath = null) {
    $conn = getConnection();
    $sql = "INSERT INTO messages (user_id, message, attachment_path, timestamp) 
            VALUES ('$userId', '$message', '$attachmentPath', NOW())";
    return mysqli_query($conn, $sql);
}



?>
