<?php
//get variables
    $idTreningslogg = $_POST['idTreningslogg'];
    $vekt = $_POST['vekt'];
    $sets = $_POST['sets'];
    $reps = $_POST['reps'];
    $dato = $_POST['dato'];
    $ovelse = $_POST['ovelse'];
    $brukerid = 1;

    $conn = new mysqli('itfag.usn.no', 'h21app2000gr6', 'EasyFit06', 'h21app2000db6');
    if($conn-> connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else{
        $stmt = $conn->prepare("INSERT INTO Treningslogg(Vekt, Setss, Repitesjoner, Dato, Bruker_idBruker, Øvelse_Øvelsenavn) VALUES(?,?,?,?,?,?)");
            $stmt ->bind_param("iiisis",$vekt, $sets, $reps, $dato, $brukerid ,$ovelse);
            $stmt -> execute();
            echo "registration Successfully";
            $stmt->close();
            $conn->close();
            header('Location: index.php');
        }
?>