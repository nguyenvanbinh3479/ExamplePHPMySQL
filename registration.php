<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Registration</title>
</head>
<body>
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
  </form>
  <?php
    if (isset($_POST['register'])){
      $user_name = $_POST['user_name'];
      $user_password = $_POST['user_password'];
      $user_email = $_POST['user_email'];
      $user_phone = $_POST['user_phone'];
      $user_birthday = $_POST['user_birthday'];
      $user_country = $_POST['user_country'];
      $user_address = $_POST['user_address'];
      $user_gender = $_POST['user_gender'];
      $user_image = $_FILES['user_image']['name'];
      $user_tmp= $_FILES['user_image']['tmp_name'];
      if ($user_gender=='' OR $user_country==''){
        echo "<script>alert('Please fill all the fileds!')</script>";
        exit();
      }
      if ()
    }    
  ?>
</body>
</html>
