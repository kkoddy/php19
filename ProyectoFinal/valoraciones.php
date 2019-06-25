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
     
            <table class="table">
                    <tr>
                        <th colspan="3"><h2><?php echo getName($_GET['producto']);?></h2></th>
                      
                    </tr>
                    <tr>
                      <td><img src=<?php echo getFoto($_GET['producto']);?> alt="art1"></td>
                      <td><?=TodosLosComentariosProducto($_GET['producto']);?></td>
                
                    </tr>
                    <tr>
                        <td>
                          <?php 
                          if(isset($_COOKIE['usuario'])){
                            $verVoto="initial";
                          }else{
                            $verVoto="none";
                            echo "<h2 style='color:red'>Registrate para votar nuestros platos</h2>";
                          }
                          
                          
                          ?>
                        <form method="POST" style='display:<?php echo $verVoto;?>'>
                            <h4>Su comentario</h4>
                            <input type="radio" name="voto" value="0"> 0
                            <input type="radio" name="voto" value="1"> 1
                            <input type="radio" name="voto" value="2"> 2
                            <input type="radio" name="voto" value="3"> 3
                            <input type="radio" name="voto" value="4"> 4
                            <input type="radio" name="voto" value="5" checked> 5<br>
                            <input type="hidden" name="id_producto" value="<?=$_GET['producto']?>">
                            <textarea name="comment" rows="4" cols="50"></textarea><br>
                            <input type="submit" value="votar">       
                        </form> 
                        </td>
                    </tr>


                </table>
            


        </div>   
            
        
        </div>

    </body>
</html>
