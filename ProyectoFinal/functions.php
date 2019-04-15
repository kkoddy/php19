<?php
/*Preparamos las consultas necesarias*/
$host='localhost';
$user='root';
$pass='root';
$database='restaurante';
$link_connection="mysql:host=$host;dbname=$database;";


try {
    $pdo=new PDO($link_connection, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $text_sql="SELECT usuario.nombre AS CLIENTE, comentarios.comentario AS COMENTARIO,"
            . " producto.nombre AS PLATO,producto.foto AS FOTO,comentarios.valoracion AS VALORACION FROM comentarios, usuario, producto "
            . "WHERE usuario.id_usu=comentarios.fk_usu AND producto.id_producto=comentarios.fk_pro AND"
            . " comentarios.valoracion=(SELECT MAX(valoracion) FROM comentarios);";
    $statement=$pdo->prepare($text_sql);
    $statement->execute();
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
        echo $cliente." ".$plato." ".$comentario." ".$valoracion." ".$foto;
    }

}
catch(PDOException $e){
    echo "Ha ocurrido un error". $e->getMessage();
}
finally{
    $pdo=null;
    //echo "Trabajo finalizado";
}
