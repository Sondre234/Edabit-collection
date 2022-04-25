<?php

  function kobletil(){
  $servernavn = "itfag.usn.no";
  $brukernavn = "h21app2000gr6";
  $password = "EasyFit06";
  $dbnavn = "h21app2000db6";

  $dbKobling = new mysqli($servernavn, $brukernavn, $password,$dbnavn);

  if($dbKobling ->connect_error){
    die("Tilkobling feilet")- $dbKobling->connect_error;
  } 

  return $dbKobling;
  }
    function henterInnloggingsInfo($brukernavn){#Henter brukenavn, der Brukenavn = $b r
    $db = kobletil();#BRUKER  KOBLETIL FUNKSJON FOR Å LAGE KOBLING
    $sql = $db->prepare("SELECT Brukernavn,Passord FROM Bruker WHERE Brukernavn = ?"); #lager prepared statement 
    $sql ->bind_param("s",$brukernavn);#S for string, og legger brukernavn inn i der spørsmålet er 
    $sql -> execute();
      $resultat = $sql -> get_result();//Henter resultatet fra spørringen
      return  $resultat -> fetch_assoc();
    mysqli_close($db);
    }


?>