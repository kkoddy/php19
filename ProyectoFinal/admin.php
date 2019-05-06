<?php
        include 'functions.php';
	
?>


<html lang="es">
    <head>
        <title>Panel de administrador</title>
   
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
    
        
        
    </head>
    <body>
        
        <div class="table-responsive">
            <table id="tablaUsuarios" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Usuario</td>
                            <td>Descuento</td>
                            <td>Aplicar Descuento</td>
                        </tr>
                    </thead>
                    
                        
                    <?php echo verDescuentos();?>
                        

                    

            </table>
        </div>
        <script type="text/javascript">
           $(document).ready(function(){
             $('#tablaUsuarios').DataTable();
       
            });
       </script>



    </body>
</html>