<?php
  if (isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $select = "SELECT * FROM users WHERE id='$edit_id'";
    $run = mysqli_query($dbc, $select);

    $row = mysqli_fetch_array($run);
    $name = $row['name'];
    $password = $row['password'];
    $email = $row['email'];
  }  
?>
<form action="" method="post">
  <p>Name: <input type="text" name="name" id="name" value="<?php echo $name;?>"></p>
  <p>Password: <input type="password" name="password" id="password" value="<?php echo $password;?>"></p>
  <p>Email: <input type="email" name="email" id="email" value="<?php echo $email;?>"></p>
  <input type="submit" name="update" value="Submit">
</form>

<?php
  if (isset($_POST['update'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $query = "UPDATE users SET name='$name', password='$password', email='$email' WHERE id='$edit_id'";
    $result = mysqli_query($dbc, $query);

    if($result){
      echo "<script>alert('Update success')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
?>