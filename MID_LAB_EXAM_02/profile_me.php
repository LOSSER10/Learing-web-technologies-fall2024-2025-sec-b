<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Welcome to Profile</h1>
    <p>
        <?php 
        session_start();

        // Check if session values exist
        if (isset($_SESSION['id_for_p']) && isset($_SESSION['name_r'])) {
            $name =$_SESSION['name'];
            $id = $_SESSION['id'];
        } else {
            echo "Error: No user data found in session. Please log in again.";
            exit; // Exit if session data is missing
        }
        ?>
    </p>
    
    <table border="1">
        <tr>
            <td colspan="2">Profile</td>
        </tr>
        <tr>
            <td>ID</td>
            <td><?php echo htmlspecialchars($id); ?></td> <!-- Secure output -->
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo htmlspecialchars($name); ?></td> <!-- Secure output -->
        </tr>
    </table>
</body>
</html>









