<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="d-flex justify-content-center vh-100 align-items-center">
    <?php
    require_once('loginProcess.php');
    /* require_once('loginUseful.php') */
    ?>

    <div class="border border-primary p-5 rounded-5" style="width: 25rem;">
        <div>
            <h1 class="text-center text-primary">Login</h1>
        </div>
        <div>
            <form method="post">

                <div class="mt-4">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control <?= $valEmail ?>" id="email" pattern="[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,}" name="email" placeholder="Email" value="<?= isset($_POST["email"]) ? $_POST["email"] : "" ?>" required>
                </div>
                <!-- Checar retroalimetacion -->
                <div class="mt-4">
                    <label for="passworduser">Password:</label>
                    <input type="password" class="form-control <?= $valPassword ?> id=" password" maxlength="30" minlength="8" name="passworduser" placeholder="Password" value="<?= isset($_POST["passworduser"]) ? ($_POST["passworduser"]) : "" ?>" required>
                </div>
                <!-- Checar retroalimetacion -->
                <div class="invalid-feedback">
                    <ul>

                        <?php
                        if ($userNotFound) {

                        ?>
                            <li>El correo electrónico es obligatorio</li>
                            <li>Debe tener un formato válido</li>
                        <?php } else { ?>
                            <li>Contraseña o correo incorrectos</li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="mt-4">
                    <button class="btn btn-primary btn-lg active w-100" type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>






</body>

</html>