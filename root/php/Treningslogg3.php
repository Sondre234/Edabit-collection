<?php 

    $conn = new mysqli('itfag.usn.no', 'h21app2000gr6', 'EasyFit06', 'h21app2000db6');
    if($conn-> connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $sql = 'SELECT * FROM Treningslogg';

        $result = mysqli_query($conn, $sql);
        $liste = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        //print_r($liste);
        mysqli_free_result($result);
        
        mysqli_close($conn);

        foreach ($liste as $item) {
            Echo"<div>"; 
            Echo"<p>";
            Echo"id: ";
            Echo htmlspecialchars($item['idTreningslogg']);
            Echo" vekt: ";
            Echo htmlspecialchars($item['Vekt']);
            Echo" sets: ";
            Echo htmlspecialchars($item['Setss']);
            Echo" reps: ";
            Echo htmlspecialchars($item['Repitesjoner']);
            Echo" dato: ";
            Echo htmlspecialchars($item['Dato']);
            Echo" øvelse: ";
            Echo htmlspecialchars($item['Øvelse_Øvelsenavn']);
            Echo"</p>";
            Echo"</div>";
        }
        
        
    }
        
?>