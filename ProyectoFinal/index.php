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
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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

                        <li><a href="_login.php"><?php
                                if (isset($_COOKIE["usuario"])) {
                                    echo $_COOKIE['usuario'];
                                } else {
                                    echo "Login";
                                }
                                ?></a></li>

                        <li><a href="index.php?close=1">Cerrar sesion</a></li>
                    </ul>


                </nav>
            </header>

            <section class="main">

                <article class="article">
                    <div class="comment">
                       
                        <div class="card">
                            
                            <a href="valoraciones.php?producto=sopa"><img class="card-img-top" src=<?php echo getFoto('sopa'); ?> alt="art1"></a>
                            <div class="card-body">
                            
                              <?php echo MejorValorado('sopa'); ?>
                            </div>
                          </div>
                        <div>

                            <p><a href="valoraciones.php?producto=estofado"> <img src=<?php echo getFoto('estofado'); ?> alt="art1"><?php echo MejorValorado('estofado'); ?></a> </p>
                        </div>
                        <div>

                            <p><a href="valoraciones.php?producto=cocido"> <img src=<?php echo getFoto('cocido'); ?> alt="art1"><?php echo MejorValorado('cocido'); ?></a> </p>
                        </div>
                        <div>

                            <p><a href="valoraciones.php?producto=lentejas"><img src=<?php echo getFoto('lentejas'); ?> alt="art1"><?php echo MejorValorado('lentejas'); ?></a> </p>
                        </div>
                        <div>

                            <p><a href="valoraciones.php?producto=croquetas"> <img src=<?php echo getFoto('croquetas'); ?> alt="art1"><?php echo MejorValorado('croquetas'); ?></a> </p>
                        </div>
                        <div>

                            <p><a href="valoraciones.php?producto=pisto">  <img src=<?php echo getFoto('pisto'); ?> alt="art1"><?php echo MejorValorado('pisto'); ?></a> </p>
                        </div>
                    </div>   
                    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>    
                    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                    <script type="text/javascript" src="slick/slick.min.js"></script>
                </article>
            </section>
            <section class="articulo">
                <h1>Lorem ipsum dolor sit amet</h1>
                <p>


                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra dui massa, quis dictum neque auctor eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed rutrum est, ut mattis magna. Maecenas vel nisi et nunc fringilla scelerisque quis sit amet lectus. Donec eu luctus ante. Nullam at pretium lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque sed mauris purus. In laoreet neque eget blandit consectetur. Nam vehicula libero porttitor neque facilisis maximus. Vivamus sit amet sem sit amet nulla placerat egestas. Nulla facilisi. Proin molestie sem quis nisi ullamcorper, in consectetur mauris cursus. Nunc nisi elit, finibus luctus nunc eu, condimentum condimentum lacus.

                    Cras in aliquet diam, at porta odio. Proin lacinia risus ac nisl vehicula consequat. Curabitur nec dignissim odio. Nullam volutpat nisi at felis posuere, id venenatis sapien volutpat. Quisque auctor id nunc sit amet varius. Praesent eget orci neque. Duis auctor, augue vitae aliquam consequat, nisl sapien aliquam lacus, vel ornare libero mauris vitae nisi. Vivamus nulla leo, dignissim eu neque non, pretium ornare augue.

                    Proin posuere consequat aliquam. Pellentesque blandit, risus id bibendum semper, odio dolor auctor risus, ac interdum lacus quam vel ex. Praesent felis orci, imperdiet nec faucibus sit amet, feugiat ut quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nibh nisi, viverra sit amet pretium non, finibus sed libero. Maecenas accumsan dolor eget tortor tristique, eget tempus lectus ultrices. Integer bibendum venenatis arcu, eu maximus nibh ullamcorper et. Ut arcu urna, vulputate vitae cursus vel, ornare vel augue. Integer eu nisi purus. Donec sodales tortor a ligula dictum, et tincidunt nisl condimentum.

                    Maecenas pharetra in quam vel ultrices. Morbi mi lectus, egestas vulputate auctor a, finibus a nibh. In risus augue, posuere elementum neque a, sollicitudin sodales sapien. Morbi eu nunc suscipit tellus egestas faucibus ut quis erat. Nulla condimentum arcu libero, vel eleifend odio aliquet vel. Donec pretium pretium justo eget dapibus. Fusce gravida leo nec cursus rutrum.

                    Vestibulum magna metus, vehicula accumsan molestie id, mattis non sem. Sed efficitur sem vel venenatis aliquet. Pellentesque aliquam, nisi et venenatis malesuada, urna lorem facilisis massa, vitae placerat purus libero vel leo. In interdum eget odio ut suscipit. Maecenas purus neque, iaculis at nisi et, maximus pellentesque massa. Ut ullamcorper posuere libero, egestas elementum massa luctus id. Nam interdum orci vitae hendrerit varius. Vestibulum lacinia tortor et mi sagittis tempus. Morbi a leo mattis, volutpat sem et, suscipit ex. Aenean sit amet urna vel leo rhoncus auctor et luctus turpis. Maecenas tristique velit sodales enim fermentum, sit amet tempor felis ullamcorper. 



                    Curabitur lacinia urna lectus, eu tristique diam consectetur a. Donec consectetur magna sit amet dui dapibus luctus. Suspendisse euismod odio a arcu maximus, id rutrum dolor rhoncus. Sed molestie, nibh at tempor pellentesque, purus sem euismod risus, sit amet dapibus urna enim ut enim. Etiam vulputate fermentum orci non dapibus. Mauris fringilla risus sed tellus imperdiet, tempor viverra tortor porttitor. Sed at euismod quam. Maecenas nec libero ac nisi sodales sodales. Aenean at volutpat nunc. Nunc congue magna eget lacinia rutrum. Maecenas pretium et lacus a auctor. Ut varius, libero ut placerat mattis, erat tellus mattis leo, eget ultrices nunc lorem id dolor. Phasellus risus eros, congue a mattis a, egestas ut orci. Praesent vel dolor orci.

                    Sed porttitor, libero nec sollicitudin interdum, justo urna sodales ipsum, ac dignissim ex mauris in libero. Maecenas vel vestibulum erat. Pellentesque nisl magna, dignissim tempor risus sed, varius maximus libero. Praesent vehicula blandit mi, sit amet porttitor orci tincidunt in. Vivamus vitae ipsum eget ante cursus malesuada sit amet mollis libero. Suspendisse elit dolor, feugiat in interdum quis, faucibus sagittis nunc. Mauris sit amet semper nibh. Morbi eu justo placerat, ultrices elit ac, ultrices turpis.

                    Nulla tincidunt felis pharetra erat lobortis laoreet. Donec vulputate tincidunt nisl ac porttitor. Quisque placerat erat in magna elementum, ac ornare turpis blandit. Etiam maximus odio non risus tincidunt, sit amet facilisis erat semper. Quisque nisi lorem, lobortis sed aliquet non, imperdiet eu nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed at ipsum non lectus aliquam fermentum. Proin semper quam mi, eu pharetra nunc sodales sit amet. Sed quis porta diam, blandit aliquam ante. Duis porttitor nisi nec tortor maximus venenatis. Curabitur sit amet ultrices tellus.

                    Vestibulum interdum tempor velit nec accumsan. Nullam laoreet condimentum ligula, eu iaculis magna pulvinar vitae. Aliquam non nibh quam. Sed fringilla purus nunc. Nam a ex accumsan, pharetra urna eu, sagittis urna. Vestibulum suscipit euismod cursus. Duis elementum vel mauris id congue. Nulla volutpat quam non ultricies feugiat. Nunc sed congue orci. Pellentesque eget sollicitudin nunc.
                    Generated 5 paragraphs, 432 words, 2900 bytes of Lorem Ipsum




                </p>















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
