<?php
  session_start();
  $dbc = mysqli_connect('localhost', 'root', '', 'examplephpmysql');

  if ($_SESSION['user_email']){
    header("location: home.php");
  }else{
    $_SESSION['user_email'] = "";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/styles.css">
  <title>Login</title>
</head>
<?php
  $dbc = mysqli_connect('localhost', 'root', '', 'examplephpmysql') or die ('connect database false');
?>
<body>
  <center>
    <form action="login.php" method="POST">
      <table>
        <tr>
          <td colspan="8"><h2>Login Here</h2></td>
        </tr> 
        <tr>
          <td><strong>Email: </strong></td>
          <td><input type="email" name="user_email" placeholder="Enter your Email"></td>
        </tr>
        <tr>
          <td><strong>Password: </strong></td>
          <td><input type="password" name="user_password" placeholder="Enter your Password"></td>
        </tr> 
        <tr>
          <td><input type="submit" name="login" value="Login"></td>
        </tr>
      </table>
      <center><h3>New Here? <a href="registration.php">register Here</a></h3></center>
    </form>
  </center>
  <?php
    if (isset($_POST['login'])){
      $user_password = mysqli_real_escape_string($dbc, $_POST['user_password']);
      $user_email = mysqli_real_escape_string($dbc, $_POST['user_email']);

      $query = "SELECT * FROM register_user WHERE user_email='$user_email' AND user_password='$user_password'";
      $result = mysqli_query($dbc, $query);
      $check = mysqli_num_rows($result);
      if ($check==0){
        echo "<script>alert('the password or email is not correct, please try again')</script>";
        exit();
      }else{
        $_SESSION['user_email'] = $user_email;
        echo "<script>window.open('home.php','_self')</script>";
      }
    }    
  ?>
</body>
</html>
