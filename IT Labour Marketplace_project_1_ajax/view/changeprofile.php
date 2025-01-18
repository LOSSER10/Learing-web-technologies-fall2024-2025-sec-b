<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Profile Picture</title>
</head>
<body>
    <h2>Change Profile Picture</h2>
    <form method="POST" action="../controller/checkimage_sql.php" enctype="multipart/form-data">
        <div>
            <label>Current Picture:</label><br>
            <img id="currentImage" src="../uploads/default.jpg" alt="Current Profile Picture" width="150" height="150"><br><br>
        </div>
        <label for="file">Choose File:</label>
        <input type="file" name="profile_pic" id="file" required><br><br>
        <button type="submit" name="submit">Confirm</button>
    </form>
</body>
</html>
