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
    require_once("components/navBarGenealUser.php");
    ?>




    <div class="container">
        <div class="mt-4 d-flex justify-content-center ">
            <h2>Access General Room</h2>
        </div>
        <div class="mt-4 ">

            <form method="post">
                <div class="row d-flex justify-content-center">

                    <!--  -->
                    <div class="col-4 mb-4 ">
                        <label for="noAccount" class="form-label ">No Account:</label>
                        <input type="text" id="noAccount" name="noAccount" class="form-control" placeholder="noAccount" required value="">
                        <div class="invalid-feedback">
                            <ul>
                                <li>9 character access number </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-center">
                    <button class="btn btn-primary col-4 m-0">Guardar</button>
                </div>

            </form>
        </div>
    </div>

</body>
<script src="../js/bootstrap.bundle.min.js"></script>

</html>