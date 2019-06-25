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
                    <li><a href="_login.php?close=0"><?=$login_actual;?></a></li>
                  </ul>
                
                </nav>
     
        <div class="menu-dia">
     
               <header>
                  <h1>Nuestros Platos</h1>
               </header>

            <table class="table">
                   
                    <tbody>
                    <thead>
                        <tr>
                        <th colspan="2"><h1>Nuestros platos</h1></th>
                      
                        </tr>
                    </thead>
                        <tr>

                            <?php for ($i = 1; $i <= getNumProductos(); $i++) { ?>



                                
                           
                           
                                <td>
                                    <h2><?=getName($i);?></h2>
                                     <a href="valoraciones.php?producto=<?= $i; ?>"><img src=<?=getFoto($i); ?> alt="art1"> </a>
                                </td>
                               
                                <td>
                                     
                                    <p><?=getPrecio($i);?></p>
                                  
                                </td>
                          
                                
                            </tr>
                     
                        <?php
                            }
                          ?> 
                    </tbody>
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
