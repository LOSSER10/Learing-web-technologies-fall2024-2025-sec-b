<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup with AJAX and JSON</title>
    <script>
        function validateSignupForm() {
            const username = document.forms["signupForm"]["username"].value.trim();
            const email = document.forms["signupForm"]["email"].value.trim();
            const password = document.forms["signupForm"]["password"].value;
            const cpassword = document.forms["signupForm"]["retype-password"].value;
            const number = document.forms["signupForm"]["number"].value.trim();
            const gender = document.forms["signupForm"]["g"].value;
            const dob = document.forms["signupForm"]["dob"].value;

            if (!username || !email || !password || !cpassword || !number || !gender || !dob) {
                alert("All fields are required.");
                return false;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }

            if (password !== cpassword) {
                alert("Passwords do not match.");
                return false;
            }

            if (!/^\d{11}$/.test(number)) {
                alert("Phone number must be 11 digits.");
                return false;
            }

            const dobDate = new Date(dob);
            const today = new Date();
            const age = today.getFullYear() - dobDate.getFullYear();
            const monthDifference = today.getMonth() - dobDate.getMonth();

            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dobDate.getDate())) {
                age--;
            }

            if (age < 18) {
                alert("You must be at least 18 years old to register.");
                return false;
            }

            return true;
        }

        function submitSignupForm(event) {
            event.preventDefault();
            console.log("Signup button clicked");

            if (!validateSignupForm()) return;

            const formData = new FormData(document.forms["signupForm"]);
            const data = JSON.stringify(Object.fromEntries(formData.entries())); // Convert FormData to JSON

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../controller/signup_sql.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText); // Parse JSON response
                    if (response.status === "success") {
                        alert(response.message);
                        window.location.href = "../view/login.php"; // Redirect to login page
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
    <h2>Signup</h2>
    <form name="signupForm" onsubmit="submitSignupForm(event)">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <label>Confirm Password:</label>
        <input type="password" name="retype-password" required><br><br>
        <label>Type:</label>
        <select name="looking-for" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br><br>
        <label>Phone number:</label>
        <input type="number" name="number" required><br><br>
        <label>Gender:</label>
        <input type="radio" name="g" value="Male" required>Male
        <input type="radio" name="g" value="Female" required>Female
        <input type="radio" name="g" value="Other" required>Other<br><br>
        <label>Date of Birth:</label>
        <input type="date" name="dob" required><br><br>
        <input type="submit" value="Signup">
    </form>
</body>
</html>
