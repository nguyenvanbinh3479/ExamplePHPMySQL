<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Currency Converter</title>
</head>
<body>
  <form action="converter.php" method="post" style="text-align: center;">
    <b>Enter Amount: </b>
    <input type="number" name="amount">
    <b>From: </b>
    <select name="from">
      <option>USD</option>
      <option>VND</option>
    </select>
    <b>To: </b>
    <select name="to">
      <option>USD</option>
      <option>VND</option>
    </select>
    <input type="submit" name="convert" value="Convert">
  </form>
</body>
</html>
<?php
  if (isset($_POST['convert'])){
    $amount = $_POST['amount'];
    $from = $_POST['from'];
    $to = $_POST['to'];

    if ($from=='USD' AND $to=='VND'){
      $result = $amount * 23000;
      echo "<center><h2>Your Answer is: <b style='color:red;'>".$result." VNĐ</b><h2></center>";
    }
    if ($from=='USD' AND $to=='USD') {
      $result = $amount;
      echo "<center><h2>Your Answer is: <b style='color:red;'>".$result." USD</b><h2></center>";
    }
    if ($from=='VND' AND $to=='VND') {
      $result = $amount;
      echo "<center><h2>Your Answer is: <b style='color:red;'>".$result." VND</b><h2></center>";
    }
    if ($from=='VND' AND $to=='USD') {
      $result = $amount / 23000;
      echo "<center><h2>Your Answer is: <b style='color:red;'>".$result." USD</b><h2></center>";
    }
  }
  
?>
