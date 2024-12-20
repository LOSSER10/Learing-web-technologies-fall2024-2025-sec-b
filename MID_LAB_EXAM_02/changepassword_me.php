<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="changepasswordcheck.php" method="POST">
      <h1>Change Password</h1>
    
      <tr>
        <td>
        Old Password :
        <input type="password" name=old_pass_cp value=""><br>
        </td>
      </tr> 
    
      <tr>
        <td>
        New Password :
        <input type="password" name="new_pass_cp" value=""><br>
        </td>
      </tr>
      
       <td>
        <tr>
        Rematch New Password :
        <input type="password" name="retype_new_pass_cp" value=""><br>
        </tr>
       </td>
       </table>
      <input type="submit" name="submit_cp" value="Confirm">
      </form>
</body>
</html>