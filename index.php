<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/styles.css">
  <title>Example PHP MySQL</title>
</head>
<body>
  <?php
    $host = "localhost";
    $name = "root";
    $password = "";
    $database = "examplephpmysql";

    $dbc = mysqli_connect($host, $name, $password, $database) or die ("connect to database false");
  ?>

  <form action="index.php" method="post">
    <p>Name: <input type="text" name="name" id="name" palceholded="enter your name"></p>
    <p>Password: <input type="password" name="password" id="password" palceholded="enter your password"></p>
    <p>Email: <input type="email" name="email" id="email" palceholded="enter your email"></p>
    <input type="submit" name="submit" value="Submit">
  </form>

  <?php
    if (isset($_POST['submit'])){
      $name = $_POST['name'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      
      $query = "INSERT INTO users (name, password, email) VALUES ('$name', '$password', '$email')";
      $result = mysqli_query($dbc, $query);

      if($result){
        echo 'Add sucessfully <br/>';
      }
    }
  ?>

  <table width="500px" border="2">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
      $select = "SELECT * FROM users";
      $run = mysqli_query($dbc, $select);
      $i = 0;
      while($row = mysqli_fetch_array($run)){
        $id = $row['id'];
        $name = $row['name'];
        $password = $row['password'];
        $email = $row['email'];
        $i++;
    ?>
    <tr align="center">
      <td><?php echo $i?></td>
      <td><?php echo $name?></td>
      <td><?php echo $password?></td>
      <td><?php echo $email?></td>
      <td><a href="index.php?edit=<?php echo $id?>">Edit</a></td>
      <td><a href="index.php?delete=<?php echo $id?>">Delete</a></td>
    </tr>
    <?php
      }
    ?>
  </table>
  <?php
    if (isset($_GET['edit'])){
      include ("edit.php");
    }
  ?>
  <?php
    if (isset($_GET['delete'])){
      $delete_id = $_GET['delete'];
      $delete = "DELETE FROM users WHERE id='$delete_id'";
      $run_delete = mysqli_query($dbc, $delete);

      if ($run_delete) {
        echo "<script>alert('delete sucess')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }
    }
  ?>
</body>
</html>
