<?php
    include_once("$_SERVER[DOCUMENT_ROOT]/Easyfit/inc/database.php");


    function loggInn($bruker){##OKKG
        $bruker = henterInnloggingsInfo($_POST['brukernavn']);
        if(!isset($bruker)){
             $_SESSION['loggetInn']=false;
             $_SESSION['brukernavn']=false;
            }
        elseif(strcmp($bruker['Brukernavn'], $_POST['brukernavn']===0)
                && password_verify($_POST['passord'],$bruker['Passord'])===true){
            $_SESSION['brukerID']=$bruker['idBruker'];
            $_SESSION['loggetInn']=true;
            header("Location: /easyfit/profil/profil.php");
        }else {
            $_SESSION['loggetInn']=false;
            $_SESSION['brukernavn']=false;
        }
    }
?>