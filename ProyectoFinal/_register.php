 <?php
        include 'functions.php';
        ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <form class="form-horizontal" action='' method="POST">
              <?php if (isset($alert)){echo $alert;}?>
            <fieldset>
                <div id="legend">
                    <legend class="">Registro</legend>
                </div>
                <div class="control-group">
                    <!-- Username -->
                    <label class="control-label"  for="username">Nombre</label>
                    <div class="controls">
                        <input type="text" id="newname" name="newname" placeholder="" class="input-xlarge">
                        <p class="help-block">Puede contener letras y números sin espacios</p>
                    </div>
                </div>
                 <div class="control-group">
                    <!-- Username -->
                    <label class="control-label"  for="lastname">Apellidos</label>
                    <div class="controls">
                        <input type="text" id="lastname" name="lastname" placeholder="" class="input-xlarge">
                        <p class="help-block">Puede contener letras y números sin espacios</p>
                    </div>
                </div>
                   <div class="control-group">
                    <!-- E-mail -->
                    <label class="control-label" for="newuser">Login</label>
                    <div class="controls">
                        <input type="text" id="newuser" name="newuser" placeholder="" class="input-xlarge">
                       
                    </div>
                </div>

                <div class="control-group">
                    <!-- E-mail -->
                    <label class="control-label" for="mail">E-mail</label>
                    <div class="controls">
                        <input type="text" id="mail" name="mail" placeholder="" class="input-xlarge">
                        <p class="help-block">Mail de contacto en caso de olvidar la contraseña</p>
                    </div>
                </div>
        
                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="newpass">Contraseña</label>
                    <div class="controls">
                        <input type="password" id="newpass" name="newpass" placeholder="" class="input-xlarge">
                        <p class="help-block">Debe tener al menos 4 caracteres</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password -->
                    <label class="control-label"  for="password_confirm">Contraseña (Confirmación)</label>
                    <div class="controls">
                        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
                        <p class="help-block">Por favor confirma tu contraseña</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-success">Registrar</button>
                        <a href="_login.php" class="btn btn-primary">Volver a login</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </body>
</html>

