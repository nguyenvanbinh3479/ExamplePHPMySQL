<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/styles.css">
  <title>Admin</title>
</head>
<?php
  session_start();
  $dbc = mysqli_connect('localhost', 'root', '', 'examplephpmysql') or die ('connect database false');
?>
<body>
  <center>
    <form action="admin.php" method="POST">
      <table>
        <tr>
          <td colspan="8"><h2>Admin Login</h2></td>
        </tr> 
        <tr>
          <td><strong>Email: </strong></td>
          <td><input type="email" name="email" placeholder="Enter your Email"></td>
        </tr>
        <tr>
          <td><strong>Password: </strong></td>
          <td><input type="password" name="pass" placeholder="Enter your Password"></td>
        </tr> 
        <tr>
          <td><input type="submit" name="login" value="Login"></td>
        </tr>
      </table>
    </form>
  </center>
  <?php
    if (isset($_POST['login'])){
      $pass = mysqli_real_escape_string($dbc, $_POST['pass']);
      $email = mysqli_real_escape_string($dbc, $_POST['email']);

      $query = "SELECT * FROM admin WHERE email='$email' AND pass='$pass'";
      $result = mysqli_query($dbc, $query);
      $check = mysqli_num_rows($result);
      if ($check==0){
        echo "<script>alert('the password or email is not correct, please try again')</script>";
        exit();
      }else{
        $_SESSION['email'] = $email;
        echo "<script>window.open('view.php','_self')</script>";
      }
    }    
  ?>
</body>
</html>
