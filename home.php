<?php
  session_start();
  $dbc = mysqli_connect('localhost', 'root', '', 'examplephpmysql');

  if (!$_SESSION['user_email']){
    header("location: login.php");
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
    <title>Home</title>
  </head>
  <body>
    <h1>THIS IS A HOME PAGE</h1>
    <center><h3>Logout <a href="logout.php">Here</a></h3></center>
  </body>
</html>
