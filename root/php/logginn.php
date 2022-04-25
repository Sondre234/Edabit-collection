<?php session_start(); 

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Logg inn</title>
        <link rel = "stylesheet" type="text/css" href= "style.css">

    </head>
    <body>
        <?php require("$_SERVER[DOCUMENT_ROOT]/easyfit/inc/header.php") #Delt opp header og footer, som nå ligger i inc filer. Dette er footer ?>
        <div class="login-form"> 
        <h1>EasyFit</h1>
        <form action="./logginn.php" method="post">
          <script src = "script.js" defer> </script>
               <p> Brukernavn</p>
                <input id =  "Brukernavn" type = "text" name="brukernavn" placeholder="Brukernavn" required>
               <p> Passord </p>
               <input id = "Password" type = "password" name = "passord" placeholder="Password" required>
               <input id = "checkbox" type="checkbox"><span>Husk Meg</span>
               <p></p>
               <button id = "submit" type = "submit"> Logg inn</button>
           </form>
        </div>
       <?php require("$_SERVER[DOCUMENT_ROOT]/easyfit/inc/footer.php") ?>
    </body>
</html>