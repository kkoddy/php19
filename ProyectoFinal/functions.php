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
function CalcularValoracionMedia($producto){
    try {
        $host=$GLOBALS['host'];
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
        $host=$GLOBALS['host'];
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
        $host=$GLOBALS['host'];
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