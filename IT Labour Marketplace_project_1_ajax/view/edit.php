<?php

$name=$_GET['name'];
$email=$_GET['email'];
$number=$_GET['phone'];
$dob=$_GET['dob'];
$gender=$_GET['gender'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Profile</h2>
    <form method="POST" action="../controller/edit_sql.php">
        <label >Name:</label>
        <input type="text" name="name"   value="<?php echo $name; ?>" required><br><br>

        <label >Email:</label>
        <input type="email" name="email"  value="<?php echo $email; ?>" required><br><br>

        <label >Phone:</label>
        <input type="text" name="phone" value="<?php echo $number; ?>" required><br><br>

        <label >Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo $gender; ?>" required><br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br><br>

        <input type="submit" name="confirm" value="Confirm">
    </form>
</body>
</html>
