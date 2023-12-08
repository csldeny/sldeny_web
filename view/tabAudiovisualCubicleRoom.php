<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="../dt/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="../dt/Buttons-2.4.2/css/buttons.bootstrap5.min.css">
</head>

<body>

  <?php
  echo "revisar validacion";
  require_once("components/navBarAdmin.php");
  require_once("components/navBarAuxiliary.php");
  require_once("../controller/DAOLoans.php");
  $dao = new DAOLoans();
  $getAllMethod = $dao->getAll();
  ?>

  <!-- Tabla de Contenido -->
  <div class="container">
    <div class="mt-4">
      <h2>Audiovisual Room Table</h2>
    </div>
    <div class="mt-4">

      <table class="table table-striped table-bordered" id="lista">

        <thead>
          <tr>
            <th scope="col">No Access</th>
            <th scope="col">Name</th>
            <th scope="col">Carrer</th>
            <th scope="col">Men</th>
            <th scope="col">Women</th>
            <th scope="col">Entry Time</th>
            <th scope="col">Departure Time</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($getAllMethod as $getAll) {

            echo "<tr>
              <td>" . $getAll->noAccount . "</td>" .
              "<td>" . $getAll->firstName . "</td>" .
              "<td>" . $getAll->idcarrer . "</td>" .
              "<td>" . $getAll->men . "</td>" .
              "<td>" . $getAll->women . "</td>" .
              "<td>" . $getAll->entryTime . "</td>" .
              "<td>" . $getAll->departureTime . "</td>" .

              "<td><form method='post'>" .
              "<button formaction='regAudiovisualCubicleRoom.php' class='btn btn-primary' name='id' value=''>Editar</button>" .
              "</form></td></tr>";
          }
          ?>
        </tbody>
      </table>

    </div>
  </div>

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../dt/jQuery-3.7.0/jquery-3.7.0.min.js"></script>
  <script src="../dt/DataTables-1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="../dt/DataTables-1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script src="../dt/Buttons-2.4.2/js/dataTables.buttons.min.js"></script>
  <script src="../dt/Buttons-2.4.2/js/buttons.bootstrap5.min.js"></script>
  <script src="../dt/JSZip-3.10.1/jszip.min.js"></script>
  <script src="../dt/pdfmake-0.2.7/pdfmake.min.js"></script>
  <script src="../dt/pdfmake-0.2.7/vfs_fonts.js"></script>
  <script src="../dt/Buttons-2.4.2/js/buttons.html5.min.js"></script>
  <script src="../dt/Buttons-2.4.2/js/buttons.print.min.js"></script>
  <script src="../dt/Buttons-2.4.2/js/buttons.colVis.min.js"></script>
</body>

</html>