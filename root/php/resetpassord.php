<!-- Denne siden skal løse oppgaven om å lage reset passord til bruker, noen ting må gjøres.
    1. Det må sjekkes om det finnes en bruker med e-mailen som brukeren oppgir.
    2. Hvis den finnes så må det lagres en tilfeldig string på riktig bruker.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Reset passord</title>
</head>
<body>
  <div class="flex-container">
    <div class="overskrift">
      <h1> Reset passord</h1>
    </div>
    <div>
      <form action="/INC/app.php" method="post">
    </div>
    <div class="input-email"><input type="email" name="email" id="input-email" placeholder="Skriv inn email"></div>
    <div class="input-sumbit"><input type="submit" value="Reset passord"></div>
    </form>
  </div>
</body>
</html>