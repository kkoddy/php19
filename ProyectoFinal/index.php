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
     </header>
     
            <section class="main">
                <article class="article">
                      <div class="comment">
                          <div>
                            <p><a href="valoraciones.php?producto=sopa"> <img src="images/food1.jpg"alt="art1"><?php echo MejorValorado('sopa');?></a> </p>
                          </div>
                          <div>
                            
                            <p><a href="valoraciones.php?producto=estofado"> <img src="images/food1.jpg"alt="art1"><?php echo MejorValorado('estofado');?></a> </p>
                          </div>
                          <div>
                            
                            <p><a href="valoraciones.php?producto=cocido"> <img src="images/food1.jpg"alt="art1"><?php echo MejorValorado('cocido');?></a> </p>
                          </div>
                          <div>
                            
                            <p><a href="valoraciones.php?producto=lentejas"> <img src="images/food1.jpg"alt="art1"><?php echo MejorValorado('lentejas');?></a> </p>
                          </div>
                          <div>
                            
                            <p><a href="valoraciones.php?producto=sopa"> <img src="images/food1.jpg"alt="art1"><?php echo MejorValorado('sopa');?></a> </p>
                          </div>
                          <div>
                            
                            <p><a href="valoraciones.php?producto=sopa"> <img src="images/food1.jpg"alt="art1"><?php echo MejorValorado('sopa');?></a> </p>
                          </div>
                        </div>   
                        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>    
                        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                        <script type="text/javascript" src="slick/slick.min.js"></script>
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
