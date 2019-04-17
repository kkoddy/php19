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
                    <li><a href="#">Login</a></li>
                  </ul>
                
                </nav>
     
        <div class="menu-dia">
     
               <header>
                  <h2>Nuestros Platos</h2>
               </header>
                <table>
                    <tr>
                      <th><h2><?php echo $_GET['producto'];?></h2></th>
                      <th><h2>Comentarios</h2></th>
                      <th><h2>Votos</h2></th>
                    </tr>
                    <tr>
                      <td><p><img src="images/food1.jpg"alt="art1"></p></td>
                      <td><p><?php echo TodosLosComentariosProducto($_GET['producto']);?></p></td>
                
                    </tr>
                    <tr>
                        <td>
                        <form method="GET" action="menu.php">
                            <input type="radio" name="voto" value="0"> 0
                            <input type="radio" name="voto" value="1"> 1
                            <input type="radio" name="voto" value="2"> 2
                            <input type="radio" name="voto" value="3"> 3
                            <input type="radio" name="voto" value="4"> 4
                            <input type="radio" name="voto" value="5" checked> 5<br>
                            <input type="submit" value="votar">       
                        </form> 
                        </td>
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
