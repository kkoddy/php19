<?php

/*Preparamos la conexion a la base de datos*/
$host='192.168.64.2';
$user='moya';
$database='restaurante';
$pass='1234';
$link_connection="mysql:host=$host;dbname=$database;";
//cargamos al principio la consulta que devuelve la comida mas votada y el usuario que la voto
//$prefix=substr(uniqid('', true), -5);
//session_id($prefix);
//session_name('invitado');
//session_start();
if ($_POST){
    $data=$_POST;
}else{
    $data=$_GET;
}
function getName($id){
    $host=$GLOBALS['host'];
    $connection_string=$GLOBALS['link_connection'];
    $user=$GLOBALS['user'];
    $pass=$GLOBALS['pass'];
    
    try {
        $pdo=new PDO($connection_string, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $text_sql="select nombre from producto where id_producto=:id";
        $statement=$pdo->prepare($text_sql);
        $statement->execute([':id'=>$id]);
                
       while($filas_tabla=$statement->fetch(PDO::FETCH_ASSOC)){
            //echo $filas_tabla['CLIENTE']." ".$filas_tabla['PLATO']." ".$filas_tabla['COMENTARIO']." ".$filas_tabla['VALORACION'];
            $nombre=$filas_tabla['nombre'];
            echo $nombre;
           
        }
           
    }
    catch(PDOException $e){
        echo "Ha ocurrido un error". $e->getMessage();
    }
    finally{
        $pdo=null;
        //echo "Trabajo finalizado";
    }
   
    
    
}
function getNumProductos(){
    $host=$GLOBALS['host'];
    $connection_string=$GLOBALS['link_connection'];
    $user=$GLOBALS['user'];
    $pass=$GLOBALS['pass'];
    
    try {
        $pdo=new PDO($connection_string, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $text_sql="select * from producto";
        $statement=$pdo->prepare($text_sql);
        $statement->execute();
      
        $cuenta_col = $statement->rowCount();
            return $cuenta_col;
           
        
    }
    catch(PDOException $e){
        echo "Ha ocurrido un error". $e->getMessage();
    }
    finally{
        $pdo=null;
        //echo "Trabajo finalizado";
    }
   
    
    
}

function MejorValorado($producto){
    $host=$GLOBALS['host'];
    $connection_string=$GLOBALS['link_connection'];
    $user=$GLOBALS['user'];
    $pass=$GLOBALS['pass'];
    
    try {
        $pdo=new PDO($connection_string, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $text_sql="SELECT usuario.nombre AS CLIENTE, comentarios.comentario AS COMENTARIO,"
                . " producto.nombre AS PLATO,producto.foto AS FOTO,comentarios.valoracion AS VALORACION FROM comentarios, usuario, producto "
                . "WHERE usuario.id_usu=comentarios.fk_usu AND producto.id_producto=comentarios.fk_pro AND"
                . " producto.id_producto=:producto AND"
                . " comentarios.valoracion=(SELECT MAX(valoracion) FROM comentarios);";
        $statement=$pdo->prepare($text_sql);
        $statement->execute([':producto'=>$producto]);
        //echo "Se han recuperado ".$statement->rowCount()." entradas:\n";
        $cliente="";
        $plato="";
        $comentario="";
        $valoracion="";
        $foto="";
        while($filas_tabla=$statement->fetch(PDO::FETCH_ASSOC)){
            //echo $filas_tabla['CLIENTE']." ".$filas_tabla['PLATO']." ".$filas_tabla['COMENTARIO']." ".$filas_tabla['VALORACION'];
            $cliente=$filas_tabla['CLIENTE'];
            $plato=$filas_tabla['PLATO'];
            $comentario=$filas_tabla['COMENTARIO'];
            $valoracion=$filas_tabla['VALORACION'];
            $foto=$filas_tabla['FOTO'];
            echo $cliente." ".$comentario." ".$valoracion;
           
        }
        
    }
    catch(PDOException $e){
        echo "Ha ocurrido un error". $e->getMessage();
    }
    finally{
        $pdo=null;
        //echo "Trabajo finalizado";
    }
}
//=====================================================================================

//LOGIN DE USUARIOS
$login="";


if($data){
   
    $usuario=isset($data['user'])?$data['user']: "";
    $contrasena=isset($data['pass'])?$data['pass']: "";
    $login_actual=$usuario;
    
    
 

    

    
    
        
        if ($usuario!=null && $contrasena!=null){
            try {
                 
                
                
                    
                            $pdo=new PDO($link_connection, $user, $pass);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $login_sql="SELECT login, pass FROM usuario WHERE login=:usu AND pass=:pass;";
                            $statement=$pdo->prepare($login_sql);
                            $statement->execute([':usu'=>$_POST['user'],':pass'=>$_POST['pass']]);
                            if ($statement->rowCount()){
                                
                               
                                //Si hay otra cookie de un usuario anterior de destrulle
                          
                                    
                                   
                                    setCookie("usuario",$usuario,time()+3600);
                                    //session_destroy();
                                    session_name($usuario);
                                    session_start();
                                   
                                   
                                 
                                    
                                    header("Location: index.php", true, 301);
                                    exit();
                            
                            }else{
                        
                                $login="<div class='alert alert-danger span8' role='alert'>Login incorrecto</div>";
                            }
                        
            }
            catch(PDOException $e){
                echo "Ha ocurrido un error". $e->getMessage();
            }
            finally{
                $pdo=null;
                //echo "Trabajo finalizado";
            }
        
        
        }else{
            $login="<p>Introduce un usuario valido<p><br>";
        }


    }
//======================================================================================

function CalcularValoracionMedia($producto){
    try {
        
        $connection_string=$GLOBALS['link_connection'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];

        $pdo=new PDO($connection_string, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare("SELECT producto.nombre, AVG(comentarios.valoracion) AS media FROM comentarios, producto
        WHERE producto.id_producto=comentarios.fk_pro AND producto.nombre=:producto;");
       $statement->execute([':producto'=>$producto]);

        while($resultado_consulta=$statement->fetch(PDO::FETCH_ASSOC)){
            echo $resultado_consulta["nombre"]." ".$resultado_consulta["media"];
        }

    }catch(PDOException $e){
            echo "Ha ocurrido un error". $e->getMessage();
    
    }finally{
        $pdo=null;
    }
}
function TodosLosComentariosProducto($producto){
    try {
      
        $connection_string=$GLOBALS['link_connection'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];

        $pdo=new PDO($connection_string, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare("SELECT comentarios.comentario AS comentario, producto.nombre AS producto, usuario.nombre AS usuario,  DATE_FORMAT(fecha, '%d/%m/%y %h:%m') AS fecha FROM comentarios,
         producto, usuario WHERE comentarios.fk_pro=producto.id_producto AND  usuario.id_usu=comentarios.fk_usu AND producto.id_producto=:producto;");
       $statement->execute([':producto'=>$producto]);

        while($resultado_consulta=$statement->fetch(PDO::FETCH_ASSOC)){
            echo "<p class='comment'>".$resultado_consulta["usuario"]." ".$resultado_consulta["comentario"]." ".$resultado_consulta["fecha"]."</p><br>";
        }

    }catch(PDOException $e){
            echo "Ha ocurrido un error". $e->getMessage();
    
    }finally{
        $pdo=null;
    }
}

function getPrecio($producto){
    try {
        
        $connection_string=$GLOBALS['link_connection'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];
        $usuario=isset($_COOKIE['usuario'])?$_COOKIE['usuario']: "";
        $descuento=getDescuento($usuario);
        $resta=0;
        $pdo=new PDO($connection_string, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare("SELECT precio FROM producto WHERE id_producto=:producto");
       $statement->execute([':producto'=>$producto]);

        while($resultado_consulta=$statement->fetch(PDO::FETCH_ASSOC)){
            $resta=($resultado_consulta["precio"]*$descuento)/100;
            echo $resultado_consulta["precio"]-$resta.' €';
           
        }

    }catch(PDOException $e){
            echo "Ha ocurrido un error". $e->getMessage();
    
    }finally{
        $pdo=null;
    }
}
function getDescuento($id){
    try {
        
        $connection_string=$GLOBALS['link_connection'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];

        $pdo=new PDO($connection_string, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare("SELECT descuento FROM usuario WHERE login=:id_usu");
       $statement->execute([':id_usu'=>$id]);

        while($resultado_consulta=$statement->fetch(PDO::FETCH_ASSOC)){
            return $resultado_consulta["descuento"];
        }

    }catch(PDOException $e){
            echo "Ha ocurrido un error". $e->getMessage();
    
    }finally{
        $pdo=null;
    }
}

function getFoto($producto){
    try {
       
        $connection_string=$GLOBALS['link_connection'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];

        $pdo=new PDO($connection_string, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare("SELECT foto FROM producto WHERE id_producto=:producto");
       $statement->execute([':producto'=>$producto]);

        while($resultado_consulta=$statement->fetch(PDO::FETCH_ASSOC)){
            echo "'images/".$resultado_consulta["foto"]."'";
        }

    }catch(PDOException $e){
            echo "Ha ocurrido un error". $e->getMessage();
    
    }finally{
        $pdo=null;
    }
}
//==================REGISTRAR NUEVO USUARIO===================================
if ($_POST){
    $alert="";
    $newname=isset($data['newname'])?$data['newname']: "";
     $apellidos=isset($_POST['lastname'])?$data['lastname']: "";
     $mail=isset($data['mail'])?$data['mail']: "";
     $age=isset($data['age'])?$data['age']: "";
     $newuser=isset($data['newuser'])?$data['newuser']: "";
     $newpass=isset($data['newpass'])?$data['newpass']: "";
    
 
    if ($newname!=null && $newuser!=null && $newpass!=null && $mail!=null){
        try {
        
        

            $pdo=new PDO($link_connection, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement=$pdo->prepare("INSERT INTO usuario (nombre,login,pass,correo,apellidos,edad) VALUES (?,?,?,?,?,?)");
        $statement->execute(array($newname,$newuser,$newpass,$mail,$apellidos,$age));
            $alert="<div class='alert alert-success'><strong>Guardado:</strong> Datos guardados correctamente.</div>";
      
        }catch(PDOException $e){
                echo "Ha ocurrido un error". $e->getMessage();
                //echo $newname;
        }finally{
            $pdo=null;
        }

        }else{
             $alert="<div class='alert alert-danger'><strong>Aviso:</strong> Error al registrar usuario.</div>";
        }
    }
//===========================================================================
function verDescuentos(){
    try {
        
        $connection_string=$GLOBALS['link_connection'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];

        $pdo=new PDO($connection_string, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare("SELECT login, descuento FROM usuario");
       $statement->execute();
//CONTRUIMOS UN FORMULARIO POR CADA USUARIO CON UN CAMPO HIDDEN PARA PASAR TAMBIEN EL NOMBRE DEL USUARIO
        while($resultado_consulta=$statement->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>
            <td>".$resultado_consulta["login"]."</td><td>".$resultado_consulta["descuento"]." %</td><td><form method='POST'><input type='text' name='descuento' class='form-control input-sm'><input type='hidden' name='dusuario' value=".$resultado_consulta["login"]."> <input class='btn btn-primary btn-sm' type='submit' value='Guardar'>
            </form></td>
            </tr>";
          
            
        }

    }catch(PDOException $e){
            echo "Ha ocurrido un error". $e->getMessage();
    
    }finally{
        $pdo=null;
    }
}

/*RECOGEMOS LOS PARAMETROS PARA ACTUALIZAR LOS DESCUENTOS */
if ($_POST){
    $descuento=isset($data['descuento'])?$data['descuento']: "";
    $dusuario=isset($data['dusuario'])?$data['dusuario']: "";
    $aviso="";
    //Nos aseguramos que no esta vacio el parametro
    if ($descuento!=null && $dusuario!=null){
        //Nos aseguramos que es un numero antes de hacer la consulta y que no vamos ha regalar el pruducto, como max 75% de descuento
        if(is_numeric($descuento) && $descuento<=75){
        try {
           
        

            $pdo=new PDO($link_connection, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement=$pdo->prepare("UPDATE usuario SET descuento=? WHERE login=?");
        $statement->execute(array($descuento,$dusuario));
        $aviso="<div class='alert alert-success'>
        <strong>Guardado:</strong> Datos guardados correctamente.
      </div>";
      
        }catch(PDOException $e){
                echo "Ha ocurrido un error". $e->getMessage();
                //echo $newname;
        }finally{
            $pdo=null;
        }

        }else{
            $aviso="<div class='alert alert-danger'>
            <strong>Aviso:</strong> Introduzca solo números y/o un descuento máximo del 75%.
          </div>";
        }
    }
    }
    //=======LOGIN SUPERUSUARIO=================
    
   if(!isset($_COOKIE['admin'])){
       //si no existe la cookie de admin entonces es que no ha logueado
       //muestro login y oculto el panel, si existe es que ha logueado oculto login y muestro panel y evitamos que nos oculte el form de descuentos cuando modifiquemos el descuento de los clientes
        $ver_login="block";
        $ver_panel="none";
   }else{
    $ver_login="none";
    $ver_panel="block";
   }
    if($data){
       
        $userAdmin=isset($data['superuser'])?$data['superuser']: "";
        $passAdmin=isset($data['superuserpass'])?$data['superuserpass']: "";
        if ($userAdmin!=null && $passAdmin!=null){
            try {
                 
                
               
                    
                            $pdo=new PDO($link_connection, $user, $pass);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $login_sql="SELECT usuario, password FROM administradores WHERE usuario=:usu AND password=:pass;";
                            $statement=$pdo->prepare($login_sql);
                            $statement->execute([':usu'=>$userAdmin,':pass'=>$passAdmin]);
                            if ($statement->rowCount()){
                                
                               
                             
                                    

                                    setCookie("admin",$userAdmin, time()+60);
                                    session_name($userAdmin);
                                    session_start();
                                    
                                   

                                        $ver_login="none";
                                        $ver_panel="block";
                                    

                                    //$_SESSION['user'] =$_POST['user'] ;
                                    //$logueado = $_SESSION['user'];
                                    $login="¡Bienvenido ".session_name()."!";

                                  
                                    $aviso1="<div class='alert alert-success'>
                                    <strong>Inicio de sesion correcto:</strong>".$login."</div>";
                            }else{
                        
                                $aviso1="<div class='alert alert-danger'>
                                <strong>Aviso:</strong> Login Incorrecto.</div>";
                              
                            }
                        
            }
            catch(PDOException $e){
                echo "Ha ocurrido un error". $e->getMessage();
            }
            finally{
                $pdo=null;
                //echo "Trabajo finalizado";
            }

        }


    }
   
                      if(isset($_COOKIE['usuario'])){
                          $login_actual=$_COOKIE['usuario'];
                      }else{
                          $login_actual='Login';
                      }

    
        
        
   
        
 
    
      
    //===CERRAR SESION====
  
       //
       
       if (isset($_GET['close']) && $_GET['close']==1) {
      
                if(isset($_COOKIE["usuario"])){
                   
                    session_destroy();
                    setcookie('usuario', "",time()-3600);
                    setcookie('usuario', "",time()-3600);
                    unset($_COOKIE['usuario']); 
                    header("Location: _login.php", true, 301);
                    exit();
                    
                }
                 if(isset($_COOKIE['admin'])){

                    session_destroy();
                    setcookie('usuario', null, -1, '/');
                    setcookie('usuario', null, -1, '/');
                     unset($_COOKIE['admin']);
                    header("Location: _login.php", true, 301);
                    exit();
                }
       
  }