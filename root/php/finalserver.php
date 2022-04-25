<?php
session_start();


// initialiser variablene
$username = "";
$email    = "";
$errors = array(); 

// koble til databasen
  $servernavn = "itfag.usn.no";
  $brukernavn = "h21app2000gr6";
  $password = "EasyFit06";
  $dbnavn = "h21app2000db6";

  $dbKobling = new mysqli($servernavn, $brukernavn, $password,$dbnavn);

// registrer bruker
if (isset($_POST['reg_user'])) {
  // ta imot verdiene 
  $username = mysqli_real_escape_string($dbKobling, $_POST['username']);
  $email = mysqli_real_escape_string($dbKobling, $_POST['email']);
  $password_1 = mysqli_real_escape_string($dbKobling, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($dbKobling, $_POST['password_2']);

  // valider informasjonen med $errors array

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }
  //sjekk databasen for at brukernavnet og emailen ikke finnes fra før
  $user_check_query = "SELECT * FROM Bruker WHERE brukernavn='$username' OR Email='$email' LIMIT 1";
  $result = mysqli_query($dbKobling, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // registrer brukeren hvis det ikke er noen feil
  if (count($errors) == 0) {
    $password = password_hash($password_1, PASSWORD_DEFAULT);//krypterer passordet før det legges i databasen

    $query = "INSERT INTO Bruker (brukernavn, Email, Passord) 
          VALUES('$username', '$email', '$password')";
    mysqli_query($dbKobling, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    
  }
}