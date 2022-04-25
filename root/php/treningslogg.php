<?php
    include("$_SERVER[DOCUMENT_ROOT]/EasyFit/loginn.php");

    $server = "itfag.usn.no";
    $servernavn = "h21app2000gr6";
    $pass= "EasyFit06";
    $db = "h21app2000db6";

    $tilkobling = mysqli_connect ($server, $servernavn, $pass, $db);

    if (isset($_POST['submit']))
    {
        $dato = $_POST['dato'];
        $bruker = $_SESSION['brukerID'];

        $sql = "SELECT Vekt, Sets, Repitesjoner, Dato, Øvelse_Øvelsenavn FROM Treningslogg WHERE Bruker_idBruker = $bruker AND Dato LIKE '%$dato%'";
        $res = mysqli_query ($tilkobling, $sql);

        if (mysqli_num_rows($res) >= 1)
        {
            $rad = mysqli_fetch_assoc($res);
        
            while($rad) 
            {
                echo "<p>" . "Vekt: " . $rad['Vekt'] . " kg, " . "Sets: " . $rad['Sets'] . " Repitisjoner: " . $rad['Repitesjoner'] . " Dato: " . $rad['Dato'] . " Øvelse: " . $rad['Øvelse_Øvelsenavn'];
                $rad = mysqli_fetch_assoc($res);
            }
        }
        else
        {
            echo "<script>" . "alert('Loggen finnes ikke');" . "</script>";
        }
    }

    mysqli_close($tilkobling);
?>