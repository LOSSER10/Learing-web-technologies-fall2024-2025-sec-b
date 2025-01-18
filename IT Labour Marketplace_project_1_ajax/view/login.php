<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login with AJAX and JSON</title>
    <script>
        function validateAndLogin(event) {
            event.preventDefault(); // Prevent default form submission
            
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();

            if (!username || !password) {
                alert("Username and password are required.");
                return false;
            }

            if (password.length < 4) {
                alert("Password must be at least 4 characters long.");
                return false;
            }

            // Prepare data as a JSON object
            const data = JSON.stringify({ username, password });

            // Perform AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../controller/login_sql.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText); // Parse JSON response
                    if (response.status === "success") {
                        alert("Login successful!");
                        window.location.href = "../controller/home_sql.php"; // Redirect to home page
                    } else {
                        alert(response.message); // Display error message
                    }
                } else {
                    alert("An error occurred while processing your request.");
                }
            };
            xhr.send(data); // Send JSON data
        }
    </script>
</head>
<body>
    <h2>Login</h2>
    <form name="loginForm" onsubmit="validateAndLogin(event)">
        <label>Username:</label>
        <input type="text" id="username" required><br><br>
        <label>Password:</label>
        <input type="password" id="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <br>
    <a href="signup.html">Don't have an account? Signup here</a>
</body>
</html>
