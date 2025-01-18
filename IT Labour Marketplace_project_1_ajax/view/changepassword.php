<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="../controller/checkpassword_sql.php">
        <label>Current password:</label>
        <input type="password" name="cu_pass" required><br><br>
        <label>Password:</label>
        <input type="password" name="pass" required><br><br>
        <label>Retype-Password:</label>
        <input type="password" name="re_pass" required><br><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <br>
    <a href="../controller/home_sql.php"></a> <br>
    <a href="signup.html">Don't have an account? Signup here</a>
</body>
</html>
