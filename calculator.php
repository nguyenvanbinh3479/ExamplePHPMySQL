<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Calculator</title>
</head>
<body>
  <form action="calculator.php" method="post" style="text-align: center;">
    <b>Value 1: </b>
    <input type="number" name="value1">
    <b>Operator : </b>
    <select name="operator">
      <option>+</option>
      <option>-</option>
      <option>x</option>
      <option>:</option>
    </select>
    <b>Value 2: </b>
    <input type="number" name="value2">
    <input type="submit" name="submit" value="caculate">
  </form>
</body>
</html>
<?php
  if (isset($_POST['submit'])){
    $val1 = $_POST['value1'];
    $val2 = $_POST['value2'];
    $opt = $_POST['operator'];

    if (isset($_POST['submit'])){
      if ($val1 > 0 || $val2 > 0){
        switch ($opt) {
          case "+":
            $value = $val1 + $val2;
            echo "<center><h1>Your answer is: <b style='color: red;'>".$value."</b></h1></center>";
            break;
          case "-":
            $value = $val1 - $val2;
            echo "<center><h1>Your answer is: <b style='color: red;'>".$value."</b></h1></center>";
            break;
          case "x":
            $value = $val1 * $val2;
            echo "<center><h1>Your answer is: <b style='color: red;'>".$value."</b></h1></center>";
            break;
          default:
            $value = $val1 / $val2;
            echo "<center><h1>Your answer is: <b style='color: red;'>".$value."</b></h1></center>";
            break;
        } 
      }else{
        echo "<center><h1><b style='color: red;'>Please put your number</b></h1></center>";
      }
    }
  }
?>
