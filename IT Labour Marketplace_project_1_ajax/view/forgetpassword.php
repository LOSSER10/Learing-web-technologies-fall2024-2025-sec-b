<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .forgot-password-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .forgot-password-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .forgot-password-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }
        .forgot-password-container input[type="text"],
        .forgot-password-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .forgot-password-container input[type="submit"] {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <h2>Forgot Password</h2>
        <form method="POST" action="../controller/checkforgetpassword_sql.php">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter your email" required>
            <input type="submit" name="submit" value="Get new password">
        </form>
    </div>
</body>
</html>
