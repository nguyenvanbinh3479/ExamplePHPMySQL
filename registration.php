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
?>
<body>
  <center>
    <form action="registration.php" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <td colspan="8"><h2>New Users? Register Here</h2></td>
        </tr>
        <tr>
          <td><strong>Name: </strong></td>
          <td><input type="text" name="user_name" placeholder="Enter your Name" required></td>
        </tr>
        <tr>
          <td><strong>Password: </strong></td>
          <td><input type="password" name="user_password" placeholder="Enter your Password" required></td>
        </tr> 
        <tr>
          <td><strong>Email: </strong></td>
          <td><input type="email" name="user_email" placeholder="Enter your Email" required></td>
        </tr>
        <tr>
          <td><strong>Phone: </strong></td>
          <td><input type="text" name="user_phone" placeholder="Enter your Phone" required></td>
        </tr>
        <tr>
          <td><strong>Birthday: </strong></td>
          <td><input type="date" name="user_birthday" required></td>
        </tr>
        <tr>
          <td><strong>Country: </strong></td>
          <td>
            <select name="user_country">
              <option>Select a country</option>
              <option>USA</option>
              <option>VietNam</option>
              <option>Japan</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><strong>Address: </strong></td>
          <td>
            <textarea name="user_address" id="" cols="30" rows="10" required></textarea>
          </td>
        </tr>
        <tr>
          <td><strong>Gender: </strong></td>
          <td>
            Male <input type="radio" name="user_gender" value="male">
            Female <input type="radio" name="user_gender" value="female">     
          </td>
        </tr>
        <tr>
          <td><strong>Image: </strong></td>
          <td><input type="file" name="user_image" required></td>
        </tr>
        <tr>
          <td><input type="submit" name="register" value="Register" required></td>
        </tr>
      </table>
      <center><h3>Already Registered? <a href="login.php">Login Here</a></h3></center>
    </form>
  </center>
  <?php
    if (isset($_POST['register'])){
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
      if ($user_gender=='' OR $user_country==''){
        echo "<script>alert('Please fill all the fileds!')</script>";
        exit();
      }
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
      
      if ($check_email==1){
        echo "<script>alert('This email is alredy registered')</script>";
        exit();
      }else{
        $_SESSION['user_email'] = $user_email;
        move_uploaded_file($user_tmp, "images/$user_image");
        $insert = "INSERT INTO register_user 
        (user_name, user_password, user_email, user_phone, user_birthday, user_country, user_address, user_gender, user_image, register_date)
        VALUE ('$user_name', '$user_password', '$user_email', '$user_phone', '$user_birthday', '$user_country', '$user_address', '$user_gender', '$user_image', NOW())"; 
        $run_insert = mysqli_query($dbc, $insert);
        if ($run_insert){
          echo "<script>alert('Registered successfull')</script>";
          echo "<script>window.open('home.php', '_self')</script>";
        }
      }
    }    
  ?>
</body>
</html>
