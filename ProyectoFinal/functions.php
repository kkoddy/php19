<?php
/*Preparamos la conexion a la base de datos*/
$host='localhost';
$user='root';
$pass='root';
$database='restaurante';
$link_connection="mysql:host=$host;dbname=$database;";
//cargamos al principio la consulta que devuelve la comida mas votada y el usuario que la voto


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
                . " producto.nombre=:producto AND"
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

//LOGIN
$login="";

$data=$_POST;
if($_POST){
   
    $usuario=isset($data['user'])?$data['user']: "";
    $contrasena=isset($data['pass'])?$data['pass']: "";


    
 

    

    
    
        
        if ($usuario!=null && $contrasena!=null){
            try {
                 
                
                
                    
                            $pdo=new PDO($link_connection, $user, $pass);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $login_sql="SELECT login, pass FROM usuario WHERE login=:usu AND pass=:pass;";
                            $statement=$pdo->prepare($login_sql);
                            $statement->execute([':usu'=>$_POST['user'],':pass'=>$_POST['pass']]);
                            if ($statement->rowCount()){
                                
                               
                                //echo "ENTRASTE".$cont." vez";
                                if (isset($_COOKIE["usuario"])){
                                    unset($_COOKIE["usuario"]);
                                    //session_destroy();
                                  
                                }
                                    

                                    setCookie("usuario",$usuario);
                                    session_name($usuario);
                                 
                                    session_start();
                                   
                                    //$_SESSION['user'] =$_POST['user'] ;
                                    //$logueado = $_SESSION['user'];
                                    $login="¡Bienvenido ".session_name()."!<br>";
                                
                            
                            }else{
                        
                                $login= "<p style='color:red;'>Login incorrecto</p>";
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
         producto, usuario WHERE comentarios.fk_pro=producto.id_producto AND  usuario.id_usu=comentarios.fk_usu AND producto.nombre=:producto;");
       $statement->execute([':producto'=>$producto]);

        while($resultado_consulta=$statement->fetch(PDO::FETCH_ASSOC)){
            echo $resultado_consulta["usuario"]." ".$resultado_consulta["comentario"]." ".$resultado_consulta["fecha"]."<br>";
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

        $pdo=new PDO($connection_string, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare("SELECT precio FROM producto WHERE nombre=:producto");
       $statement->execute([':producto'=>$producto]);

        while($resultado_consulta=$statement->fetch(PDO::FETCH_ASSOC)){
            echo $resultado_consulta["precio"]."€";
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
        $statement=$pdo->prepare("SELECT foto FROM producto WHERE nombre=:producto");
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
//===========================================================================
if ($_POST){
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
            $login="<p style='color:green'>Usuario registrado</p><br>";
      
        }catch(PDOException $e){
                echo "Ha ocurrido un error". $e->getMessage();
                //echo $newname;
        }finally{
            $pdo=null;
        }

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
        $statement=$pdo->prepare("SELECT login, descuento FROM usuario WHERE descuento > 0");
       $statement->execute();

        while($resultado_consulta=$statement->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>
            <td>".$resultado_consulta["login"]."</td><td>".$resultado_consulta["descuento"]."</td><td><input type='text'></td>
            </tr>";
          
            
        }

    }catch(PDOException $e){
            echo "Ha ocurrido un error". $e->getMessage();
    
    }finally{
        $pdo=null;
    }
}