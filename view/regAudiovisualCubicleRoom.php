<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
  <?php
  echo "Revisar validacion";
  require_once("components/navBarAdmin.php");
  require_once("components/navBarAuxiliary.php");
  require_once("usefulAudiovisualCubicleRoom.php");
  ?>

  <div class="container">
    <div class="mt-4">
      <h2>Audiovisual Room Registration</h2>
    </div>
    <div class="mt-4 d-flex justify-content-center"">

      <form method=" post">
      <div class="row">

        <!--  -->
        <div class="col-4 mb-4">
          <label for="noAccount" class="form-label">No Account:</label>
          <input type="text" id="noAccount" name="noAccount" class="form-control <?= $noAccount ?>" placeholder="noAccount" required value="<?= $loans->noAccount ?>">
          <div class="invalid-feedback">
            <ul>
              <li>9 character access number </li>
            </ul>
          </div>
        </div>

        <!-- <div class="col-3 mb-4">
            <label for="datett" class="form-label">Date:</label>
            <input type="date" id="datett" name="datett" class="form-control" value="" required disabled>
            <div class="invalid-feedback">
              <ul>
                <li>Date is mandatory</li>
              </ul>
            </div>
          </div>

          
          <div class="col-3 mb-4">
            <label for="time" class="form-label">Entry Time:</label>
            <input type="time" id="entryTime" name="entryTime" class="form-control" value="" required disabled>
          </div>

          
          <div class="col-3 mb-4">
            <label for="departureTime" class="form-label">Departure Time:</label>
            <input type="time" id="departureTime" name="departureTime" class="form-control" value="" required disabled>
            <div class="invalid-feedback">
              <ul>
                <li>Date is mandatory</li>
              </ul>
            </div>
          </div> -->

        <!--  -->
        <div class="col-4 mb-4">
          <label for="men" class="form-label">Men:</label>
          <input type="number" id="men" class="form-control <?= $men ?>" name="men" placeholder="0" value="<?= $loans->men ?>">
        </div>

        <!--  -->
        <div class="col-4 mb-4">
          <label for="women" class="form-label">Women:</label>
          <input type="number" min="0" max="40" id="women" class="form-control <?= $women ?>" name="women" placeholder="0" value="<?= $loans->women ?>">
        </div>

        <div class="col-12 ">
          <label for="options" class="form-label">Area:</label>
          <select class="form-select <?= $valEstadoCivil ?>" id="options" name="EstadoCivil">
            <option value="1">Cubicle 1</option>
            <option value="2">Cubicle 2</option>
            <option value="3">Cubicle 3</option>
            <option value="4">Cubicle 4</option>
            <option value="5">Cubicle 5</option>
            <option value="6">Cubicle 6</option>
            <option value="7">Audiovisual Room</option>
          </select>
        </div>

        <div class="row justify-content-center mt-4">
          <button class="btn btn-primary col-5" type="submit">Guardar</button>
          <button type="button" onclick="history.back()" class="btn btn-secondary col-5 mx-2">Cancelar</button>
        </div>
      </div>



      </form>

    </div>
  </div>


</body>
<script src="../js/bootstrap.bundle.min.js"></script>

</html>