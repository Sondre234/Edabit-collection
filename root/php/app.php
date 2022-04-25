<?php
require_once('../inc/database.php');

function finnesEpost($epost)
{
    $db = kobletil();
    $sql = $db->prepare("SELECT Email FROM Bruker WHERE Email = ?"); #lager prepared statement 
    $sql->bind_param("s", $epost); #S for string, og legger brukernavn inn i der spørsmålet er 
    $sql->execute();

    $resultat = $sql->get_result(); //Henter resultatet fra spørringen
    mysqli_close($db);

    return (mysqli_num_rows($resultat) >= 1);
}


//https://stackoverflow.com/questions/4356289/php-random-string-generator
function lagTilfeldigString(int $lengde, String $tallBokstav = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): String
{
    if ($lengde < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($tallBokstav, '8bit') - 1;
    for ($i = 0; $i < $lengde; ++$i) {
        $pieces[] = $tallBokstav[random_int(0, $max)];
    }
    return implode('', $pieces);
}
function updateResetPassord($email)
{
    $enString = lagTilfeldigString(50);
    $db = kobletil();
    $sql = $db->prepare("UPDATE Bruker SET `ResetPassord` = ? WHERE Email = ?"); #lager prepared statement 
    $sql->bind_param("ss", $enString, $email); #S for string, og legger brukernavn inn i der spørsmålet er 
    $sql->execute();
    mysqli_close($db);
}
updateResetPassord($_POST['email']);