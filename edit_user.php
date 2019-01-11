<?php
  // if (!$_SESSION['id']){
  //   header("location: view.php");
  // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/styles.css">
  <title>Registration</title>
</head>
<?php
  session_start();
  $dbc = mysqli_connect('localhost', 'root', '', 'examplephpmysql') or die ('connect database false');
  if (isset($_GET['id'])){
    $edit_id = $_GET['id'];
    $sel = "SELECT  * FROM register_user WHERE user_id='$edit_id'";
    $run = mysqli_query($dbc, $sel);
    
    $row = mysqli_fetch_array($run);
    $id = $row['user_id'];
    $name = $row['user_name'];
    $password = $row['user_password'];
    $email = $row['user_email'];
    $birthday = $row['user_birthday'];
    $country = $row['user_country'];
    $gender = $row['user_gender'];
    $phone = $row['user_phone'];
    $address = $row['user_address'];
    $image = $row['user_image'];
    $date = $row['register_date'];   
  }
?>
<body>
  <center>
    <form action="edit_user.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <td colspan="8"><h2>Update the user</h2></td>
        </tr>
        <tr>
          <td><strong>Name: </strong></td>
          <td><input type="text" name="user_name" value="<?php echo $name?>" required></td>
        </tr>
        <tr>
          <td><strong>Password: </strong></td>
          <td><input type="password" name="user_password" value="<?php echo $password?>" required></td>
        </tr> 
        <tr>
          <td><strong>Email: </strong></td>
          <td><input type="email" name="user_email" value="<?php echo $email?>" required></td>
        </tr>
        <tr>
          <td><strong>Phone: </strong></td>
          <td><input type="text" name="user_phone" value="<?php echo $phone?>" required></td>
        </tr>
        <tr>
          <td><strong>Birthday: </strong></td>
          <td><input type="date" name="user_birthday" disabled="disabled" value="<?php echo $birthday?>" required></td>
        </tr>
        <tr>
          <td><strong>Country: </strong></td>
          <td>
            <select name="user_country" disabled="disabled">
              <option><?php echo $country?></option>
              <option>USA</option>
              <option>VietNam</option>
              <option>Japan</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><strong>Address: </strong></td>
          <td>
            <textarea name="user_address" id="" cols="30" rows="10" required><?php echo $address?></textarea>
          </td>
        </tr>
        <tr>
          <td><strong>Image: </strong></td>
          <td>
            <input type="file" name="user_image" required>
            <img src="images/<?php echo $image?>" width="50" height="50">
          </td>
        </tr>
        <tr>
          <td><input type="submit" name="update" value="Update" required></td>
        </tr>
      </table>
      <center><h3>Already Registered? <a href="login.php">Login Here</a></h3></center>
    </form>
  </center>
  <?php
    if (isset($_POST['update'])){
      $user_name = mysqli_real_escape_string($dbc, $_POST['user_name']);
      $user_password = mysqli_real_escape_string($dbc, $_POST['user_password']);
      $user_email = mysqli_real_escape_string($dbc, $_POST['user_email']);
      $user_phone = mysqli_real_escape_string($dbc, $_POST['user_phone']);
      $user_birthday = mysqli_real_escape_string($dbc, $_POST['user_birthday']);
      $user_country = mysqli_real_escape_string($dbc, $_POST['user_country']);
      $user_address = mysqli_real_escape_string($dbc, $_POST['user_address']);
      $user_gender = mysqli_real_escape_string($dbc, $_POST['user_gender']);
      $user_image = $_FILES['user_image']['name'];
      $user_tmp= $_FILES['user_image']['tmp_name'];
      if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Your email is not valid!')</script>";
        exit();
      }
      if (strlen($user_password) < 8){
        echo "<script>alert('Password must be more 8 character')</script>";
        exit();
      }
      $sel_email = "SELECT * FROM register_user WHERE user_email='$user_email'";
      $run = mysqli_query($dbc, $sel_email);
      $check_email = mysqli_num_rows($run);
      
      $_SESSION['user_email'] = $user_email;
      move_uploaded_file($user_tmp, "images/$user_image");
      $update = "UPDATE register_user SET user_name='$user_name', user_password='$user_password', user_email='$user_email',
        user_phone='$user_phone', user_address='$user_address', user_image='$user_image' WHERE user_id='$edit_id'"; 
      $run_update = mysqli_query($dbc, $update);
      if ($run_update){
        echo "<script>alert('Update successfull')</script>";
        echo "<script>window.open('view.php', '_self')</script>";
      }
    }    
  ?>
</body>
</html>
