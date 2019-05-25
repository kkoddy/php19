<?php
include 'functions.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>
    <body>

        <div class="wrapper">

            <form class="form-signin" method="POST">
                <?php if (isset($login)) {
                    echo $login;
                } ?>
                <h2 class="form-signin-heading">Acceso usuarios</h2>
                <input type="text" class="form-control" name="user" placeholder="Usuario" required="" autofocus="" />
                <input type="password" class="form-control" name="pass" placeholder="Contraseña" required=""/>      
                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button><br>
                  <a href="index.php" class="btn btn-secondary">Volver</a>
                <a href="_register.php" class="btn btn-primary">Registrate</a>

              

            </form>

        </div>



    </body>