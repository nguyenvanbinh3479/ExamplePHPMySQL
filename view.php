<?php
  session_start();
  $dbc = mysqli_connect('localhost', 'root', '', 'examplephpmysql');

  if (!$_SESSION['email']){
    header("location: admin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
  </head>
  <body>
    <h1>View All User</h1>
    <table style="text-align: center;" width="500px" border="2">
      <tr>
        <th>ST</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
        $query = "SELECT * FROM register_user";
        $result = mysqli_query($dbc, $query);
        $i = 0;
        while($row = mysqli_fetch_array($result)){
          $id = $row['user_id'];
          $name = $row['user_name'];
          $email = $row['user_email'];
          $image = $row['user_image'];
          $birthday = $row['user_birthday'];
          $i++;
      ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $name;?></td>
        <td><?php echo $email;?></td>
        <td><img src="images/<?php echo $image;?>" alt="" width="50" height="50"></td>
        <td><?php echo $birthday;?></td>
        <td><a href="edit_user.php?id=<?php echo $id;?>">Edit</a></td>
        <td><a href="view.php?id=<?php echo $id;?>">Delete</a></td>
      </tr>
      <?php
        }
      ?>
    </table>
    <center><h3>Logout <a href="logout.php">Here</a></h3></center>
    <?php
      if (isset($_GET['id'])){
        $get_id = $_GET['id'];
        $delete = "DELETE FROM register_user WHERE user_id='$get_id'";
        $run = mysqli_query($dbc, $delete);
        if ($run){
          echo "<script>alert('delete successfully!')</script>";
          echo "<script>window.open('view.php', '_self')</script>";
        } 
      }
    ?>
  </body>
</html>
