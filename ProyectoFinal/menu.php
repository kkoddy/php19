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
                    <li><a href="login.php"><?php if (isset($_COOKIE['usuario'])){
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
                      <th><h2>Valoracion</h2></th>
                      <th><h2>Precio</h2></th>
                    </tr>
                    <tr>
                      <td><p><a href="valoraciones.php?producto=sopa"><img src=<?php echo getFoto('sopa');?> alt="art1"></a></p></td>
                      <td><p><?php echo CalcularValoracionMedia("sopa");?></p></td>
                      
                      <td><p><?php echo getPrecio("sopa")?></p></td>
                    </tr>
                    <tr>
                     <td><p><a href="valoraciones.php?producto=cocido"><img src=<?php echo getFoto('cocido');?> alt="art1"></a></p></td>
                     <td><p><?php echo CalcularValoracionMedia("cocido");?></p></td>
                      
                      <td><p><?php echo getPrecio("cocido")?></p></td>
                    </tr>
                    <tr>
                     <td><p><a href="valoraciones.php?producto=estofado"><img src=<?php echo getFoto('estofado');?> alt="art1"></a></p></td>
                     <td><p><?php echo CalcularValoracionMedia("estofado");?></p></td>
                   
                      <td><p><?php echo getPrecio("estofado")?></p></td>
                    </tr>
                    <tr>
                     <td><p><a href="valoraciones.php?producto=pisto"><img src=<?php echo getFoto('pisto');?> alt="art1"></a></p></td>
                     <td><p><?php echo CalcularValoracionMedia("pisto");?></p></td>
                   
                      <td><p><?php echo getPrecio("pisto")?></p></td>
                    </tr>
                    <tr>
                     <td><p><a href="valoraciones.php?producto=lentejas"><img src=<?php echo getFoto('lentejas');?> alt="art1"></a></p></td>
                     <td><p><?php echo CalcularValoracionMedia("lentejas");?></p></td>
                   
                      <td><p><?php echo getPrecio("lentejas")?></p></td>
                    </tr>


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
