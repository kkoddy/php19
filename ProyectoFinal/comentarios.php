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
                    <li><a class='user' href="_login.php"><?php if (isset($_COOKIE['usuario'])){
                        echo $_COOKIE['usuario'];
                      }else{
                        echo "Login";
                      }?></a></li>
                  </ul>
                
                </nav>
     
        <div class="valoraciones">
     
            <table class="table">
                   
                    
                     
                        <?=getComentario($_GET['id_usu_com']);?>
                
                    
                 

                </table>
            


        </div>   
            
        
        </div>

    </body>
</html>


