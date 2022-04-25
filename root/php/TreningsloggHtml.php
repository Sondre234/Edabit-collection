<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="modal.css" />
  </head>
  <body>
    <!-- Trigger/Open The Modal -->
    <button id="myBtn">Legg Till Økt</button>
    
    <?php include('getAll.php'); ?>

    <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Legg til økt</h1>
        <form action="insert.php" method="post">
          <div class="form-group">
            <label for="inputId">Id</label>
            <input
              type="number"
              class="form-control"
              id="idTreningslogg"
              placeholder="Legg til ID"
              name="idTreningslogg"
            />
          </div>
          <div class="form-group">
            <label for="inputVekt">Vekt</label>
            <input
              type="number"
              class="form-control"
              id="vekt"
              placeholder="Vekt"
              name="vekt"
            />
          </div>
          <div class="form-group">
            <label for="inputSets">Sets</label>
            <input
              type="number"
              class="form-control"
              id="sets"
              placeholder="Sets"
              name="sets"
            />
          </div>
          <div class="form-group">
            <label for="inputReps">Reps</label>
            <input
              type="number"
              class="form-control"
              id="reps"
              placeholder="Reps"
              name="reps"
            />
          </div>
          <div class="form-group">
            <label for="inputDato">Dato</label>
            <input
              type="text"
              class="form-control"
              id="dato"
              placeholder="Dato"
              name="dato"
            />
          </div>
          <div class="form-group">
            <label for="inputØvelse">Øvelse</label>
            <input
              type="text"
              class="form-control"
              id="ovelse"
              placeholder="ovelse"
              name="ovelse"
            />
          </div>
          <button type="submit" class="btn btn-primary">Legg Till</button>
        </form>
      </div>
    </div>
    <script src="modalscript.js"></script>
  </body>
</html>