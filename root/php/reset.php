<?php 
  require_once(realpath(dirname(__FILE__) . '/../inc/database.php'));
  //$_GET['url']
function sjekkForResetPassord($url) : bool{
  
  $db = kobletil();
    $sql = $db->prepare("SELECT ResetPassord,Email FROM Bruker WHERE ResetPassord = ?"); #lager prepared statement 
      $sql ->bind_param("s",$url);#S for string, og legger brukernavn inn i der spørsmålet er 
      $sql -> execute();

    $resultat = $sql -> get_result();//Henter resultatet fra spørringen
    mysqli_close($db);
    return (mysqli_num_rows($resultat)== 1);
  }