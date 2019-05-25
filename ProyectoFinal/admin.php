<?php
        include 'functions.php';
	
?>


<html>
    <head>
        <title>Panel de administrador</title>
         <meta charset="UTF-8"> 
        <link rel="stylesheet" href="css/estiloparcial.css" type="text/css"/>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
           <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">  
    
        
        
    </head>
    <body>
    <?php
             $aviso1=isset($aviso1)?$aviso1: "";
             echo $aviso1;
        
        
        ?>
        <div class="container" id="loginSuperuser" style="display:<?=$ver_login;?>">
            <h1>Acceso restringido <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1>
        <div class="col-md-auto">
            <form method="POST" class="form">
                <div class="form-group rounded">
                    <label>Usuario</label>
                    <input type="text" class="form-control" name="superuser" aria-describedby="emailHelp" placeholder="Usuario">
                    
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="superuserpass" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Entrar <i class="fas fa-sign-in-alt"></i></button>
            </form>
        </div>

        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <div class="table-responsive container-fluid" id="tabla_usuarios" style="display:<?=$ver_panel;?>">
              
            <h1 class="fa">Descuentos para Clientes</h1>
             
           <?php  $aviso=isset($aviso)?$aviso: "";
            echo $aviso;
           
           ?>
          
            <table id="tablaUsuarios" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Usuario</td>
                            <td>Descuento</td>
                            <td>Aplicar Descuento</td>
                        </tr>
                    </thead>
                    
                        <!--AQUI SE GENERA EL CUERPO DE LA TABLA DE FORMA DINAMICA-->
                    <?php echo verDescuentos();?>
                        

                    

            </table>
            <a href="index.php?close=1"><i class="btn btn-primary">Volver</i></a>
            <a class="btn btn-warning" href="index.php?close=1">Cerrar sesion</a>
        </div>
        <script type="text/javascript">
           $(document).ready(function(){
             $('#tablaUsuarios').DataTable(
                {
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }

                    }
             );
       
            });
       </script>

            

    </body>
</html>