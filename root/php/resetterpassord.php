<?php 
    require_once('inc/reset.php');
    session_start();
    $url = $_SERVER['REQUEST_URI'];
    
      $_SESSION['resetId'] = trim($url, "/resetterpassord.php?resetId=");
      if( !isset($_SESSION['resetId']) || !sjekkForResetPassord($_SESSION['resetId']) ){
         header("location: index.php");
      } else{
        echo "<h1>". $_SESSION['resetId']."<h1>";
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/script.js"></script>
  <title>Endre passord</title>
</head>

<body>
  <form method="get">
    <input type="hidden" name="resetId">
  </form>
  <form action="./inc/passordreset.php" method="post">
    <input type="password" name="passord1" id="input-password" placeholder="skriv inn passord" minlength="5"><br>
    <input type="password" name="passord2" id="input-password" placeholder="skriv inn passord på nytt" minlength="5">
    <input type="submit" value="Ny passord">
  </form>
</body>

</html>