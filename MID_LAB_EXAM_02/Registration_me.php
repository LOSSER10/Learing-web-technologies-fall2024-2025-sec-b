
session_start();
<html lang="en">
<head>
    <title>Registration</title>
</head>
<body>
        <h1>Registration Page</h1>

        <form action="Registrationcheck.php" method="POST">
            <fieldset >
                <legend>Registration</legend>
                <table>
                    <tr>
                        <td>ID:</td>
                        <td><input type="number"  name="id_r" value="" /></td>
                    </tr>
                    

                    <tr>
                    <td>password:</td>
                    <td><input type="password" name="pass_r" value="" /></td>
                  </tr>

                  

                    <tr>
                    <td>Confirm password:</td>
                    <td><input type="password" name="cpass_r" value="" /></td>
                    </tr>

                   

                    <tr>
                    <td>Name :</td>
                    <td><input type="text" name="name_r" value="" placeholder="type your name" /></td>
                    </tr>

                    

                    <tr>
                        <td>User Type</td>
                        <td>
                            <input type="radio" name="user_type_r"  value="user"> User  
                            <input type="radio" name="user_type_r"  value="admin"> Admin
                           
                        </td>
                    </tr>
                     </table>
                     <input type="submit" name="submit_r" value="SignUp">
                     <a href="signin.php">Sign In</a>
        </fieldset>     
        </form> 
</body>
</html>