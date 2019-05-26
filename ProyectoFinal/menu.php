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
                    <li><a href="_login.php"><?php if (isset($_COOKIE['usuario'])){
                        echo $_COOKIE['usuario'];
                      }else{
                        echo "Login";
                      }?></a></li>
                  </ul>
                
                </nav>
     
        <div class="menu-dia">
     
               <header>
                  <h2>Nuestros Platos</h2>
               </header>
                <table>
                    <tr>
                      <th><h2>Plato</h2></th>
                      <th><h2>Precio</h2></th>
                    </tr>
                        <?php for ($i = 1; $i <= getNumProductos(); $i++) { ?>


                            <tr>

                                
                                    
                           
                                <td>
                                    <p><?php echo getName($i);?></p>
                                    <img src=<?php echo getFoto($i); ?> alt="art1">
                                </td>
                          
                                <td><?=getPrecio($i);?></td>
                            </tr>
    


                           
    <?php
}
?> 

                </table>

        </div>   
            
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
