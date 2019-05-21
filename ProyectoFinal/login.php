<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Anapurna Gastrobar</title>
        <meta name="Keywords" content="food"/>
        <meta name="Description" content="Restaurante anapurna"/>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <script src="jquery-3.4.0.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
       
    </head>
    <body>
    <?php
        include 'functions.php';
        ?>
       
        <div id="base">
              <header>
                <nav class="nav">
                  <ul>
                    <li><a href="index.php">Bienvenido</a></li>
                    <li><a href="menu.php">Menú</a></li>
                    <li><a href="#">Media</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="_login.php"><?php if (isset($_COOKIE["usuario"])){
                        echo $_COOKIE['usuario'];
                      }else{
                        echo "Login";
                       
                      }?></a></li>
                  </ul>
               
                
                </nav>
     </header>
     
            <section class="main">
              
                <article class="article">
                        <div class="login">



                  
                        <form method="POST">
                            Usuario:
                            <input type="text" name="user"><br>
                            Contraseña:
                            <input type="password" name="pass"><br>  
                   
                            <input type="submit" value="Entrar"><br>       
                        </form> 
                          <?php echo $login;?>
                          <input type="button" onclick="registrar()" value="Registrar">
                        </div>
                      
                        <div class="new">
                            <form method="POST">
                                          Nombre*:
                                          <input type="text" name="newname"><br>
                                          Apellidos*:
                                          <input type="text" name="lastname"><br>
                                          Correo*:
                                          <input type="text" name="mail"><br>
                                          Edad:
                                          <input type="text" name="age"><br>
                                          Usuario*:
                                          <input type="text" name="newuser"><br>
                                          Contraseña*:
                                          <input type="password" name="newpass">  
                                
                                          <input type="submit" value="Registrar">       
                              </form> 
                        
                        </div>
                   
                   
                  </article>
            </section>
  
            
        <footer>
               <ul>
                    <li><a href="#">Aviso Legal</a></li>
                    <li><a href="#">Copyright 2019</a></li>
                 
                    <li><a href="#">Contacto</a></li>
                  </ul>
        </footer>
    </div>


    </body>
</html>
