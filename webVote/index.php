<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles.css">
  <title>Vote Home</title>
</head>
<body>
  <div id="con">
    <h2 align="center">Your vote to the best playser of the year</h2>
    <div id="players" align="center">
      <img src="images/headboy.png" width="50" height="50">
      <img src="images/headgirl.png" width="50" height="50">
      <img src="images/headboy.png" width="50" height="50">
    </div>
    <form align="center" action="index.php" method="post">
      <input type="submit" name="boy" value="vote to boy">    
      <input type="submit" name="girl" value="vote to girl">    
      <input type="submit" name="gay" value="vote to gay">    
    </form>
    <?php
      $dbc = mysqli_connect("localhost", "root", "", "examplephpmysql");

      if (isset($_POST['boy'])){
        $boy = "Update player set boy=boy+1";
        $query = mysqli_query($dbc, $boy);
        echo "<center><h2>Your vote has been cast<br/> <a href='index.php?result'>See Result</a></h2></center>";
      }
      if (isset($_POST['girl'])){
        $girl = "Update player set girl=girl+1";
        $query = mysqli_query($dbc, $girl);
        echo "<center><h2>Your vote has been cast<br/> <a href='index.php?result'>See Result</a></h2></center>";
      }
      if (isset($_POST['gay'])){
        $gay = "Update player set gay=gay+1";
        $query = mysqli_query($dbc, $gay);
        echo "<center><h2>Your vote has been cast<br/> <a href='index.php?result'>See Result</a></h2></center>";
      }
      if(isset($_GET['result'])){
        $sel = "SELECT * FROM player";
        $run = mysqli_query($dbc, $sel);
        $row = mysqli_fetch_array($run);
        $boy = $row['boy'];
        $girl = $row['girl'];
        $gay = $row['gay'];
        $count_all = $boy + $girl + $gay;
        $per_boy = round($boy*100/$count_all) . "%";
        $per_girl = round($girl*100/$count_all) . "%";
        $per_gay = round($gay*100/$count_all) . "%";
        echo "
          <div align='center'>
            <h2>All Results</h2>
            <p>Boy: $boy  Votes ($per_boy)</p>
            <p>Girl: $girl  Votes ($per_girl)</p>
            <p>Gay: $gay  Votes ($per_gay)</p>
          </div>
        ";
      }
    ?>
  </div>
</body>
</html>