<?php
require_once('../inc/database.php');
session_start();

function endrePassord($resetpassord, $nyPassord)
{
  $db = kobletil();

  $nyPassord = password_hash($nyPassord, PASSWORD_DEFAULT);
  $sql = $db->prepare("UPDATE Bruker SET `Passord` = ? WHERE ResetPassord = ?"); #lager prepared statement 
  $sql->bind_param("ss", $nyPassord, $resetpassord); #S for string, og legger brukernavn inn i der spørsmålet er 
  $sql->execute();

  mysqli_close($db);
}
endrePassord($_SESSION['resetId'], $_POST['passord1']);